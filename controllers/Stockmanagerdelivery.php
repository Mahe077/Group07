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
        $this->model->displaydelivey();
    }

    public function updatedelivery($order_ID)
    {
        $this->model->Updatedelivery($order_ID);
    }
    
}