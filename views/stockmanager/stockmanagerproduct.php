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
</head>
<body>
<?php
    $this_page = "stockmanagerproduct.php";
    include_once 'stockmanagerdashboard.php';
?>


<div class="form-content">

    <div class="openBtn">
      <button class="openButton" onclick="openForm()"><strong>Update Stocks</strong></button>
    </div>
    <div class="loginPopup">
      <div class="formPopup" id="popupForm">
      <h2>Update Stocks</h2>
      <div class="content">
        <form action="Stockmanagerproduct/Updatestocks" class="formContainer">
        <div class="user-details">
          <div class="input-box">
            <input type="text" placeholder="Enter Item ID" name="item_ID" required>
          </div>
          <div class="input-box">
            <input type="number" placeholder="Enter Amount" name="amount" required>
          </div>
</div>
          <button type="submit" name = "submit" class="btn">Update</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
</div>
      </div>
    </div>
 
    </div>

    <div class="items" id="items"  >
      <!-- products load here -->
     
    </div>
  <script type="text/javascript" src="views/js/stockmanager/product.js"></script>
    
</body>
</html>