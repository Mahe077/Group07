<?php
class Review extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->view->render('customer/Review');
    }
    public function loadpage($orderId)
    {
        $this->view->orderid = $orderId;
        $this->view->render('customer/Review');
    }

    public function insert()
    {
        require 'config/FunctionConf.php';
        require 'config/PathConf.php';

        if (isset($_POST['submit'])) {
            $fname = htmlspecialchars($_POST['first_name']);
            $sname = htmlspecialchars($_POST['last_name']);
            $rate = htmlspecialchars($_POST['rate']);
            $comment = htmlspecialchars($_POST['comment']);
            $orderId = htmlspecialchars($_POST['orderId']);
 
            if (isset($_SESSION['userid'])) {
                if (empty($rate) || empty($comment)) {
                    $_SESSION['error'] = "emptyinput";
                    header("location:" . $localhost . "Review");
                    exit();
                } elseif (invalidPositiveNumber($rate) !== false) {
                    $_SESSION['error'] = "invalidRate";
                    header("location:".$localhost."Review");
                    exit();
                }else {
                    $this->model->updateReview($rate, $comment,$orderId);
                    $_SESSION['error'] = "ReviewSuccess";
                    header("location:" . $localhost . "Order");
                }
            }
        } else {
            $_SESSION['error'] = "invalidAccess";
            header("location:" . $localhost . "Log_in");
            exit();
        }
    }
}
