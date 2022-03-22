<?php
class Index_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function rating_loader()
    {
        return $this->db->select(
            "SELECT rating.*,person.fname,person.lname,person.image_path FROM `rating` LEFT JOIN person ON rating.user_id = person.id  ORDER BY rating.id DESC LIMIT 4; "
        );
    }
    public function ContactUs($name, $email, $contact, $msg, $subject)
    {
        return $this->db->insert(
            "INSERT INTO `msg`(`Name`, `Email`, `Contact`, `Subject`, `Message`) VALUES (:nam, :email, :tp_no, :sub, :msg)",
            ['nam' => $name, 'email' =>  $email, 'tp_no' =>  $contact, 'msg' =>  $msg, 'sub' =>  $subject]
        );
    }
}
