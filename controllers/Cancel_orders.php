<?php
    class Cancel_orders extends Controller
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
            $this->view->render('owner/Cancel_orders');
        }
        public function Displayorder()
        {
            $data = $this->model->Displayorder();
            echo json_encode($data);
            return $data;
        }
        public function Accept_order($id,$user_id){
            $order_id=$id;
            $this->model->Accept_order($order_id);
            $result = $this->model->Notify_send($user_id);
            
            $lname = $result[0][0];
            $fname =  $result[0][1];
            $email = $result[0][2];
            $message="kasunika";
            $to = $email;
            $mail_subject = 'Notification from sl_mini_spares';
            $email_body = "Your order is in progress check the account to continue the process";
            $header = "From: {$email}\r\nContent-type: text/html;";
            $resul = mail($to,$mail_subject, $email_body,$header);
            if($resul){
                echo  "success";
            }else{
                echo "unsuccess";
            }
            // $this->model->Deduce_item($item);
            header("location:".$localhost."\G7/Group07/Cancel_orders");
        }
        public function Reject_order($id,$user_id){
            $order_id=$id;
            $this->model->Reject_order($order_id);
            $result = $this->model->Notify_send($user_id);
            
            $lname = $result[0][0];
            $fname =  $result[0][1];
            $email = $result[0][2];
            $message="kasunika";
            $to = $email;
            $mail_subject = 'Notification from sl_mini_spares';
		    $email_body   = "Message from Contact Us Page of the Website: sl_mini_spares<br>";
            $email_body = "Your order has been rejected due to lack of items";
            $header = "From: {$email}\r\nContent-type: text/html;";
            $resul = mail($to,$mail_subject, $email_body,$header);
            if($resul){
                echo  "success";
            }else{
                echo "unsuccess";
            }
            // $this->model->Deduce_item($item);
            header("location:".$localhost."\G7/Group07/Cancel_orders");
        }
    }
?>