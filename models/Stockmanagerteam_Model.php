<?php
class Stockmanagerteam_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function display()
    { 
        // return $this->db->select2("SELECT i.*, im.username , im.fname , im.lname , im.contact , im.image_path FROM `person` im,`warehouse_details` i WHERE i.id = im.id AND  i.warehouse_id= :i.warehouse_id", ['i.warehouse_id' => $warehouse]);
    //    return $this->db->select("SELECT *
    //    FROM  warehouse_details
    //    LEFT JOIN person
    // --    USING (Id)
    //    WHERE id = warehouse_id");
    // }
    return $this->db->select("SELECT i.*, im.username , im.fname , im.lname , im.contact , im.image_path FROM `person` im,`warehouse_details` i WHERE i.stockmanager_id = im.id ");
    }
}
