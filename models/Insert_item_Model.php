<?php
class Insert_item_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function createItem($productId,$brand,$type,$price,$size,$partNo,$partNo_Manufacturer,$amount)
    {
        $this->db->alter(
            "INSERT INTO `item`
           (`productId` , `brand`, `type`,`price`, `size`, `partNo`, `partNo_Manufacturer`,`amount`)  
            VALUES 
            (:productId , :brand, :type,:price, :size, :partNo, :partNo_Manufacturer,:amount)",
            ['productId' => $productId,'brand' => $brand,'type' => $type,'price' => $price,'size' => $size,'partNo' => $partNo,'partNo_Manufacturer' => $partNo_Manufacturer,'amount' => $amount]
        );
    }
    public function Displaynoti(){
        return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    }
    public function Display(){
         return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    }
}
