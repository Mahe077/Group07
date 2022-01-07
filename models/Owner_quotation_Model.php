<?php
class Owner_quotation_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function Displayquotation(){
        return  $this->db->select("SELECT *FROM special_item WHERE status='0'");
    }
    public function Displaynoti(){
        return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    }
    public function Display(){
         return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    }
}