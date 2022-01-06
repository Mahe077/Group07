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
            (`category_name`) 
            VALUES 
            (:category)",
            ['category' => $category]
        );
    }
}