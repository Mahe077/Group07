<?php
if (!isset($_SESSION['userid'])) {
  $_SESSION['error'] = 'invalidAccess';
  header("location: Log_in");
  exit();
}
require 'config/PathConf.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Owner Dashboard |SL MINI Spares  </title>
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner_updated.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner-test.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/alert.css">
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="sidebar">
  <?php include_once 'common.php';?>
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
    <!--  error alerting will display here -->
    <?php
        include_once 'views/global/alert.php';
      ?>
    <?php 
      $details  = $this->details;
    ?>
    <?php
    echo "<div class='home-content-set'>
        <div class='item-img'>
              <img src=".$this->details[0][10]." height='170px' width='170px'>
        </div>
        <div class='item-content'>
          <form  method='POST' action= 'Settings/update_owner' enctype='multipart/form-data'>
          <div class='input-box-container'>
            <div class='input-boxes'>
                <div class='item-form'>
                  <input class='input' name='fname' type='text' placeholder='fname' value =".$this->details[0][2].">
                </div>
                <div class='item-form'>
                  <input class='input' name='lname' type='text' placeholder='lname' value =".$this->details[0][3].">
                </div>
                <div class='item-form'>
                  <input class='input' name='username' type='text' placeholder='username' value =".$this->details[0][4].">
                </div>
                <div class='img-file'>
                    <input class='input' name='image_path' id= 'file' type='file' value =".$this->details[0][10].">
                    <i class='fa fa-picture-o' aria-hidden='true'></i>&nbsp
                    <label for='file'>Choose an image</label>
                </div><br>
              </div>
            <div class='input-boxes'>
              <div class='item-form'>
                <input class='input' name='email' type='text' placeholder='email' value =".$this->details[0][6].">
              </div>
              <div class='item-form'>
                <input class='input' name='contact' type='text' placeholder='contact' value =".$this->details[0][7].">
              </div>
              <div class='item-form'>
                <input class='input' name='address' type='text' placeholder='address' value =".$this->details[0][8].">
              </div>
              <input type='submit' name='submit' class='item-btn' value='Update User'>
            </div>
          </div>   
        </form>
        </div>
      </div>" ?>
    </section> 
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
</body>
</html>