<?php
    class Respond_quotation extends Controller
    {
        function __construct()
        {
            parent::__construct();

        }
        public function view_respond(){
            $data = $this->model->Displaynoti();
            $this->view->data=$data;
            $value= $this->model->Display();
             $this->view->value=$value;
            $this->view->render('owner/Respond_quotation');
        }
        public function Respond_quo(){
            require 'config/FunctionConf.php';
            require 'config/PathConf.php';
            if(isset($_POST['submit'])){
            $estimate=$_POST['Estimate'];
            $id= $_POST['Id'];
            $this->model->Respond_quo($id,$estimate);
            $_SESSION['error'] = "Quotation_accepted";
            header("location:".$localhost."Owner_quotation");
            exit();
            }
        }

        public function Reject_quotation($id){
            $this->model->Reject_quotation($id);
            $_SESSION['error'] = "Quotation_rejected";
            header("location:".$localhost."\G7/Group07/Owner_quotation");
            exit();
        }
    }
?>