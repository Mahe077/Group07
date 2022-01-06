<?php
class Productlist_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function Displayitem(){
        return  $this->db->select("SELECT `brand` ,`type` , `partNo` , `partNo_Manufacturer` , `price`,`amount`  FROM `item`");
    }
}
