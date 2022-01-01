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
    <?php include_once 'navigation.php';?>
    <div class="home-content-cat">
      <div class="btn-section-cat">
        <a href="Insert_category" id="insert-btn" class="insert-btn"><div class="btn-txt-cat">Insert New Category</div></a>
      </div>
      <div class="cat-table">
        <?php 
          //$db->display_msg();
          
        ?>
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
                    <th colspan="2" class="text-center">Operations</th>
                </tr>
                <tr class="bordered"></tr>
                <tbody id="data">

               </tbody>
                <tr>
                    <?php
                        //while($row = mysqli_fetch_assoc($value)){
                        ?>
                        <td data-label='id'><?php //echo $row['id']; ?></td>
                        <td data-label='category'><?php //echo $row['category_name']; ?></td>

                        <td class="text-center">
                            <a href="delete-cat.php?id=<?php //echo $row['id']?>"class='btn-del'>Delete</a>
                        </td>
                        </tr>
                        <?php  
                        //}
                        ?>
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
                    '<tbody> ' +
                    '<tr> ' +
                    '<td> ' +  obj[i].category_name  +  '</td>' +  
                    '<td> ' + obj[i].status + ' </td>' +
                    
                       '</tr>' + 
                    '</tbody>'
        }
  }

}

  </script>  
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
  <script type="text/javascript" src="views/js/owner/form-cat.js"></script>
</body>
</html>