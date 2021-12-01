<?php
class Product_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function searchAll($search)
    {
        return $this->db->select2(
            "SELECT tmp3.* FROM (SELECT tmp2.*,p.name,p.type,p.description FROM `product` p,(SELECT tmp1.*,ic.color FROM `itemcolor` ic RIGHT JOIN (SELECT i.*, im.image_path FROM `itemimage` im,`item` i WHERE i.id = im.id) tmp1 ON tmp1.id = ic.id) tmp2 WHERE p.id = tmp2.productid) tmp3 WHERE tmp3.partNo_Manufacturer LIKE ? OR tmp3.partNo LIKE ? OR tmp3.name LIKE ? OR tmp3.id LIKE ?",
            ["%{$search}%", "%{$search}%", "%{$search}%", "%{$search}%"]
        );
    }

    public function loadAll()
    {
        return $this->db->select(
            "SELECT tmp3.* FROM (SELECT tmp2.*,p.name,p.type,p.description FROM `product` p,(SELECT i.*, im.image_path FROM `itemimage` im,`item` i WHERE i.id = im.id) tmp2 WHERE p.id = tmp2.productid) tmp3;"
        );
    }

    public function item($search)
    {
        return $this->db->select2(
            "SELECT tmp3.* FROM (SELECT tmp2.*,p.name,p.type,p.description FROM `product` p,(SELECT tmp1.*,ic.color FROM `itemcolor` ic RIGHT JOIN (SELECT i.*, im.image_path FROM `itemimage` im,`item` i WHERE i.id = im.id) tmp1 ON tmp1.id = ic.id) tmp2 WHERE p.id = tmp2.productid) tmp3 WHERE tmp3.id=:id",
            ['id'=>$search]
        );
    }
    public function item_color($search)
    {
        return $this->db->select2(
            "SELECT * FROM `itemcolor`WHERE id = :id",
            ['id'=>$search]
        );
    }
}
