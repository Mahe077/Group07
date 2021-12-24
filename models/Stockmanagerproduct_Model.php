<?php
class Stockmanagerproduct_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function loadproducts()
    {
        return $this->db->select(
            "SELECT tmp3.* FROM (SELECT tmp2.*,p.name,p.type,p.description FROM `product` p,(SELECT tmp1.*,ic.color FROM `itemcolor` ic RIGHT JOIN (SELECT i.*, im.image_path FROM `itemimage` im,`item` i WHERE i.id = im.id) tmp1 ON tmp1.id = ic.id) tmp2 WHERE p.id = tmp2.productid) tmp3 "
        );
    }

    public function updatestocks($itemid , $amount)
    {
        $this->db->update("UPDATE `item` SET `amount`=:amount WHERE `productid`=:productid", ['amount' => $amount ,  'productid' => $itemid]);
    }

}