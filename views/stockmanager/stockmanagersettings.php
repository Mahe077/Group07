<!DOCTYPE html>
<html lang="en">
<?php
    if (!isset($_SESSION['userid'])) {
        $_SESSION['error'] = 'invalidAccess';
        header("location: Log_in");
        exit();
    }
    require 'config/PathConf.php';
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagersettings.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
      .alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
    </style>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Engine", 18.94, "#b87333"],
        ["Body & Exhaust", 10.49, "silver"],
        ["Brakes", 12.30, "gold"],
        ["Cooling & Heating", 9.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Productcs According To Type",
        width: 400,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales', 'Expenses'],
          ['May',  500,      400],
          ['June',  870,      460],
          ['July',  360,       120],
          ['August',  1030,      440]
        ]);

        var options = {
          title: 'Sales Overview',
          hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
 <?php
    $this_page = "stockmanagersettings.php";
    include_once 'stockmanagerdashboard.php';
?> 
  
  <div class="home-content">
<h2>Settings</h2>
<!-- Trigger/Open The Modal -->
<button id="myBtn1" class="btn">Insert Item</button>
<!-- The Modal -->
<div id="myModal1" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close1">&times;</span>
   
	<div class="container">
    <div class="title">Insert Item</div>
    <div class="content">
      <form action="Insert_item" method="post" enctype="multipart/form-data">

        <div class="user-details">
          <div class="input-box">
          
            <input type="text" placeholder="Enter Item Name" name="item_Name" required>
          </div>
          <div class="input-box">
           
            <input type="text" placeholder="Enter Chassy Number" name="chassy_No" required>
          </div>
          <div class="input-box">
            
            <input type="text" placeholder="Enter Brand" name="brand" required>
          </div>
          <div class="input-box">
            
            <input type="text" placeholder="Enter Price" name="price" required>
          </div>
          <div class="input-box">
            
            <input type="text" placeholder="Enter Genuine/compatible" name="genuinecompatibel" required>
          </div>
          <div class="input-box">
           
            <input type="text" placeholder="Enter Discription" name="description" required>
          </div>
		  <div class="input-box">
		  
		  <input type="text" placeholder="Enter Type" name="type" required>
		</div>
		  <div class="input-box">
          
		  <input type="text" placeholder="Enter Amount" name="amount" required>
		</div>
		<div class="input-box">
		 
		  <input type="text" placeholder="Enter Color" name="color" required>
		</div>
		<div class="input-box">
		  
		  <input type="text" placeholder="Enter Size" name="size" required>
		</div>
		
		<div class="input-box">
		 
		  <input type="file" placeholder="Enter Image" name="file" required>
		</div>
        </div>
        
        <div class="button">
          <input type="submit" name="submit" value="Insert">
		</div>
        </div>
      </form>
    </div>
  </div>

</div>
</div>


<div class="flex-container">
  <div class="flex-left"><div class="chart-container">
<div id="columnchart_values" ></div>
      </div></div>
  <div class="flex-right">
    <div class="right-container">
    <div id="chart_div" style="margin:10px width: 100%; height: 500px;"></div>
    </div>
  </div>
</civ>

</section>
<script src="js/stock manager settings.js"></script>
</body>
</html>
