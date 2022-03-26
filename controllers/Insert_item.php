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
            $genuine=$_POST['genuine'];
            $price=$_POST['price'];
            $size=$_POST['size'];
            $partNo=$_POST['partNo'];
            $partNo_Manufacturer=$_POST['partNo_Manufacturer'];
            $color=$_POST['color'];
            $amount=$_POST['amount'];

            $image = Deteminesize($_FILES['img'], 'parts');

                        $data=$this->model->createItem($id,$brand,$genuine,$price,$size,$partNo,$partNo_Manufacturer,$amount,$image);
                        $id = $data[0][0];
                        // echo $id;
                        $this->model->createimage($id,$image);
                        $this->model->createcolor($id,$color);
                        
                        $_SESSION['error'] = "insert_item";
                        header("location:".$localhost."Productlist");
                        exit();
           
        }
    }

    }
?>