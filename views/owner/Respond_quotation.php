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
    <title> Owner Dashboard |SL MINI Spares </title>
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner_updated.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner-quotation.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
  <?php include_once 'common_inside.php';?>
  </div>
  <section class="home-section">
  <nav>
      <div class="sidebar-button">
        <i class="fa fa-bars sidebarBtn" aria-hidden="true"></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="nortification-box">
          <div class="dropdown">
              <a href="Display_notifications" class="notification"><i class="fas fa-bell" id="fa-bell"><span class="count"><?php print_r($this->data[0][0]);?></span></i></a>
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
            <a href="../controller/logout.inc.php">Log Out</a>
          </div>
        </div>
      </div>
    </nav>
    <div class="home-content-quo">
        <div class="form-cont-quo">
            <div class="form-data-quo">
                <div class="heading">
                    <h1>Respond the quotation request <h1>
                </div>
                <form  method="POST" action="../Respond_quotation\Respond_quo" enctype="multipart/form-data">
                    <div class="form-item">
                        <input class ="input" type="number" name="Id" placeholder="id" required>
                    </div>
                    <div class="form-item">
                        <input class ="input" type="text" name="Estimate" placeholder="estimate" required>
                    </div>
                    <input type="submit" name="submit" class="submit-btn" value="Send">
                </form>           
            </div>
        </div>
        </div>
    </div>
 
    
    </section> 
    <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
    <script type="text/javascript" src="views/js/owner/nortification-display.js"></script>
      </body>
      </html>