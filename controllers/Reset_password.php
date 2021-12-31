<?php
class Reset_password extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('reset_password');
    }

    function reset()
    {
        require 'config/PathConf.php';
        
            

            if (isset($_POST['submit'])) {

                $username = $_POST['username'];
                $password = $_POST['passowrd'];
                $repassword = $_POST['repassword'];

                echo $password;

                echo "</br>";
                echo $repassword;

                if ( empty($password) || empty($repassword)) {
                    $_SESSION['error'] = "emptyinput";
                    echo $_SESSION['error'];
                    echo "</br>";
                    // header("location:".$localhost."Reset_password");
                    exit();
                }
                else{
                    if ($password != $repassword) {
                        $_SESSION['error'] = "passwordmissmatch";
                        echo $_SESSION['error'];
                        echo "</br>";
                        // header("location:".$localhost."Reset_password");

                        exit();
                    }
                }
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                echo $hashedPwd;
                echo "</br>";
                $this->model->updatepassword( $hashedPwd , $username);
                $_SESSION['error'] = "UpdatedSuccess";
                echo $_SESSION['error'];
                header("location:".$localhost."Log_in");
                exit();
            }
            // else {
            //     $_SESSION['error'] = "invalidAccess2";
            //     header("location:http://localhost/G7/Group07");
            //     exit();
            // }
            

            }
}

function hello()
{
    echo "pavi";
}
