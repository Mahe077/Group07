<?php
    class Owner_quotation extends Controller
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
            $this->view->render('owner/Owner_quotation');
        }
        public function Displayquotation()
        {
            $data = $this->model->Displayquotation();
            echo json_encode($data);
            return $data;
        }
    }
?>