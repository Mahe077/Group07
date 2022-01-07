<?php
class Stockmanagersettings extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
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

            


        }

    }
    
}