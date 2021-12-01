<?php
class Stockmanagersalesreport extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('stockmanager/stockmanagersalesreport');
    }
    
}