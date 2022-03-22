<?php
class Stockmanagerorderlist_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getinfo($username = null)
    {
        return $this->db->select2("SELECT id FROM person WHERE username = :username", ['username' => $username]);
    }

    function getwarehouse($idn = null)
    {
        return $this->db->select2("SELECT id FROM warehouse_details WHERE stockmanager_id = :stockmanager_id", ['stockmanager_id' => $idn]);
    }

    function Neworders($type , $wh)
    {
        return  $this->db->select2("SELECT `order_ID` , `order_date` , `payment` , `total_payment` , `approximate_d_date` FROM `orders` WHERE order_type = :order_type AND warehouse_id = :warehouse_id ORDER BY order_ID  DESC  LIMIT 10 ",   ['order_type' => $type , 'warehouse_id' => $wh ]);
    }

    public function Pendingorders($type , $wh)
    {
        return  $this->db->select2("SELECT `order_ID` , `order_date` , `payment` , `total_payment` FROM `orders` WHERE `order_type` = :order_type  AND warehouse_id = :warehouse_id ORDER BY order_ID DESC LIMIT 10 ", ['order_type' => $type , 'warehouse_id' => $wh]);
    }

    public function Cancelorders($type , $wh)
    {
        return  $this->db->select2("SELECT `order_ID` , `order_date` , `approximate_d_date`  , `total_payment`  FROM `orders` WHERE `order_type` = :order_type  AND warehouse_id = :warehouse_id ORDER BY order_ID DESC LIMIT 10 ", ['order_type' => $type , 'warehouse_id' => $wh]);
    }

    public function Returnorders($type,$wh)
    {
        return  $this->db->select2("SELECT `order_ID` , `order_date` , `payment` , `total_payment` , `approximate_d_date`  FROM `orders` WHERE `order_type` = :order_type  AND warehouse_id = :warehouse_id ORDER BY order_ID DESC LIMIT 10 ", ['order_type' => $type , 'warehouse_id' => $wh]);
    }

    public function callwarehouse($id)
    {
        return $this->db->select2("SELECT `warehouse_id`  FROM `warehouse_manager` WHERE `id` = :id", ['id' => $id]);
    }

    public function getid($username)
    {
        return $this->db->select2("SELECT `id`  FROM `person` WHERE `username` = :username", ['username' => $username]);
    }

    // public function Displaynoti(){
    //     return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    // }
    // public function Display(){
    //      return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    // }

}