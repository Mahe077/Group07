<?php
class Special_order_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function Remove($id)
    {
        return $this->db->update("UPDATE `special_item` SET `status` = '4' WHERE `special_item`.`id` = :order_id;", ['order_id' => $id]);
    }

    public function loadAllSpecial($id,$type)
    {
        return $this->db->select2(
            "SELECT `id`, `name`, `amount`,`part_number`, `customer_id`, `approximated_price`, `received_date`, `responded_date`, `status`, `accepted` FROM `special_item` WHERE customer_id = :id AND status = :type",
            ['id' => $id,'type'=>$type]
        );
    }
    public function updateSorder($order_id,$status)
    {   
        return $this->db->update("UPDATE `special_item` SET `status` = :status WHERE `special_item`.`id` = :order_id;", ['order_id' => $order_id,'status' => $status]);
    }
}
