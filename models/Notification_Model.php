<?php
class Notification_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function addNotification($msg, $more)
    {
        if($more != null){
            $msg = $msg . "," . $more;
        }
        return $this->db->insert(
            "INSERT INTO `notification`(`customer_id`, `email`, `tp_no`,`msg`) VALUES (:cid,:email,:tp,:msg)",
            ['cid' => $_SESSION['userid'], 'email' => $_SESSION["email"], 'tp' => $_SESSION['contact'], 'msg' => $msg]
        );
    }
    public function displayNotificationCount()
    {
        return  $this->db->select2("SELECT * FROM `notification` WHERE notification.customer_id = :uid AND status = 1",['uid' => $_SESSION['userid']]);
    }
    public function displayNotification()
    {
        return  $this->db->select2("SELECT * FROM `notification` WHERE notification.customer_id = :uid;",['uid' => $_SESSION['userid']]);
    }
}
