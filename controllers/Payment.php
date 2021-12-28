<?php
class Payment extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->view->render('customer/Buy_now');
    }
    public function RenderBuy($itemId)
    {
        $this->view->itemId = $itemId;
        $this->view->render('customer/Buy_now');
    }
    public function pay()
    {
        require 'config/FunctionConf.php';
        require 'config/PathConf.php';

        if (isset($_POST['submit'])) {
            $item_id = $_POST['items'];
            if(isset($_POST['delivery'])){
                $delivery = "Yes";
            }else{
                $delivery = "No";
            }
            $district = $_POST['district'];
            $address = $_POST['address'];
            $user_id = $_SESSION['userid'];
            $total = $_POST['amount_1'];
            $Advanced = $_POST['amount'];
            $city = $_POST['city'];
            $qty = $_POST['quantity_1']; 

            // $this->view->amount =  $delivery ;
            // $this->view->render("Test");
            if (invalidName($city) !== false) {
                $_SESSION['error'] = "invalidcity";
                header("location:" . $localhost . "Payment/RenderBuy/" . $item_id);
                exit();
            } elseif (invalidName($district) !== false) {
                $_SESSION['error'] = "invaliddistrict";
                header("location:" . $localhost . "Payment/RenderBuy/" . $item_id);
                exit();
            } elseif (invalidAddress($address) !== false) {
                $_SESSION['error'] = "invalidaddress";
                header("location:" . $localhost . "Payment/RenderBuy/" . $item_id);
                exit();
            } elseif (invalidPositiveNumber($total)) {
                $_SESSION['error'] = "invalidNumber";
                header("location:" . $localhost . "Payment/RenderBuy/" . $item_id);
                exit();
            } elseif (invalidPositiveNumber($Advanced)) {
                $_SESSION['error'] = "invalidNumber";
                header("location:" . $localhost . "Payment/RenderBuy/" . $item_id);
                exit();
            }elseif (invalidPositiveNumber($qty)) {
                $_SESSION['error'] = "invalidNumber";
                header("location:" . $localhost . "Payment/RenderBuy/" . $item_id);
                exit();
            } elseif ($delivery == 'Yes') {
                if($this->model->insertDelivery($user_id, $item_id, $total,$Advanced, $city, $address, $district, $qty)){
                    header("location:" . $localhost . "Order");
                    exit();
                }else{
                    header("location:" . $localhost . "Checkout");
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
