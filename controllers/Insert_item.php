<?php
    class Insert_item extends Controller
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
            $this->view->render('owner/Insert_item');
        }

    public function insert_data($id)
    {
        $data = $this->model->Displaynoti();
        $this->view->data=$data;
        $value= $this->model->Display();
        $this->view->value=$value;
        $this->view->id=$id;
        $this->view->render('owner/Insert_item');
     
    }
    function insert($id){
        require 'config/Functionconfig.php';
        require 'config/PathConf.php';
        if(isset($_POST['submit'])){
            $brand=$_POST['brand'];
            $type=$_POST['type'];
            $price=$_POST['price'];
            $size=$_POST['size'];
            $partNo=$_POST['partNo'];
            $partNo_Manufacturer=$_POST['partNo_Manufacturer'];
            $color=$_POST['color'];
            $amount=$_POST['amount'];

            $image = Deteminesize($_FILES['img'], 'parts');
                        $this->model->createItem($id,$brand,$type,$price,$size,$partNo,$partNo_Manufacturer,$amount);
                        header("location:".$localhost."Productlist");
                        exit();
           
        }
    }

    }
?>