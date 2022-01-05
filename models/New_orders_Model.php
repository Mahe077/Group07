<?php
class New_orders_Model extends Model
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
         return  $this->db->select("SELECT `order_id` ,`item_id` ,`approximated_date`, `delivery_request`, `order_date` , `payment` , `total_payment`  FROM `orders` WHERE response = '0'");
     }

}