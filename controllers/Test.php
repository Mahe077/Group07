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
        $this->view->render('Test');
    }
    function test($data)
    {
       echo "i am in Test"." ".$data;
    //    $this->view->render('Test');
    }
    function A(){
        if(isset($_POST['submit'])){
            echo "in post";
        }
    }
}
