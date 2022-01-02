<?php
class Stockmanagerdelivery_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    

    function Updatedelivery($orderid , $company , $status)
    {
        $this->db->update("UPDATE `delivery` SET `company_name`=:company_name,`status`=:status WHERE `order_id`=:order_id", ['company_name' => $company, 'status' => $status, 'order_id' => $orderid]);
    }

    function getinfo($username = null)
    {
        return $this->db->select2("SELECT id FROM person WHERE username = :username", ['username' => $username]);
    }

    

    function getwarehouse($idn = null)
    {
        return $this->db->select2("SELECT id FROM warehouse_details WHERE stockmanager_id = :stockmanager_id", ['stockmanager_id' => $idn]);
    }

    function getorders($type , $wh)
    {
        return  $this->db->select2("SELECT `order_ID` , `order_date` , `payment` , `total_payment` , `approximate_d_date` FROM `orders` WHERE order_type = :order_type AND warehouse_id = :warehouse_id ",   ['order_type' => $type , 'warehouse_id' => $wh ]);
    }

    function data($wh = null)
    {
        return $this->db->select2("SELECT `order_id` , `delivery_date` , `address` , `company_name`  FROM `delivery` WHERE warehouse_id = :warehouse_id ",   ['warehouse_id' => $wh]);
    }

    function getmail($company = null)
    {
        return $this->db->select2("SELECT `email` FROM `delivery_company` WHERE name = :name", ['name' => $company]);
    }

    function getaddress($orderid = null)
    {
        return $this->db->select2("SELECT `address` FROM `delivery` WHERE order_id = :order_id", ['order_id' => $orderid]);
    }

    function getdate($orderid = null)
    {
        return $this->db->select2("SELECT `delivery_date` FROM `delivery` WHERE order_id = :order_id", ['order_id' => $orderid]);
    }

    function accept($orderid,$state)
    {
        $this->db->update("UPDATE `delivery` SET `accept`=:accept WHERE `order_id`=:order_id", [ 'accept' => $state, 'order_id' => $orderid]);
    }

}