<?php
class Categorylist_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function Displaycat(){
        return  $this->db->select("SELECT `category_name` ,`status`   FROM `category`");
    }
}
