<?php
class Orderlist_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function Displayorder()
    {
        return $this->db->select("SELECT *FROM orders WHERE response='0'");
    }
    public function Displaynoti(){
        return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
      }
      public function Display(){
          return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
        }
}
