<!DOCTYPE html>
<html lang="en">
<?php
    if (!isset($_SESSION['userid'])) {
        $_SESSION['error'] = 'invalidAccess';
        header("location: Log_in");
        exit();
    }
    require 'config/PathConf.php';
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SL MINI SPARES</title>
    <link rel="stylesheet" href="css/stockmanagernotification.css">
    <!-- Boxicons CDN Link -->
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
    include_once 'stockmanagerdashboard.php';
?>  


<div class="notification-container">
    <p class="topic">
        Notifications
    </p>
    <div class="notification" id="notification1">
    <p>Hi! We’re so excited that you’ve decided to purchase. It’s designed to help you .
     You can expect to hear from us  times a month with special offers, product updates, and more. 
     Contact us at  if you have any questions.</p>
     <p>email: kasunsandaruwan@gmail.com</p>
     <div class="btn-container">
     <button class="btn" onclick="reply1()">Reply</button>
     <button class="btn-ignore" onclick="ignore1()">Ignore</button>
     </div>
        <div class="reply" id="reply">
        <textarea id="replyarea" name="replyarea"  placeholder="enter reply">

</textarea>
        </div>
    </div>

    
   



   <div class="notification" id="notification2">
    <p>Hi , thanks for purchasing . To help you improve , here’s a link to our easy-to-use product guide. 
    Contact us at  if you have any questions</p>
    <p>email: malithiperera@gmail.com</p>
    <div class="btn-container">
     <button class="btn" onclick="reply2()">Reply</button>
     <button class="btn-ignore" onclick="ignore2()">Ignore</button>
     </div>
        <div class="reply" id="reply">
        <textarea id="replyarea" name="replyarea"  placeholder="enter reply">

</textarea>
        </div>
    </div>
    <div class="notification" id="notification3">
    <p>Hi , here are some recommendations and tips for using . You’ll receive a few more tips over the next
     days to help you get the most out of your new purchase. In the meantime, get in touch by calling  if you 
     have any questions.</p>
     <p>email: prasadlakshan@gmail.com</p>
     <div class="btn-container">
     <button class="btn" onclick="reply3()">Reply</button>
     <button class="btn-ignore" onclick="ignore3()">Ignore</button>
     </div>
        <div class="reply" id="reply">
        <textarea id="replyarea" name="replyarea"  placeholder="enter reply">

</textarea>
        </div>
    </div>
    <div class="notification" id="notification4">
    <p> Hi first name, thanks for opting in to SMS updates from Wine Box Subscriptions! You can text STOP at any time
     to unsubscribe.</p>
     <p>email: pavithrasandamin283@gmail.com </p>
     <div class="btn-container">
     <button class="btn" onclick="reply4()">Reply</button>
     <button class="btn-ignore" onclick="ignore4()">Ignore</button>
     </div>
        <div class="reply" id="reply">
        <textarea id="replyarea" name="replyarea"  placeholder="enter reply">

</textarea>
        </div>
    </div>
    <div class="notification" id="notification5">
    <p>The new Tesla Model S has arrived! Text our showroom by replying to this message and we’ll deliver 
    the car directly to you for a test drive!</p>
    <p>email: kasunikahansamali@gmail.com</p>
    <div class="btn-container">
     <button class="btn" onclick="reply5()">Reply</button>
     <button class="btn-ignore" onclick="ignore5()">Ignore</button>
     </div>
        <div class="reply" id="reply">
        <textarea id="replyarea" name="replyarea"  placeholder="enter reply">
        </textarea>
        </div>
    </div>
        <div class="notification" id="notification6">
    <p> Hi first name, thanks for opting in to SMS updates from Wine Box Subscriptions! You can text STOP at any time
     to unsubscribe.</p>
     <p>email: maheshlakshan@gmail.com</p>
     <div class="btn-container">
     <button class="btn" onclick="reply6()">Reply</button>
     <button class="btn-ignore" onclick="ignore6()">Ignore</button>
     </div>
        <div class="reply" id="reply">
        <textarea id="replyarea" name="replyarea"  placeholder="enter reply">

</textarea>
        </div>
    </div>
     

</div>
</section> 
<script>
    function ignore1() {
  document.getElementById("notification1").style.display = "none";
}
function ignore2() {
  document.getElementById("notification2").style.display = "none";
}
function ignore3() {
  document.getElementById("notification3").style.display = "none";
}
function ignore4() {
  document.getElementById("notification4").style.display = "none";
}
function ignore5() {
  document.getElementById("notification5").style.display = "none";
}
function ignore6() {
  document.getElementById("notification6").style.display = "none";
}
</script>
    <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
     sidebarBtn.onclick = function() {
       sidebar.classList.toggle("active");
       if(sidebar.classList.contains("active")){
       sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
     }else
       sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
     }
      </script>
</body>
</html>