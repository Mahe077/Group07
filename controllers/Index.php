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
        if (isset($_SESSION['userid'])) {
            if (isset($_POST['submit'])) {
                require 'config/FunctionConf.php';
                require 'config/PathConf.php';

                $name = htmlspecialchars($_POST["name"]);
                $email =  htmlspecialchars($_POST["email"]);
                $contact =  htmlspecialchars($_POST["tp"]);
                $subject =  htmlspecialchars($_POST["subject"]);
                $msg =  htmlspecialchars($_POST["msg"]);

                if (empty($name) || empty($email) || empty($contact) || empty($msg) || empty($subject)) {
                    $_SESSION['error'] = "emptyinput";
                    header("location:" . $localhost . "index");
                    exit();
                } elseif (invalidName($name) !== false) {
                    $_SESSION['error'] = "invalidfname";
                    header("location:" . $localhost . "Index");
                    exit();
                } else {
                    // $this->model->AddNotification($_SESSION['userid'], $name, $email, $contact, $msg, $subject);
                    header("location:" . $localhost . "Index");
                    exit();
                }
            }
        } else {
            $_SESSION['error'] = "invalidAccess";
            header("location:" . $localhost . "Log_in");
            exit();
        }
    }
}
