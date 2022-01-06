<?php
class Stockmanagersalesreport extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('stockmanager/stockmanagersalesreport');
    }
    
    function reportyear($year)
    {
        require 'config/PathConf.php';
        $username =  $_SESSION['username'];
        $id = $this->model->getinfo($username);
            foreach($id as $row)
            { 
                $idn = htmlentities($row['id']);
            }
            $warehouse = $this->model->getwarehouse($idn);
            foreach($warehouse as $rows)
            { 
                $wh = htmlentities($rows['id']);
            }
            $date = $this->model->reportsyear($year,$wh);
            echo json_encode(count($date) == 0 ? null : $date);
            if(empty($date))
            {
                $_SESSION['error3']= "no data to display";
                
            }    
        }
       
    

    function reportmonth($month)
    {
        require 'config/PathConf.php';
        $username = $_SESSION['username'];
        $id = $this->model->getinfo($username);
            foreach($id as $row)
            { 
                $idn = htmlentities($row['id']);
            }
            $warehouse = $this->model->getwarehouse($idn);
            foreach($warehouse as $rows)
            {
                $wh = htmlentities($rows['id']);
            }
            $year = "2021";
            $date = $this->model->reportsmonth($month,$year,$wh);
            echo json_encode(count($date) == 0 ? null : $date);
            if(empty($date))
            {
                $_SESSION['error3']= "no data to display";
            }
    }

    function sum($duration)
    {
        require 'config/PathConf.php';
        $username =  $_SESSION['username'];
        $id = $this->model->getinfo($username);
            foreach($id as $row)
            { 
                $idn = htmlentities($row['id']);   
            }
            $warehouse = $this->model->getwarehouse($idn);
            foreach($warehouse as $rows)
            { 
                $wh = htmlentities($rows['id']); 
            }
            
        if($duration == "2021" || $duration == "2020" || $duration == "2019" || $duration == "2018" || $duration == "2017" || $duration == "2016")
        {

            $sum = $this->model->sumyear($duration,$wh); 
            
            echo json_encode(count($sum) == 0 ? null : $sum);
        }
        elseif($duration == "1" || $duration == "2" || $duration == "3" || $duration == "4" || $duration == "5" || $duration == "6" || $duration == "7" || $duration == "8" || $duration == "9" || $duration == "10" || $duration == "11" || $duration == "12")
        {

            $year = "2021";
            $sum = $this->model->summonth($duration,$year,$wh);
            echo json_encode(count($sum) == 0 ? null : $sum);
        }
        else
        {
            echo "wrong duration";
        }
    }

    function count($duration)
    {
        require 'config/PathConf.php';
        
        $username =  $_SESSION['username'];
        // echo     $username;
        // echo "</br>";
        $id = $this->model->getinfo($username);
            foreach($id as $row)
            { 
                $idn = htmlentities($row['id']);
            }
            $warehouse = $this->model->getwarehouse($idn);
            foreach($warehouse as $rows)
            {
                
                $wh = htmlentities($rows['id']);
            }
        if($duration == "2021" || $duration == "2020" || $duration == "2019" || $duration == "2018" || $duration == "2017" || $duration == "2016")
        {
            $count = $this->model->countyear($duration,$wh);
            echo json_encode(count($count) == 0 ? null : $count);
        }
        elseif($duration == "1" || $duration == "2" || $duration == "3" || $duration == "4" || $duration == "5" || $duration == "6" || $duration == "7" || $duration == "8" || $duration == "9" || $duration == "10" || $duration == "11" || $duration == "12")
        {
            $year = "2021";
            $count = $this->model->countmonth($duration,$year,$wh);
            echo json_encode(count($count) == 0 ? null : $count);
        }
        else
        {
            echo "wrong duration";
        }
    }




































    function profit($duration)
    {
        require 'config/PathConf.php';
        
        $username =  $_SESSION['username'];
        $id = $this->model->getinfo($username);
            foreach($id as $row)
            { 
                $idn = htmlentities($row['id']);
            }
            $warehouse = $this->model->getwarehouse($idn);
            foreach($warehouse as $rows)
            {
                $wh = htmlentities($rows['id']);
            }
            $statecancel = "2";
            $statereturn = "5";
            if($duration == "2021" || $duration == "2020" || $duration == "2019" || $duration == "2018" || $duration == "2017" || $duration == "2016")
            {
           
                $all = $this->model->sumyear($duration,$wh);
                foreach($all as $row3)
                { 
                    $total = htmlentities($row3['tot']);
                }
                

                $return = $this->model->retrunyear($duration,$wh,$statereturn);
                
                foreach($return as $row1)
            { 
                $returnsum = htmlentities($row1['returnsum']);
                
            }
           
                $cancel = $this->model->cancelyear($duration,$wh,$statecancel); 
             
                foreach($cancel as $row2)
            { 
                $cancelsum = htmlentities($row2['cancelsum']);
               
            }

            $profit = $total - ($returnsum + $cancelsum);
            // echo $profit;
            echo json_encode($profit == 0 ? null : $profit);
    
            }
            elseif($duration == "1" || $duration == "2" || $duration == "3" || $duration == "4" || $duration == "5" || $duration == "6" || $duration == "7" || $duration == "8" || $duration == "9" || $duration == "10" || $duration == "11" || $duration == "12")
            {
                // $year = "2021";
                // $profit = $this->model->profitmonth($duration,$wh,$statedone,$statecancel,$statereturn);
                // echo json_encode(count($profit) == 0 ? null : $profit);
            }
            else
            {
                echo "wrong duration";
            }
    }


function cancelsum($duration)
{
    require 'config/PathConf.php';
        
        $username =  $_SESSION['username'];
        $id = $this->model->getinfo($username);
            foreach($id as $row)
            { 
                $idn = htmlentities($row['id']);
            }
            $warehouse = $this->model->getwarehouse($idn);
            foreach($warehouse as $rows)
            {
                $wh = htmlentities($rows['id']);
            }
            $statecancel = "2";
            
            if($duration == "2021" || $duration == "2020" || $duration == "2019" || $duration == "2018" || $duration == "2017" || $duration == "2016")
            {
                $cancel = $this->model->cancelyear($duration,$wh,$statecancel);
                echo json_encode(count($cancel) == 0 ? null : $cancel);
            }
            elseif($duration == "1" || $duration == "2" || $duration == "3" || $duration == "4" || $duration == "5" || $duration == "6" || $duration == "7" || $duration == "8" || $duration == "9" || $duration == "10" || $duration == "11" || $duration == "12")
            {
                $year = "2021";
                $cancel = $this->model->cancelmonth($duration,$wh,$statecancel,$year);
                // echo json_encode(count($cancel) == 0 ? null : $cancel);
            }
            else
            {
                echo "wrong duration";
            }
}

}