<?php
class Stock_manager_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function Displaystock(){
        return  $this->db->select("SELECT * FROM `person` WHERE position = 'SM'");
    }
}