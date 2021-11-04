<?php
class View
{

    function __construct()
    {

    }

    public function render($viewName){
        require 'views/'.$viewName.'.php';
    }

    public function render4($viewName,$error){
        require 'views/'.$viewName.'.php';
    }
}
