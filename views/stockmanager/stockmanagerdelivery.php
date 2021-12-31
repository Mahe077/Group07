<!DOCTYPE html>
<html lang="en">
<?php require 'config/PathConf.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerdelivery.css">
</head>
<body>
  <?php
    $this_page = "stockmanangerdelivery.php";
    include_once 'stockmanagerdashboard.php';

?>  


<div class="main-container">
    <h2>Delivery Overview</h2>

    
    <div class="flexcontainer">
        <div class="left-container">
            <img class="animation" src="assets/pagecontains/cardriving 4.gif" alt="">
        </div>
        <div class="right-container">
            <div class="delivery">
              <p class="right-container-topic">Recent Orders</p>
              <br>
              <?php
    if(isset($_SESSION['error2']))
    {
      ?>

  <!-- Modal content -->
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  
    <p class="ale"><?php  echo $_SESSION['error2']; ?></p>
  </div>

      <?php
    }
    ?>
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
  <table class="table" id = "table">
  <thead>
  <tr>
    <th>Order ID</th>
    <th> Delivery Date</th>
    <th>Address</th>
    <th>Delivery Company</th>
    
  </tr>
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

</body>
</html>