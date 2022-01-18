<?php
class Stockmanagerdashboardhome_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    // public function Displaynoti(){
    //     return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
    // }
    // public function Display(){
    //      return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
    // }

    function deliverycompany()
    {
        return  $this->db->select("SELECT *FROM `delivery_company` ORDER BY rating DESC");
    }
    function getinfo($username = null)
    {
        return $this->db->select2("SELECT id FROM person WHERE username = :username", ['username' => $username]);
    }
    function getwarehouse($idn = null)
    {
        return $this->db->select2("SELECT id FROM warehouse_details WHERE stockmanager_id = :stockmanager_id", ['stockmanager_id' => $idn]);
    }
    public function showitems($wh)
    {
        return $this->db->select2("SELECT MAX(item_id) AS top_selling FROM  orders WHERE warehouse_id =:warehouse_id" , ['warehouse_id' => $wh]);
//         SELECT MAX (mycount) 
// FROM (SELECT agent_code,COUNT(agent_code) mycount 
// FROM orders 
// GROUP BY agent_code);
        }
}