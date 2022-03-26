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
    public function createstock($position,$fname,$lname,$username,$password,$email,$contact,$address,$district,$image)
    {
        $this->db->alter(
            "INSERT INTO `person`
           (`position`,`fname` , `lname`, `username`,`password`, `email`, `contact`, `address`,`district`,`image_path`)  
            VALUES 
            (:position,:fname , :lname, :username,:password, :email, :contact, :address,:district,:image_path)",
            ['position' => $position,'fname' => $fname,'lname' => $lname,'username' => $username,'password' => $password,'email' => $email,'contact' => $contact,'address' => $address,'district' => $district,'image_path' => $image]
        );
    }
    public function user($data)
    {
        return $this->db->select2("SELECT * FROM person WHERE username = :username ", ['username' => $data]);
    }

    public function userE($data)
    {
        return $this->db->select2("SELECT * FROM person WHERE email = :email ", ['email' => $data]);
    }
}