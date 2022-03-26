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
    <title>SL MINI SPARES</title>
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagersettings.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/alert.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
      /* .alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
} */

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
    </style>
  
</head>
<body>
 <?php
    $this_page = "stockmanagersettings.php";
    include_once 'stockmanagerdashboard.php';
?> 
<!--  error alerting will display here -->
<?php
        include_once 'views/global/alert.php';
        ?>
        

    <div class="form-content">


    <div class="button-container">
<button id="myBtn">Insert Items</button>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="container">
    <div class="title">Inert Item</div>
    <div class="content">
    <form action="Stockmanagersettings/insert" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
          
          <input type="text" placeholder="Enter Item Id" name="item_id" required>
          </div>
          <div class="input-box">
        
          <input type="number" placeholder="Enter Amount" name="amount" required>
          </div>
         
          <div class="button">
          <input type="submit" name="submit" value="Insert">
		</div>
          </div>
      </form>
    </div>
    </div>
  </div>

</div>






<div class="card-container" id="card-container">

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <div class="slides">
  <img  src="assets/pagecontains/picture_06.jpg" style="width:800px;height:500px;" >
  </div>
  
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <div claas="slides">
  <img  src="assets/pagecontains/picture_07.jpg" style="width:800px;height:500px;">
  </div>
  
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <div class="slides">
  <img src="assets/pagecontains/picture_08.jpg" style="width:800px;height:500px;">
  </div>
  </div>
  
</div>


</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
</div>





    </div>
</section>


<script type="text/javascript" src="views/js/stockmanager/settings.js"></script>
<script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
</body>
</html>
