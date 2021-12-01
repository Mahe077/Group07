<?php
    class Return_orders extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('owner/Return_orders');
        }
    }
?>