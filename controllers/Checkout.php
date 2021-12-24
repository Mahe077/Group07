<?php
class Checkout extends Controller{
    function __construct()
    {
        parent::__construct();
    }
    function index(){
        $this->view->render('customer/Checkout');
    }
    public function Load()
    {
        if(isset($_SESSION['userid'])){
            if(isset($_SESSION['cartid'][0][0])){
                $user_id = $_SESSION['userid'];
                $cart = $this->model->load($user_id);
                echo json_encode(count($cart) == 0 ? null : $cart);
            }else{
                echo json_encode(null);
            }
        }else{
            echo json_encode(null);
        }
    }
    public function Delete()
    {
        if(isset($_SESSION['userid'])){
            $user_id = $_SESSION['userid'];
            $item_id = $_POST["data"];
            $cart = $this->model->delete($user_id,$item_id);
            echo json_encode($cart);
        }else{
            echo json_encode(null);
        }
    }
    public function Add()
    {
        if(isset($_SESSION['userid'])){
            $user_id = $_SESSION['userid'];
            $item_id = $_POST["itemID"];
            $qty = $_POST["qty"];
            $status = $_POST["status"];
            $cart = $this->model->add($user_id,$item_id,$qty,$status);
            echo json_encode($cart );
        }else{
            echo json_encode(null);
        }
    }
}