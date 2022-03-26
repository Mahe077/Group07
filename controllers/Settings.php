<?php
    class Settings extends Controller
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
            $details = $this->model->UpdateUser();
            $this->view->details=$details;
            $this->view->render('owner/Settings');
        }

        public function update_owner()
        {
        require 'config/Functionconfig.php';
        require 'config/PathConf.php';
        if(isset($_POST['submit'])){
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $username=$_POST['username'];
            $email=$_POST['email'];
            $contact=$_POST['contact'];
            $address=$_POST['address'];
            
            $image = Deteminesize($_FILES['image_path'], 'users');
                    if($imgSize <=1000000){
                        $this->model->update_owner($fname,$lname,$username,$image,$email,$contact,$address);
                        $_SESSION['error'] = "updated_success";
                        header("location:".$localhost."Settings");
                        exit();
                    }else{
                        $_SESSION['error'] = "toobig";
                    }

           
        }
    }

    }
?>