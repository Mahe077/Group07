<?php
    class Categorylist extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('owner/Categorylist');
        }
        public function Displaycat()
        {
            $data = $this->model->Displaycat();
            echo json_encode($data);
            return $data;
        }
    }
?>