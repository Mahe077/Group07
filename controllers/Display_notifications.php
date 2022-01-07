<?php
    class Display_notifications extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('owner/Display_notifications');
        }
        public function Displaynoti()
        {
            $data = $this->model->Displaynoti();
            $this->view->data=$data;
            $value= $this->model->Display();
             $this->view->value=$value;
            $this->view->render('owner/Display_notifications');
        }
    }
?>