<?php
class Profile_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function updateUserInfo($fname, $sname, $email, $city, $contact, $district, $address, $postalcode, $image)
    {

        if (empty($image['name'])) {
            echo "in uodate funstuon<br>";
            echo $fname . " " . $sname . " " . $email . " " . $city . " " . $contact . " " . $district . " " . $address . " " . $postalcode . " " . $_SESSION['userid'];
            if ($this->db->update("UPDATE `person` SET `fname`=:fname,`lname`=:lname,`email`=:email,`contact`=:contact,`address`=:address WHERE `id`=:id ", ['id' =>  $_SESSION['userid'], 'fname' => $fname, 'lname' => $sname, 'email' => $email, 'contact' => $contact, 'address' => $address])) {
                if ($this->db->update("UPDATE `customer` SET `district`=:district,`city`=:city,`postal_code`=:postal_code WHERE `id`=:id", ['id' => $_SESSION['userid'], 'district' => $district, 'city' => $city, 'postal_code' => $postalcode])) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            if ($this->db->update(
                "UPDATE `person` SET `fname`=:fname,`lname`=:lname,`email`=:email,`contact`=:contact,`address`=:address,`image_path`=:image_path WHERE `id`=:id ",
                ['id' => $_SESSION['userid'], 'fname' => $fname, 'lname' => $sname, 'email' => $email, 'contact' => $contact, 'address' => $address, 'image_path' => $image]
            )) {
                if ($this->db->update("UPDATE `customer` SET `district`=:district,`city`=:city,`postal_code`=:postal_code WHERE `id`=:id", ['id' => $_SESSION['userid'], 'district' => $district, 'city' => $city, 'postal_code' => $postalcode])) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    public function user($data = null)
    {
        return $this->db->select2("SELECT * FROM person WHERE email=:email", ['email' => $data]);
    }
}
