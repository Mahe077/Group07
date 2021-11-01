<?php
class Log_out extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    public function logOut()
    {
        session_start();
        session_unset();
        session_destroy();
        $this->view->op="logout";
        $this->view->render('index');
    }
    
}