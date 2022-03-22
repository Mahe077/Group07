<?php
class Stockmanagerteam_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function display()
    { 
    
    return $this->db->select("SELECT i.*, im.username , im.fname , im.lname , im.contact , im.image_path FROM `person` im,`warehouse_details` i WHERE i.stockmanager_id = im.id ");
    }

    // public function Displaynoti(){
    //     return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    // }
    // public function Display(){
    //      return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    // }
}
