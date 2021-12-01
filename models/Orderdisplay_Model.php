<?php
class Product_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function orders()
    {
        return $this->db->select("SELECT * FROM orders");
    }
}
