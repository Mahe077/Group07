<?php
class Pending_orders_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    

     function Displayorder(){
         return  $this->db->select("SELECT  `order_id`,`user_id` ,`item_id` ,`approximated_date`, `delivery_request`, `order_date` , `payment` , `total_payment`  FROM `orders` WHERE order_type = '6'");
     }
     public function Accept_order($id){
        $order_id=$id;
        $this->db->update("UPDATE `orders` SET `order_type`=:order_type WHERE `order_id`=:order_id;", ['order_id' => $order_id,'order_type' => '7']);
    }
    public function Reject_order($id){
        $order_id=$id;
        $this->db->update("UPDATE `orders` SET `order_type`=:order_type WHERE `order_id`=:order_id;", ['order_id' => $order_id,'order_type' => '2']);
    }
    function Notify_send($user_id){
        return  $this->db->select2("SELECT `fname`,`lname`,`email`  FROM `person` WHERE `id` =:user_id;",['user_id' => $user_id]);
    }
    public function Displaynoti(){
        return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    }
    public function Display(){
         return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    }
}