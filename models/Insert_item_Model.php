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
            ('$productId','$brand', '$type', '$price',' $size','$partNo', '$partNo_Manufacturer','$amount')"
        );
    }
}
