<?php
class Cancel_orders_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    // function Updatedelivery($orderid , $company , $status)
    // {
    //     $this->db->update("UPDATE `delivery` SET `delivery_company`=:delivery_company,`status`=:status WHERE `order_id`=:order_id", ['delivery_company' => $company, 'status' => $status, 'order_id' => $orderid]);
    // }

    function Displayorder(){
        return  $this->db->select("SELECT  `order_id` ,`item_id`, `reason`,`delivery_request`, `order_date` , `payment` , `total_payment`  FROM `orders` WHERE order_type = '2'");
    }
    public function Accept_order($id){
        $order_id=$id;
        $this->db->update("UPDATE `orders` SET `order_type`=:order_type WHERE `order_id`=:order_id;", ['order_id' => $order_id,'order_type' => '1']);
    }
    public function Reject_order($id){
        $order_id=$id;
        $this->db->update("UPDATE `orders` SET `order_type`=:order_type WHERE `order_id`=:order_id;", ['order_id' => $order_id,'order_type' => '2']);
    }
    public function Displaynoti(){
        return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    }
    public function Display(){
         return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    }

}