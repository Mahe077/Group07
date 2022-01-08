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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
            <a href="../controller/logout.inc.php">Log Out</a>
          </div>
        </div>
      </div>
    </nav>
    <div class="home-content">
      <div class="btn-section">
        <a href="Insert_item" id="insert-btn" class="insert-btn"><div class="btn-txt">Insert New Item</div></a>
      </div>
      <div class="view_table">
        <div class="topic-row">
          <div class="topic-txt">
            Manage Products
          </div>
        </div>
        <div class="table_body">
          <table class="tbl" collspacing="0" width ="100%">
            <thead>
              <tr>
                <th>Product Id</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Size</th>
                <th>Part No</th>
                <th>Amount</th>
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
    </div> 
  </section> 
  <script>
var httprequest  = new XMLHttpRequest();

httprequest.open("POST", "Productlist/Displayitem" , true);
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
                    <td>   ${obj[i].id}    </td>
                    <td>   ${obj[i].brand}    </td>   
                    <td>   ${obj[i].type}   </td> 
                    <td>   ${obj[i].partNo}   </td> 
                    <td>   ${obj[i].partNo_Manufacturer}   </td> 
                    <td>   ${obj[i].price}   </td> 
                    <td>   ${obj[i].amount}   </td> 
                    <td>   ${obj[i].status}   </td>
                    <td class="text-center"> 
                              <a href="Productlist/View_item/${obj[i].id}"class='btn-res'> Edit </a>
                              <a href="Cancel_orders/Reject_order/${obj[i].order_id}"class='btn-del'> Delete </a>
                   </td> 
                    </tr>  
                    </tbody>`
        }
  }

}

  </script> 
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
  <script type="text/javascript" src="views/js/owner/form.js"></script>
</body>
</html>