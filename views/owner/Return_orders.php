<?php
if (!isset($_SESSION['userid'])) {
  $_SESSION['error'] = 'invalidAccess';
  header("location: Log_in");
  exit();
}
require 'config/PathConf.php';
      //  require_once('../config/dbconfig.php');
      //  $db= new Functions_orderlist();
      //  $result=$db->view_ret_order();
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
    <?php include_once 'navigation.php';?>
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
        <div class="view_table_cancel" id="view_table_cancel">
              <div class="topic-row">
                <div class="topic-txt">
                  Manage Returned Orders
                </div>
              </div>
            <div class="table_body">
              <table class="tbl" collspacing="0">
                <thead>
                  <tr>
                    <th>Order Id</th>
                    <th>Item Name</th>
                    <th>Order date	</th>
                    <th>Payment</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th  colspan="2" class="text-center">Operations</th>
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

httprequest.open("POST", "Return_orders/Displayorder" , true);
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
                    '<td> ' + obj[i].item_id + ' </td>' +
                    '<td> ' + obj[i].order_date + ' </td>' +
                    '<td> ' + obj[i].payment + ' </td>' +
                    '<td> ' + obj[i].total_payment + ' </td>' +
                   
                       
                       '</tr>' + 
                    '</tbody>'
        }
  }

}

  </script> 
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
</body>
</html>