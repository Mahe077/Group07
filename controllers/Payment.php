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
        // $this->view->item = $this->model->loadItem($itemId);
        $this->view->itemId = $itemId;
        $this->view->render('customer/Buy_now');
    }
    public function RenderBuyAll($cout)
    {
        $this->view->itemId = $cout;
        $this->view->render('customer/Buy_all');
    }
    public function RenderBuy2($itemid)
    {
        $this->view->item = $this->model->loadSorder($itemid);
        $this->view->render('customer/Buy_S_Order');
    }
    public function RenderBuy3()
    {
        $itemid = htmlspecialchars($_POST['PID']);
        $this->item = $this->model->loadItem($itemid);
        echo json_encode(count($this->item) == 0 ? null : $this->item);
        // $this->view->render('customer/Buy_now');
    }
    public function pay()
    {
        require_once 'config/FunctionConf.php';
        require_once 'config/PathConf.php';

        if (isset($_POST['submit'])) {
            $item_id = $_POST['item_id_1'];
            if (isset($_POST['delivery'])) {
                $delivery = "Yes";
            } else {
                $delivery = "No";
            }
            $district = $_POST['district'];
            $address = $_POST['address'];
            $user_id = $_SESSION['userid'];
            $unitPrice = $_POST['amount_1'];
            $Advanced = $_POST['amount'];
            $city = $_POST['city'];
            $qty = $_POST['quantity_1'];
            $total = $unitPrice * $qty;
            $Cost = $qty * $unitPrice;

            // echo $item_id;
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
            } elseif (invalidPositiveNumber($qty)) {
                $_SESSION['error'] = "invalidNumber";
                header("location:" . $localhost . "Payment/RenderBuy/" . $item_id);
                exit();
            } elseif ($delivery == 'Yes') {
                if ($this->model->insertDelivery($user_id, $item_id, $total, $Advanced, $address, $qty, $Cost)) {
                    header("location:" . $localhost . "Order");
                    exit();
                } else {
                    header("location:" . $localhost . "Checkout");
                    exit();
                }
            } elseif ($delivery == 'No') {
                if ($this->model->insertOrder($user_id, $item_id, $total, $Advanced, $qty, $Cost)) {
                    header("location:" . $localhost . "Order");
                    exit();
                } else {
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

    public function payAll($cout)
    {
        require_once 'config/FunctionConf.php';
        require_once 'config/PathConf.php';

        if (isset($_POST['submit'])) {
            $item_id = $_POST['items'];
            if (isset($_POST['delivery'])) {
                $delivery = "Yes";
            } else {
                $delivery = "No";
            }

            $address = $_POST['address'];
            $user_id = $_SESSION['userid'];
            $Advanced = $_POST['amount'];

            $unitPrices = array_fill(0, $cout, -1);
            $qtys = array_fill(0, $cout, -1);
            $Cost = array_fill(0, $cout, -1);
            $itemIds = array_fill(0, $cout, -1);

            $total = 0;

            for ($i = 0; $i < $cout; $i++) {
                $str1 = 'amount_' . ($i + 1);
                $str2 = 'quantity_' . ($i + 1);
                $str3 = 'item_id_' . ($i + 1);
                if (invalidPositiveNumber($_POST[$str1]) || invalidPositiveNumber($_POST[$str2])) {
                    $_SESSION['error'] = "invalidNumber";
                    header("location:" . $localhost . "Payment/RenderBuyAll/" . $cout);
                    exit();
                }
                $unitPrices[$i] = $_POST[$str1];
                $qtys[$i] = $_POST[$str2];
                $itemIds[$i] = $_POST[$str3];
                $Cost[$i] = $unitPrices[$i] * $qtys[$i];
                $total += $unitPrices[$i] * $qtys[$i];
            }

            print_r($unitPrices);
            print_r($qtys);
            print_r($itemIds);
            echo $total;

            if (invalidAddress($address) !== false) {
                $_SESSION['error'] = "invalidaddress";
                header("location:" . $localhost . "Payment/RenderBuyAll/" . $cout);
                exit();
            } elseif (invalidPositiveNumber($total)) {
                $_SESSION['error'] = "invalidNumber";
                header("location:" . $localhost . "Payment/RenderBuyAll/" . $cout);
                exit();
            } elseif (invalidPositiveNumber($Advanced)) {
                $_SESSION['error'] = "invalidNumber";
                header("location:" . $localhost . "Payment/RenderBuyAll/" . $cout);
                exit();
            } elseif ($delivery == 'Yes') {
                if ($this->model->insertDeliveryAll($user_id, $itemIds, $total, $Advanced, $address, $qtys, $Cost, $cout)) {
                        header("location:" . $localhost . "Order");
                        exit();
                    } else {
                        header("location:" . $localhost . "Checkout");
                        exit();
                }
            } elseif ($delivery == 'No') {
                if ($this->model->insertOrderAll($user_id, $itemIds, $total, $Advanced, $qtys, $Cost, $cout)) {
                    header("location:" . $localhost . "Order");
                    exit();
                } else {
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

    public function pay2()
    {
        require_once 'config/FunctionConf.php';
        require_once 'config/PathConf.php';

        if (isset($_POST['submit'])) {
            $item_id = $_POST['order_id'];
            if (isset($_POST['delivery'])) {
                $delivery = "Yes";
            } else {
                $delivery = "No";
            }
            $address = $_POST['address'];
            $total = $_POST['amount_1'];
            $Advanced = $_POST['amount'];
            $qty = $_POST['quantity_1'];

            if (invalidName($city) !== false) {
                $_SESSION['error'] = "invalidcity";
                header("location:" . $localhost . "Payment/RenderBuy2/" . $item_id);
                exit();
            } elseif (invalidName($district) !== false) {
                $_SESSION['error'] = "invaliddistrict";
                header("location:" . $localhost . "Payment/RenderBuy2/" . $item_id);
                exit();
            } elseif (invalidAddress($address) !== false) {
                $_SESSION['error'] = "invalidaddress";
                header("location:" . $localhost . "Payment/RenderBuy2/" . $item_id);
                exit();
            } elseif (invalidPositiveNumber($total)) {
                $_SESSION['error'] = "invalidNumber";
                header("location:" . $localhost . "Payment/RenderBuy2/" . $item_id);
                exit();
            } elseif (invalidPositiveNumber($Advanced)) {
                $_SESSION['error'] = "invalidNumber";
                header("location:" . $localhost . "Payment/RenderBuy2/" . $item_id);
                exit();
            } elseif (invalidPositiveNumber($qty)) {
                $_SESSION['error'] = "invalidNumber";
                header("location:" . $localhost . "Payment/RenderBuy2/" . $item_id);
                exit();
            } elseif ($delivery == 'Yes') {
                if ($this->model->Sorder($item_id, $Advanced, $address, 2)) {
                    header("location:" . $localhost . "Special_order");
                    exit();
                } else {
                    header("location:" . $localhost . "Payment/RenderBuy2/" . $item_id);
                    exit();
                }
            } elseif ($delivery == 'No') {
                if ($this->model->UpdatetSOrder($item_id, $Advanced, 2)) {
                    header("location:" . $localhost . "Special_order");
                    exit();
                } else {
                    header("location:" . $localhost . "Payment/RenderBuy2/" . $item_id);
                    exit();
                }
            } else {
                $_SESSION['error'] = "invalidAccess";
                header("location:" . $localhost . "Log_in");
                exit();
            }
        }
    }
}
