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
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner-stock.css">
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

    <div class="home-content">
        <div class="form-container">
            <div class="item-content">
            <form  method="POST" action="Insert_stockmanager/insert_stock" enctype="multipart/form-data">
                <div class="input-box-container">
                <div class="input-boxes">
                    <div class="item-form">
                        <input class="input" name="position" type="text" placeholder="Position" required>
                    </div><br>
                    <div class="item-form">
                        <input class="input" name="fname"type="text" placeholder="fname" required>
                    </div><br>
                    <div class="item-form">
                        <input class="input" name="lname"  type="text" placeholder="lname" required>
                    </div><br>
                    <div class="item-form">
                        <input class="input" name="username" type="text" placeholder="Username" required>
                    </div><br>
                    <div class="img-file">
                    <input class="input" name="img" id= "file" type="file" accept="image/*">
                    <i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp
                    <label for="file">Choose an image</label>
                    </div><br>
                </div>
                <div class="input-boxes"> 
                <div class="item-form">
                        <input class="input" name="password" type="text" placeholder="Password" required>
                    </div><br>
                    <div class="item-form">
                        <input class="input" name="email" type="text" placeholder="email" required>
                    </div><br>  
                    <div class="item-form">
                    <input class="input" name="address" type="text" placeholder="Address" required>
                    </div><br>
                    <div class="item-form">
                    <input class="input" name="contact" type="text" placeholder="contact" required>
                    </div><br>
                    <div class="item-form">
                    <input class="input" name="dob" type="date" placeholder="Birth date" required>
                    </div><br>
                    <input type="submit" name="submit" class="item-btn" value="submit">
                </div>
                </div>
          </form>
            </div>
        </div>
    </div>
    
</section> 
<script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
</body>
</html>