<?php
    class Stock_manager extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('owner/Stock_manager');
        }
        public function Displaystock()
        {
            $data = $this->model->Displaystock();
            echo json_encode($data);
            return $data;
        }
    }
?>