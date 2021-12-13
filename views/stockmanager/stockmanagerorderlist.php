<?php
    if (!isset($_SESSION['userid'])) {
        $_SESSION['error'] = 'invalidAccess';
        header("Location:Stockmanagerorderlist");
        exit();
    }
    require 'config/PathConf.php';
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerorderlist.css">
    <title>Document</title>
</head>
<body>
<?php
    $this_page = "stockmanagerorderlist.php";
    include_once 'stockmanagerdashboard.php';
?>

<div class="home-content">
      <div class="overview-boxes">
        <div class="box1">
          <div class="right-side">
            
            <div class="box-topic"><button class="btn1" onclick="display1()">New Orders</button></div>
            
          </div>
          <!-- <i class="fa fa-cart-plus" aria-hidden="true"></i> -->
        </div>
        <div class="box2">
          <div class="right-side">
            <div class="box-topic"><button class="btn2" onclick="display2()">Pending Orders</button></div>
            
          </div>
          <!-- <i class="fa fa-cart-plus two" aria-hidden="true"></i> -->
        </div>
        <div class="box3">
          <div class="right-side">
            <div class="box-topic"><button class="btn3" onclick="display3()">Cancel Orders</button></div>
            
          </div>
          <!-- <i class="fa fa-cart-plus three" aria-hidden="true"></i> -->
        </div>
        <div class="box4">
          <div class="right-side">
            <div class="box-topic"><button class="btn4" onclick="display4()">Return Orders</button></div>
            
          </div>
          <!-- <i class="fa fa-cart-plus four" aria-hidden="true"></i> -->
        </div>
      </div>




    <div class="table-container1" id="container1" onload="loadneworders();">

    <h3 class="one"> New Orders </h3>
    <table class="table" id="table" >
    <thead>
    <tr >
    <th>Order_ID</th>
    <th>Order_Date</th>
    <th>Payment(Rs)</th>
    <th>Total_payment</th>
    <th>Approximate_Deliver_date</th>
    </tr>
    </thead>
    
</table>
</div>


<div class="table-container2" id="container2" onload="loadpendingorders();">

<h3 class="two"> Pending Orders </h3>
<table class="table" id="table1" >
<thead>
<tr >
<th>Order_ID</th>
<th>Order_Date</th>
<th>Payment(Rs)</th>
<th>Total_payment(Rs)</th>

</tr>
</thead>

</table>



</div>

<div class="table-container3" id="container3" onload="loadcancelorders();">

<h3 class="three"> Cancel Orders </h3>
<table class="table" id="table2">
<thead>
<tr >
<th>Order_ID</th>
<th>Order_Date</th>
<th>Approximate_deliver_date</th>
<th>Total_payment</th>
<th>Reason</th>
</tr>
</thead>

</table>



</div>

<div class="table-container4" id="container4" onload="loadreturnorders();">

<h3 class="four"> Return Orders </h3>
<table class="table" id="table3" >
<thead>
<tr >
<th>Order_ID</th>
<th>Order_Date</th>
<th>Payment(Rs)</th>
<th>Total_payment</th>
<th>Delivered_date</th>
<th>reason</th>
</tr>
</thead>

</table>



</div>





</div>



  </section> 
  <script type="text/javascript" src="views/js/stockmanager/orderlist.js"></script>
 
</body>
</html>