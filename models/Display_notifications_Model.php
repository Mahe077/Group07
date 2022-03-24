<?php
class Display_notifications_Model extends Model
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
    public function Reply_notifi($id,$reply)
    {
      return  $this->db->update2("UPDATE notification set reply='$reply' , status= '1' where customer_id='$id';");
    }
}