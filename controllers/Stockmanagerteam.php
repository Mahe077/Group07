<?php
class Stockmanagerteam extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('stockmanager/stockmanagerteam');
    }
   

    function show()
    {
        // $this->view->render('stockmanager/stockmanagerwarehouse');
        // echo "pavi";
        // echo $warehouse;
        $warehouse="1";
        $detail = $this->model->display();
        // print_r($detail);

        // echo "</br>";
        // print_r (explode(" ",$detail));
        echo json_encode(count($detail) == 0 ? null : $detail);
    }
}