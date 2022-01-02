<?php
class Payment_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function insertDelivery($user_id, $item_id, $total, $Advanced, $city, $address, $district, $qty)
    {
        return $this->db->special_1($user_id, $item_id, $total, $Advanced, $city, $address, $district, $qty);
    }
    public function insertOrder($user_id, $item_id, $total, $Advanced, $qty)
    {
        return $this->db->insert(
            "INSERT INTO `orders`( `item_id`, `user_id`, `total_payment`, `payment`, `qty`) VALUES (:item_id, :user_id, :total_payment, :payment, :qty)",
            ['item_id' => $item_id, 'user_id' => $user_id, 'total_payment' => $total, 'payment' => $Advanced, 'qty' => $qty]
        );
    }
}
