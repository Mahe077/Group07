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

    function showitems()
    {
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
        $result = $this->model->showitems($wh);

        foreach($result as $row1)
            {
                
                $res = htmlentities($row1['top_selling']);
            }
            echo $res;
        // echo json_encode(count($result) == 0 ? null : $result);
    }
    
    
}