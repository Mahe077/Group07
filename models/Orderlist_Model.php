<?php
class Orderlist_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function Displayorder()
    {
        return $this->db->select("SELECT *FROM orders WHERE response='0'");
    }
}
