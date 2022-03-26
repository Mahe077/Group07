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
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagersalesreport.css">
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
  <?php include_once 'views/owner/common.php';?>
  </div>
  <section class="home-section">
  <nav>
      <div class="sidebar-button">
        <i class="fa fa-bars sidebarBtn" aria-hidden="true"></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="nortification-box">
          <div class="dropdown">
              <a href="Owner_updated" class="notification"><i class="fas fa-bell" id="fa-bell"><span class="count"><?php print_r($this->data[0][0]);?></span></i></a>
              <?php
                $val  = $this->data[0][0];
              ?>
                <div class="dropdown-content">
              <?php
              
                for ($x = 0; $x <$val; $x++) {
                  echo "<div class='msg_outside'><div class='msg-date'><br>".$this->value[$x][4]."</div>
                  <div class='msg'><br>".$this->value[$x][6]."<br></div></div>";
                }
              ?>
            <div class="respond">
                <a href="Display_notifications" class='respond_btn'>Respond</a>
            </div>
          </div>
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
<div class="main-container">
  <div class="print-container">
    <button class="print" onClick="window.print()">Print</button>
  </div>
<div class="duration-container">
<select id="ddlViewBy" onChange="select_year()">
  <option value="0">year</option>
  <option value="2021">2021</option>
  <option value="2020">2020</option>
  <option value="2019">2019</option>
  <option value="2018">2018</option>
  <option value="2017">2017</option>
  <option value="2016">2016</option>
</select>

<select id="ddlViewBy1" onChange="select_month()">
  <option value="0">month</option>
  <option value="1">January</option>
  <option value="2">February</option>
  <option value="3">March</option>
  <option value="4">April</option>
  <option value="5">May</option>
  <option value="6">June</option>
  <option value="7">July</option>
  <option value="8">August</option>
  <option value="9">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
</select>
</div>



<div class="card-container" id="card-container">
<div class="card-count" id="card-count">
<p class="card-topic">Count</p>
</div>
<div class="card-sum" id="card-sum">
<p class="card-topic">Sum</p>
</div>
<div class="card-profit" id="card-profit">
<p class="card-topic">Profit</p>
</div>
</div>
<div class="table-container1" id="container1" onload="select_year()">

    
<div class="topic">
  All Orders
</div>
    <div  class="table_body_new">
            <table class="tbl" collspacing="0" id="table1">
              <tr>
              <th>Order_ID</th>
              <th>Customer_ID</th>
              <th>Order_Date</th>
              <th>Total_payment</th>
              </tr>
              <tr class="bordered"></tr> 
            </table> 
          </div>
    
  
</div>
  </section> 
</body>
</html>