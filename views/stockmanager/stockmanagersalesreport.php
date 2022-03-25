<!DOCTYPE html>
<html lang="en">
<?php require 'config/PathConf.php'; ?>
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
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagersalesreport.css">
    <title>SL MINI SPARES</title>
</head>
<body>
<?php
    $this_page = "stockmanagersalesreport.php";
    include_once 'stockmanagerdashboard.php';
?>
<div class="main-container">
  <div class="print-container">
    <button class="print" onClick="window.print()">Print</button>
  </div>
<div class="duration-container">
<select id="ddlViewBy" onChange="select_year()">
  <option value="0">year</option>
  <option value="2021">2022</option>
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

</div>
<script type="text/javascript" src="views/js/stockmanager/salesreport.js"></script>
</body>
</html>