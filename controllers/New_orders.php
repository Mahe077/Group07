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
        public function Accept_order($id,$user_id,$item,$delivery_req,$district){
            $order_id=$id;
            if($delivery_req==1){
                $x=1; $y=2; $z=3; $w=4;
                switch($district){
                    case "colombo":
                        $this->model->Warehouse($id,$z);
                        break;
                    case "gampaha":
                        $this->model->Warehouse($id,$z);
                        break;
                    case "kaluthara":
                        $this->model->Warehouse($id,$z);
                        break;
                    case "rathnapura":
                        $this->model->Warehouse($id,$z);
                        break;
                    case "kegalle":
                        $this->model->Warehouse($id,$z);
                        break;
                    case "kandy":
                        $this->model->Warehouse($id,$y);
                        break;     
                    case "nuwara eliya":
                        $this->model->Warehouse($id,$y);
                        break; 
                    case "badulla":
                            $this->model->Warehouse($id,$y);
                            break;
                    case "matale":
                            $this->model->Warehouse($id,$y);
                            break;
                    case "kurunegala":
                            $this->model->Warehouse($id,$y);
                            break;
                    case "ampara":
                            $this->model->Warehouse($id,$y);
                            break;
                    case "baticalo":
                            $this->model->Warehouse($id,$y);
                            break;
                    case "anuradhapura":
                            $this->model->Warehouse($id,$x);
                            break; 
                    case "puttalama":
                            $this->model->Warehouse($id,$x);
                            break;
                    case "polonnaruwa":
                            $this->model->Warehouse($id,$x);
                            break; 
                    case "trincomalee":
                            $this->model->Warehouse($id,$x);
                             break;
                    case "mannar":
                            $this->model->Warehouse($id,$x);
                            break;
                    case "vavuniya":
                            $this->model->Warehouse($id,$x);
                             break;
                    case "mulative":
                            $this->model->Warehouse($id,$x);
                            break;
                    case "jaffna":
                            $this->model->Warehouse($id,$x);
                            break;
                    case "kilinochchi":
                            $this->model->Warehouse($id,$x);
                    case "galle":
                            $this->model->Warehouse($id,$w);
                            break; 
                    case "matara":
                            $this->model->Warehouse($id,$w);
                            break;
                    case "hambanthota":
                            $this->model->Warehouse($id,$w);
                            break;
                    case "monaragala":
                            $this->model->Warehouse($id,$w);
                            break;      
                }
                $this->model->Accept_order($order_id);
                $this->model->Deduce_item($item);
            }else{
                $this->model->Accept_order($order_id);
                $this->model->Deduce_item($item);
            }
            
            $result = $this->model->Notify_send($user_id);
            var_dump($result);
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
            header("location:".$localhost."\G7/Group07/New_orders");

        }
        public function Reject_order($id,$user_id){
            $order_id=$id;
            $this->model->Reject_order($order_id);
            $result = $this->model->Notify_send($user_id);
            var_dump($result);
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
            header("location:".$localhost."\G7/Group07/New_orders");
        }


    }
?>