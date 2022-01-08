<?php
    class Orderlist extends Controller
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
            $this->view->render('owner/Orderlist');
        }
        public function Displayorder()
        {
            $data = $this->model->Displayorder();
            echo json_encode($data);
            return $data;
        }
    }
?>