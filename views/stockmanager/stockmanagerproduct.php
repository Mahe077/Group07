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
    <title>SL MINI SPARESt</title>
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerproduct.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/alert.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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






<div class="button-container">


<!-- Trigger/Open The Modal -->
<button id="myBtn01">Update Amount</button>

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
  </div>

  <div class="button-container">


<!-- Trigger/Open The Modal -->
<button id="myBtn02">Ask For Stocks</button>

<!-- The Modal -->
<div id="myModal02" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close02">&times;</span>
   
    <div class="container">
    <div class="title">Ask For Stocks</div>
    <div class="content">
      <form action="Stockmanagerproduct/askstocks" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
          
            <input type="text" placeholder="Enter Item ID" name="item_ID" required>
          </div>
          <div class="input-box">
        
          <input type="number" placeholder="Enter Existing Amount" name="amount" required>
          </div>
          <div class="input-box">
        
          <input type="text" placeholder="Enter Special Note" name="note" >
          </div>
          <div class="button">
          <input type="submit" name="submit" value="Inform" id="myBtn1">
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
<div class="main-container">
<div class="table-container" >
    <div class="table_body_new">
<table class="tbl" id="table3" collapsing="0" >
<thead>
<tr >
<th>Item_ID</th>
<th>Amount</th>
<!-- <th>Status</th> -->
<!-- <th>Update</th> -->


</tr>
<tr class="bordered"></tr>
</thead>

</table>

</div>
</div>
<div class="container-right" id="container-right">
  <!-- <h2>Request For stocks</h2> -->
  <img class="animation" src="assets/pagecontains/stock.png" alt="">
 
</div>

  <script type="text/javascript" src="views/js/stockmanager/product.js"></script>

    
</body>
</html>