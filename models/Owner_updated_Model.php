<?php
class Owner_updated_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function Displaynoti(){
      return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    }
    public function Display(){
        return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    }
    public function Totalorders(){
      return  $this->db->select("SELECT count(*)FROM `orders` WHERE order_type = '0'");
    }
    public function Totalcancel(){
      return  $this->db->select("SELECT count(*)FROM `orders` WHERE order_type = '2'");
    }
    public function Totalprofit(){
      return  $this->db->select("SELECT count(*)FROM `orders` WHERE order_type = '4'");
    }
    public function Totalreturn(){
      return  $this->db->select("SELECT count(*)FROM `orders` WHERE order_type = '5'");
    }

}