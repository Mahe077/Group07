<?php
class Log_in_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    private function usernameExists($username = null)
    {
        return $this->db->select2("SELECT `id`, `position`, `fname`, `lname`, `username`, `password`, `email`, `contact`, `address`, `image_path` FROM `person` WHERE username = :username", ['username' => $username]);
    }

    private function cuInfo($userid)
    {
        return $this->db->select2("SELECT `id`, `district`, `city`, `postal_code` FROM customer WHERE id = :id", ['id' => $userid]);
    }

    public function login($username = null)
    {
        return $this->usernameExists($username);
    }
    public function customerInfo($userid)
    {
        return $this->cuInfo($userid);
    }
}
