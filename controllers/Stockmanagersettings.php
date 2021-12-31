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
        if (isset($_POST['submit'])) {
            $item_Name = $_POST['item_Name'];
            $chassy_No = $_POST['chassy_No'];
            $brand = $_POST['brand'];
            $price = $_POST['price'];
            $genuinecompatibel = $_POST['genuinecompatibel'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $amount = $_POST['amount'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            $file = $_POST['file'];

            


        }

    }
    
}