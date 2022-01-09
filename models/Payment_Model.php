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
    public function UpdatetSOrder($item_id, $Advanced, $status)
    {
        return $this->db->update(
            "UPDATE `special_item` SET `status`=:status,`Payment`=:payment WHERE `id` = :item_id;",
            ['item_id' => $item_id, 'status' => $status, 'payment' => $Advanced]
        );
    }
    public function Sorder($user_id, $item_id, $Advanced, $city, $address, $district, $status)
    {
        return $this->db->transaction(array(
            array(
                "INSERT INTO `delivery`(`user_id`, `order_id`, `district`, `city`, `address`) VALUES (:user_id, :order_id, :district, :city ,:address)",
                ['user_id' => $user_id, 'order_id' => $item_id, 'district' => $district, 'city' => $city, 'address' => $address]
            ), array(
                "UPDATE `special_item` SET `status`=:status,`Payment`=:payment WHERE `id` = :item_id;",
                ['item_id' => $item_id, 'status' => $status, 'payment' => $Advanced]
            )
        ));
    }
    public function loadSorder($itemid)
    {
        return $this->db->select2("SELECT * FROM `special_item` WHERE `id`= :orderid", ['orderid' => $itemid]);
    }
}
