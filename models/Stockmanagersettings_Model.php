<?php
class Stockmanagersettings_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    // username
    function getinfo($username = null)
    {
        return $this->db->select2("SELECT id FROM person WHERE username = :username", ['username' => $username]);
    }
    
// warehouse
    function getwarehouse($idn = null)
    {
        return $this->db->select2("SELECT id FROM warehouse_details WHERE stockmanager_id = :stockmanager_id", ['stockmanager_id' => $idn]);
    }


    function insert1( $wh, $item_id , $amount)
    {
        $query =  $this->db->alter("INSERT INTO `warehouse_items` (`item_id` , `warehouse_id` , `amount`) 
        VALUES (:item_id,:warehouse_id, :amount)" ,
         ['item_id' => $item_id , 'warehouse_id' => $wh , 'amount' => $amount]);
         return $query;
        
    }
    // public function Displaynoti(){
    //     return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    // }
    // public function Display(){
    //      return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    // }

    function lastadded($wh = null)
    {
        return $this->db->select2("SELECT item_id FROM warehouse_items WHERE warehouse_id = :warehouse_id ORDER BY item_id DESC LIMIT 1", ['warehouse_id' => $wh]);
    }
    function items($item_id = null)
    {
        return $this->db->select2(" SELECT tmp3.* FROM (SELECT tmp2.*,p.name,p.type,p.description FROM `product` p,(SELECT tmp1.*,ic.color FROM `itemcolor` ic RIGHT JOIN (SELECT i.*, im.image_path FROM `itemimage` im,`item` i WHERE i.id = im.id AND i.id = :item_id) tmp1 ON tmp1.id = ic.id) tmp2 WHERE p.id = tmp2.productid) tmp3 "  , ['item_id'=>$item_id]);
    }
    function lastsold($wh = null)
    {
        return $this->db->select2("SELECT item_id FROM orders WHERE warehouse_id = :warehouse_id ORDER BY item_id DESC LIMIT 1" , ['warehouse_id' => $wh]);
    }
    function lastitems($item_id = null)
    {
        return $this->db->select2(" SELECT tmp3.* FROM (SELECT tmp2.*,p.name,p.type,p.description FROM `product` p,(SELECT tmp1.*,ic.color FROM `itemcolor` ic RIGHT JOIN (SELECT i.*, im.image_path FROM `itemimage` im,`item` i WHERE i.id = im.id AND i.id = :item_id) tmp1 ON tmp1.id = ic.id) tmp2 WHERE p.id = tmp2.productid) tmp3 "  , ['item_id'=>$item_id]);
    }
    function moststocked($wh = null)
    {
        return $this->db->select2("SELECT item_id,MAX(amount) AS moststock FROM warehouse_items WHERE warehouse_id = :warehouse_id ", ['warehouse_id' => $wh]);
    }
    function amountitems($item_id = null)
    {
        return $this->db->select2(" SELECT tmp3.* FROM (SELECT tmp2.*,p.name,p.type,p.description FROM `product` p,(SELECT tmp1.*,ic.color FROM `itemcolor` ic RIGHT JOIN (SELECT i.*, im.image_path FROM `itemimage` im,`item` i WHERE i.id = im.id AND i.id = :item_id) tmp1 ON tmp1.id = ic.id) tmp2 WHERE p.id = tmp2.productid) tmp3 "  , ['item_id'=>$item_id]);
    }
}