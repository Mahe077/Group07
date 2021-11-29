<!-- <?php

$conn = mysqli_connect("localhost","root","","projectsample");

if($conn)
{
    // echo "connected";
}
?> -->


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
<?php require 'config/PathConf.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/stockmanagerdashboardhome.css">
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerdashboardhome.css">

<!-- chart starts-->
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['order', 'number'],
          <?php
             $sql = "SELECT * FROM orderoverview";
            $fire = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_assoc($fire))
            {
                echo "['".$result['order_type']."', ".$result['number']."],";
            }

?>
        ]);

        var options = {
          title: 'Order Overview',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script> -->
<!-- chart ends -->


</head>
<body>
<?php
    $this_page = "stockmanangerdashboardhome.php";
    include_once 'stockmanagerdashboard.php';
?>

<div class="home-content">
      <div class="overview-boxes">
        <div class="box1" id="box">
          <div class="right-side">
            <div class="box-topic">Total Order</div>
            <div class="number">40,876</div>
            <div class="indicator">
                <i class="fa fa-arrow-up" aria-hidden="true"></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
        </div>
        <div class="box2" id="box">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number">38,876</div>
            <div class="indicator">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
        </div>
        <div class="box3" id="box">
          <div class="right-side" >
            <div class="box-topic">Total Profit</div>
            <div class="number">$12,876</div>
            <div class="indicator">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
        </div>
        <div class="box4" id="box">
          <div class="right-side">
            <div class="box-topic">Total Return</div>
            <div class="number">11,086</div>
            <div class="indicator">
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class="fa fa-cart-plus" aria-hidden="true"></i>
        </div>
      </div>


<!--  flext container -->
<div class="flex-container">
    <div class="flex-right">
    <!-- <div class="chart-container"> -->
      <div id="piechart_3d" class="piechart_3d"></div>
      <!-- </div> -->
    </div>
    <div class="flex-left">
      <div class="topic">
      <!-- <i class='bx bxs-car'></i> -->
        <h2>Top Selling Items</h2>
        </div>
        <div class="content">
          <div class="table-container">
        <table class="table">
  <thead>
  <tr>
    <th>Item</th>
    <th>Amount</th>
    <th>Total</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Fog Lamp</td>
    <td>10</td>
    <td>17000</td>
  </tr>
  <tr>
    <td>Radiator</td>
    <td>8</td>
    <td>9200</td>
  </tr>
  <tr>
    <td>Air Filter</td>
    <td>4</td>
    <td>8400</td>
  </tr>
  <tr>
    <td>Dampers</td>
    <td>4</td>
    <td>12400</td>
  </tr>
  <tr>
    <td>Bulbs</td>
    <td>3</td>
    <td>4500</td>
  </tr>
  <tr>
    <td>Bonnet Catch</td>
    <td>2</td>
    <td>5900</td>
  </tr>
</tbody>
    </table>
    </div>
     
        
    </div>
</div>
  </section> 
      </section> 
    <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
     sidebarBtn.onclick = function() {
       sidebar.classList.toggle("active");
       if(sidebar.classList.contains("active")){
       sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
     }else
       sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
     }
      </script>
</body>
</html>