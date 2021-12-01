<?php
class Reset_password extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('reset_password');
    }
    
}