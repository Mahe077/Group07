<?php
    class Display_notifications extends Controller
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
            $this->view->render('owner/Display_notifications');
        }
        public function Display()
        {
            $data = $this->model->Display();
            echo json_encode($data);
            return $data;
        }
        public function Reply_notifi()
        {
            require 'config/FunctionConf.php';
            require 'config/PathConf.php';
            if(isset($_POST['submit'])){
                $id=$_POST['id'];
                $subject=$_POST['subject'];
                    $this->model->Reply_notifi($id,$subject);
                    $_SESSION['error'] = "Successfully entered";
                   header("location:".$localhost."Display_notifications");
                   exit();    
            }
        }

    }
?>