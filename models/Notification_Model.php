<?php
class Notification_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function addNotification($vehicle_info, $service)
    {
        $msg = $service . "," . $vehicle_info;
        return $this->db->insert(
            "INSERT INTO `notification`(`customer_id`, `email`, `tp_no`,`msg`) VALUES (:cid,:email,:tp,:msg)",
            ['cid' => $_SESSION['userid'], 'email' => $_SESSION["email"], 'tp' => $_SESSION['contact'], 'msg' => $msg]
        );
    }
}
