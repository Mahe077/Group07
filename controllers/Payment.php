<?php
    class Payment extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('customer/Buy_now');
        }
    }
?>