<?php
class Sign_up extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('Sign_up');
    }
    public function sign()
    {
        require 'config/FunctionConf.php';
        require 'config/PathConf.php';
        if (isset($_POST['submit'])) {

            $fname = $_POST['fname'];
            $sname = $_POST['sname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $postalcode = $_POST['postalcode'];
            $contact = $_POST['contact'];
            $position = $_POST['position'];

            if (empty($fname) || empty($sname) || empty($username) || empty($email) || empty($password) || empty($repassword) || empty($city) || empty($contact) || empty($district) || empty($address) || empty($postalcode)) {
                $_SESSION['error'] = "emptyinput";
                header("location:".$localhost."Sign_up");
                exit();
            } elseif (invalidName($fname) !== false) {
                $_SESSION['error'] = "invalidfname";
                header("location:".$localhost."Sign_up");
                exit();
            } elseif (invalidName($sname) !== false) {
                $_SESSION['error'] = "invalidsname";
                header("location:".$localhost."Sign_up");
                exit();
            } elseif (invalidString($username) !== false) {
                $_SESSION['error'] = "invalidusername";
                header("location:".$localhost."Sign_up");
                exit();
            } else {
                $userName = $this->userName($username);
                $userEmail = $this->userEmail($email);
                if ($userName != null) {
                    $_SESSION['error'] = "usernametaken";
                    header("location:".$localhost."Sign_up");
                    exit();
                } elseif ($userEmail != null) {
                    $_SESSION['error'] = "invlidemail";
                    header("location:".$localhost."Sign_up");
                    exit();
                } elseif (passwordMatch($password, $repassword) !== false) {
                    $_SESSION['error'] = "passwordmissmatch";
                    header("location:".$localhost."Sign_up");
                    exit();
                } elseif (invalidAddress($address) !== false) {
                    $_SESSION['error'] = "invalidaddress";
                    header("location:".$localhost."Sign_up");
                    exit();
                } elseif (invalidName($city) !== false) {
                    $_SESSION['error'] = "invalidcity";
                    header("location:".$localhost."Sign_up");
                    exit();
                } elseif (invalidName($district) !== false) {
                    $_SESSION['error'] = "invaliddistrict";
                    header("location:".$localhost."Sign_up");
                    exit();
                } elseif (invalidPositiveNumber($postalcode) !== false) {
                    $_SESSION['error'] = "invalidPostalCode";
                    header("location:".$localhost."Sign_up");
                    exit();
                } else {
                    $image = filseSize($_FILES['userimage'], 'user_images');
                }
            }
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            $this->model->createUser($fname, $sname, $username, $email, $hashedPwd, $city, $contact, $district, $address, $postalcode, $image, $position);
            $_SESSION['error'] = "createUserSuccess";
            header("location:".$localhost."Log_in");
            exit();
        } else {
            $_SESSION['error'] = "invalidAccess2";
            header("location:".$localhost."Sign_up");
            exit();
        }
    }

    private function userName($username)
    {
        return $this->model->user($username);
    }
    private function userEmail($email)
    {
        return  $this->model->user($email);
    }
}
