<?php 
    class Request{

        private $__rules = [],$__messages = [], $__errors = [];
        
        public $dbRequest;

        public function __construct(){
            $this->dbRequest = new Database();

        }


        public function getMethod() {
            return strtolower($_SERVER['REQUEST_METHOD']) ;
        }

        public function isPost() {
            if($this->getMethod() == 'post') {
                return true;
            }
            return false;
        }
        public function isGet()
        {
            if ($this->getMethod() == 'get') {
                return true;
            }
            return false;
        }

        public function getField() {

            $dataField = [];

            if($this->isGet()){
                //xử lý lấy dữ liệu với GET
                if(!empty($_GET)){
                    foreach($_GET as $key=> $value){
                        if(is_array($value)){
                            $dataField[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                        }else{
                            $dataField[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                        }
                        
                    }
                }
            }
            if ($this->isPost()) {
                //xử lý lấy dữ liệu với POST
                if (!empty($_POST)) {
                    foreach ($_POST as $key => $value){
                        if (is_array($value)) {
                            $dataField[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                        } else {
                            $dataField[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                        }
                    }
                }
            }
            return $dataField;
        }

        //định nghĩa các rule của validate
        public function rules($rules=[]){
            $this->__rules = $rules;
            
        }

        //các thông báo cho từng rule
        public function message($message = []) {
            $this->__messages = $message;
            
        }

        

        //run validate
        public function validate(){
            $this->__rules = array_filter($this->__rules);
            $checkValidate = true;
            if(!empty($this->__rules)){

                $dataFields = $this->getField();
                foreach ($this->__rules as $fieldName => $ruleItem) {
                    $ruleItemArr = explode('|', $ruleItem);                  
                    foreach ($ruleItemArr as $rules) {
                        $ruleName = null;
                        $ruleValue = null;
                        $rulesArr = explode(':', $rules);
                        $ruleName = reset($rulesArr);
                        if(count($rulesArr) >1){
                            $ruleValue = end($rulesArr);
                        }
                        if($ruleName=='required'){
                            if (empty(trim($dataFields[$fieldName]))) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                        if ($ruleName == 'min') {
                            if (strlen(trim($dataFields[$fieldName]))< $ruleValue) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                        if ($ruleName == 'max') {
                            if (strlen(trim($dataFields[$fieldName])) > $ruleValue) {
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                        if ($ruleName == 'email') {
                            if (!filter_var($dataFields[$fieldName], FILTER_VALIDATE_EMAIL)){
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false; 
                            }
                        }
                        if ($ruleName == 'match') {
                            if (trim($dataFields[$fieldName]) != trim($dataFields[$ruleValue])){
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                        if($ruleName == 'unique') {
                            $tableName = null;
                            $fieldCheck = null;

                            if(!empty($rulesArr[1])){
                                $tableName = $rulesArr[1];
                            }
                            if(!empty($rulesArr[2])){
                                $fieldCheck = $rulesArr[2];
                            }
                            if(!empty($tableName) && !empty($fieldCheck)){
                                $checkExist = $this->dbRequest->query("SELECT $fieldCheck FROM $tableName WHERE $fieldCheck='$dataFields[$fieldName]'")->rowCount();
                                if(!empty($checkExist)){
                                    $this->setErrors($fieldName, $ruleName);
                                    $checkValidate = false;
                                }
                            }
                        }
                            

                    }

                }
            }
            $sessionKey = Session::isInvalid();
            Session::flash($sessionKey.'_errors' , $this->errors());
            Session::flash($sessionKey . '_old', $this->getField());

            return $checkValidate;
        }

        //get errors 
        public function errors($fieldName = ''){
            if(!empty($this->__errors)){
                if(empty($fieldName)){
                    $errorsArray = [];
                    foreach ($this->__errors as $key => $error) {
                        $errorsArray[$key] = reset($error);
                    }
                    return $errorsArray;
                }
                return reset($this->__errors[$fieldName]);
            }
            return false;
        }

        public function setErrors($fieldName, $ruleName){
            $this->__errors[$fieldName][$ruleName] = $this->__messages[$fieldName . '.' . $ruleName];
        }
    }
    

?>