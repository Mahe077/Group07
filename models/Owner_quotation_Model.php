<?php
class Owner_quotation_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function Displayquotation(){
        return  $this->db->select("SELECT *FROM special_item WHERE status='0'");
    }

}