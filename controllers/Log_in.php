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
        if (isset($_POST['submit'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            echo  $username . " " . $password;

            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            if (empty($username) || empty($password)) {
                $_SESSION['error'] = "emptyinput";
                header("location:http://localhost/G7/Group07/Log_in");
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
                    $_SESSION['nic'] = $user[0]['nic'];
                    $_SESSION['image_path'] = $user[0]['image_path'];
                    if ($user[0]['position'] === 'CU') {

                        $CustomerInfo = $this->model->customerInfo($user[0]['id']);
                        $_SESSION['district'] = $CustomerInfo['district'];
                        $_SESSION['city'] = $CustomerInfo['city'];
                        $_SESSION['postal_code'] = $CustomerInfo['postal_code'];
                        print_r($CustomerInfo);
                    }
                    $_SESSION['error'] = "loginSuccess";
                    if ($user[0]['position'] === 'OW') {
                        header("location:http://localhost/G7/Group07/owner_updated");
                    } elseif ($user[0]['position'] === 'SM') {
                        header("location:http://localhost/G7/Group07/stockmanagerdashboardhome");
                    } elseif ($user[0]['position'] === 'CU') {
                        header("location:http://localhost/G7/Group07/index");
                    }
                    exit();
                } else {
                    $_SESSION['error'] = "wronglogin";
                    header("location:http://localhost/G7/Group07/Log_in");
                    exit();
                }
            } else {
                $_SESSION['error'] = "wronglogin";
                header("location:http://localhost/G7/Group07/Log_in");
                exit();
            }

            // loginUser($conn, $username, $password);
        } else {
            $_SESSION['error'] = "invalidAccess";
            header("location:http://localhost/G7/Group07/Log_in");
            exit();
        }
    }
}
