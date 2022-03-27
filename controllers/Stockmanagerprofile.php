<?php
class Stockmanagerprofile extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        // $data = $this->model->Displaynoti();
        // $this->view->data=$data;
        // $value= $this->model->Display();
        //  $this->view->value=$value;
        $this->view->render('stockmanager/stockmanagerprofile');
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
            // $city = $_POST['city'];
            // $district = $_POST['district'];
            // $postalcode = $_POST['postalcode'];
            $contact = $_POST['contact'];

            print_r($_FILES['image']);
            if (isset($_SESSION['userid'])) {
                if (empty($fname) || empty($sname) || empty($email) || empty($contact) || empty($address) ) {
                    $_SESSION['error'] = "emptyinput";
                    header("location:" . $localhost . "Stockmanagerprofile");
                    exit();
                } elseif (invalidName($fname) !== false) {
                    $_SESSION['error'] = "invalidfname";
                    header("location:" . $localhost . "Stockmanagerprofile");
                    exit();
                } elseif (invalidName($sname) !== false) {
                    $_SESSION['error'] = "invalidsname";
                    header("location:" . $localhost . "Stockmanagerprofile");
                    exit();
                } else {
                    $userEmail = $this->userEmail($email);
                    print_r($userEmail);

                    // if ($userEmail != null && $userEmail[0][6] != $email) {
                        // $_SESSION['error'] = "invlidemail";
                        // header("location:" . $localhost . "Stockmanagerprofile");
                        // exit();
                    if (invalidAddress($address) !== false) {
                        $_SESSION['error'] = "invalidaddress";
                        header("location:" . $localhost . "Stockmanagerprofile");
                        exit();
                    // } elseif (invalidName($city) !== false) {
                    //     $_SESSION['error'] = "invalidcity";
                    //     header("location:" . $localhost . "Profile");
                    //     exit();
                    // } elseif (invalidName($district) !== false) {
                    //     $_SESSION['error'] = "invaliddistrict";
                    //     header("location:" . $localhost . "Profile");
                    //     exit();
                    // } elseif (invalidPositiveNumber($postalcode) !== false) {
                    //     $_SESSION['error'] = "invalidPostalCode";
                    //     header("location:" . $localhost . "Profile");
                    //     exit();
                    } elseif (empty($_FILES['image']['name'])) {
                        $status1 = $this->model->updateUserInfo($fname, $sname, $email, $contact,  $address, $_FILES['image']);
                        $this->updateSessions($status1, $fname, $sname, $email,  $contact,  $address, 0);
                        $_SESSION['error'] = "UpdateSuccess";
                        header("location:" . $localhost . "Stockmanagerprofile");
                    } else {
                        $image = filseSize($_FILES['image'], 'user_images');
                        $status2 = $this->model->updateUserInfo($fname, $sname, $email, $contact, $address,  $image);
                        $this->updateSessions($status2, $fname, $sname, $email,  $contact,  $address, $image);
                        $_SESSION['error'] = "UpdateSuccess";
                        header("location:" . $localhost . "Stockmanagerprofile");
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
    private function updateSessions($status, $fname, $sname, $email,  $contact,  $address,  $image)
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
                if (file_exists($_SESSION['image_path'])) {                   
                  unlink($_SESSION['image_path']);
                }
                $_SESSION['image_path'] = $image;
            }
        } else {
            $_SESSION['error'] = "UpdateUnsuccess";
        }
    }
}