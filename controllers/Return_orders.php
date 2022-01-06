<?php
    class Return_orders extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('owner/Return_orders');
        }
        public function Displayorder()
        {
            $data = $this->model->Displayorder();
            echo json_encode($data);
            return $data;
        }
    }
?>