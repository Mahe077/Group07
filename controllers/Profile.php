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
        require 'config/function.conf.php';
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

            // echo $fname . " " . $sname . " " . $email . " " . $city . " " . $contact . " " . $district . " " . $address . " " . $postalcode . " " . $_SESSION['userid'];
            print_r($_FILES['image']);
            if (isset($_SESSION['userid'])) {
                if (empty($fname) || empty($sname) || empty($email) || empty($city) || empty($contact) || empty($district) || empty($address) || empty($postalcode)) {
                    $_SESSION['error'] = "emptyinput";
                    echo "empty error";
                } elseif (invalidName($fname) !== false) {
                    $_SESSION['error'] = "invalidfname";
                    echo "fname error";
                } elseif (invalidName($sname) !== false) {
                    $_SESSION['error'] = "invalidsname";
                    header("location:".$localhost."Profile");
                    exit();
                    echo "lanme error";
                } else {
                    $userEmail = $this->userEmail($email);
                    echo "email " . $email . " <br>";
                    print_r(empty($_FILES['image']['name']));

                    if ($userEmail != null && $userEmail[0][6] != $email) {
                        $_SESSION['error'] = "invlidemail";
                        header("location:".$localhost."Profile");
                        exit();
                        echo "invlidemail";
                    } elseif (invalidAddress($address) !== false) {
                        $_SESSION['error'] = "invalidaddress";
                        echo "postalcode error<br>";
                        header("location:".$localhost."Profile");
                        exit();
                    } elseif (invalidName($city) !== false) {
                        $_SESSION['error'] = "invalidcity";
                        echo "postalcode error<br>";
                        header("location:".$localhost."Profile");
                        exit();
                    } elseif (invalidName($district) !== false) {
                        $_SESSION['error'] = "invaliddistrict";
                        echo "postalcode error<br>";
                        header("location:".$localhost."Profile");
                        exit();
                    } elseif (invalidPositiveNumber($postalcode) !== false) {
                        $_SESSION['error'] = "invalidPostalCode";
                        echo "postalcode error<br>";
                        header("location:".$localhost."Profile");
                        exit();
                    } elseif (empty($_FILES['image']['name'])) {
                        echo "<br>image is empty<br>";
                        $status1 = $this->model->updateUserInfo($fname, $sname, $email, $city, $contact, $district, $address, $postalcode, $_FILES['image']);
                        $this->updateSessions($status1, $fname, $sname, $email, $city, $contact, $district, $address, $postalcode, 0);
                        $_SESSION['error'] = "UpadateSuccess";
                        header("location:".$localhost."Profile");
                    } else {
                        echo " ok";
                        $image = filseSize($_FILES['image'], 'user_images');
                        $status2 = $this->model->updateUserInfo($fname, $sname, $email, $city, $contact, $district, $address, $postalcode, $image);
                        $this->updateSessions($status2, $fname, $sname, $email, $city, $contact, $district, $address, $postalcode, $image);
                        $_SESSION['error'] = "UpadateSuccess";
                        header("location:".$localhost."Profile");
                    }
                }
            }
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
        }
    }
}
