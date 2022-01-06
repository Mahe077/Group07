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
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagersettings.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
      .alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

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









    </div>
</section>


<script type="text/javascript" src="views/js/stockmanager/settings.js"></script>
</body>
</html>
