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
            //$img=$_POST['img'];

            if (empty($position) ||empty($fname) || empty($lname) || empty($username) || empty($email) || empty($password) || empty($contact) || empty($district) || empty($address)) {
                $_SESSION['error'] = "emptyinput";
                header("location:".$localhost."Stock_manager");
                exit();
            } elseif (invalidName($fname) !== false) {
                $_SESSION['error'] = "invalidfname";
                header("location:".$localhost."Stock_manager");
                 exit();
            }elseif (invalidName($lname) !== false) {
                $_SESSION['error'] = "invalidlname";
                header("location:".$localhost."Stock_manager");
                exit();
            } elseif (invalidString($username) !== false) {
                $_SESSION['error'] = "invalidusername";
                header("location:".$localhost."Stock_manager");
                exit();
            } else {
                $userName = $this->model->user($username);
                $userEmail = $this->model->userE($email);
                if ($userName != null) {
                    $_SESSION['error'] = "usernametaken";
                    header("location:".$localhost."Stock_manager");
                    exit();
                }elseif ($userEmail != null) {
                    echo $userEmail;
                    $_SESSION['error'] = "invalidmail";
                    //header("location:".$localhost."Stock_manager");
                    //exit();
                } elseif (invalidAddress($address) !== false) {
                    $_SESSION['error'] = "invalidaddress";
                    header("location:".$localhost."Stock_manager");
                    exit();
                }else {
                    $image = Deteminesize($_FILES['img'], 'user_images');
                }  
                    
                    
        //else(invalidName($district) !== false){
                //      $_SESSION['error'] = "invaliddistrict";
                //     header("location:".$localhost."Stock_manager");
                //     exit();
                // }
            }

                        $this->model->createstock($position,$fname,$lname,$username,$password,$email,$contact,$address,$district,$image);
                        $_SESSION['error'] = "Stockmanager_item";
                        header("location:".$localhost."Stock_manager");
                        exit();
        }
    }}

?>