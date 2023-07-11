<?php
define('_DIR_ROOT',__DIR__);
$upsRoot = str_replace("\\", '/', realpath(dirname(__FILE__)));
define('SITE_ROOT', $upsRoot);

//Xử Lý http root

if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']== 'on'){
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
}else{
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

$dir = str_replace("\\",'/',_DIR_ROOT);
$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower($dir));

$web_root = $web_root.$folder;

define('_WEB_ROOT',$web_root);

//Tự động load configs
$configs_dir = scandir('configs');
if(!empty($configs_dir)){
    foreach ($configs_dir as $item) {
        if($item!='.' && $item!='..' && file_exists('configs/'. $item)){
            require_once 'configs/'. $item;//load route config
        }
    }
}

//Load all service
if(!empty($config['app']['service'])){
    $allServices = $config['app']['service'];
    if(!empty($allServices)){
        foreach ($allServices as $serviceName) {
            if(file_exists('app/core/'.$serviceName.'.php')){
                require_once('app/core/'.$serviceName.'.php');
            }
        }
    }
}


require_once 'core/ServiceProvider.php';//Load Service Provider Class
require_once 'core/View.php';//Load View Class
require_once 'core/Load.php';//Load
require_once 'core/Middlewares.php';// load base middleware


require_once 'core/Route.php';//load route class
require_once 'core/Session.php'; //load session
//kiểm tra config và load Database
if (!empty($config['database'])) {
    $db_config = array_filter($config['database']);
    if (!empty($db_config)) {
        require_once 'core/Connection.php';
        require_once 'core/QueryBuilder.php';
        require_once 'core/Database.php';
        require_once 'core/DB.php';
        
    }
}
require_once 'core/Helper.php'; //load base helper
//load all helper
$allHelper = scandir('app/helpers');
if (!empty($allHelper)) {
    foreach ($allHelper as $item) {
        if ($item != '.' && $item != '..' && file_exists('app/helpers/' . $item)) {
            require_once 'app/helpers/' . $item; //load route config
        }
    }
}
require_once 'app/App.php';//load app
require_once 'core/Model.php';//load base model
require_once 'core/Template.php';//load template
require_once 'core/Controller.php';//load base controller
require_once 'core/Request.php'; // load request
require_once 'core/Response.php'; // load response