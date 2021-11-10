<?php
class Service extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('customer/Services');
    }
    
}