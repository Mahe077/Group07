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

                $username = $_SESSION['username'];
                $password = $_POST['passowrd'];
                $repassword = $_POST['repassword'];

                // echo $password;

                // echo "</br>";
                // echo $repassword;

                // if ( empty($password) || empty($repassword)) {
                //     $_SESSION['error'] = "emptyinput";
                //     echo $_SESSION['error'];
                //     echo "</br>";
                //     // header("location:".$localhost."Reset_password");
                //     exit();
                // }
                
                    if ($password != $repassword) {
                        $_SESSION['error'] = "reset_passwordmissmatch";
                        // echo $_SESSION['error'];
                        // echo "</br>";
                        header("location:".$localhost."Loggedreset_password");
                        exit();
                    }
                
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                echo $hashedPwd;
                echo "</br>";
                $value = $this->model->updatepassword( $hashedPwd , $username);
                if($value)
                    $_SESSION['error'] = "Password_updated_Success";
                // echo $_SESSION['error'];
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
