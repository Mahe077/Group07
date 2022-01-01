<?php
    class Insert_item extends Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        public function index()
        {
            $this->view->render('owner/Insert_item');
        }

    public function insert_data()
    {
        require 'config/FunctionConf.php';
        require 'config/PathConf.php';
        if(isset($_POST['submit'])){
            //$cat_id=$_POST['cat_id']);
            $productId=$_POST['productId'];
            $brand=$_POST['brand'];
            $type=$_POST['type'];
            $price=$_POST['price'];
            $size=$_POST['size'];
            // $part=$_POST['part'];
            $partNo=$_POST['partNo'];
            $partNo_Manufacturer=$_POST['partNo_Manufacturer'];
            // $color=$_POST['color'];
            $amount=$_POST['amount'];

            // $imgName=$_FILES['img']['name'];
            // $imgtmpName=$_FILES['img']['tmp_name'];
            // $imgSize=$_FILES['img']['size'];
            // $imgtype=$_FILES['img']['type'];
        
            // $imgExt=explode('.', $imgName);
            // $img_correct_ext=strtolower(end($imgExt));
            // $allow = array('jpg','jpeg','png');
            // // $imgNameNew = uniqid('',true).".".$img_correct_ext;
            // $imgDestination = '../view/img/'.$imgName;

            // if(in_array($img_correct_ext , $allow)){
            //         if($imgSize <=100000){
                        $this->model->createItem($productId,$brand,$type,$price,$size,$partNo,$partNo_Manufacturer,$amount);
                        $_SESSION['error'] = "Successfully entered";
                        header("location:".$localhost."Productlist");
                        exit();
            //         }else{
            //             $_SESSION['error'] = "Image is too big";
            //         }
            // }else{
            //     $_SESSION['error'] = "You can't upload this file";
            // }

           
        }
    }

    }
?>