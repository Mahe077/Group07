<?php
class Notification extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('customer/Notification');
    }
    public function AddNotification($page)
    {
        $vehicle_info = htmlspecialchars($_POST["vehicle-info"]);
        $service = htmlspecialchars($_POST["service"]);

        require 'config/FunctionConf.php';
        require 'config/PathConf.php';

        if (isset($_SESSION["userid"])) {
            if (isset($_POST["submit"])) {
                if (empty($vehicle_info) || empty($service)) {
                    $_SESSION['error'] = "emptyinput";
                    header("location:" . $localhost . $page);
                    exit();
                } elseif (invalidString($vehicle_info) || invalidString($service)) {
                    $_SESSION['error'] = "invalidstrinWithNumber";
                    header("location:" . $localhost . $page);
                    exit();
                } else {
                    if ($this->model->addNotification($vehicle_info, $service)) {
                        $_SESSION['error'] = "Success";
                        header("location:" . $localhost . $page);
                        exit();
                    } else {
                        $_SESSION['error'] = "UnSuccess";
                        header("location:" . $localhost . $page);
                        exit();
                    }
                }
            } else {
                $_SESSION['error'] = "invalidAccess2";
                header("location:".$localhost.$page);
                exit();
            }
        } else {
            $_SESSION['error'] = "invalidAccess";
            header("location:" . $localhost . "Log_in");
            exit();
        }
    }
}
