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
            "SELECT rating.*,person.fname,person.lname,person.image_path FROM `rating` LEFT JOIN person ON rating.user_id = person.id; "
        );
    }
    public function AddNotification($userId, $name, $email, $contact, $msg, $subject)
    {
        return $this->db->insert(
            "INSERT INTO `notification`(`customer_id`, `email`, `tp_no`, `msg`) VALUES (':userid','email','tp_no','msg','','')",
            ['userid' => $userId, '' => $name, 'email' =>  $email, 'tp_no' =>  $contact, 'msg' =>  $msg, '' =>  $subject]
        );
    }
}
