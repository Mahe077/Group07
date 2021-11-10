<?php
class Quotation extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('customer/Quotation');
    }
    public function addQuotation(){
        echo "i am in quotation";
    }
    
}