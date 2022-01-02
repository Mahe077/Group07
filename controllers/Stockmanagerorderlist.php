<?php
class Stockmanagerorderlist extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('stockmanager/stockmanagerorderlist');
       
    }





    function Neworder()
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
            $type = "new";
            $new = $this->model->Neworders($type , $wh);
            echo json_encode(count($new) == 0 ? null : $new);
    }

    public function Pendingorder()
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
        $type = "0";
        $pending =  $this->model->Pendingorders($type,$wh);
        echo json_encode(count($pending) == 0 ? null : $pending);
    }

    public function Cancelorder()
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

        $type = "2";
        $cancel =  $this->model->Cancelorders($type , $wh);
        echo json_encode(count($cancel) == 0 ? null : $cancel);
    }

    public function Returnorder()
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


        $type = "5";
        $return =  $this->model->Returnorders($type , $wh);
        echo json_encode(count($return) == 0 ? null : $return);
    }
}
