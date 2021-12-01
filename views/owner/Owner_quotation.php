<?php
if (!isset($_SESSION['userid'])) {
    $_SESSION['error'] = 'invalidAccess';
    header("location: Log_in");
    exit();
  }
  require 'config/PathConf.php';
//    require_once('../config/dbconfig.php');
//    $db= new Ownerquotation();
//    $value=$db->view_quotation();
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
                <?php $db->display_msg();?>
                    <table class="tbl" collspacing="0">
                        <thead>
                            <tr class="bordered"></tr>
                            <tr>
                            <?php
                                while($row = mysqli_fetch_assoc($value)){
                                    ?>
                                    <?php $image=$row['old_image']; 
                                    $id=$row['id'];?>
                                    <td data-label='order_id'>
                                        <div class="notifi">
                                            <div class="notifi-img">
                                                <img src="img/<?php echo $image; ?>" height="80px" width="80px">
                                            </div>
                                            <div class="notifi-details">
                                                <div class="name"><b>Name : </b><?php echo $row['name']; ?><br></div>
                                                <div class="amount"><b>Amount : </b><?php echo $row['amount']; ?><br></div><br>
                                                <div class="part"><b>Part No : </b><?php echo $row['part_number']; ?><br></div><br>
                                                <div class="brand"><b>Brand : </b><?php echo $row['brand']; ?><br></div><br>
                                                <div class="date"><b>Recieved date : </b><?php echo $row['received_date']; ?></div><br>
                                            </div>
                                            <div class="respond">
                                            <?php
                                                // $db->update_notification($id);
                                            ?>
                                            <a href="respond-quot.php?opr=accept&id=<?php echo $row['id']?>"class='btn-ac'>Accept</a>
                                            <a href="respond-quot.php?opr=reject&id=<?php echo $row['id']?>"class='btn-rj'>Reject</a>
                                        </div>
                                        </div>
                                    </td>
                                    </tr>
                                    <?php  
                                }
                                ?>
                        </thead>
                    </table>   
                </div>
            </div>
        </div>
    </div>
 
    
    </section> 
    <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
    <script type="text/javascript" src="views/js/owner/nortification-display.js"></script>
      </body>
      </html>