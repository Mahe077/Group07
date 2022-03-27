<?php
class Stockmanagerprofile_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function updateUserInfo($fname, $sname, $email, $contact, $address,  $image)
    {
        if ($image === 0) {
            return $this->db-update(
                    "UPDATE `person` SET `fname`=:fname,`lname`=:lname,`email`=:email,`contact`=:contact,`address`=:address WHERE `id`=:id ",
                    ['id' =>  $_SESSION['userid'], 'fname' => $fname, 'lname' => $sname, 'email' => $email, 'contact' => $contact, 'address' => $address]

            );
        } else {
            return $this->db->update(
                    "UPDATE `person` SET `fname`=:fname,`lname`=:lname,`email`=:email,`contact`=:contact,`address`=:address,`image_path`=:image_path WHERE `id`=:id ",
                    ['id' => $_SESSION['userid'], 'fname' => $fname, 'lname' => $sname, 'email' => $email, 'contact' => $contact, 'address' => $address, 'image_path' => $image]
            );
        }
    }
    public function user($data = null)
    {
        return $this->db->select2("SELECT * FROM person WHERE email=:email", ['email' => $data]);
    }
}
