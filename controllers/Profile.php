<?php
class Profile extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->view->render('customer/Profile');
    }
    public function updateUser()
    {
        require 'config/FunctionConf.php';
        require 'config/PathConf.php';

        if (isset($_POST['submit'])) {
            $fname = $_POST['fname'];
            $sname = $_POST['sname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $postalcode = $_POST['postalcode'];
            $contact = $_POST['contact'];

            print_r($_FILES['image']);
            if (isset($_SESSION['userid'])) {
                if (empty($fname) || empty($sname) || empty($email) || empty($city) || empty($contact) || empty($district) || empty($address) || empty($postalcode)) {
                    $_SESSION['error'] = "emptyinput";
                    header("location:" . $localhost . "Profile");
                    exit();
                } elseif (invalidName($fname) !== false) {
                    $_SESSION['error'] = "invalidfname";
                    header("location:" . $localhost . "Profile");
                    exit();
                } elseif (invalidName($sname) !== false) {
                    $_SESSION['error'] = "invalidsname";
                    header("location:" . $localhost . "Profile");
                    exit();
                } else {
                    $userEmail = $this->userEmail($email);
                    print_r(empty($_FILES['image']['name']));

                    if ($userEmail != null && $userEmail[0][6] != $email) {
                        $_SESSION['error'] = "invlidemail";
                        header("location:" . $localhost . "Profile");
                        exit();
                    } elseif (invalidAddress($address) !== false) {
                        $_SESSION['error'] = "invalidaddress";
                        header("location:" . $localhost . "Profile");
                        exit();
                    } elseif (invalidName($city) !== false) {
                        $_SESSION['error'] = "invalidcity";
                        header("location:" . $localhost . "Profile");
                        exit();
                    } elseif (invalidName($district) !== false) {
                        $_SESSION['error'] = "invaliddistrict";
                        header("location:" . $localhost . "Profile");
                        exit();
                    } elseif (invalidPositiveNumber($postalcode) !== false) {
                        $_SESSION['error'] = "invalidPostalCode";
                        header("location:" . $localhost . "Profile");
                        exit();
                    } elseif (empty($_FILES['image']['name'])) {
                        $status1 = $this->model->updateUserInfo($fname, $sname, $email, $city, $contact, $district, $address, $postalcode, $_FILES['image']);
                        $this->updateSessions($status1, $fname, $sname, $email, $city, $contact, $district, $address, $postalcode, 0);
                        $_SESSION['error'] = "UpdateSuccess";
                        header("location:" . $localhost . "Profile");
                    } else {
                        $image = filseSize($_FILES['image'], 'user_images');
                        $status2 = $this->model->updateUserInfo($fname, $sname, $email, $city, $contact, $district, $address, $postalcode, $image);
                        $this->updateSessions($status2, $fname, $sname, $email, $city, $contact, $district, $address, $postalcode, $image);
                        $_SESSION['error'] = "UpdateSuccess";
                        header("location:" . $localhost . "Profile");
                    }
                }
            }
        } else {
            $_SESSION['error'] = "invalidAccess";
            header("location:".$localhost. "Log_in");
            exit();
        }
    }
    private function userEmail($email)
    {
        return  $this->model->user($email);
    }
    private function updateSessions($status, $fname, $sname, $email, $city, $contact, $district, $address, $postalcode, $image)
    {
        if ($status) {
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $sname;
            $_SESSION['contact'] = $contact;
            $_SESSION['email'] = $email;
            $_SESSION['address'] = $address;
            $_SESSION['district'] = $district;
            $_SESSION['city'] = $city;
            $_SESSION['postal_code'] = $postalcode;
            if ($image != 0) {
                $_SESSION['image_path'] = $image;
            }
        } else {
            $_SESSION['error'] = "UpdateUnsuccess";
        }
    }
}
