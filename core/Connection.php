<?php 
    class Connection{
        private static $instance = null , $conn = null;

        private function __construct($config) {
            //kết nối database
            try{
            
                //cấu hình dsn
                $dsn = 'mysql:dbname=' . $config['db'] . ';host=' . $config['host'];
                //cấu hình options
                //cấu hình uft 8
                //cấu hình ngoại lệ khi truy vấn lỗi

                $options = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ];

            //câu lệnh kết nối
                error_reporting(E_ERROR | E_PARSE);
                $con = new PDO($dsn, $config['user'], $config['pass'], $options);
                self::$conn = $con;
                
                
                
            }catch(Exception $exception){
                $mess = $exception->getMessage();
                App::$app->loadErrors('database',['message' => $mess]);
                die();
            };
            

        }

        public static function getInstance($config) {
            if (self::$instance == null) {
                $connection = new Connection($config);
                self::$instance = self::$conn;
            
            }

            return self::$instance;

            
        }
    }

?>