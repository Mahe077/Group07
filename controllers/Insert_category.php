<?php
    class Insert_category extends Controller
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
            $this->view->render('owner/Insert_category');
        }
        public function Insert_cat()
        {
        require 'config/FunctionConf.php';
        require 'config/PathConf.php';
        if(isset($_POST['submit'])){

            $category=$_POST['category'];
            

            $this->model->insertcat($category);
            $_SESSION['error'] = "Category_item";
            header("location:".$localhost."Categorylist");
            exit();
       
            }
        }
    }
?>