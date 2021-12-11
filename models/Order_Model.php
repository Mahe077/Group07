<?php
class Order_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function loadAll($id)
    {
        return $this->db->select2(
            "SELECT qty,total_payment,status,amount,name,order_id FROM (SELECT * FROM `orders` ,item WHERE orders.item_id = item.id) tmp ,product WHERE product.id = tmp.productId AND user_id = :id ",
            ['id' => $id]
        );
    }
    public function Remove($order_id)
    {
        return $this->db->update("UPDATE `orders` SET `status` = '4' WHERE `orders`.`order_id` = :order_id;",['order_id' => $order_id]);
    }
}
