<!DOCTYPE html>
<html lang="en">
<?php require 'config/PathConf.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerreportview.css">
</head>
<body>
<?php
    $this_page = "stockmanagerreportview.php";
    include_once 'stockmanagerdashboard.php';
?>
<div class="container">
<!-- <input type="submit" class="printbutton" name="submit" value="Print"> -->
    <p class="topic">
        Reports
    </p>
  
    <div class="input-container">
    <div class="card1">
     <h2> Sales Reports </h2>
      <div class="image-container">
      <img src="assets/pagecontains/sales.svg" alt="">
      </div>
      <a href="Stockmanagersalesreport"  class="container-button">View Report</a>
    </div>
    <div class="card1">
     <h2> Product Reports </h2>
     <div class="image-container">
      <img src="assets/pagecontains/product.svg" alt="">
      </div>
      <a href="Stockmanagerproductreport"  class="container-button">View Report</a>
    </div>
    </div>  
</div>
<!-- display a bar chart -->
</section> 
    <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
     sidebarBtn.onclick = function() {
       sidebar.classList.toggle("active");
       if(sidebar.classList.contains("active")){
       sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
     }else
       sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
     }
      </script>
</body>
</html>