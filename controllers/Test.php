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
    function test()
    {
       echo "i am in Test";
       $this->view->render('Test');
    }
}
