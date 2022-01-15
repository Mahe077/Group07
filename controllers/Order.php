<?php
class Order extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->view->render('customer/Order');
    }
    public function return()
    {
        $this->view->render('customer/Return');
    }
    public function loadAll()
    {
        $id = $_POST['search'];
        $type = $_POST['orderType'];
        $items = $this->model->loadAll($id, $type);
        echo json_encode(count($items) == 0 ? null : $items);
    }
    public function Remove()
    {
        $order_id = $_POST['itemToRemove'];
        $this->model->Remove($order_id);
    }
    public function AddReturn()
    {
        require_once 'config/FunctionConf.php';
        require_once 'config/PathConf.php';

        if (isset($_POST['submit'])) {
            if (isset($_SESSION['userid'])) {

                $order_id = htmlspecialchars($_POST['order_id']);
                $reason = htmlspecialchars($_POST['reason']);

                if (empty($order_id) || empty($reason)) {
                    $_SESSION['error'] = "emptyinput";
                    header("location:" . $localhost . "Order/Return");
                    exit();
                } elseif (($this->model->IsAOrder($order_id) == null)) {
                    $_SESSION['error'] = "Noitem";
                    header("location:" . $localhost . "Order/Return");
                    exit();
                }elseif (invalidString($reason)) {
                    $_SESSION['error'] = "invalidstrinWithNumber";
                    header("location:" . $localhost ."Order/Return");
                    exit();
                }else{
                    if( $this->model->addReturn($order_id, $reason)){
                        $_SESSION['error'] = "ReturnreqSuccess";
                        header("location:" . $localhost ."Order/Return");
                        exit();
                    }
                }
            } else {
                $_SESSION['error'] = "invalidAccess";
                header("location:" . $localhost . "Log_in");
                exit();
            }
        } else {
            $_SESSION['error'] = "invalidAccess";
            header("location:" . $localhost . "Log_in");
        }
    }
}


