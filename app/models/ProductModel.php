<?php
class ProductModel extends Model{    
    public function getListAll($table)
    {
        $data =  $this->db->tableBuilder($table)->selectBuilder()->getAllBuilder();
        return $data;
    }
     public function getById($id,$table){
        $data = $this->db->tableBuilder($table)->selectBuilder()->whereBuilder('product_Id','=',$id)->getOneBuilder();
        return $data;
    }

    public function getAllById($id, $table,$field){
        $data = $this->db->tableBuilder($table)->selectBuilder()->whereBuilder($field, '=', $id)->getAllBuilder();
        return $data;
    }

    public function getLastId() {
        $data = $this->db->lastInsertBuilder();
        return $data;
    }

    public function insert($data,$table)
    {
        $this->db->tableBuilder($table)->insertBuilder($data);
        return $this->db->lastInsertBuilder();
    }
    public function update($data, $id , $table)
    {
        $this->db->tableBuilder($table)->whereBuilder('product_Id', '=', $id)->updateBuilder($data);
    }

    public function delete($id,$table)
    {
        $this->db->tableBuilder($table)->whereBuilder('product_Id', '=', $id)->deleteBuilder();
    }

    public function getWith($table, $id, $tableWith ,$idWith){
        $data =  $this->db->tableWhereBuilder($table, $tableWith)->selectBuilder()->whereBuilder($id, '=', $idWith)->getTwoTableBuilder();
        return $data;
    }
}