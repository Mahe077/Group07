<?php
class Profile_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function updateUserInfo($fname, $sname, $email, $city, $contact, $district, $address, $postalcode, $image)
    {
        if ($image === 0) {
            return $this->db->transaction(array(
                array(
                    "UPDATE `person` SET `fname`=:fname,`lname`=:lname,`email`=:email,`contact`=:contact,`address`=:address WHERE `id`=:id ",
                    ['id' =>  $_SESSION['userid'], 'fname' => $fname, 'lname' => $sname, 'email' => $email, 'contact' => $contact, 'address' => $address]
                ),
                array(
                    "UPDATE `customer` SET `district`=:district,`city`=:city,`postal_code`=:postal_code WHERE `id`=:id",
                    ['id' => $_SESSION['userid'], 'district' => $district, 'city' => $city, 'postal_code' => $postalcode]
                )
            ));
        } else {
            return $this->db->transaction(array(
                array(
                    "UPDATE `person` SET `fname`=:fname,`lname`=:lname,`email`=:email,`contact`=:contact,`address`=:address,`image_path`=:image_path WHERE `id`=:id ",
                    ['id' => $_SESSION['userid'], 'fname' => $fname, 'lname' => $sname, 'email' => $email, 'contact' => $contact, 'address' => $address, 'image_path' => $image]
                ),
                array(
                    "UPDATE `customer` SET `district`=:district,`city`=:city,`postal_code`=:postal_code WHERE `id`=:id",
                    ['id' => $_SESSION['userid'], 'district' => $district, 'city' => $city, 'postal_code' => $postalcode]
                )
            ));
        }
    }
    public function user($data = null)
    {
        return $this->db->select2("SELECT * FROM person WHERE email=:email", ['email' => $data]);
    }
}
