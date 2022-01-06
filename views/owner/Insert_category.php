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
  <?php include_once 'common.php';?>
  </div>
  <section class="home-section">
    <?php include_once 'navigation.php';?>
    <div class="home-content-cat">    
      <div class="form-container-cat">
        <div class="item-content-cat">
          <form  method="POST" action="Insert_category/Insert_cat" enctype="multipart/form-data">
                <?php //$db->insert_cat(); ?>
                <div class="item-form">
                    <input class ="input" type="text" name="category" placeholder="Category" required>
                </div>
                <input type="submit" name="submit" class="item-btn" value="Insert Category">
          </form>
        </div>
      </div> 
    </div>         
  </section> 
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
  <script type="text/javascript" src="views/js/owner/form-cat.js"></script> 
</body>
</html>