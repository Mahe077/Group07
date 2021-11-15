<?php
class Quotation_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function insertQuotation($part_name, $amount, $part_no, $brand, $user_id, $part_image)
    {
        if ($this->db->insert(
            "INSERT INTO `special_item` (`name`, `amount`, `old_image` ,`part_number`, `brand`, `customer_id`) VALUES (:name,:amount,:old_image,:part_number,:brand,:customer_id)",
            ['name' => $part_name, 'amount' => $amount, 'old_image' => $part_image, 'part_number' => $part_no, 'brand' => $brand, 'customer_id' => $user_id]
        )) {
            return true;
        } else {
            return false;
        }
    }
}
