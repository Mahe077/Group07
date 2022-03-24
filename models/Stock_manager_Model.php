<?php
class Stock_manager_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function Displaystock(){
        return  $this->db->select("SELECT * FROM `person` WHERE position = 'SM'");
    }
    public function Displaynoti(){
        return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    }
    public function Display(){
         return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    }
    public function delete_stock($id){
        return $this->db->delete("DELETE FROM person WHERE id = '$id'; ");
    }
}