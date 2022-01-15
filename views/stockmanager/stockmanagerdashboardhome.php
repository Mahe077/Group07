


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
    <title>Document</title>
    <link rel="stylesheet" href="css/stockmanagerdashboardhome.css">
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerdashboardhome.css">




</head>
<body>
<?php
    $this_page = "stockmanangerdashboardhome.php";
    include_once 'stockmanagerdashboard.php';
?>

<div class="home-content">
      <div class="overview-boxes">
        <div class="box1" id="box1">
          <div class="right-side">
          
            <div class="indicator">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
        </div>
        <div class="box2" id="box2">
          <div class="right-side">
          
            <div class="indicator">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
        </div>
        <div class="box3" id="box3">
          <div class="right-side" >
           
            <div class="indicator">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
        </div>
        <div class="box4" id="box4">
          <div class="right-side">
           
            <div class="indicator">
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
              <span class="text">Down From Today</span>
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
    <div class="flex-left" id="left">
      
    <div class="table_body_new">
<!-- <table class="tbl" id="table4" collapsing="0" >
<thead>
<tr >
<th>Item_ID</th>
<th>Amount</th>
<th>More</th>

</tr>
<tr class="bordered"></tr>
</thead>

</table> -->

</div>
    
  
</div>
  </section> 
      </section> 
      <script type="text/javascript" src="views/js/stockmanager/dashboard.js"></script>
   
</body>
</html>