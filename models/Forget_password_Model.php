<?php
class Forget_Password_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    private function usernameExists($username = null)
    {
        return $this->db->select2("SELECT email FROM person WHERE username = :username", ['username' => $username]);
    }

    public function getinfo($username = null)
    {
        // echo "hai";
        return $this->usernameExists($username);

    }

    public function Updateperson($verification_code , $username )
    {
        $this->db->update("UPDATE `person` SET `verification_code`=:verification_code WHERE `username`=:username", ['verification_code' => $verification_code, 'username' => $username]);
    }

    public function getcode($name=null){
        return $this->db->select2("SELECT verification_code FROM person WHERE username = :username", ['username' => $name]);
    }
}