<?php
class Stockmanagerproductreport extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('stockmanager/stockmanagerproductreport');
    }
    
}