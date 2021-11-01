<?php
class Index extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        // echo "i am index controller";
        $this->view->render('index');
    }
    
}