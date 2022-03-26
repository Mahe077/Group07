<?php
if (!isset($_SESSION['userid'])) {
  $_SESSION['error'] = 'invalidAccess';
  header("location: Log_in");
  exit();
}
require 'config/PathConf.php';
  //  require_once('../config/dbconfig.php');
  //  $db= new Categoryfunc();
  //  $value=$db->view_record();
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
    <div class="home-content-cat">
      <div class="btn-section-cat">
        <a href="Insert_category" id="insert-btn" class="insert-btn"><div class="btn-txt-cat">Insert New Category</div></a>
      </div>
      <div class="cat-table">
        <div class="topic-row">
          <div class="topic-txt">
            Manage Category
          </div>
        </div>
        
        <table class="tbl" collspacing="0" width ="100%">
          <thead>
                <tr>
                    <th >Category ID</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th colspan="2" class="text-center">Operations</th>
                </tr>
                <tr class="bordered"></tr>
                <tbody id="data">

               </tbody>
            </thead>
          </table>
      </div>     
    </div>         
  </section>
  <script>
var httprequest  = new XMLHttpRequest();

httprequest.open("POST", "Categorylist/Displaycat" , true);
const rows = document.getElementById("data");
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
                    `<tbody>
                    <tr>  
                    <td>    ${obj[i].id}    </td>
                    <td>    ${obj[i].category_name}    </td> 
                    <td>    ${obj[i].status}    </td>
                    <td class="text-center"> 
                              <a href="Categorylist/Delete_cat/${obj[i].id}"class='btn-res'> Remove </a>
                   </td>   
                    </tr> 
                    </tbody>`
        }
  }

}

  </script>  
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
  <script type="text/javascript" src="views/js/owner/form-cat.js"></script>
</body>
</html>