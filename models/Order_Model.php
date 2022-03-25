<?php
class Order_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function loadAll($id, $type)
    {
        return $this->db->select2(
            "SELECT * FROM (
                SELECT order_id,item_id,order_type,total_payment,payment,Qty,amount,price,productId,name,user_id,Cost  FROM (
                    SELECT order_id,item_id,order_type,total_payment,payment,Qty,amount,price,productId,user_id,Cost  FROM (
                        SELECT order_id,order_item.itemId as item_id,order_type,total_payment,payment,Qty,user_id,Cost  FROM orders 
                        INNER JOIN order_item ON order_item.OrderId = orders.order_id) tmp 
                    INNER JOIN item ON tmp.item_id = item.id) tmp2 
                INNER JOIN product ON product.id = tmp2.productId) tmp3 
            WHERE user_id = :id AND order_type= :type ORDER BY order_id ASC",
            ['id' => $id, 'type' => $type]
        );
    }
    public function Remove($order_id)
    {
        return $this->db->update("UPDATE `orders` SET `order_type` = '2' WHERE `orders`.`order_id` = :order_id;", ['order_id' => $order_id]);
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
            ['order_id' => $order_id, 'user_id' => $_SESSION['userid']]
        );
    }
    public function addReturn($order_id, $reason)
    {
        return $this->db->transaction(array(
            array(
                "UPDATE `orders` SET `order_type`=:status WHERE order_id =:order_id",
                ['order_id' => $order_id, 'status' => 5]
            ),
            array("INSERT INTO `return_orders`(`o_id`, `reason`) VALUES (:order_id,:reason)", ['order_id' => $order_id, 'reason' => $reason])
        ));
    }
}
