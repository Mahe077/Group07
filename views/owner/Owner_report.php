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
                <a href="Display_notifications" class='btn-del'>Respond</a>
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

<div class="report-container">
<div class="graphcontainer">
<h3>Result</h3>
</div>
<div class="selectoptions">
<h3>Report Type</h3>
<div class="selections">
               <div class="duration-select">
               <label>Duration</label>
                 <select class="common">
                    
                   <option value="1">Monthly</option>
                   <option value="3">Weekly</option>
                   <option value="2">Daily</option>
                 </select>
                 <span class="custom-arrow"></span>
               </div>
               <label for="submit">starting Date</label>
               <input type="date" class="button" name="submit" value="starting Date">  
               <br>
               <label for="submit">Ending Date</label>
               <input type="date" class="button" name="submit" value="Ending Date">  
                <br>
               <input type="submit" class="viewbutton" name="submit" value="View">
</div>
<div class="button-container">

<input type="submit" class="printbutton" name="submit" value="Print">
<input type="submit" class="printbutton" name="submit" value="Back">
</div>
</div>
</div>
</div>
<div class="table-container">
     <table class="table">
  <thead>
  <tr>
    <th>Product ID</th>
    <th>Product Name</th>
    <th>Category</th>
    <th>Amount</th>
    <th>Color</th>
  </tr>
</thead>
<tbody>
  <tr>
</tr>
</tbody>
</table>
</div>
  </section> 
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
  <script type="text/javascript" src="views/js/owner/report-page.js"></script>
</body>
</html>