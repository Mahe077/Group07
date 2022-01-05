<?php
    class Orderlist extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
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