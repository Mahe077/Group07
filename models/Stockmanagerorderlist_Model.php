<?php
class Stockmanagerorderlist_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function Neworders()
    {
        return  $this->db->select2("SELECT order_ID , order_date , payment , total_payment , approximate_d_date FROM orders WHERE order_type = :order_type", ['order_type' => 'new']); 
    }

    public function Pendingorders()
    {
        return  $this->db->select2("SELECT order_ID , order_date , payment , total_payment  FROM orders WHERE order_type = :order_type", ['order_type' => 'pending']);
    }

    public function Cancelorders()
    {
        return  $this->db->select2("SELECT order_ID , order_date  , approximate_d_date  , total_payment , reason FROM orders WHERE order_type = :order_type", ['order_type' => 'cancel']);
    }

    public function Returnorders()
    {
        return  $this->db->select2("SELECT order_ID , order_date , payment , total_payment , approximate_d_date , reason FROM orders WHERE order_type = :order_type", ['order_type' => 'return']);
    }

}