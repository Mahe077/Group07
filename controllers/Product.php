<?php
class Product extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->view->render('customer/Product');
    }
    public function searchAll()
    {
        $search = $_POST['search'];
        $results = $this->model->searchAll($search);
        echo json_encode(count($results) == 0 ? null : $results);
    }
    public function loadAll()
    {
        $items = $this->model->loadAll();
        echo json_encode(count($items) == 0 ? null : $items);
    }
    public function itemRender($id)
    {   
        $item = $this->model->item($id);
        $_SESSION['item'] = $item;
        $this->view->render('customer/Item_page');
    }
}
