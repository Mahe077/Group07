<?php
class Index extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('index');
    }
    public function rating_loader()
    {
        $results = $this->model->rating_loader();
        echo json_encode(count($results) == 0 ? null : $results);
    }
    public function AddNotification()
    {
        require 'config/FunctionConf.php';
        require 'config/PathConf.php';

        if (isset($_POST['submit'])) {
            $name = htmlspecialchars($_POST["name"]);
            $email =  htmlspecialchars($_POST["email"]);
            $contact =  htmlspecialchars($_POST["tp"]);
            $subject =  htmlspecialchars($_POST["subject"]);
            $msg =  htmlspecialchars($_POST["msg"]);

            if (empty($name) || empty($email) || empty($contact) || empty($msg) || empty($subject)) {
                $_SESSION['error'] = "emptyinput";
                header("location:" . $localhost . "Index");
                exit();
            } elseif (invalidName($name) !== false) {
                $_SESSION['error'] = "invalidfname";
                header("location:" . $localhost . "Index");
                exit();
            } else {
                if ($this->model->ContactUs($name, $email, $contact, $msg, $subject)) {
                    $_SESSION['error'] = "MsgSended";
                    header("location:" . $localhost . "Index");
                    exit();
                } else {
                    $_SESSION['error'] = "MsgNotSended";
                    header("location:" . $localhost . "Index");
                    exit();
                }
            }
        } else {
            $_SESSION['error'] = "invalidAccess2";
                header("location:".$localhost."Index");
                exit();
        }
    }
}
