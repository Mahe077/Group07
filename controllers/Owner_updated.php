<?php
    class Owner_updated extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('owner/Owner_updated');
        }
    }
?>