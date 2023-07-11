<?php
class HomeModel extends Model
{
    
    public function getListAll($table)
    {
        $data =  $this->db->tableBuilder($table)->selectBuilder()->getAllBuilder();
        return $data;
    }
    public function getListById($id, $table)
    {
        $data = $this->db->tableBuilder($table)->whereBuilder($table, '=', $id)->getOneBuilder();
        return $data;
    }
    public function searchbyName($table)
    {
        $data = $this->db->tableBuilder($table)->whereLikeBuilder($table, '%G%')->getAllBuilder();
        return $data;
    }
    public function getListLimit($table){
        $data =  $this->db->tableBuilder($table)->selectBuilder()->getAllBuilder();
        return $data;
    }

    public function insert($data, $table)
    {
        $this->db->tableBuilder($table)->insertBuilder($data);
        return $this->db->lastInsertBuilder();
    }

    public function update($data, $id, $table)
    {
        $this->db->tableBuilder($table)->whereBuilder($table, '=', $id)->updateBuilder($data);
    }

    public function delete($id, $table)
    {
        $this->db->tableBuilder($table)->whereBuilder($table, '=', $id)->deleteBuilder();
    }
} 