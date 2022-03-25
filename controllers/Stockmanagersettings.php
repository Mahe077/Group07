<?php
class Stockmanagersettings extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        // $data = $this->model->Displaynoti();
        // $this->view->data=$data;
        // $value= $this->model->Display();
        //  $this->view->value=$value;
        $this->view->render('stockmanager/stockmanagersettings');
    }

    function insert(){

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
        if (isset($_POST['submit'])) {
            $item_id = $_POST['item_id'];
            $amount = $_POST['amount'];

            
            
            $insert = $this->model->insert1($wh, $item_id , $amount);

            if($insert)
            {
                $_SESSION['error'] =  "item_inserted_succesfully";
                header("Location:".$localhost."Stockmanagersettings");
                exit();
               
            }
            else
            {
                $_SESSION['error']= "item_inserted_failed";
                echo $insert;
                // header("Location:".$localhost."Stockmanagersettings");
                exit();
              
            }
            


        }

    }

    function lastadded()
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
            $display = $this->model->lastadded($wh);
            foreach($display as $row1)
            { 
                $item_id = htmlentities($row1['item_id']); 
            }
            $details = $this->model->items($item_id);
            echo json_encode(count($details) == 0 ? null : $details);
    }

    function lastsold()
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
            $lastadded = $this->model->lastsold($wh);
           
            foreach($lastadded as $row1)
            { 
                $item_id = htmlentities($row1['item_id']); 
            }
           
            $lastsolddetails = $this->model->lastitems($item_id);
            echo json_encode(count($lastsolddetails) == 0 ? null : $lastsolddetails);

    }


    function moststocked()
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
            $most = $this->model->moststocked($wh);
         

            foreach($most as $row1)
            { 
                $item_id = htmlentities($row1['item_id']); 
            }
            $lastsolddetails = $this->model->amountitems($item_id);
            echo json_encode(count($lastsolddetails) == 0 ? null : $lastsolddetails);
          

}
    
}