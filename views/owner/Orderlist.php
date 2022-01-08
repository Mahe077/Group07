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
  <?php include_once 'views/owner/common.php';?>
  </div>
  <section class="home-section">
  <nav>
      <div class="sidebar-button">
        <i class="fa fa-bars sidebarBtn" aria-hidden="true"></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="nortification-box">
          <div class="dropdown">
          <a href="Orderlist" class="notification"><i class="fas fa-bell" id="fa-bell"><span class="count"><?php print_r($this->data[0][0]);?></span></i></a>
          <?php
            $val  = $this->data[0][0];
          ?>
            <div class="dropdown-content">
          <?php
          
            for ($x = 0; $x <$val; $x++) {
              echo "<br>".$this->value[$x][6]." <br>";
            }
          ?>
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
      <div class="overview-boxes">
        <div class="view_table_order">
          <div class="view_table_btn">
            <a href="New_orders" id="insert-btn-new" class="insert-btn"><button class="btn-order" >New Orders
          </button></a>
          </div>
        </div>
        <div class="view_table_order">
          <div class="view_table_btn">
            <a href="Pending_orders" id="insert-btn-pend" class="insert-btn"><button class="btn-order" >Pending Orders
            </button></a>
          </div>
        </div>
        <div class="view_table_order">
          <div class="view_table_btn">
            <a href="Cancel_orders" id="insert-btn-cancel" class="insert-btn"><button class="btn-order" >Cancelled Orders</button></a>
          </div>
        </div>
        <div class="view_table_order">
          <div class="view_table_btn">
          <a href="Return_orders" id="insert-btn-ret" class="insert-btn"><button class="btn-order" >Returned Orders
          </button></a>
          </div>
        </div>
      </div>
      <div  class="table_body_new">
            <table class="tbl" collspacing="0">
              <tr>
                <th>Order id</th>
                <th>Order date</th>
                <th>Approximated date</th>
                <th>Delivery request</th>
                <th>Total payment</th>
                <th>Payment</th>
              </tr> 
              <tr class="bordered"></tr>
              <tbody id="data">
              <!-- new orders will be displayed here -->
              </tbody>
            </table> 
          </div> 
  </section>
  <script>
var httprequest  = new XMLHttpRequest();

httprequest.open("POST", "Orderlist/Displayorder" , true);
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
                    '<tbody> ' +
                    '<tr> ' +
                    '<td> ' +  obj[i].order_id  +  '</td>' +  
                    '<td> ' + obj[i].order_date  + ' </td>' +
                    '<td> ' + obj[i].approximated_date + ' </td>' +
                    '<td> ' + obj[i].delivery_request + ' </td>' +
                    '<td> ' + obj[i].total_payment + ' </td>' +
                    '<td> ' + obj[i].payment + ' </td>' + 
                       '</tr>' + 
                    '</tbody>'
        }
  }

}

  </script>   
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
  <script type="text/javascript" src="views/js/owner/displayorders.js"></script>
</body>
</html>