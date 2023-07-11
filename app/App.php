<?php

class App{

    private $__controller, $__action, $__params , $__routes, $__dbApp;
    static public $app;
    function __construct(){

        global $routes,$config;
        self::$app = $this;
        $this->__routes = new Route();


        if(!empty($routes['default_controller'])){
            $this->__controller = $routes['default_controller'];
        }
        
        $this->__action = 'index';
        $this->__params = [];

        if(class_exists('DB')){
            $dbApp = new DB();
            $this->__dbApp = $dbApp->dbDB;
        }
        
        $this->handleUrl();

    }

    function getUrl(){
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        }else{
            $url = '/';
        }

        return $url;
    }

    public function handleUrl(){
        global $config;
        $url = $this->getUrl();

        $url = $this->__routes->handleRoute($url);

        //Middleware App
        $this->handleGlobalMiddleware($this->__dbApp);
        $this->handleRouteMiddleware($this->__routes->getUri(), $this->__dbApp);

        //App Service Provider
        $this->handleAppServiceProvider($this->__dbApp);

        $urlArray = array_filter(explode("/", $url));
        $urlArray = array_values($urlArray);
        $urlCheck = '';
        if(!empty($urlArray)) {
            foreach ($urlArray as $key => $item) {
                $urlCheck .= $item . '/';
                $fileCheck = rtrim($urlCheck, '/');
                $fileArr = explode('/', $fileCheck);
                $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);
                $fileCheck = implode('/', $fileArr);
                if (!empty($urlArray[$key - 1])) {
                    unset($urlArray[$key - 1]);
                }
                if (file_exists('app/controllers/' . ($fileCheck) . '.php')) {
                    $urlCheck = $fileCheck;
                    break;
                }
            }

            $urlArray = array_values($urlArray);
        }
        
        

        //xử lý controller
        if(!empty($urlArray[0])){
            $this->__controller = ucfirst($urlArray[0]);
        }else{
            $this->__controller = ucfirst($this->__controller);
        }
        //Xử lý khi $urlArray rỗng
        if(empty($urlCheck)){
            $urlCheck = $this->__controller;
        }
        if(file_exists('app/controllers/'. $urlCheck.'.php')){
            require_once 'controllers/' . $urlCheck. '.php';
            //kiểm tra $this->__controller tồn tại?
            if(class_exists($this->__controller)){
                $this->__controller = new $this->__controller();
                unset($urlArray[0]);
                if(!empty($this->__dbApp)){
                    $this->__controller->dbBaseController = $this->__dbApp;
                }
                
            }else{
                $this->loadErrors();
            }
            
        }else{
            $this->loadErrors();
        }

        //xử lý action
        if (!empty($urlArray[1])) {
            $this->__action = $urlArray[1];
            unset($urlArray[1]);
        }

        //xử lý params
        $this->__params = array_values($urlArray);

        //kiểm tra method
        if(method_exists($this->__controller, $this->__action)){
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        }else{
            $this->loadErrors();
        }
        
        
    }

    public function loadErrors($name = '404', $data = []){
        extract($data);
        require_once 'errors/'.$name.'.php';
    }

    public function handleRouteMiddleware($routeKey,$dbmd){
        global $config;
        $routeKey = trim($routeKey);
        if (!empty($config['app']['routeMiddleware'])) {
            $routeMiddleWareArr = $config['app']['routeMiddleware'];
            foreach ($routeMiddleWareArr as $key => $middleWareItem) {

                if ($routeKey == trim($key) && file_exists('app/middlewares/' . $middleWareItem . '.php')) {
                    require_once 'app/middlewares/' . $middleWareItem . '.php';
                    if (class_exists($middleWareItem)) {
                        $middleWareObj = new $middleWareItem();
                        if (!empty($dbmd)) {
                            $middleWareObj->middlewareDb = $dbmd;
                        }
                        $middleWareObj->handle();
                    }
                }
            }
        }
    }
    public function handleGlobalMiddleware($dbmd){
        global $config;
        if (!empty($config['app']['globalMiddleware'])) {
            $globalMiddleWareArr = $config['app']['globalMiddleware'];
            foreach ($globalMiddleWareArr as $key => $middleWareItem) {

                if (file_exists('app/middlewares/' . $middleWareItem . '.php')) {
                    require_once 'app/middlewares/' . $middleWareItem . '.php';
                    if (class_exists($middleWareItem)) {
                        $middleWareObj = new $middleWareItem();
                        if(!empty($dbmd)){
                            $middleWareObj->middlewareDb = $dbmd;
                        }
                        $middleWareObj->handle();
                    }
                }
            }
        }
    }

    public function handleAppServiceProvider($SerProDb){
        global $config;
        if (!empty($config['app']['boot'])) {
            $serviceProviderArr = $config['app']['boot'];
            foreach ($serviceProviderArr as $serviceName) {

                if (file_exists('app/core/' . $serviceName . '.php')) {
                    require_once 'app/core/' . $serviceName . '.php';
                    if (class_exists($serviceName)) {
                        $serviceObj = new $serviceName();
                        if(!empty($SerProDb)) {
                            $serviceObj->serviceDb = $SerProDb;
                        }
                        $serviceObj->boot();
                    }
                }
            }
        }
    }
}