<?php
class Checkout_item_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function Check_availability($id){
        $item_id=$id;
        return $this->db->select2("SELECT brand,type,price,size,partNo_manufacturer,partNo,amount,color,image_path from item INNER JOIN itemcolor ON item.id=itemcolor.id INNER JOIN itemimage on itemimage.id=itemcolor.id WHERE item.id = :id;",['id'=>$item_id]);
    }
}