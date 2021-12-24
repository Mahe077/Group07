<?php
class Test extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // $this->view->users = $this->model->getData();
        // $this->model->insertData();
        // $this->model->deteleData();
        // $_SESSION['error'] = "hi123";
        $cartItems = $this->model->test(10);
        
        $this->view->users = json_encode(count($cartItems) == 0 ? null : $cartItems);
        // $this->view->users = $cartItems;
        // json_encode(count($cartItems) == 0 ? null : $cartItems)
        $this->view->render('Test');
    }
    function test($data)
    {
    //    echo "i am in Test"." ".$data;
        // $data = 
        $this->view->users = $this->model->test(10);;
        // $_SESSION['hi'] = $data;
        $this->view->render('Test');
    }
    function A(){
        if(isset($_POST['submit'])){
            echo "in post";
        }
    }
}
