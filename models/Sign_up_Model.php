<?php
class Sign_up_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function user($data = null)
    {
        return $this->db->select2("SELECT * FROM person WHERE username = :username or email=:email", ['username' => $data, 'email' => $data]);
    }
    public function createUser($fname, $sname, $username, $email, $password, $city, $contact, $district, $address, $postalcode, $image, $position)
    {
        $this->db->alter(
            "INSERT INTO `person`
            (`position`, `fname`, `lname`, `username`, `password`, `email`, `contact`, `address`, `image_path`) 
            VALUES 
            (:position,:fname, :lname, :username, :password, :email, :contact, :address, :image_path)",
            ['position' => $position, 'fname' => $fname, 'lname' => $sname, 'username' => $username, 'password' => $password, 'email' => $email, 'contact' => $contact, 'address' => $address, 'image_path' => $image]
        );
        $last_id = $this->db->select2("SELECT id FROM person WHERE username = :username ", ['username' => $username]);
        $id = $last_id[0][0];
        $this->db->alter(
            "INSERT INTO `customer`
            (`id`, `district`, `city`, `postal_code`)
            VALUES 
            (:id, :district, :city, :postal_code)",
            ['id' => $id, 'district' => $district, 'city' => $city, 'postal_code' => $postalcode]
        );
        // $this->db->transaction_with_last_inseted_Id(array(array(
        //     "INSERT INTO `person`
        //     (`position`, `fname`, `lname`, `username`, `password`, `email`, `contact`, `address`, `image_path`) 
        //     VALUES 
        //     (:position,:fname, :lname, :username, :password, :email, :contact, :address, :image_path)",
        //     ['position' => $position, 'fname' => $fname, 'lname' => $sname, 'username' => $username, 'password' => $password, 'email' => $email, 'contact' => $contact, 'address' => $address, 'image_path' => $image]
        // ), array(
        //     "INSERT INTO `customer`
        //     (`id`, `district`, `city`, `postal_code`)
        //     VALUES 
        //     (:id, :district, :city, :postal_code)",
        //     ['district' => $district, 'city' => $city, 'postal_code' => $postalcode]
        // )));
    }
}
