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
  <?php include_once 'navigation.php';?>
    <div class="home-content">
        <div class="norti-container-n">
            <div class="norti-content-n">
                    <table class="tbl" collspacing="0">
                        <thead>
                            <tr class="bordered"></tr>
                            <tbody id="data">

                            </tbody>
                            <tr>
                            <?php
                               // while($row = mysqli_fetch_assoc($value)){
                                    ?>
                                    <?php ///$image=$row['old_image']; 
                                    //$id=$row['id'];?>
                                    <td data-label='order_id'>
                                        <div class="notifi">
                                            
                                        </div>
                                        </div>
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
        <div class="name"> +${obj[i].name} +</div>
        <div class="amount"> obj[i].amount</div>
        <div class="part"> obj[i].part_number</div>
        <div class="brand"> obj[i].brand </div>
        <div class="date"> obj[i].recieved_date </div>
        </div>
        <div class="respond">
                                            
            <a href="respond-quot.php?opr=accept&id=<?php //echo $row['id']?>"class='btn-ac'>Accept</a>
            <a href="respond-quot.php?opr=reject&id=<?php //echo $row['id']?>"class='btn-rj'>Reject</a>
        </div>`;
                    // '<tbody> ' +
                    // '<tr> ' +
                    // '<td> ' +  obj[i].order_id  +  '</td>' +  
                    // '<td> ' + obj[i].item_id + ' </td>' +
                    // '<td> ' + obj[i].order_date + ' </td>' +
                    // '<td> ' + obj[i].payment + ' </td>' +
                    // '<td> ' + obj[i].total_payment + ' </td>' +
                   
                       
                    //    '</tr>' + 
                    // '</tbody>'
        }
  }

}

  </script> 
    <!-- <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
    <script type="text/javascript" src="views/js/owner/nortification-display.js"></script> -->
      </body>
      </html>