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
  <?php include_once 'common_inside.php';?>
  </div>
  <section class="home-section">
  <?php include_once 'navigation_inside.php';?>
    <div class="home-content-quo">
        <div class="form-cont-quo">
            <div class="form-data-quo">
                <div class="heading">
                    <h1>Respond the quotation request <h1>
                </div>
                <form  method="POST" action="../Respond_quotation\Respond_quo" enctype="multipart/form-data">
                    <div class="form-item">
                        <input class ="input" type="number" name="Id" placeholder="id" required>
                    </div>
                    <div class="form-item">
                        <input class ="input" type="text" name="Estimate" placeholder="estimate" required>
                    </div>
                    <input type="submit" name="submit" class="submit-btn" value="Send">
                </form>           
            </div>
        </div>
        </div>
    </div>
 
    
    </section> 
    <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
    <script type="text/javascript" src="views/js/owner/nortification-display.js"></script>
      </body>
      </html>