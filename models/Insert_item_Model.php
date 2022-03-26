<?php
class Insert_item_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function createItem($productId,$brand,$genuine,$price,$size,$partNo,$partNo_Manufacturer,$amount)
    {
       
        $this->db->alter(
            "INSERT INTO `item`
           (`productId` , `brand`, `genuine`,`price`, `size`, `partNo`, `partNo_Manufacturer`,`amount`)  
            VALUES 
            (:productId , :brand, :genuine,:price, :size, :partNo, :partNo_Manufacturer,:amount)",
            ['productId' => $productId,'brand' => $brand,'genuine' => $genuine,'price' => $price,'size' => $size,'partNo' => $partNo,'partNo_Manufacturer' => $partNo_Manufacturer,'amount' => $amount]
        );
        return  $this->db->select("SELECT item.id FROM item WHERE productId ='$productId' AND brand = '$brand' AND genuine = '$genuine' AND price = '$price' AND size = '$size'AND partNo = '$partNo' AND partNo_Manufacturer = '$partNo_Manufacturer' AND amount = ' $amount'");
        
    }

    public function createimage($id,$image)
    {
       
        $this->db->alter(
            "INSERT INTO `itemimage`
           (`id` , `image_path`)  
            VALUES 
            (:id , :image_path)",
            ['id' => $id,'image_path' => $image]
        );
    }
    public function createcolor($id,$color)
    {
       
        $this->db->alter(
            "INSERT INTO `itemcolor`
           (`id` , `color`)  
            VALUES 
            (:id , :color)",
            ['id' => $id,'color' => $color]
        );
    }

    public function Displaynoti(){
        return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    }
    public function Display(){
         return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    }
}
