<?php
class Payment_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function insertDelivery($user_id, $item_id, $total, $Advanced, $city, $address, $district, $qty)
    {
       return $this->db->special_1($user_id, $item_id, $total,$Advanced, $city, $address, $district, $qty);
    }
}
