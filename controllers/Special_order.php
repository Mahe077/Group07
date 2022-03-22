<?php
class Special_order extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->view->render('customer/Special_order');
    }
    public function loadAllSpecial()
    {
        $id = $_POST['search'];
        $type = $_POST['orderType'];
        $items = $this->model->loadAllSpecial($id,$type);
        echo json_encode(count($items) == 0 ? null : $items);
    }
    public function Remove()
    {
        $order_id = $_POST['itemToRemove'];
        $this->model->Remove($order_id);
    }
    public function updateSorder()
    {
        $status = $_POST['status'];
        $order_id = $_POST['orderId'];
        return $this->model->updateSorder($order_id,$status);
    }
}
