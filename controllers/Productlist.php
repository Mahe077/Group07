<?php
    class Productlist extends Controller
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
            $this->view->render('owner/Productlist');
        }
        public function Displayitem()
        {
            $data = $this->model->Displayitem();
            echo json_encode($data);
            return $data;
        }
        public function View_item($id){
            $data = $this->model->View_item($id);
            $this->view->data=$data;
            $this->view->render('owner/Edit_item');
        }
    }
?>