<?php

if (!isset($_SESSION['userid'])) {
  $_SESSION['error'] = 'invalidAccess';
  header("location: Log_in");
  exit();
}
require 'config/PathConf.php';
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Owner Dashboard |SL MINI Spares  </title>
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner_updated.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner-test.css">
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
  <?php include_once 'common_inside.php';?>
  </div>
  <section class="home-section">
  <nav>
      <div class="sidebar-button">
        <i class="fa fa-bars sidebarBtn" aria-hidden="true"></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="nortification-box">
          <div class="dropdown">
              <a href="Display_notifications" class="notification"><i class="fas fa-bell" id="fa-bell"><span class="count"><?php print_r($this->data[0][0]);?></span></i></a>
      </div>
      </div>
      <div class="profile-details">
        <img src="\G7/Group07/assets/users/admin.jpg" alt="">
        <span class="admin_name">KHW</span>
        <div class="dropdown">
          <button class="dropbtn"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>
          <div class="dropdown-content">
            <a href="Log_out">Log Out</a>
          </div>
        </div>
      </div>
    </nav>
    <div class="home-content">
          <div  class="table_body_new">
            <table class="tbl" collspacing="0">
            <thead>
              <div id="notific"> 
                <!-- messages will load here    -->
              </div>             
            </thead>
            </table> 
          </div> 
        </div> 
  </section> 
 <script>
var httprequest  = new XMLHttpRequest();

httprequest.open("POST", "Display_notifications/Display" , true);
const rows = document.getElementById("notific");
httprequest.send();
httprequest.onreadystatechange = function()
{
  if( httprequest.readyState == 4 && httprequest.status == 200)
  {
        var obj = JSON.parse(httprequest.responseText);
        var html = "";
        for(var i = 0 ; i< obj.length ; i++)
        {
          rows.innerHTML +=
        `<div class="notific-details">
            <div class= "special">
            <div class="topic"><h6>Customer ID :</h6> <h10>${obj[i].customer_id}</h10> </div>
              <div class="topic"><h6>Customer email :</h6><h10>${obj[i].email}</h10> </div>
              <div class="topic"><h6>Customer contact:</h6><h10>${obj[i].tp_no}</h10></div>
              <div class="topic"><h6>Message received date:</h6><h10>${obj[i].received_date}</h10></div>
              <div class="topic"><h6>Message :</h6><h10>${obj[i].msg}</h10> </div>
            </div>
        <div class="container">
          <form method="POST" action="Display_notifications/Reply_notifi" enctype="multipart/form-data">
          <div class="row">
            <div class="input-txt">
            <span class="label success">Enter the customer id</span>
            </div>
            <div class="input-txt">
              <input type="text" id="input-id" name="id" required>
            </div>
          </div>  
          <div class="row">
            <div class="input-txt">
              <textarea id="subject" name="subject" placeholder="Write something.." required></textarea>
            </div>
          </div>
          <br>
          <div class="row">
            <input type="submit" name="submit" value="Submit">
          </div>
          </form>
      </div> </div>`;
        }
  }

}

  </script> 
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
</body>
</html>