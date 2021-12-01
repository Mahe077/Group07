<?php
class Stockmanagersettings extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('stockmanager/stockmanagersettings');
    }
    
}