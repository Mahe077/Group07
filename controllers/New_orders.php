<?php
    class New_orders extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('owner/New_orders');
        }
    }
?>