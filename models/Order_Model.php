<?php
class Order_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function loadAll($id,$type)
    {
        return $this->db->select2(
            "SELECT qty,total_payment,status,amount,name,order_id,ItemId FROM (SELECT * FROM (SELECT * FROM orders,order_item WHERE order_item.OrderId = orders.order_id) tmp ,item WHERE tmp.ItemId = item.id) tmp ,product WHERE (product.id = tmp.productId AND user_id = :id) AND tmp.status =:type",
            ['id' => $id,'type' =>$type]
        );
    }
    public function Remove($order_id)
    {
        return $this->db->update("UPDATE `orders` SET `status` = '2' WHERE `orders`.`order_id` = :order_id;", ['order_id' => $order_id]);
    }

    public function loadAllSpecial($id)
    {
        return $this->db->select2(
            "SELECT `id`, `name`, `amount`,`part_number`, `customer_id`, `approximated_price`, `received_date`, `responded_date`, `status`, `accepted` FROM `special_item` WHERE customer_id = :id",
            ['id' => $id]
        );
    }
    public function IsAOrder($order_id)
    {
        return $this->db->select2(
            "SELECT `order_id`FROM `orders` WHERE `user_id`=:user_id AND order_id = :order_id;",
            ['order_id' => $order_id,'user_id' => $_SESSION['userid']]
        );
    }
    public function addReturn($order_id, $reason)
    {
       return $this->db->transaction(array(
           array("UPDATE `orders` SET `status`=:status WHERE order_id =:order_id", 
           ['order_id' => $order_id, 'status' => 5]),
           array("INSERT INTO `return_orders`(`o_id`, `reason`) VALUES (:order_id,:reason)",['order_id' => $order_id ,'reason' => $reason])
       ));
    }
}
