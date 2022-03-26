<?php
    class Stock_manager extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $data = $this->model->Displaynoti();
            $this->view->data=$data;
            $value= $this->model->Display();
             $this->view->value=$value;
            $this->view->render('owner/Stock_manager');
        }
        public function Displaystock()
        {
            $data = $this->model->Displaystock();
            echo json_encode($data);
            return $data;
        }
        public function delete_stock($id){
            $this->model->delete_stock($id);
            $_SESSION['error'] = "Stock_delete";
            header("location:".$localhost."\G7/Group07/Stock_manager");
        }
    }
?>