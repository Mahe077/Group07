<!DOCTYPE html>
<html lang="en">
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
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerproductreport.css">
    <title>SL MINI SPARES</title>
</head>
<style>

  </style>
<body>
<?php
    $this_page = "stockmanagerproductreport.php";
    include_once 'stockmanagerdashboard.php';
?>
<div class="main-container">

<div class="button-container">


<!-- Trigger/Open The Modal -->
<button id="myBtn01">Open Modal</button>

<!-- The Modal -->
<div id="myModal01" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close01">&times;</span>

    <div class="container">
    <div class="title">Update Amount</div>
    <div class="content">
      <form action="Stockmanagerproduct/Updatestocks" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
          
            <input type="text" placeholder="Enter Item ID" name="item_ID" required>
          </div>
          <div class="input-box">
        
          <input type="number" placeholder="Enter Amount" name="amount" required>
          </div>
          <div class="button">
          <input type="submit" name="submit" value="Update" id="myBtn1">
		</div>
          </div>
      </form>
    </div>
</div>
  </div>
  </div>

</div>


<!-- Trigger/Open The Modal -->
<button id="myBtn02">Open Modal</button>

<!-- The Modal -->
<div id="myModal02" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close02">&times;</span>
   
    <div class="container">
    <div class="title">Update Amount</div>
    <div class="content">
      <form action="Stockmanagerproduct/Updatestocks" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
          
            <input type="text" placeholder="Enter Item ID" name="item_ID" required>
          </div>
          <div class="input-box">
        
          <input type="number" placeholder="Enter Amount" name="amount" required>
          </div>
          <div class="button">
          <input type="submit" name="submit" value="Update" id="myBtn1">
		</div>
          </div>
      </form>
    </div>
</div>
  </div>
  </div>

</div>
</div>

</div>

</div>
<script type="text/javascript" src="views/js/stockmanager/productreport.js"></script>
</body>
</html>