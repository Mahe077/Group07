<?php
class Insert_item_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function user($data = null)
    {
        return $this->db->select2("SELECT * FROM person WHERE size = :size or partNo=:partNo", ['size' => $data, 'partNo' => $data]);
    }
    public function createItem($brand,$price,$size,$partNo,$partNo_Manufacturer,$amount)
    {
        $this->db->alter(
            "INSERT INTO `item`
            (`brand`, `price`, `size`, `partNo`, `partNo_Manufacturer`,`amount`) 
            VALUES 
            (:brand, :price, :size, :partNo, :partNo_Manufacturer, :amount)",
            ['brand' => $brand,  'price' => $price, 'size' => $size, 'partNo' => $partNo, 'partNo_Manufacturer' => $partNo_Manufacturer, 'amount' => $amount]
        );
    }
}
