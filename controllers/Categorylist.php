<?php
    class Categorylist extends Controller
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
            $this->view->render('owner/Categorylist');
        }
        public function Displaycat()
        {
            $data = $this->model->Displaycat();
            echo json_encode($data);
            return $data;
        }
        public function Delete_cat($id){
            $this->model->Delete_cat($id);
            $_SESSION['error'] = "Category_list_deleted";
            header("location:".$localhost."\G7/Group07/Categorylist");
        }
    }
?>