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
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerproduct.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/alert.css"> -->
<body>
<?php
    $this_page = "stockmanagerproduct.php";
    include_once 'stockmanagerdashboard.php';
?>


<div class="form-content">
<?php
    if(isset($_SESSION['error1']))
    {
      ?>

  <!-- Modal content -->
  <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  
    <p class="ale"><?php  echo $_SESSION['error1']; ?></p>
  </div>

      <?php
    }
    ?>
<!-- Trigger/Open The Modal -->
<div class="button-container">

<button id="myBtn">Update Stocks</button>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
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


    <div class="items" id="items"  >
      
      <div class="menu">
        
        <div class="box-container" id="box-container">  
          <!-- products load here -->
  </div>
      </div>
     
    </div>
  <script type="text/javascript" src="views/js/stockmanager/product.js"></script>
  <!-- <script type="text/javascript" src="views/js/alert.js"></script> -->
    
</body>
</html>