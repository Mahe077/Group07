<?php
    if (!isset($_SESSION['userid'])) {
        $_SESSION['error'] = 'invalidAccess';
        header("location: Log_in");
        exit();
    }
    require 'config/PathConf.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerreportformat.css">
    <title>Document</title>
</head>
<body>
<?php
    $this_page = "stockmanagerreportformat.php";
    include_once 'stockmanagerdashboard.php';
?>
<div class="main-container">

<h1>Select Your Report Fromat</h1>
    <div class="input-container">
    <div class="card1">
     <h2> Sales Reports </h2>
      <div class="image-container">
      <img src="assets/pagecontains/sales.svg" alt="">
      <div>
       <a href="Stockmanagersalesreport"  class="container-button">View Report</a>
       </div>
      </div>
      </div>
      
      
    <div class="card1">
     <h2> Sales Reports </h2>
      <div class="image-container">
      <img src="assets/pagecontains/sales.svg" alt="">
      <div>
       <a href="Stockmanagerproductreport"  class="container-button">View Report</a>
       </div>
      </div>
      </div>
      </div>
</div>

</body>
</html>