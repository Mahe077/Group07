<?php
if (!isset($_SESSION['userid'])) {
  $_SESSION['error'] = 'invalidAccess';
  header("location: Log_in");
  exit();
}
require 'config/PathConf.php';
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Owner Dashboard |SL MINI Spares  </title>
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner_updated.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner-test.css">
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
  <?php include_once 'common.php';?>
  </div>
  <section class="home-section">
  <nav>
      <div class="sidebar-button">
        <i class="fa fa-bars sidebarBtn" aria-hidden="true"></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="nortification-box">
          <div class="dropdown">
              <a href="Owner_updated" class="notification"><i class="fas fa-bell" id="fa-bell"><span class="count"><?php print_r($this->data[0][0]);?></span></i></a>
              <?php
                $val  = $this->data[0][0];
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
      </div>
      <div class="profile-details">
        <img src="\G7/Group07/assets/users/admin.jpg" alt="">
        <span class="admin_name">KHW</span>
        <div class="dropdown">
          <button class="dropbtn"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>
          <div class="dropdown-content">
            <a href="Log_out">Log Out</a>
          </div>
        </div>
      </div>
    </nav>
    <div class="form-container-product">
        <div class="side-image">
                <img src="\G7/Group07/assets/ui_images/product.jpg" alt="">
        </div>
        <div class="item-content-product">
          
            <form  method="POST" action="Insert_product/insert_product" enctype="multipart/form-data">
                  <div class="input-box-container">
                    <div class="input-boxes">
                      <div class="item-form">
                          <input class="input" name="name" type="text" placeholder="name" required>
                      </div>
                    <div class="item-form">
                      <div class="slt">
                        <select name="type" id="select-opt" class="input" required>
                        <option value="">Select Category</option>
                          <option value="Genuin">Service Parts</option>
                          <option value="Compatible">Brakes</option>
                          <option value="Compatible">Engine</option>
                          <option value="Compatible">Suspension And Steering</option>
                          <option value="Compatible">Transmission</option>
                          <option value="Compatible">Cooling & Heating</option>
                          <option value="Compatible">Electrical & Lighting</option>
                        </select>
                      </div></div>
                        <div class="item-form">
                        <textarea id="dec" name="description" placeholder="Write something.." required></textarea>
                        </div>
                     </div><br>
                     <input type="submit" name="submit" class="item-btn" value="Next     >>">
                  </div>
            </form>
        </div> 
    </div>   
  </section> 
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
</body>
</html>