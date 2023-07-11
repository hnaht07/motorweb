<?php 
    class Session{
        /**
         * data($key, $value) => set session
         * data($key) => get session
         */
        static public function data($key='', $value = ''){
            $sessionKey = self::isInvalid();

            if(!empty($value)){
                if(!empty($key)){
                    $_SESSION[$sessionKey][$key] = $value; // set session
                    return true;
                }
                return false;
                
            }else{
                if(empty($key)){
                    if(isset($_SESSION[$sessionKey])){
                        return $_SESSION[$sessionKey];
                    }
                }
                if(isset($_SESSION[$sessionKey][$key])){
                    return $_SESSION[$sessionKey][$key]; // get session
                }
            }


        }

        /**
         * Flash Data
         * - set flash data : giống như set session 
         * - get flash data : giống như get session , xóa session sau khi get
         */

        static public function flash($key = '', $value =''){
            $dataFlash = self::data($key, $value);
            if(empty($value)){
                self::delete($key);
            }
            return $dataFlash;
        }


        /**
         * delete($key) => xóa session với key
         * delete => xóa hết session
         */
        static public function delete($key = ''){
            $sessionKey = self::isInvalid();
            if(!empty($key)){
                if(isset($_SESSION[$sessionKey][$key])){
                    unset($_SESSION[$sessionKey][$key]);
                    return true;
                }
                return false;
            }else{
                unset($_SESSION[$sessionKey]);
                return true;
            }
            return false;
        }

        static public function showErrors($message){
            $data = ['message' => $message];
            App::$app->loadErrors('exception',$data);
            die();
        }
        static public function isInvalid(){
            global $config;
            if (!empty($config['session'])) {
                $sessConfig = $config['session'];
                if (!empty($sessConfig['session_key'])) {
                    $sessKey = $sessConfig['session_key'];
                    return $sessKey;
                } else {
                    self::showErrors('Thiếu cấu hình session_key, Vui lòng kiểm tra lại : configs/session.php');
                }
            } else {
                self::showErrors('Thiếu cấu hình session, Vui lòng kiểm tra lại : configs/session.php');
            }
        }


        
    }


?>