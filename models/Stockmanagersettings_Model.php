<?php
class Stockmanagersettings_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    // username
    function getinfo($username = null)
    {
        return $this->db->select2("SELECT id FROM person WHERE username = :username", ['username' => $username]);
    }
// warehouse
    function getwarehouse($idn = null)
    {
        return $this->db->select2("SELECT id FROM warehouse_details WHERE stockmanager_id = :stockmanager_id", ['stockmanager_id' => $idn]);
    }

    function insert1( $item_id, $wh , $amount)
    {
        $query =  $this->db->alter("INSERT INTO `warehouse_items` (`itemId` , `warehouse_id` , `amount`) 
        VALUES (:itemId,:warehouse_id, :amount)" ,
         ['itemId' => $item_id , 'warehouse_id' => $wh , 'amount' => $amount]);
        echo "pavi";
        if($query)
        {
            echo "success";
        }
        else
        {
            echo "fail";
        }
    }

}