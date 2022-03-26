<?php
    class Insert_product extends Controller
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
            $this->view->render('owner/Insert_product');
        }
        public function insert_product()
        {
            require 'config/Functionconfig.php';
            require 'config/PathConf.php';
            if(isset($_POST['submit'])){
                $name=$_POST['name'];
                $type=$_POST['type'];
                $description=$_POST['description'];

                $data = $this->model->insert_product($name,$type,$description);

                $id = $data[0][0];
                $_SESSION['error'] = "Successfully entered";
                
                header("location:".$localhost."Insert_item/insert_data/$id");
                exit();
               
            }
        }
    }
?>