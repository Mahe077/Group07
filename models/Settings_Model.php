<?php
class Settings_Model extends Model
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
    public function UpdateUser(){
        return  $this->db->select("SELECT *FROM `person` WHERE position = 'OW'");
   }
    public function update_owner($fname,$lname,$username,$img,$email,$contact,$address)
    {   
        $this->db->update2(
            "UPDATE person SET fname = '$fname',lname = '$lname',username = '$username',image_path='$img',email = '$email',contact = '$contact',address = '$address' WHERE position = 'OW';");
    }
}