<?php
class Log_in extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('Log_in');
    }

    public function logIn()
    {
        require 'config/PathConf.php';
        if (isset($_POST['submit'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            echo  $username . " " . $password;

            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            if (empty($username) || empty($password)) {
                $_SESSION['error'] = "emptyinput";
                header("location:".$localhost."Log_in");
                exit();
            }
            $user = $this->model->login($username);
            // print_r($user);
            if ($user) {
                $pwdHashed =  $user[0][5];
                if ($checkPwd = password_verify($password, $pwdHashed)) {
                    $_SESSION['userid'] = $user[0]['id'];
                    $_SESSION['username'] = $user[0]['username'];
                    $_SESSION['position'] = $user[0]['position'];
                    $_SESSION['fname'] = $user[0]['fname'];
                    $_SESSION['lname'] = $user[0]['lname'];
                    $_SESSION['contact'] = $user[0]['contact'];
                    $_SESSION['email'] = $user[0]['email'];
                    $_SESSION['address'] = $user[0]['address'];
                    $_SESSION['image_path'] = $user[0]['image_path'];
                    if ($user[0]['position'] === 'CU') {

                        $CustomerInfo = $this->model->customerInfo($user[0]['id']);
                        $_SESSION['district'] = $CustomerInfo[0]['district'];
                        $_SESSION['city'] = $CustomerInfo[0]['city'];
                        $_SESSION['postal_code'] = $CustomerInfo[0]['postal_code'];
                        print_r($CustomerInfo);
                    }
                    $_SESSION['error'] = "loginSuccess";
                    if ($user[0]['position'] === 'OW') {
                        header("location:".$localhost."owner_updated");
                    } elseif ($user[0]['position'] === 'SM') {
                        header("location:".$localhost."stockmanagerdashboardhome");
                    } elseif ($user[0]['position'] === 'CU') {
                        header("location:".$localhost."index");
                    }
                    exit();
                } else {
                    $_SESSION['error'] = "wronglogin";
                    header("location:".$localhost."Log_in");
                    exit();
                }
            } else {
                $_SESSION['error'] = "wronglogin";
                header("location:".$localhost."Log_in");
                exit();
            }
        } else {
            $_SESSION['error'] = "invalidAccess";
            header("location:".$localhost."Log_in");
            exit();
        }
    }
}
