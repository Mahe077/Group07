<?php
class Forget_password extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->render('forget_password');
    }
    
    public function reset()
    {
        $this->view->render('reset_password');
    }
    public function forget(){
        require 'config/PathConf.php';
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
           
            $_SESSION['username'] = $username;
           echo $_SESSION['username'];
            // get email
            $email = $this->model->getinfo($username);
            print_r($email);

            echo "<br>";

            foreach($email as $row)
            {
               
                $mail = htmlentities($row['email']);
                // echo $mail .  "<br>";
            }


            $verification_code = sha1($mail . time());
            echo $verification_code;
            // $verification_url = $localhost.'Verify/index';
            // echo "<br>";
            // echo $verification_url;


             $to              = $mail; 
             $sender          = 'pavithrasandamini283@gmail.com';
             $email_subject   = 'Verify email address';
             $email_body      = '<p> Dear ' . $username . ',' . '</p>';
             $email_body     .= '<p> Here the verification code for verify your Email Address </p>';
             $email_body     .= '<p>' . $verification_code . '</p>';
             $email_body     .= '<p> thank you, <br> SL MINI Spares </p>';
            
            
             $header = "From: {$mail}\r\nContent-Type: text/html;";
                    
            $sentmailresult = mail($to , $email_subject , $email_body , $header);
           
                        
                    // $status = '<p class = "success"> Message sent succesfully </p>';
                    $_SESSION['error'] = "Verification_mail_sent_succesfully";
                    header("Location:".$localhost."forget_password");
                //     }
                //     else
                //   {
                     
                //         //  $status = '<p class = "fail"> Message sent failed </p>';
                //         //  $_SESSION['error'] = $status;
                //         $_SESSION['error']== "Verification_mail_sent_failed";
                //         header("Location:".$localhost."forget_password");
                //      }
            
        echo $_SESSION['error'];


        $this->model->Updateperson($verification_code , $username );
           
        
    }
     
    }
 
    public function match(){
        require 'config/PathConf.php';
        if (isset($_POST['submit'])) {
            $code = $_POST['code'];
            echo "</br>";
            echo $code;
            echo "</br>";
            $name =  $_SESSION['username'];
            $db_code = $this->model->getcode($name);
            print_r($db_code);
            echo "</br>";
            foreach($db_code as $row)
            {
                
                $v_code = htmlentities($row['verification_code']);
                
            }
            // verify
            echo $v_code;
            if($code == $v_code)
            {
                echo "matched";
                header("Location:".$localhost."reset_password");
            }
            else
            {
                echo "not matched";
            }


    }
        
    }
}
