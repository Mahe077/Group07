<!DOCTYPE html>
<html lang="en">
<?php require 'config/PathConf.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SL MINI SPARES</title>
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerdelivery.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/alert.css">
  </head>
<body>
  <?php
    $this_page = "stockmanangerdelivery.php";
    include_once 'stockmanagerdashboard.php';

?>  


<div class="main-container">
   <!--  error alerting will display here -->
   <?php
        include_once 'views/global/alert.php';
        ?>
    <h2>Delivery Overview</h2>

    
    <div class="flexcontainer">
        <div class="left-container">
            <img class="animation" src="assets/pagecontains/cardriving 4.gif" alt="">
        </div>
        <div class="right-container">
            <div class="delivery">
            
              <div class="viewbuttoncontainer">



              <button id="myBtn" class="btn">Assign</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="container">
    <div class="title">Assign Delivery</div>
    
    <div class="content">
      <form action="Stockmanagerdelivery/updatedelivery" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <input type="text" placeholder="Enter Order ID" name="order_ID" required>
          </div>
          <div class="input-box">
            <input list="select" name="company" placeholder="Assign Company" required>
              <datalist id="select">
                <option value="DOM pvt.ltd">
                <option value="senarath services">
                <option value="raman couriour service">
                <option value="jooliya center">
                <option value="fadna delivery">
                <option value="gauri center"></option>
                
              </datalist>
          </div>
          <div class="button">
            <input type="submit" name="submit" value="Assign">
		      </div>
        </div>
      </form>
    </div>
</div>
  </div>

</div>

</div>

  <div class="next-container" onload="loaddata()">
                    
  <div class="request">
  <div class="table_body_new">
<table class="tbl" id="table" collapsing="0" >
  <thead>
  <tr>
    <th>Order ID</th>
    <th>Delivery Date</th>
    <th>Address</th>
    <th>Delivery Company</th>
    
  </tr>
  <tr class="bordered"></tr>
</thead>

</div>
</div>



              </div>
            </div>
        </div>
    </div>

</div>





</section>

<script type="text/javascript" src="views/js/stockmanager/delivery.js"></script>
<script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
    
</body>
</html>