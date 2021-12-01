<!DOCTYPE html>
<html lang="en">
<?php require 'config/PathConf.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerdelivery.css">

</head>
<body>
  <?php
    $this_page = "stockmanangerdelivery.php";
    include_once 'stockmanagerdashboard.php';
?>  

<div class="main-container">
    <h2>Delivery Overview</h2>

    
    <div class="flexcontainer">
        <div class="left-container">
            <img class="animation" src="img/cardriving 4.gif" alt="">
        </div>
        <div class="right-container">
            <div class="delivery">
              <p class="right-container-topic">Recent Orders</p>
              <br>
              <div class="viewbuttoncontainer">
               
                <button class="show btn">Assign Delivery</button>

                  <div class="modal">
                    <div class="modal-box">
                        <span class="close-button">X</span>
                        
                        
                            <!-- start -->
                            <div class="container">
    <div class="title">Assign Delivery</div>
    <div class="content">
      <form action="Stockmanagerdelivery/updatedelivery" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
          
            <input type="text" placeholder="Enter Order ID" name="order_ID" required>
          </div>
          <div class="input-box">
        
          <input list="select" name="company" placeholder="Assign Company" required>
            <datalist id="select">
              <option value="company 1">
              <option value="company 2">
              <option value="company 3">
              <option value="company 4">
              <option value="company 5">
              
            </datalist>
          </div>
          <div class="button">
          <input type="submit" name="submit" value="Assign">
		</div>
          </div>
      </form>
    </div>
  </div>
<!-- end -->
                    </div>
                </div>
               

</div>








                  <div class="next-container">
                    
                  <div class="request">
                <table class="table">
  <thead>
  <tr>
    <th>Order ID</th>
    <th> Delivery Date</th>
    <th>Address</th>
    <th>Delivery Company</th>
  </tr>
</thead>





                </div>
                  </div>
















              </div>
            </div>
        </div>
    </div>

</div>





</section>
<!-- <script>
  function togglepopup()
  {
    document.getElementById("popup-1").classList.toggle("active");
  }
</script> -->
<script>
let modal = document.querySelector(".modal");
let show = document.querySelector(".show");
let closeButton = document.querySelector(".close-button");

function toggleModal() {

    modal.classList.toggle("show-modal");

}

function windowOnClick(event) {

    if (event.target === modal) {

        toggleModal();

    }

}

show.addEventListener("click", toggleModal);

closeButton.addEventListener("click", toggleModal);

window.addEventListener("click", windowOnClick);
</script>
<script>
var myInput = document.getElementById("container");
myInput.onfocus = function() {
    document.getElementById("reply").style.display = "block";
  }
  
  // When the user clicks outside of the message field, hide the message box
  myInput.onblur = function() {
    document.getElementById("reply").style.display = "none";
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