<?php
class Index extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('index');
    }
    public function rating_loader(){
        $results = $this->model->rating_loader();
        echo json_encode(count($results) == 0 ? null : $results);
    }
}