<?php
    class Productlist extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('owner/Productlist');
        }
    }
?>