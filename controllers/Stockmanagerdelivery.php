<?php
class Stockmanagerdelivery extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('stockmanager/stockmanagerdelivery');
    }

    public function Displaydelivery()
    {
        $data = $this->model->displaydelivey();
        return $data;
    }

    public function updatedelivery()
    {
        require 'config/PathConf.php';
        if (isset($_POST['submit'])) {
            $orderid = $_POST['order_ID'];
            $company = $_POST['company'];
            $status = 1;
            $this->model->Updatedelivery($orderid , $company , $status);

        }
    }
    
}