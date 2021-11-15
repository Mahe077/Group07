<?php
class Quotation extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('customer/Quotation');
    }
    public function addQuotation()
    {
        require 'config/PathConf.php';
        require 'config/FunctionConf.php';

        if (isset($_POST['submit'])) {
            if (isset($_SESSION['userid'])) {
                $part_name = $_POST['part_name'];
                $part_no = $_POST['part_no'];
                $brand = $_POST['brand'];
                $amount = $_POST['amount'];

                $user_id = $_SESSION['userid'];

                if (invalidString($part_name)) {
                    $_SESSION['error'] = "invalidName";
                    header("location:" . $localhost . "Quotation");
                    exit();
                } elseif (invalidStringWithNumber($part_no)) {
                    $_SESSION['error'] = "invalidPartNumber";
                    header("location:" . $localhost . "Quotation");
                    exit();
                } elseif (invalidString($brand)) {
                    $_SESSION['error'] = "invalidbrand";
                    header("location:" . $localhost . "Quotation");
                    exit();
                } elseif (invalidPositiveNumber($amount)) {
                    $_SESSION['error'] = "invalidNumber";
                    header("location:" . $localhost . "Quotation");
                    exit();
                } elseif (empty($_FILES['part_image']['name'])) {
                    $part_image = NULL;
                } else {
                    $part_image = filseSize($_FILES['part_image'], 'quotation');
                }
                if ($this->model->insertQuotation($part_name, $amount, $part_no, $brand, $user_id, $part_image)) {
                    $_SESSION['error'] = "Success";
                    header("location:" . $localhost . "Quotation");
                    exit();
                } else {
                    $_SESSION['error'] = "Unsuccess";
                    header("location:" . $localhost . "Quotation");
                    exit();
                }
            } else {
                $_SESSION['error'] = "invalidAccess";
                header("location:" . $localhost . "Log_in");
                exit();
            }
        } else {
            $_SESSION['error'] = "invalidAccess2";
            header("location:" . $localhost . "Log_in");
            exit();
        }
    }
}
