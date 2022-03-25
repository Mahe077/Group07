<?php
class Stockmanagerdelivery extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        // $data = $this->model->Displaynoti();
        // $this->view->data=$data;
        // $value= $this->model->Display();
        //  $this->view->value=$value;
        $this->view->render('stockmanager/stockmanagerdelivery');
    }

    public function Displaydelivery()
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
            $data = $this->model->data($wh);
            echo json_encode(count($data) == 0 ? null : $data);
    }

    
    public function updatedelivery()
    {
        require 'config/PathConf.php';
        if (isset($_POST['submit'])) {
            $orderid = $_POST['order_ID'];
            
            $_SESSION['order_ID'] = $orderid;
       
            $company = $_POST['company'];
            $status = 1;
            $this->model->Updatedelivery($orderid , $company , $status);
            
            $email = $this->model->getmail($company);
            foreach($email as $row)
            {
                $mail = htmlentities($row['email']);
                echo $mail .  "<br>";
            }
            $address = $this->model->getaddress($orderid);
            foreach($address as $row)
            {
                $add = htmlentities($row['address']);
                echo $add .  "<br>";
            }
            $date = $this->model->getdate($orderid);
            foreach($date as $row)
            {
                $da = htmlentities($row['delivery_date']);
                echo $da .  "<br>";
            }
// sent email
            $url = $localhost.'Deliverycompany';
            $to              = $mail;
            $sender          = 'pavithrasandamini283@gmail.com';
            $email_subject   = 'Delivery Invitation';
            $email_body      = '<p> Dear ' . $company . ',' . '</p>'; 
            $email_body     .= '<p> This email is to inform you about delivery request of SL MINI Spares </p>';
            $email_body     .= '<p>Address: ' . $add . ' </p>';
            $email_body     .= '<p>On or before:' . $da . '</p>';
            $email_body     .= '<p>For your response:'. $url  .'</p>';
            $email_body     .= '<p> thank you, <br> SL MINI Spares </p>';
            
            $header = "From: {$mail}\r\nContent-Type: text/html;";
          
            $sentmailresult = mail($to , $email_subject , $email_body , $header);
           
                if($sentmailresult)
                {
                    // $_SESSION['error2']= "Delivery assigned succesfully";
                    $_SESSION['error'] = "Delivery_assigned_succesfully";
                    header("Location:".$localhost."Stockmanagerdelivery");
                    exit();
                }
                else
                {
                    // $_SESSION['error2']= "Delivery assign fialed";
                    $_SESSION['error'] = "Delivery_assign_failed";
                    header("Location:".$localhost."Stockmanagerdelivery");
                    exit(); 
                }
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
            $url1 = $localhost.'Deliverycompany';
            $mail1 = 'Chandrasekar@gmail.com';
            $to1              = $mail1;
            // $sender          = 'pavithrasandamini283@gmail.com';
            $email_subject1   = 'Delivery Assign Notification';
            // $email_body1      = '<p> Dear ' . ownername . ',' . '</p>'; 
            // $email_body1     .= '<p> This email is to inform you about delivery is requested from' . $company . '</p>';
            $email_body1     .= '<p>Address: ' . $add . ' </p>';
            $email_body1     .= '<p>On or before:' . $da . '</p>';
           
            $email_body1     .= '<p> thank you, <br> SL MINI Spares , warehosue ' . $wh . '</p>';
            
            $header1 = "From: {$mail1}\r\nContent-Type: text/html;";
          
            $sentmailresult1 = mail($to1 , $email_subject1 , $email_body1 , $header1);
           
                if($sentmailresult1)
                {
                    // $_SESSION['error3']= " owner Delivery assigned succesfully";
                    header("Location:".$localhost."Stockmanagerdelivery");
                    exit();
                  
                }
                else
                {
                    // $_SESSION['error3']= "owner Delivery assign fialed";
                    header("Location:".$localhost."Stockmanagerdelivery");
                    exit();
                  
                }
        }
    }

    public function confirm()
    {
        $id =  $_SESSION['orderid'];
        echo $id;
        $state = "1";
        $succes = $this->model->accept($state,$id);
    }
    

}