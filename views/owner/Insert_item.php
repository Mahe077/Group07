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
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/alert.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar"><?php include_once 'common.php';?></div>
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
                <a href="Display_notifications" class='respond_btn'>Respond</a>
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
   <div class="form-container">
   
        <div class="item-content">
            <!--  error alerting will display here -->
          <?php
            include_once 'views/global/alert.php';
            ?>
            <form  method="POST" action="<?php echo $localhost; ?>insert_item/insert/<?php echo $this->id; ?>" enctype="multipart/form-data">
                  <div class="input-box-container">
                    <div class="input-boxes">
                      <div class="item-form">
                        <input class="input" name="brand" type="text" placeholder="brand " required>
                      </div>
                      <div class="item-form">
                        <input class="input" name="price" type="text" placeholder="price" required>
                      </div>
                      <div class="item-form">
                        <input class="input" name="partNo" type="text" placeholder="partNo" required>
                      </div>
                      <div class="img-file">
                        <input class="input" name="img" id= "file" type="file" accept="image/*">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp
                        <label for="file">Choose an image</label>
                      </div><br>
                      <input type="submit" name="submit" class="item-btn" value="Insert New Item">
                    </div>
                    <div class="input-boxes">
                      <div class="slt">
                        <select name="genuine" id="select-opt" class="input" required>
                        <option value="">Select type</option>
                          <option value="Genuin">Genuin</option>
                          <option value="Compatible">Compatible</option>
                        </select>
                      </div>
                      <div class="item-form">
                        <input class="input" name="partNo_Manufacturer" type="text" placeholder="partNo_Manufacturer" required>
                      </div>
                      <div class="item-form">
                        <input class="input" name="amount" type="text" placeholder="Amount" required>
                      </div>
                      <div class="item-form">
                        <input class="input" name="size" type="text" placeholder="Size" required>
                      </div>
                      <div class="item-form">
                        <input class="input" name="color" type="text" placeholder="color" required>
                      </div>
                    </div>      
                  </div>
            </form>
          </div>
          </div>  
      </div>
  </section>
  <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
</body>
</html>