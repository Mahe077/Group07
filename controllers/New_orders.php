<?php
    class New_orders extends Controller
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
            $this->view->render('owner/New_orders');
        }
        public function Displayorder()
        {
            $data = $this->model->Displayorder();
            echo json_encode($data);
            return $data;
        }
        public function Accept_order($id,$item,$user_id){
            $order_id=$id;
            $this->model->Accept_order($order_id);
            $this->model->Deduce_item($item);
            $result = $this->model->Notify_send($user_id);

            $lname = $result[0][0];
            $fname =  $result[0][1];
            $email = $result[0][2];
            $message="kasunika";
            $to = $email;
            $mail_subject = 'sl_mini';
            $email_body = "hii";
            $header = "From: {$email}\r\nContent-type: text/html;";
            $resul = mail($to,$mail_subject, $email_body,$header);
            if($resul){
                echo  "success";
            }else{
                echo "unsuccess";
            }


            //header("location:".$localhost."\G7/Group07/New_orders");
        }
        public function Reject_order($id){
            $order_id=$id;
            $this->model->Reject_order($order_id);
            header("location:".$localhost."\G7/Group07/New_orders");
        }
    }
?>