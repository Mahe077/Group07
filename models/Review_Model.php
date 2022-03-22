<?php
class Review_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function updateReview($rate, $comment, $orderId)
    {
        return $this->db->transaction(
            array(
                array(
                    "INSERT INTO `rating`(`user_id`, `rating`, `description`) VALUES (:cid,:rate,:comment)",
                    ['cid' => $_SESSION['userid'], 'rate' => $rate, 'comment' => $comment]
                ),
                array("UPDATE `orders` SET `status`=:status WHERE order_id = :oid", ['status' => 4, 'oid' => $orderId])
            )
        );
    }
}
