<?php
class Stockmanagerproduct extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('stockmanager/stockmanagerproduct');
    }

    public function Loadproducts()
    {
        $username = $_SESSION['username'];
        $id = $this->model->getinfo($username);
            foreach($id as $row)
            { 
                $idn = htmlentities($row['id']);
            }
           
            $warehouse = $this->model->getwarehouse($idn);
            foreach($warehouse as $rows)
            {
                
                $wh = htmlentities($rows['id']);
            }
        $items = $this->model->loadproducts($wh);
        echo json_encode(count($items) == 0 ? null : $items);
    }
    
    public function Updatestocks(){

        // echo "pavi";
        require 'config/PathConf.php';
        
        if (isset($_POST['submit'])) {
            $itemid = $_POST['item_ID'];
            $amount = $_POST['amount'];
    
            echo $itemid;
            echo $amount;
            $result = $this->model->updatestocks($amount,$itemid);

            if($result)
            {
                $_SESSION['error1']= "Stock updated succesfully";
                header("Location:".$localhost."Stockmanagerproduct");
                exit();
                
            }
            else
            {
                $_SESSION['error1']= "Stock updated failed";
                header("Location:".$localhost."Stockmanagerproduct");
                exit();
                
            }

        }   
    }
}