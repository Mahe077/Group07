<!DOCTYPE html>
<html lang="en">
<?php require 'config/PathConf.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerteam.css">
</head>
<body>
<?php
    $this_page = "stockmanagerteam.php";
    include_once 'stockmanagerdashboard.php';
?>


<div class="container">
<!-- <input type="submit" class="printbutton" name="submit" value="Print"> -->
    <h2>Team</h2>
    <div class="card-container">
      <div class="card">
        <div class="image-container">
      <img src="assets/pagecontains/team.svg" class="image" alt="">
      <h3>Warehouse 01</h3>
      <p>Kahathuduwa</p>
      <button class="viewbutton">View More</button>

        </div>
      </div>
      <div class="card">
      <div class="image-container">
      <img src="assets/pagecontains/team2.svg" class="image" alt="">
      <h3>Warehouse 02</h3>
      <p>Kandana</p>
      <button class="viewbutton">View More</button>
          </div>
      </div>
      <div class="card">
      <div class="image-container">
      <img src="assets/pagecontains/team3.svg" class="image" alt="">
      <h3>Warehouse 03</h3>
      <p>Piliyandala</p>
      <button class="viewbutton">View More</button>
          </div>
      </div>
      <div class="card">
      <div class="image-container">
      <img src="assets/pagecontains/team4.svg" class="image" alt="">
      <h3>Warehouse 04</h3>
      <p>Rathmalana</p>
      <button class="viewbutton">View More</button>
          </div>
      </div>
    </div>
</div>



</div>
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