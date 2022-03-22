<?php
class Insert_product_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function Displaynoti(){
        return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    }
    public function Display(){
         return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    }
    public function insert_product($name,$type,$description)
    {
        $this->db->alter(
            "INSERT INTO `product`
           (`type` ,`name` , `description`)  
            VALUES 
            (:type , :name, :description)",
            ['type' => $type, 'name' => $name, 'description' => $description]
        );
        return $this->db->select("SELECT *FROM `product` WHERE name = '$name';");
        
    }


}
