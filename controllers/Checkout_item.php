<?php
    class Checkout_item extends Controller
    {
        function __construct()
        {
            parent::__construct();
            
        }
        public function Check_availability($id){
            $data = $this->model->Displaynoti();
            $this->view->data=$data;
            $value= $this->model->Display();
             $this->view->value=$value;
            $data = $this->model->Check_availability($id);
            $this->view->data=$data;
            $this->view->render('owner/Checkout_item');
        }
    }
?>