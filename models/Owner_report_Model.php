<?php
class Owner_report_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function Displaynoti(){
        return  $this->db->select("SELECT count(*)FROM `notification` WHERE status = '0'");
      }
      public function Display(){
          return  $this->db->select("SELECT *FROM `notification` WHERE status = '0'");
        }
// // username
//     function getinfo($username = null)
//     {
//         return $this->db->select2("SELECT id FROM person WHERE username = :username", ['username' => $username]);
//     }
// // warehouse
//     function getwarehouse($idn = null)
//     {
//         return $this->db->select2("SELECT id FROM warehouse_details WHERE stockmanager_id = :stockmanager_id", ['stockmanager_id' => $idn]);
//     }

// year report
    function reportsyear($duration = null )
    {
        return   $this->db->select2("SELECT * FROM orders WHERE YEAR(order_date)= :year" , ['year'=>$duration]);
    }
// count year
    function countyear($duration = null )
    {
        return   $this->db->select2("SELECT COUNT(order_id) AS cou FROM orders WHERE YEAR(order_date)= :year" , ['year'=>$duration]);
    }
// sum year    
    function sumyear($duration = null )
    {
        return   $this->db->select2("SELECT SUM(total_payment) AS tot FROM orders WHERE YEAR(order_date)= :year" , ['year'=>$duration]);
    }
// month report
    function reportsmonth($duration = null ,$year= null)
    {
        return   $this->db->select2("SELECT * FROM orders WHERE MONTH(order_date)= :month AND YEAR(order_date)= :year" , ['month'=>$duration , 'year'=>$year ]);
    }
// count month    
    function countmonth($duration = null ,$year = null)
    {
        return   $this->db->select2("SELECT COUNT(order_id) AS cou FROM orders WHERE MONTH(order_date)= :month AND YEAR(order_date)= :year" , ['month'=>$duration , 'year'=>$year]);
        echo "pavi";
    }
// sum month
    function summonth($duration = null ,$year = null )
    {
        return   $this->db->select2("SELECT SUM(total_payment) AS tot FROM orders WHERE MONTH(order_date)= :month AND YEAR(order_date)= :year" , ['month'=>$duration , 'year'=>$year]);
    }
// return year
    function retrunyear($duration = null , $statereturn = null)
    {
        return $this->db->select2("SELECT SUM(total_payment) AS returnsum FROM orders WHERE YEAR(order_date)= :year AND order_type = :order_type" , ['year' =>$duration , 'order_type' =>$statereturn]);
    }
// cancel year
    function cancelyear($duration = null  , $statecancel = null )
    {
        return $this->db->select2("SELECT SUM(total_payment) AS cancelsum FROM orders WHERE YEAR(order_date)= :year AND order_type = :order_type" , ['year' =>$duration , 'order_type' =>$statecancel]);
    }
// return month
    function returnmonth($duration = null ,$year = null, $statereturn = null)
    {
        return $this->db->select2("SELECT SUM(total_payment) AS returnsum FROM orders WHERE YEAR(order_date)= :year AND MONTH(order_date) = :month AND order_type = :order_type" , ['month' =>$duration , 'order_type' =>$statereturn , 'year' =>$year]);
    }
// cancel month
    function cancelmonth($duration = null ,$year = null , $statecancel = null )
    {
        return $this->db->select2("SELECT SUM(total_payment) AS cancelsum FROM orders WHERE YEAR(order_date)= :year AND MONTH(order_date) = :month AND order_type = :order_type" , ['month' =>$duration , 'order_type' =>$statecancel , 'year' =>$year]);
    }


    
}