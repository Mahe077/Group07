<?php
class Stockmanagerproduct_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getinfo($username = null)
    {
        return $this->db->select2("SELECT id FROM person WHERE username = :username", ['username' => $username]);
    }

    function getwarehouse($idn = null)
    {
        return $this->db->select2("SELECT id FROM warehouse_details WHERE stockmanager_id = :stockmanager_id", ['stockmanager_id' => $idn]);
    }

   

    public function loadproducts($wh)
    {
        return $this->db->select2(
            // "SELECT tmp3.* FROM (SELECT tmp2.*,p.name,p.type,p.description FROM `product` p,(SELECT tmp1.*,ic.color FROM `itemcolor` ic RIGHT JOIN (SELECT i.*, im.image_path FROM `itemimage` im,`item` i WHERE i.id = im.id) tmp1 ON tmp1.id = ic.id) tmp2 WHERE p.id = tmp2.productid) tmp3 "

            "SELECT * FROM `warehouse_items` WHERE `warehouse_id`=:warehouse_id" , ['warehouse_id' => $wh]
        );
    }

    public function updatestocks($amount ,$itemid , $wh)
    {
        return $this->db->update("UPDATE `warehouse_items` SET  `amount` =:amount WHERE `item_id`=:item_id AND `warehouse_id`=:warehouse_id " , ['amount' => $amount , 'item_id' => $itemid , 'warehouse_id' => $wh]);
    }

    public function chart($wh = null)
    {
        
        return  $this->db->select2("SELECT * FROM warehouse_items WHERE warehouse_id=:warehouse_id " , ['warehouse_id' => $wh]);
    }
    // public function Displaynoti(){
    //     return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    // }
    // public function Display(){
    //      return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    // }

}