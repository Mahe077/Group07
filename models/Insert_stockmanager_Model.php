<?php
class Insert_stockmanager_Model extends Model
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
    public function createstock($position,$fname,$lname,$username,$password,$email,$contact,$address,$dob)
    {
        $this->db->alter(
            "INSERT INTO `person`
           (`position`,`fname` , `lname`, `username`,`password`, `email`, `contact`, `address`,`dob`)  
            VALUES 
            (:position,:fname , :lname, :username,:password, :email, :contact, :address,:dob)",
            ['position' => $position,'fname' => $fname,'lname' => $lname,'username' => $username,'password' => $password,'email' => $email,'contact' => $contact,'address' => $address,'dob' => $dob]
        );
    }
}