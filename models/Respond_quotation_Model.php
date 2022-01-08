<?php
class Respond_quotation_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function Respond_quo($id,$estimate)
    {
        return $this->db->update2("UPDATE special_item SET approximated_price = '$estimate' WHERE id = '$id';");
    }
    public function Reject_quotation($id)
    {
        return $this->db->update2("UPDATE special_item SET status = '1' WHERE id = '$id';");
    }
}