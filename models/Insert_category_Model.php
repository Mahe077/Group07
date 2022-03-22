<?php
class Insert_category_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function Displaycat(){
        return  $this->db->select("SELECT `category_name` ,`status`   FROM `category`");
    }
    public function insertcat($category)
    {
        $this->db->alter(
            "INSERT INTO `category`
            (`category_name`, `status`) 
            VALUES 
            (:category,:status)",
            ['category' => $category,'status'=>'1']
        );
    }
    public function Displaynoti(){
        return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    }
    public function Display(){
         return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    }
}