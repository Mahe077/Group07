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
    <?php include_once 'common_inside.php';?>
    </div>
  <section class="home-section">
  <?php include_once 'navigation_inside.php';?>
    <div class="home-content">
    <?php //print_r($this->data);
    echo "<div class='show_item'>
    <div class='show_item_inside'>
      <div class='view_item'>
        <h1> ".$this->data[0][0]." </h1>
        <img src=http://localhost/G7/Group07/".$this->data[0][8]." alt='' class='img_item'>
      </div>
      <div class='view_item_data'>
          
          <h1>Product type :  ".$this->data[0][1]." </h1>
          <h1>Product price :  ".$this->data[0][2]." </h1>
          <h1>Size :  ".$this->data[0][3]." </h1>
          <h1>Part Number Manufacturer :  ".$this->data[0][4]." </h1>
          <h1>Part Number :  ".$this->data[0][5]." </h1>
          <h1>Product amount :  ".$this->data[0][6]." </h1>
          <h1>Product color :  ".$this->data[0][7]." </h1>
      </div>
    </div>
    </div>" 
    ?>
    <div class="back-btn">
        <a href="http://localhost/G7/Group07/New_orders"class='btn-res'> Back </a>
    </div>
    </div>
  </section> 
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
</body>
</html>