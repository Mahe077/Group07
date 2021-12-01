<?php
if (!isset($_SESSION['userid'])) {
  $_SESSION['error'] = 'invalidAccess';
  header("location: Log_in");
  exit();
}
require 'config/PathConf.php';
  //  require_once('../config/dbconfig.php');
  //  $db= new Stockfunc();
  //  $value=$db->view_stock_manager();
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Owner Dashboard |SL MINI Spares  </title>
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner_updated.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner-stock.css">
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
        <div class="btn-section"><a href="insert-stockmanager" id="insert-btn" class="insert-btn"><div class="btn-txt">Insert Stock Manager</div></a></div>
        <?php
          $db->display_msg();
        ?>
        <div class="topic-row">
          <div class="topic-txt">
            Stock Manager
          </div>
        </div>
        <div class="cat-table">
        
        <table class="tbl" >
                <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Lastname</th>
                    <th>username</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Image</th>
                    <th colspan="2" class="text-center">Operations</th>
                </tr>
                <tr class="bordered"></tr>
                <tr>
                    <?php
                        while($row = mysqli_fetch_assoc($value)){
                        ?>
                        <?php $image=$row['image'];?>
                        <td data-label='fname'><?php echo $row['fname']; ?></td>
                        <td data-label='lname'><?php echo $row['lname']; ?></td>
                        <td data-label='username'><?php echo $row['username']; ?></td>
                        <td data-label='email'><?php echo $row['email']; ?></td>
                        <td data-label='contact'><?php echo $row['contact']; ?></td>
                        <td data-label='image'><img src="img/<?php echo $image?>" height="150px" width="180px" ></td>
                        <td class="text-center">
                                <a href="delete-stock.php?id=<?php echo $row['id']?>"class='btn-del'>Delete</a>
                        </td>
                        </tr>
                        <?php  
                        }
                        ?>
                </thead>
            </table>
        </div>
    </div>
    
</section> 
<script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
<script type="text/javascript" src="views/js/owner/form.js"></script>
</body>
</html>