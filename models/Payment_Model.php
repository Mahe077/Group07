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
                "INSERT INTO `delivery`(`order_id`, `address`, `status`, `accept`) VALUES (:order_id,:address,:status,:accept)",
                ['address' => $address,'order_id' => $item_id,'status' => 0, 'accept' => 0]
            ), array(
                "UPDATE `special_item` SET `status`=:status,`Payment`=:payment WHERE `id` = :item_id;",
                ['item_id' => $item_id, 'status' => $status, 'payment' => $Advanced]
            )
        ));
    }
    public function loadSOrder($itemid)
    {
        return $this->db->select2("SELECT * FROM `special_item` WHERE `id`= :orderid", ['orderid' => $itemid]);
    }
    public function loadItem($itemid)
    {
        return $this->db->select2(
            "SELECT tmp3.* FROM (SELECT tmp2.*,p.name,p.type,p.description FROM `product` p,(SELECT tmp1.*,ic.color FROM `itemcolor` ic RIGHT JOIN (SELECT i.*, im.image_path FROM `itemimage` im,`item` i WHERE i.id = im.id) tmp1 ON tmp1.id = ic.id) tmp2 WHERE p.id = tmp2.productid) tmp3 WHERE tmp3.id LIKE ?",
            ["%{$itemid}%"]
        );
    }
}
