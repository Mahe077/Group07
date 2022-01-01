<?php
    class Insert_category extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('owner/Insert_category');
        }
        public function Insert_cat()
        {
        require 'config/FunctionConf.php';
        require 'config/PathConf.php';
        if(isset($_POST['submit'])){

            $category=$_POST['category'];
            $this->model->insertcat($category);
            $_SESSION['error'] = "Successfully entered";
            header("location:".$localhost."Categorylist");
            exit();
       
            }
        }
    }
?>