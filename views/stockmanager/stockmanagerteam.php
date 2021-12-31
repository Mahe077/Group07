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
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerteam.css">
</head>
<body>
<?php
    $this_page = "stockmanagerteam.php";
    include_once 'stockmanagerdashboard.php';
?>



<div class="container">

    <h2>Team</h2>
    <div class="card-container">
      <div class="card" >
        <div class="image-containers">
      <img src="assets/pagecontains/team.svg" class="image" alt="">
      <h3>Warehouse 01</h3>
     
     
      <button class="container-button" onclick="display1()">View More</button>


        </div>
      </div>
      <div class="card">
      <div class="image-containers">
      <img src="assets/pagecontains/team2.svg" class="image" alt="">
      <h3>Warehouse 02</h3>
     
      
      <button class="container-button" onclick="display2()">View More</button>
          </div>
      </div>
      <div class="card">
      <div class="image-containers">
      <img src="assets/pagecontains/team3.svg" class="image" alt="">
      <h3>Warehouse 03</h3>
    
     

      <button class="container-button" onclick="display3()">View More</button>
          </div>
      </div>
      <div class="card">
      <div class="image-containers">
      <img src="assets/pagecontains/team4.svg" class="image" alt="">
      <h3>Warehouse 04</h3>
     
     
      <button  onclick="display4()" class="container-button">View More</button>
          </div>
      </div>
    </div>
</div>

<div class="detail-container1" id="detail-container1">
  
  Warehouse 01
   <h1>Stockmanager Infromation</h1>
    <div class="sub-container">
        <div class="image-container">
            
            <div class="name">
                 <h1> Warehouse 01 </h1>
            </div>
            
        </div>
        <div class="detail-container1" id="dic">
        <!-- <div class="image1">
                image
            </div> -->
        <!-- <form action="#">
        <label for="stockmanagerid">Stockmanager Id</label>
        <input type="text" id="id" name="firstname" value="" readonly>
        <br>
        <label for="stockmanagername">Stockmanager Name</label>
        <input type="text" id="name" name="lastname"  readonly>
        <br>
        <label for="warehouseloation">Warehouse Location</label>
        <input type="text" id="sname" name="lastname"  readonly>
        <br>
        <label for="starteddate">Started Date</label>
        <input type="text" id="started_date" name="lastname" value="" readonly>
        <br>
        <label for="dateofappointed">Date of appointed</label>
        <input type="text" id="date" name="lastname" value="" readonly>
        <br>
        <button type="submit" ><a href="Stockmanagerteam">Back</a></button>
        
        </form> -->
        </div>
    </div>
</div>
<div class="detail-container2" id="detail-container2">
  
  Warehouse 02
  <h1>Stockmanager Infromation</h1>
    <div class="sub-container">
        <div class="image-container">
            
            <div class="name">
                 <h1> Warehouse 02 </h1>
            </div>
            <!-- <div class="image1">
                image
            </div> -->
        </div>
        <div class="details-container2">
        <!-- <form action="#">
        <label for="stockmanagerid">Stockmanager Id</label>
        <input type="text" id="id" name="firstname" value="" readonly>
        <br>
        <label for="stockmanagername">Stockmanager Name</label>
        <input type="text" id="name" name="lastname"  readonly>
        <br>
        <label for="warehouseloation">Warehouse Location</label>
        <input type="text" id="sname" name="lastname"  readonly>
        <br>
        <label for="starteddate">Started Date</label>
        <input type="text" id="started_date" name="lastname" value="" readonly>
        <br>
        <label for="dateofappointed">Date of appointed</label>
        <input type="text" id="date" name="lastname" value="" readonly>
        <br>
        <button type="submit" ><a href="Stockmanagerteam">Back</a></button>
        
        </form> -->
        </div>
    </div>
</div>
<div class="detail-container3" id="detail-container3">
  
  Warehouse 03
  <h1>Stockmanager Infromation</h1>
    <div class="sub-container">
        <div class="image-container">
            
            <div class="name">
                 <h1> Warehouse 03 </h1>
            </div>
            <!-- <div class="image1">
                image
            </div> -->
        </div>
        <div class="details-container3">
        <!-- <form action="#">
        <label for="stockmanagerid">Stockmanager Id</label>
        <input type="text" id="id" name="firstname" value="" readonly>
        <br>
        <label for="stockmanagername">Stockmanager Name</label>
        <input type="text" id="name" name="lastname"  readonly>
        <br>
        <label for="warehouseloation">Warehouse Location</label>
        <input type="text" id="sname" name="lastname"  readonly>
        <br>
        <label for="starteddate">Started Date</label>
        <input type="text" id="started_date" name="lastname" value="" readonly>
        <br>
        <label for="dateofappointed">Date of appointed</label>
        <input type="text" id="date" name="lastname" value="" readonly>
        <br>
        <button type="submit" ><a href="Stockmanagerteam">Back</a></button>
        
        </form> -->
        </div>
    </div>

  </form>
</div>
<div class="detail-container4" id="detail-container4">
  
  Warehouse 04
  <h1>Stockmanager Infromation</h1>
    <div class="sub-container">
        <div class="image-container">
            
            <div class="name">
                 <h1> Warehouse 04 </h1>
            </div>
            <!-- <div class="image1">
                image
            </div> -->
        </div>
        <div class="details-container4">
        <!-- <form action="#">
        <label for="stockmanagerid">Stockmanager Id</label>
        <input type="text" id="id" name="firstname" value="" readonly>
        <br>
        <label for="stockmanagername">Stockmanager Name</label>
        <input type="text" id="name" name="lastname"  readonly>
        <br>
        <label for="warehouseloation">Warehouse Location</label>
        <input type="text" id="sname" name="lastname"  readonly>
        <br>
        <label for="starteddate">Started Date</label>
        <input type="text" id="started_date" name="lastname" value="" readonly>
        <br>
        <label for="dateofappointed">Date of appointed</label>
        <input type="text" id="date" name="lastname" value="" readonly>
        <br>
        <button type="submit" ><a href="Stockmanagerteam">Back</a></button>
        
        </form> -->
        </div>
    </div>

  </form>
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
      <script type="text/javascript" src="views/js/stockmanager/team.js"></script>
</body>
</html>