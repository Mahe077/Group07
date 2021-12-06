<?php
class Order_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function loadAll($id)
    {
        return $this->db->select(
            "SELECT * FROM `orders`"
        );
    }
}
