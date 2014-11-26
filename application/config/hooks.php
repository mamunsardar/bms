<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//schema create hook

/*$hook['pre_controller'][] = array(
    'class'    => 'BootstrapSchemaHooks',
    'function' => 'create_schema',
    'filename' => 'BootstrapSchemaHooks.php',
    'filepath' => 'hooks'
);*/

//default data create hook

/*$hook['post_controller'][0] = array(
    'class'    => 'BootstrapDefaultDataHooks',
    'function' => 'create_default_data',
    'filename' => 'BootstrapDefaultDataHooks.php',
    'filepath' => 'hooks'
);*/


$hook['post_controller'][1] = array(
    'class'    => 'AuthenticationHooks',
    'function' => 'authenticate',
    'filename' => 'AuthenticationHooks.php',
    'filepath' => 'hooks'
);


/* End of file hooks.php */
/* Location: ./application/config/hooks.php */