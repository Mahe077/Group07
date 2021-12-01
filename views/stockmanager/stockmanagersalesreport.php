<!DOCTYPE html>
<html lang="en">
<?php require 'config/PathConf.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagersalesreport.css">
    <title>Document</title>
</head>
<body>
<?php
    $this_page = "stockmanagersalesreport.php";
    include_once 'stockmanagerdashboard.php';
?>
<div class="main-container">

<div class="report-container">
<div class="graphcontainer">
<h3>Result</h3>
</div>
<div class="selectoptions">
<h3>Report Type</h3>
<div class="selections">
               <div class="duration-select">
               <label>Duration</label>
                 <select class="common">
                    
                   <option value="1">Monthly</option>
                   <option value="3">Weekly</option>
                   <option value="2">Daily</option>
                 </select>
                 <span class="custom-arrow"></span>
               </div>
               <label for="submit">starting Date</label>
               <input type="date" class="button" name="submit" value="starting Date">  
               <br>
               <label for="submit">Ending Date</label>
               <input type="date" class="button" name="submit" value="Ending Date">  
                <br>
               <input type="submit" class="viewbutton" name="submit" value="View">
</div>
<div class="button-container">

<input type="submit" class="printbutton" name="submit" value="Print">
<input type="submit" class="printbutton" name="submit" value="Back">
</div>
</div>
</div>
</div>
<div class="table-container">
     <table class="table">
  <thead>
  <tr>
    <th>Bill ID</th>
    <th>Full Name</th>
    <th>Bill Number</th>
    <th>Bill Type</th>
    <th>Date</th>
    <th>User Names</th>
  </tr>
</thead>
<tbody>
  <tr>
</tr>
</tbody>
</table>
</div>
</body>
</html>