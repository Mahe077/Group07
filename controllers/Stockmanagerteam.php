<?php
class Stockmanagerteam extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('stockmanager/stockmanagerteam');
    }
    
}