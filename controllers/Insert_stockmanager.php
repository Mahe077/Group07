<?php
    class Insert_stockmanager extends Controller
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
            $this->view->render('owner/Insert_stockmanager');
        }

    public function insert_stock()
    {
        require 'config/FunctionConf.php';
        require 'config/PathConf.php';
        if(isset($_POST['submit'])){
            $position=$_POST['position'];
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $contact=$_POST['contact'];
            $address=$_POST['address'];
            $dob=$_POST['dob'];

            $imgName=$_FILES['img']['name'];
            $imgtmpName=$_FILES['img']['tmp_name'];
            $imgSize=$_FILES['img']['size'];
            $imgtype=$_FILES['img']['type'];

            $imgExt=explode('.', $imgName);
            $img_correct_ext=strtolower(end($imgExt));
            $allow = array('jpg','jpeg','png');
            $imgNameNew = uniqid('',true).".".$img_correct_ext;
            $imgDestination = '../view/img/'.$imgName;

            if(in_array($img_correct_ext , $allow)){
                    if($imgSize <=1000000){
                        var_dump($position);
                        $this->model->createstock($position,$fname,$lname,$username,$password,$email,$contact,$address,$dob);
                        $_SESSION['error'] = "Successfully entered";
                        header("location:".$localhost."Stock_manager");
                        exit();
                    }else{
                        $_SESSION['error'] = "Image is too big";
                    }
            }else{
                $_SESSION['error'] = "You can't upload this file";
            }

           
        }
    }

    }
?>