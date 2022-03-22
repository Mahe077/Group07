<?php
class Stockmanangerdashboard extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $data = $this->model->Displaynoti();
        $this->view->data=$data;
       
        // $value= $this->model->Display();
        // $this->view->value=$value;
        $this->view->render('stockmanager/stockmanagerdashboard');
    }
    
}