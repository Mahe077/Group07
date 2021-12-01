<!DOCTYPE html>
<html lang="en">
<?php require 'config/PathConf.php'; ?>

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
<section class="menu" id="menu">



<div class="update">
<button id="myBtn1" class="btn1">Update Item</button>
<!-- The Modal -->
<div id="myModal1" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close1">&times;</span>
   
	<div class="container">
    <div class="title">Update Item</div>
    <div class="content">
      <form action="../controller/item update.php" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
          
            <input type="text" placeholder="Enter Item ID" name="item_ID" required>
          </div>
          <div class="input-box">
        
            <input type="number" placeholder="Enter Amount" name="amount" required>
          </div>
          <div class="button">
          <input type="submit" name="submit" value="Update">
		</div>
          </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
















        <div class="box-container">
<!--             
        <?php
 



 $records = mysqli_query($db,"SELECT item_id,item_Name,brand,price,genuine,amount,img_url FROM items"); // fetch data from database
 
 
 
 while($data = mysqli_fetch_array($records))
   
 {
 ?>
 <div class="box">
     <div class="imagebox"><img src="../model/User-images/<?=$data['img_url']?>"></div>

    <p> ID: <?php echo $data['item_id'] ?> </P>
   <p> Name: <?php echo $data['item_Name'] ?> </P>
    <p> Brand: <?php echo $data['brand'] ?> </P>
    <p> Price: <?php echo $data['price'] ?> $ </P>
    <p> <?php echo $data['genuine'] ?> </P>
    <p> Amount: <?php echo $data['amount'] ?> </P>
    
     
 </div>
 <?php
 }
 ?>
 
 <?php mysqli_close($db); // Close connection ?> -->
 
             
 

           
        
        </div>
  </section> 
  <script>
      // Get the modal
var modal = document.getElementById("myModal1");

// Get the button that opens the modal
var btn = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
    </script>
    
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