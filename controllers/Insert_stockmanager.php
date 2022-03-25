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
        require 'config/Functionconfig.php';
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
            $district=$_POST['district'];

            $imgName=$_FILES['img']['name'];
            $imgtmpName=$_FILES['img']['tmp_name'];
            $imgSize=$_FILES['img']['size'];
            $imgtype=$_FILES['img']['type'];

            $imgExt=explode('.', $imgName);
            $img_correct_ext=strtolower(end($imgExt));
            $allow = array('jpg','jpeg','png');
            $imgNameNew = uniqid('',true).".".$img_correct_ext;
            $imgDestination = '../view/img/'.$imgName;


            // if (empty($fname) || empty($lname) || empty($username) || empty($email) || empty($password) || empty($contact) || empty($district) || empty($address)) {
            //     $_SESSION['error'] = "emptyinput";
            //     header("location:".$localhost."Stock_manager");
            //     exit();
            // } elseif (invalidName($fname) !== false) {
            //     $_SESSION['error'] = "invalidfname";
            //     header("location:".$localhost."Stock_manager");
            //     exit();
            // } elseif (invalidName($lname) !== false) {
            //     $_SESSION['error'] = "invalidlname";
            //     header("location:".$localhost."Stock_manager");
            //     exit();
            // } elseif (invalidString($username) !== false) {
            //     $_SESSION['error'] = "invalidusername";
            //     header("location:".$localhost."Stock_manager");
            //     exit();
            // } else {
            //     $userName = $this->userName($username);
            //     $userEmail = $this->userEmail($email);
            //     if ($username != null) {
            //         $_SESSION['error'] = "usernametaken";
            //         header("location:".$localhost."Stock_manager");
            //         exit();
            //     } elseif ($userEmail != null) {
            //         $_SESSION['error'] = "invalidmail";
            //         header("location:".$localhost."Stock_manager");
            //         exit();
            //     } elseif (invalidAddress($address) !== false) {
            //         $_SESSION['error'] = "invalidaddress";
            //         header("location:".$localhost."Stock_manager");
            //         exit();
            //     } //else(invalidName($district) !== false) {
            //     //     $_SESSION['error'] = "invaliddistrict";
            //     //     header("location:".$localhost."Stock_manager");
            //     //     exit();
            //     // }
            // }

            // $hashedpw = password_hash($password, PASSWORD_DEFAULT);
            if(in_array($img_correct_ext , $allow)){
                    if($imgSize <=1000000){
                        $this->model->createstock($position,$fname,$lname,$username,$password,$email,$contact,$address,$district);
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