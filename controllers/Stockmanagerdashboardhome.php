<?php
class Stockmanagerdashboardhome extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){

        // $data = $this->model->Displaynoti();
        // $this->view->data=$data;
        // $value= $this->model->Display();
        //  $this->view->value=$value;
        $this->view->render('stockmanager/stockmanagerdashboardhome');
        
    }

    function deilverycompany()
    {
        $company = $this->model->deliverycompany();

        echo json_encode(count($company) == 0 ? null : $company);
    }

    function showdelivery($rating)
    {
        // echo $companyid;
        echo $rating;
        echo "pavi";
    }
    
}