<?php
class Loggedreset_password_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function updatepassword( $hashedPwd , $username)
    {
        $this->db->update("UPDATE `person` SET `password`=:password WHERE `username`=:username", ['password' => $hashedPwd, 'username' => $username]);
    }

}