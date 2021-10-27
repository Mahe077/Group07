<?php
class App{

    private $_url = null;
    private $_controller = null;

    function __construct()
    {
        $this->_getURL();
        if(empty($this->_url[0]))
        {
            $this->_loadDefualtController();
            return false;
        }

        $this->_loadController();
    }

    private function _getURL()
    {
        $url = isset($_GET['url']) ?  $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/',$url);

        // print_r($this->_url);
    }

    private function _loadDefualtController()
    {
        require 'controllers/Index.php';

        $this->_controller = new Index();

        $this->_controller->Index();
    }

    private function _loadController()
    {
        $file = 'controllers/'.$this->_url[0].'.php';

        if(file_exists($file)){
            require $file;
            
            $this->_controller = new $this->_url[0]();

            $this->_controller->Index();
        }
        else{
            echo 'Sorry, page not found';
        }
    }
}