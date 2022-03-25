<?php
class Stockmanagerproduct extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        // $data = $this->model->Displaynoti();
        // $this->view->data=$data;
        // $value= $this->model->Display();
        //  $this->view->value=$value;
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

        require 'config/PathConf.php';
        
        if (isset($_POST['submit'])) {
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
                echo $wh;
            $itemid = $_POST['item_ID'];
            $amount = $_POST['amount'];
    
            echo $itemid;
            echo $amount;
            $result = $this->model->updatestocks($amount,$itemid ,$wh);

            if($result)
            {
                $_SESSION['error'] = "Stock_update_successfully";
                header("Location:".$localhost."Stockmanagerproduct");
                exit(); 
            }
            else
            {
                $_SESSION['error'] = "Stock_update_failed";
                header("Location:".$localhost."Stockmanagerproduct");
                exit();
            }

        }   
    }

    public function chart()
    {
        require 'config/PathConf.php';
        
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
              
                $data = $this->model->chart($wh);
               
                echo json_encode(count($data) == 0 ? null : $data);
    
}

    public function askstocks(){
        require 'config/PathConf.php';

        if (isset($_POST['submit'])) {
            $itemid = $_POST['item_ID'];
            $_SESSION['item_ID'] = $itemid;
            $amount = $_POST['amount'];
            $username = $_SESSION['username'];
            $note = $_POST['note'];
            $id = $this->model->getinfo($username);
                foreach($id as $row)
                { 
                    $idn = htmlentities($row['id']);
                }
               echo $idn;
                $warehouse = $this->model->getwarehouse($idn);
                foreach($warehouse as $rows)
                {
                    
                    $wh = htmlentities($rows['id']);
                }
                echo $wh;
            $mail = "pavithrasandamini283@gmail.com";
            // $url = $localhost.'Deliverycompany';
            $to              = $mail;
            echo $to;
            $sender          = 'pavithrasandamini283@gmail.com';
            echo $sender;
            $email_subject   = 'Inform About Less Stocks';
            echo $email_subject;
            $email_body      = '<p> Dear Sir,' . '</p>'; 
            
            $email_body     .= '<p> This email is to inform you about stocks of item number '.$itemid.' in warehouse '.$wh.' of  SL MINI Spares is less than usual amount</p>';
            $email_body     .= '<P> And Have special note for: '.$note.'</p>';
            $email_body     .= '<p>Hope your quick response. </p>';
            $email_body     .= '<p> thank you, <br> SL MINI Spares </p>';
            echo $email_body;
            $header = "From: {$mail}\r\nContent-Type: text/html;";
            echo $header;
          
            $sentmailresult = mail($to , $email_subject , $email_body , $header);
            
                if($sentmailresult)
                {
                    $_SESSION['error'] =  "Ask_stocks_succesfully";
                    header("Location:".$localhost."Stockmanagerproduct");
                    exit();
                   
                }
                else
                {
                    $_SESSION['error']= "Ask_stocks_fialed";
                    header("Location:".$localhost."Stockmanagerproduct");
                    exit();
                  
                }

        }
}
}