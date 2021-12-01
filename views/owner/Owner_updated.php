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
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner-nortification-new.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="sidebar">
  <?php include_once 'common.php';?>
  </div>
  <section class="home-section">
  <?php include_once 'navigation.php';?>
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box1">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number">40</div>
            <div class="indicator">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class="fa fa-cart-plus one" aria-hidden="true"></i>
        </div>
        <div class="box2">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number">38</div>
            <div class="indicator">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class="fa fa-cart-plus two" aria-hidden="true"></i>
        </div>
        <div class="box3">
          <div class="right-side">
            <div class="box-topic">Total Profit</div>
            <div class="number">12</div>
            <div class="indicator">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class="fa fa-cart-plus three" aria-hidden="true"></i>
        </div>
        <div class="box4">
          <div class="right-side">
            <div class="box-topic">Total Return</div>
            <div class="number">11</div>
            <div class="indicator">
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
              <span class="text">Down From Today</span>
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
            <div class="box-img">
              <!-- <div class="imgtxt">Conversations</div>
              <img src="img/img.png" alt="" class="stat"> -->
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>  
    </section> 
      <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
      <script type="text/javascript" src="views/js/owner/nortification-display.js"></script>
      <script type="text/javascript" src="views/js/owner/script.js"></script>
      </body>
      </html>