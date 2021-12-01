<?php
class Stockmanagerdelivery_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function displaydelivery()
    {
        return  $this->db->select("SELECT order_ID , delivery_company FROM delivery);
    }
    -- public function updatedelivery($id)
    -- {
    --     $this->db->update("UPDATE `delivery` SET `delivery_company`=:company WHERE `order_id`=:id ",
    --         ['order_id' => $id]);
        
    -- }

}