<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager;

class Doctrine
{
    public $em;

    public function __construct()
    {
        require_once __DIR__ . '/Doctrine/ORM/Tools/Setup.php';
        Setup::registerAutoloadDirectory(__DIR__);

        // Load the database configuration from CodeIgniter
        if(ENVIRONMENT == 'production')
            require APPPATH . 'config/production/database.php';
        else
            require APPPATH . 'config/development/database.php';

        $connection_options = array(
            'driver'        => 'pdo_mysql',
            'user'          => $db['default']['username'],
            'password'      => $db['default']['password'],
            'host'          => $db['default']['hostname'],
            'dbname'        => $db['default']['database'],
            'charset'       => $db['default']['char_set'],
            'driverOptions' => array(
                'charset'   => $db['default']['char_set'],
            ),
        );

        // With this configuration, your model files need to be in application/models/entity
        // e.g. Creating a new Entity\User loads the class from application/models/entity/User.php
        $models_namespace = 'entity';
        $models_path = APPPATH . 'models';
        $proxies_dir = APPPATH . 'models/Proxies';
        $metadata_paths = array(APPPATH . 'models/entity');

        // Set $dev_mode to TRUE to disable caching while you develop
        $config = Setup::createAnnotationMetadataConfiguration($metadata_paths, $dev_mode = true, $proxies_dir);
        $this->em = EntityManager::create($connection_options, $config);

        $loader = new ClassLoader($models_namespace, $models_path);
        $loader->register();
    }
}