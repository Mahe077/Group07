<?php
    class Owner_updated extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $data = $this->model->Displaynoti();
            $this->view->data=$data;
            $value= $this->model->Display();
            $this->view->value=$value;
            $orders = $this->model->Totalorders();
            $this->view->orders = $orders;
            $corders = $this->model->Totalcancel();
            $this->view->corders = $corders;
            $porders = $this->model->Totalprofit();
            $this->view->porders = $porders;
            $rorders = $this->model->Totalreturn();
            $this->view->rorders = $rorders;
            $this->view->render('owner/Owner_updated');
        }
    }
?>