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
        $query =  $this->db->alter("INSERT INTO `warehouse_items` (`item_id` , `warehouse_id` , `amount`) 
        VALUES (:item_id,:warehouse_id, :amount)" ,
         ['item_id' => $item_id , 'warehouse_id' => $wh , 'amount' => $amount]);
        echo "pavi";
        // INSERT INTO `warehouse_items` (`item_id`, `warehouse_id`, `amount`) VALUES ('1', '2', '3');
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