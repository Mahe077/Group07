<?php
class Categorylist_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function Displaycat(){
        return  $this->db->select("SELECT *FROM `category`");
    }
    public function Displaynoti(){
        return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    }
    public function Display(){
         return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    }
    public function Delete_cat($id){
        $this->db->delete("DELETE FROM category WHERE id = '$id'; ");
        return;
    }
}
