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
        $item_color = $this->model->item_color($id);
        $_SESSION['item'] = $item;
        $_SESSION['item_color'] = $item_color;
        $this->view->render('customer/Item_page');
    }

    public function Filter()
    {
        $product_type = htmlspecialchars($_POST['product-type']);
        $product_condition = htmlspecialchars($_POST['product-genuiness']);
        $items = $this->model->filter($product_type, $product_condition);
        echo json_encode(count($items) == 0 ? null : $items);
    }
}
