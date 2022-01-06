<?php
if (!isset($_SESSION['userid'])) {
  $_SESSION['error'] = 'invalidAccess';
  header("location: Log_in");
  exit();
}
require 'config/PathConf.php';
  // require_once('../config/dbconfig.php');
  // $db = new operations();
  // $result=$db->view_record_update();
  // $cat=$db->view_cat();
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
  <?php include_once 'navigation.php';?>

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
                <th colspan="3" class="text-center">Operations</th>
               </tr>
               <tr class="bordered"></tr>
              <tbody id="data">

              </tbody>
               <tr>
                 <?php
                    //while($row = mysqli_fetch_assoc($result)){
                      ?>
                      <td data-label='id'><?php //echo $row['id']; ?></td>
                      <td data-label='brand'><?php //echo $row['brand'] ;?></td>
                      <td data-label='price'><?php //echo $row['price']; ?></td>
                      <td data-label='size'><?php //echo $row['size']; ?></td>
                      <td data-label='partNo'><?php //echo $row['partNo'] ;?></td>
                      <td data-label='amount'><?php //echo $row['amount']; ?></td>

                      <td class="text-center" data-label='status'>
                        <?php
                          //if(//$row['status']=='1'){
                            //echo " Active";
                          //}else{
                           //// echo " Deactivate";
                          //}
                        ?>
                      </td>
                      <td class="text-center">
                        <?php
                        //if($row['status']=='1'){
                          //echo "<a href='update-item.php?opr=deactive&id=".$row['id']."'class='btn-rj'> Deactive </a>";
                        //}else{
                         // echo "<a href='update-item.php?opr=active&id=".$row['id']."'class='btn-ac'> Active </a>";
                       //}

                        ?>
                        <a href="edit-item.php?id=<?php //echo $row['id']?>"class='btn-res'>Edit</a>
                        <a href="delete-item.php?id=<?php //echo $row['id']?>"class='btn-del'>Delete</a>
                      </td>
                      </tr>
                      <?php  
                    //}
                    ?> 
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
                    '<tbody> ' +
                    '<tr> ' +
                    '<td> ' +  obj[i].brand  +  '</td>' +  
                    '<td> ' + obj[i].type + ' </td>' +
                    '<td> ' + obj[i].partNo + ' </td>' +
                    '<td> ' + obj[i].partNo_Manufacturer + ' </td>' +
                    '<td> ' + obj[i].price + ' </td>' +
                    '<td> ' + obj[i].amount + ' </td>' +
                   
                       
                       '</tr>' + 
                    '</tbody>'
        }
  }

}

  </script> 
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
  <script type="text/javascript" src="views/js/owner/form.js"></script>
</body>
</html>