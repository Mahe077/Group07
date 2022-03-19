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
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerdashboard.css">
</head>
<body>
<body>
<div class="sidebar">
        
        <div class="logo-details">
        <img src="assets/logo.png" alt="" class="logo">
        <!-- <span class="logo-name">SLMINI Spares</span> -->
    </div>
          <ul class="nav-links">
            <li>
              <a href="Stockmanagerdashboardhome" class="active">
              <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="Stockmanagerproduct">
              <i class='bx bxs-archive'></i>
                <span class="links_name">Product</span>
              </a>
            </li>
            <li>
              <a href="Stockmanagerorderlist">
              <i class='bx bx-list-check'></i>
                <span class="links_name">Order List</span>
              </a>
            </li>
            <li>

              <a href="Stockmanagersalesreport">
              <i class='bx bx-line-chart'></i>
                <span class="links_name">Reports</span>
              </a>
            </li>
            <li>

              <a href="Stockmanagerproductreport">
              <i class='bx bx-line-chart'></i>
                <span class="links_name">Product_Reports</span>
              </a>
            </li>
            <li>
              <a href="Stockmanagerteam">
              <i class='bx bx-group'></i>
                <span class="links_name">Team</span>
              </a>
            </li>
            <li>
              <a href="Stockmanagerdelivery">
              <i class='bx bx-cart-alt' ></i>
                <span class="links_name">Delivery</span>
              </a>
            </li>
            <li>
              <a href="Stockmanagersettings">
              <i class='bx bx-cog'></i>
                <span class="links_name">Add Items</span>
              </a>
            </li>
            <li>
              <a href="Stockmanagerprofile">
              <i class='bx bxs-user'></i>
                <span class="links_name">Profile</span>
              </a>
            </li>
           
          </ul>
      </div>
      <section class="home-section">
        <nav>
          <div class="sidebar-button">
            <i class="fa fa-bars sidebarBtn" aria-hidden="true"></i>
            <!-- <i class='bx bx-list-minus'></i> -->
            <span class="dashboard">SL Mini Spares</span>
          </div>
          


          <!-- <div class="nortification-box">
          <div class="dropdown">
              <a href="Owner_updated" class="notification"><i class="fas fa-bell" id="fa-bell"><span class="count"><?php print_r($this->data[0][0]);?></span></i></a>
              <?php
                // $val  = $this->data[0][0];
              ?>
                <div class="dropdown-content">
              <?php
              
                for ($x = 0; $x <$val; $x++) {
                  echo "<div class='msg_outside'><div class='msg-date'><br>".$this->value[$x][4]."</div>
                  <div class='msg'><br>".$this->value[$x][6]."<br></div></div>";
                }
              ?>
            <div class="respond">
                <a href="Display_notifications" class='btn-del'>Respond</a>
            </div>
          </div>
      </div>
      </div> -->




























          <div class="right">
         <div class="profile-details">
         <div class="notification-box">
           
            <!-- <a href="stockmanagernotification.php" class="notifications"> <i class='bx bxs-bell'></i> </a> -->
            </div>
            <img src="<?php echo $_SESSION['image_path'] ?>" alt="">
            <div class="navbar">
            <div class="dropdown">
  <button class="dropbtn"><?php echo $_SESSION['username'] ?></button>
  <div class="dropdown-content">
    <a href="stockmanagerinfo.php">Services</a>
    <a href="Log_out">Log Out</a>
  </div>
</div>
</div> 
    </div>
  </div>
          </div>
        </nav>
      
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