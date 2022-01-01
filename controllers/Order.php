<?php
class Order extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->view->render('customer/Order');
    }
    public function loadAll()
    {
        $id = $_POST['search'];
        $items = $this->model->loadAll($id);
        echo json_encode(count($items) == 0 ? null : $items);
    }
    public function Remove()
    {
        $order_id = $_POST['itemToRemove'];
        $this->model->Remove($order_id);
    }
}
