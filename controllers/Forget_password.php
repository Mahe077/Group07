<?php
class Forget_password extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('forget_password');
    }
    
    
    function forget(){

        require 'config/PathConf.php';
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            
            echo  $username ;

            $email = $this->model->getinfo($username);
            print_r($email);
            // things to do here
            // $email = $user;
            // $verification_code = sha1($email . time());
            // $verification_url = $localhost.'views/stockmanager/reset_password.css' . $verification_code;


            // // $to              = $email;
            // $sender          = 'pavithrasandamini283@gmail.com';
            // $email_subject   = 'Verify email address';
            // $email_body      = '<p> Dear ' . $fullname . ',', '</p>';
            // $email_body     .= '<p> Here the link for verify your Email Address </p>';
            // $email_body     .= '<p>' . $verification_url . ' </p>';
            // $email_body     .= '<p> thank you, <br> SL MINI Spares </p>';
            
            //     $header = "From: {$email}\r\nContent-Type: text/html;";
                    
            //         $sentmailresult = mail($to , $email_subject , $email_body , $header);
            
            //         if($sentmailresult)
            //         {
            //             $status = '<p class = "success"> Message sent succesfully </p>';
            //         }
            //         else
            //         {
            //             $status = '<p class = "fail"> Message sent failed </p>';
            //         }
            
                }
        
            
        }
        
        
    }
