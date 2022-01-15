<?php
class Stockmanagerteam extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        // $data = $this->model->Displaynoti();
        // $this->view->data=$data;
        // $value= $this->model->Display();
        //  $this->view->value=$value;
        $this->view->render('stockmanager/stockmanagerteam');
    }
   

    function show()
    {
        
        $warehouse="1";
        $detail = $this->model->display();
        echo json_encode(count($detail) == 0 ? null : $detail);
    }
}