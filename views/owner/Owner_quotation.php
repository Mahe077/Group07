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
        <div class="norti-container-n">
            <div class="norti-content-n">
                    <table class="tbl" collspacing="0">
                        <thead>
                            <div id="notifi"> 
                                          <!-- quotations will load here    -->
                            </div>             
                        </thead>
                    </table>   
                </div>
            </div>
        </div>
    </div>
 
    
    </section> 

    <script>
var httprequest  = new XMLHttpRequest();

httprequest.open("POST", "Owner_quotation/Displayquotation" , true);
const rows = document.getElementById("notifi");
httprequest.send();
httprequest.onreadystatechange = function()
{
  if( httprequest.readyState == 4 && httprequest.status == 200)
  {
        var obj = JSON.parse(httprequest.responseText);
        var html = "";
        for(var i = 0 ; i< obj.length ; i++)
        {
          rows.innerHTML +=
        `<div class="notifi-details">
          <div class='view_item_s'>
            <img src=http://localhost/G7/Group07/${obj[i].old_image} alt='' class='img_item_s'>
          </div>
            <div class= "special">
            <div class="name"> ${obj[i].name} </div>
              <div class="name"> ${obj[i].name} </div>
              <div class="amount"> ${obj[i].amount}</div>
              <div class="part"> ${obj[i].part_number}</div>
              <div class="brand"> ${obj[i].brand} </div>
            </div>
            <div class="respond">                                
              <a href="Respond_quotation/view_respond" class='btn-ac'>Accept</a>
              <a href="Respond_quotation/Reject_quotation/${obj[i].id}" class='btn-rj'>Reject</a>
            </div>
        </div>`;
        }
  }

}

  </script> 
    <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
    <script type="text/javascript" src="views/js/owner/nortification-display.js"></script>
      </body>
      </html>