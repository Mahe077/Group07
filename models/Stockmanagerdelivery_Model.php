<?php
class Stockmanagerdelivery_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function Updatedelivery($orderid , $company , $status)
    {
        $this->db->update("UPDATE `delivery` SET `delivery_company`=:delivery_company,`status`=:status WHERE `order_id`=:order_id", ['delivery_company' => $company, 'status' => $status, 'order_id' => $orderid]);
    }

    function displaydelivery(){
        return  $this->db->select("SELECT `order_ID` , `approximate_delivery_date` , `address` , `delivery_company`  FROM `delivery` ");
    }

}