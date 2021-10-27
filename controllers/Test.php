<?php
class Test extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->users = $this->model->getData();
        $this->model->insertData();
        $this->model->deteleData();
        $this->view->render('Test');
    }
}
