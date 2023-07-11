<?php 

    trait QueryBuilder{
        public $tableName = '';
        public $tableName_1 = '';
        public $tableName_2 = '';
        public $where = '';
        public $operator = '';
        public $selectField = '*';
        public $limit = '';
        public $orderBy = '';
        public $innerJoin = '';

        public function tableBuilder($tableName){
            $this->tableName = $tableName;
            return $this;

        }
        public function tableWhereBuilder($tableName_1,$tableName_2)
        {
            $this->tableName_1 = $tableName_1;
            $this->tableName_2 = $tableName_2;
            return $this;
        }

        public function whereBuilder($field,$compare,$value){
            if(empty($this->where)){
                $this->operator = ' WHERE ';
            }else{
                $this->operator = ' AND ';
            }
            $this->where.="$this->operator $field $compare $value";
            return $this;
        }

        public function orWhereBuilder($field,$compare,$value){
            if (empty($this->where)) {
                $this->operator = ' WHERE ';
            } else {
                $this->operator = ' OR ';
            }
            $this->where .= "$this->operator $field $compare '$value'";
            return $this;
        }

        public function whereLikeBuilder($field,$value){
            if (empty($this->where)) {
                $this->operator = ' WHERE ';
            } else {
                $this->operator = ' AND ';
            }
            $this->where .= "$this->operator $field LIKE '$value'";
            return $this;
        }

        public function selectBuilder($field='*'){
            $this->selectField = $field;
            return $this;
        }

        public function limitBuilder($number , $offset = 0){
            $this->limit = " LIMIT $offset , $number";
            return $this;
        }

        public function orderByBuilder($field,$type='ASC'){
            $fieldArr = array_filter(explode(',',$field));
            if(!empty($fieldArr) && count($fieldArr)>=2){
                $this->orderBy = " ORDER BY ". implode(', ',$fieldArr);

            }else{
                $this->orderBy = " ORDER BY ".$field." ".$type;
            }
            return $this;
        }

        //inner join
        public function joinBuilder($tableName, $relationName){
            $this->innerJoin.= 'INNER JOIN '.$tableName.' ON '.$relationName.' '; 
            
            return $this;
        }

        public function insertBuilder($data){
            $tableName = $this->tableName;
            $insertStatus = $this->insertData($tableName, $data);
            return $insertStatus;

        }

        public function lastInsertBuilder(){
            return $this->lastInsertId();
        }

        public function updateBuilder($data){
            $condiUpdate = str_replace('WHERE','',$this->where);
            $condiUpdate = trim($condiUpdate);
            $tableName = $this->tableName;
            $updateStatus = $this->updateData($tableName,$data,$condiUpdate);
            return $updateStatus;
        }

        public function deleteBuilder(){
            $condiDelete = str_replace('WHERE', '', $this->where);
            $condiDelete = trim($condiDelete);
            $tableName = $this->tableName;
            $deleteStatus = $this->deleteData($tableName, $condiDelete);
            return $deleteStatus;
        }

        public function getAllBuilder(){
            $sqlQuery = "SELECT $this->selectField FROM  $this->tableName $this->innerJoin $this->where $this->orderBy $this->limit";
            $query = $this->query($sqlQuery);
            
            $this->resetQuery();
            if(!empty($query)){
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
            
            return false;
        }

        public function getTwoTableBuilder()
        {
            $sqlQuery = "SELECT $this->selectField FROM  $this->tableName_1 , $this->tableName_2 $this->innerJoin $this->where $this->orderBy $this->limit";
            $query = $this->query($sqlQuery);
            $this->resetQuery();
            if (!empty($query)) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }

            return false;
        }
        

        public function getOneBuilder(){
            $sqlQuery = "SELECT $this->selectField FROM  $this->tableName $this->innerJoin $this->where $this->orderBy $this->limit";
            $sqlQuery = trim($sqlQuery);
            $query = $this->query($sqlQuery);
            $this->resetQuery();
            if (!empty($query)) {
                return $query->fetch(PDO::FETCH_ASSOC);
            }
            return false;
        }

        public function resetQuery(){
            //Reset field
            $this->tableName = '';
            $this->tableName_1 = '';
            $this->tableName_2 = '';
            $this->where = '';
            $this->operator = '';
            $this->selectField = '*';
            $this->limit = '';
            $this->order = '';
            $this->innerJoin = '';
        }

    }


?>