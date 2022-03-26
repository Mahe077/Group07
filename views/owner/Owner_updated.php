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
  <title> Owner Dashboard |SL MINI Spares </title>
  <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner_updated.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner-nortification-new.css">
  <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/alert.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="sidebar">
    <?php include_once 'common.php'; ?>
  </div>
  <section class="home-section">

    <nav>
      <div class="sidebar-button">
        <i class="fa fa-bars sidebarBtn" aria-hidden="true"></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="nortification-box">
        <div class="dropdown">
          <a href="Owner_updated" class="notification"><i class="fas fa-bell" id="fa-bell"><span class="count"><?php print_r($this->data[0][0]); ?></span></i></a>
          <?php
          $val  = $this->data[0][0];
          ?>
          <div class="dropdown-content">
            <?php

            for ($x = 0; $x < $val; $x++) {
              echo "<div class='msg_outside'><div class='msg-date'><br>" . $this->value[$x][4] . "</div>
                  <div class='msg'><br>" . $this->value[$x][6] . "<br></div></div>";
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
    <div class="home-content">
       <!--  error alerting will display here -->
       <?php
        include_once 'views/global/alert.php';
        ?>

      <div class="overview-boxes">
        <div class="box1">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <?php
              echo "<div class='number'>" .$this->orders[0][0]."</div>";
            ?>
            <div class="indicator"> 
            </div>
          </div>
          <i class="fa fa-cart-plus one" aria-hidden="true"></i>
        </div>
        <div class="box2">
          <div class="right-side">
            <div class="box-topic">Total Cancel</div>
            <?php
              echo "<div class='number'>" .$this->corders[0][0]."</div>";
            ?>
            <div class="indicator"> 
            </div>
          </div>
          <i class="fa fa-cart-plus two" aria-hidden="true"></i>
        </div>
        <div class="box3">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <?php
              echo "<div class='number'>" .$this->porders[0][0]."</div>";
            ?>
            <div class="indicator">
            </div>
          </div>
          <i class="fa fa-cart-plus three" aria-hidden="true"></i>
        </div>
        <div class="box4">
          <div class="right-side">
            <div class="box-topic">Total Return</div>
            <?php
              echo "<div class='number'>" .$this->rorders[0][0]."</div>";
            ?>
            <div class="indicator">
            </div>
          </div>
          <i class="fa fa-cart-plus four" aria-hidden="true"></i>
        </div>
      </div>
      <div class="overview-boxes-left">
        <div class="box-left">
          <div class="chart-canvas">
            <div><canvas id="myChart"></canvas></div>
          </div>
        </div>
        <div class="box-left">
          <div class="left-side">
            <div class="slide-images">
              <div class="image-container">
                <img src="\G7/Group07/assets/imgeslider/im1.jpg" alt="">
              </div>
              <div class="image-container">
                <img src="\G7/Group07/assets/imgeslider/im2.jpg" alt="">
              </div>
              <div class="image-container">
                <img src="\G7/Group07/assets/imgeslider/im3.jpg" alt=""> 
              </div>
              <div class="image-container">
                <img src="\G7/Group07/assets/imgeslider/im4.jpg" alt="">
              </div>
              <div class="image-container">
                <img src="\G7/Group07/assets/imgeslider/im5.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
  <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
  <script type="text/javascript" src="views/js/owner/script.js"></script>
</body>

</html>