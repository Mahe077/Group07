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
}