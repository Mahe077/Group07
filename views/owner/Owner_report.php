<?php
if (!isset($_SESSION['userid'])) {
  $_SESSION['error'] = 'invalidAccess';
  header("location: Log_in");
  exit();
}
require 'config/PathConf.php';
  //  require_once('../config/dbconfig.php');
  //  $db= new Reportfunc();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Owner Dashboard |SL MINI Spares  </title>
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/owner/owner_updated.css">
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
  <?php include_once 'views/owner/common.php';?>
  </div>
  <section class="home-section">
  <nav>
      <div class="sidebar-button">
        <i class="fa fa-bars sidebarBtn" aria-hidden="true"></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="nortification-box">
          <div class="dropdown">
          <a href="Owner_report" class="notification"><i class="fas fa-bell" id="fa-bell"><span class="count"><?php print_r($this->data[0][0]);?></span></i></a>
          <?php
            $val  = $this->data[0][0];
          ?>
            <div class="dropdown-content">
          <?php
          
            for ($x = 0; $x <$val; $x++) {
              echo "<br>".$this->value[$x][6]." <br>";
            }
          ?>
            </div>
          </div>
      </div>
      <div class="profile-details">
        <img src="\G7/Group07/assets/users/admin.jpg" alt="">
        <span class="admin_name">KHW</span>
        <div class="dropdown">
          <button class="dropbtn"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>
          <div class="dropdown-content">
            <a href="../controller/logout.inc.php">Log Out</a>
          </div>
        </div>
      </div>
    </nav>
    <div class="home-content-report">
        <div class="report-det">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-date">
              <div class="form-inside">
                <label for="select-date" class="lbl">Select start date</label>
                <input type="date"class="date-input" name="date1" min="2000-01-01" max="2021-12-31" required>
              </div>
              <div class="form-inside">
                <label for="select-date" class="lbl">Select end date</label>
                <input  type="date" class="date-input" name="date2" required min="2000-01-01" max="2021-12-31" required>
              </div>
              <div class="button-slt">
                <input type="submit" name="submit" id="btn-order1" class="btn-order1" value="Search">
              </div>
            </div> 
          </form>
        </div>
        <div class="report-cont">
          <div class="table-report">
                <table class="tbl" collspacing="0">
                  <thead>
                    <tr>
                      <th>Bill Id</th>
                      <th>Full Name</th>
                      <th>Bill Number</th>
                      <th>Bill Type</th>
                      <th>Date</th>
                      <th>User Name</th>
                    </tr>
                    <table class="tbl" collspacing="0">
                  </thead>
              <!-- <tr class="bordered"></tr> -->
              <tbody>
                <?php
                  if (isset($_POST['submit'])){
                    $date1=$_POST['date1'];
                    $date2=$_POST['date2'];
                    $query=mysqli_query($db->connection,"select * from `sales` where date between '$date1' and '$date2'");
                    while($row=mysqli_fetch_array($query)){
                    ?>
                      <tr>
                        <td data-label='billid'><?php echo $row['billId']; ?></td>
                        <td data-label='fullname'><?php echo $row['full_name']; ?></td>
                        <td data-label='billNo'><?php echo $row['billNo']; ?></td>
                        <td data-label='bill_type'><?php echo $row['bill_type']; ?></td>
                        <td data-label='date'><?php echo $row['date'];?></td>
                        <td data-label='username'><?php echo $row['Username']; ?></td>
                      </tr>
                    <?php
                            }

                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </section> 
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
  <script type="text/javascript" src="views/js/owner/report-page.js"></script>
</body>
</html>