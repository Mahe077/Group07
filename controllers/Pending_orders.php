<?php
    class Pending_orders extends Controller
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
            $this->view->render('owner/Pending_orders');
        }
        public function Displayorder()
        {
            $data = $this->model->Displayorder();
            echo json_encode($data);
            return $data;
        }
        public function Accept_order($id){
            $order_id=$id;
            $this->model->Accept_order($order_id);
            // $this->model->Deduce_item($item);
            header("location:".$localhost."\G7/Group07/Pending_orders");
        }
        public function Reject_order($id){
            $order_id=$id;
            $this->model->Reject_order($order_id);
            // $this->model->Deduce_item($item);
            header("location:".$localhost."\G7/Group07/Pending_orders");
        }
    }
?>