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
<?php require 'config/PathConf.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SL MINI SPARES</title>
    <link rel="stylesheet" href="css/stockmanagerdashboardhome.css">
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerdashboardhome.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/alert.css">



</head>
<body>
<?php
    $this_page = "stockmanangerdashboardhome.php";
    include_once 'stockmanagerdashboard.php';
?>

<div class="home-content">
      <!--  error alerting will display here -->
      <?php
        include_once 'views/global/alert.php';
        ?>

      <div class="overview-boxes">
        <div class="box1" id="box1">
          <div class="right-side">
          
            <div class="indicator">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
              
            </div>
          </div>
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
        </div>
        <div class="box2" id="box2">
          <div class="right-side">
          
            <div class="indicator">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
              
            </div>
          </div>
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
        </div>
        <!-- <div class="box3" id="box3">
          <div class="right-side" >
           
            <div class="indicator">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
              
            </div>
          </div>
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
        </div> -->
        <div class="box4" id="box4">
          <div class="right-side">
           
            <div class="indicator">
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
         
            </div>
          </div>
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
        </div>
      </div>


<!--  flext container -->
<div class="flex-container">
    <div class="flex-right" id="right">

    <div class="table_body_new">
<table class="tbl" id="table3" collapsing="0" >
<thead>
<tr >
<th>Delivery Company</th>
<th>Rating</th>
<!-- <th>More</th> -->

</tr>
<tr class="bordered"></tr>
</thead>

</table>

</div>
 
    </div>
   
  </section> 
      </section> 
      <script type="text/javascript" src="views/js/stockmanager/dashboard.js"></script>
      <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
   
</body>
</html>