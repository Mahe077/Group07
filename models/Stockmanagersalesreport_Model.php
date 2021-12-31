<?php
class Stockmanagersalesreport_Model extends Model
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
// year report
    function reportsyear($duration = null , $wh = null)
    {
        return   $this->db->select2("SELECT * FROM orders WHERE YEAR(order_date)= :year AND warehouse_id = :warehouse_id" , ['year'=>$duration , 'warehouse_id' => $wh]);
    }
// count year
    function countyear($duration = null , $wh = null)
    {
        return   $this->db->select2("SELECT COUNT(order_id) AS cou FROM orders WHERE YEAR(order_date)= :year AND warehouse_id = :warehouse_id" , ['year'=>$duration , 'warehouse_id' => $wh]);
    }
// sum year    
    function sumyear($duration = null , $wh = null)
    {
        return   $this->db->select2("SELECT SUM(total_payment) AS tot FROM orders WHERE YEAR(order_date)= :year AND warehouse_id = :warehouse_id" , ['year'=>$duration , 'warehouse_id' => $wh]);
    }
// month report
    function reportsmonth($duration = null ,$year= null ,  $wh = null)
    {
        return   $this->db->select2("SELECT * FROM orders WHERE MONTH(order_date)= :month AND YEAR(order_date)= :year AND warehouse_id = :warehouse_id" , ['month'=>$duration , 'year'=>$year ,  'warehouse_id' => $wh]);
    }
// count month    
    function countmonth($duration = null ,$year = null, $wh = null)
    {
        return   $this->db->select2("SELECT COUNT(order_id) AS cou FROM orders WHERE MONTH(order_date)= :month AND YEAR(order_date)= :year AND warehouse_id = :warehouse_id" , ['month'=>$duration , 'year'=>$year, 'warehouse_id' => $wh]);
    }
// sum month
    function summonth($duration = null ,$year = null , $wh = null)
    {
        return   $this->db->select2("SELECT SUM(total_payment) AS tot FROM orders WHERE MONTH(order_date)= :month AND YEAR(order_date)= :year AND warehouse_id = :warehouse_id" , ['month'=>$duration , 'year'=>$year , 'warehouse_id' => $wh]);
    }
// return year
    function retrunyear($duration = null , $wh = null, $statereturn = null)
    {
        return $this->db->select2("SELECT SUM(total_payment) AS returnsum FROM orders WHERE YEAR(order_date)= :year AND warehouse_id = :warehouse_id AND order_type = :order_type" , ['year' =>$duration , 'warehouse_id' =>$wh , 'order_type' =>$statereturn]);
    }
// cancel year
    function cancelyear($duration = null , $wh = null , $statecancel = null )
    {
        return $this->db->select2("SELECT SUM(total_payment) AS cancelsum FROM orders WHERE YEAR(order_date)= :year AND warehouse_id = :warehouse_id AND order_type = :order_type" , ['year' =>$duration , 'warehouse_id' =>$wh , 'order_type' =>$statecancel]);
    }
// return month
    function retrunmonth($duration = null ,$year = null, $wh = null, $statereturn = null)
    {
        return $this->db->select2("SELECT SUM(total_payment) AS returnsum FROM orders WHERE YEAR(order_date)= :year AND MONTH(order_date) = :month AND warehouse_id = :warehouse_id AND order_type = :order_type" , ['month' =>$duration , 'warehouse_id' =>$wh , 'order_type' =>$statereturn , 'year' =>$year]);
    }
// cancel month
    function cancelmonth($duration = null ,$year = null, $wh = null , $statecancel = null )
    {
        return $this->db->select2("SELECT SUM(total_payment) AS cancelsum FROM orders WHERE YEAR(order_date)= :year AND MONTH(order_date) = :month AND warehouse_id = :warehouse_id AND order_type = :order_type" , ['month' =>$duration , 'warehouse_id' =>$wh , 'order_type' =>$statecancel , 'year' =>$year]);
    }

}