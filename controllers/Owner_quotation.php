<?php
    class Owner_quotation extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('owner/Owner_quotation');
        }
    }
?>