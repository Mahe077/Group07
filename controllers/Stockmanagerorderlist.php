<?php
class Stockmanagerorderlist extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('stockmanager/stockmanagerorderlist');
       
    }

    
    function Neworder()
    {
        $new =  $this->model->Neworders();
        return $new;
    }
    public function Pendingorder()
    {
        $pending =  $this->model->Pendingorders();
        return $pending;
    }

    public function Cancelorder()
    {
        $cancel =  $this->model->Cancelorders();
        return $cancel;
    }

    public function Returnorder()
    {
        $return =  $this->model->Returnorders();
        return $return;
    }
}
