<?php
    class Cancel_orders extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('owner/Cancel_orders');
        }
        public function Displayorder()
        {
            $data = $this->model->Displayorder();
            echo json_encode($data);
            return $data;
        }
    }
?>