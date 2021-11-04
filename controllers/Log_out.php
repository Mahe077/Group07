<?php
class Log_out extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        session_start();
        session_unset();
        session_destroy();
        header("location: index");
    }
    
}