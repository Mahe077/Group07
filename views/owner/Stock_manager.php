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
  <nav>
      <div class="sidebar-button">
        <i class="fa fa-bars sidebarBtn" aria-hidden="true"></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="nortification-box">
          <div class="dropdown">
          <a href="Stock_manager" class="notification"><i class="fas fa-bell" id="fa-bell"><span class="count"><?php print_r($this->data[0][0]);?></span></i></a>
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

    <div class="home-content">
        <div class="btn-section"><a href="Insert_stockmanager" id="insert-btn" class="insert-btn"><div class="btn-txt">Insert Stock Manager</div></a></div>
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
                <tbody id="data">

                </tbody>
                <tr>
                    <?php
                        //while($row = mysqli_fetch_assoc($value)){
                        ?>
                        <?php ///$image=$row['image'];?>
                        <td data-label='fname'><?php //echo $row['fname']; ?></td>
                        <td data-label='lname'><?php //echo $row['lname']; ?></td>
                        <td data-label='username'><?php //echo $row['username']; ?></td>
                        <td data-label='email'><?php //echo $row['email']; ?></td>
                        <td data-label='contact'><?php //echo $row['contact']; ?></td>
                        <td data-label='image'><//img src="img/<?php //echo $image?>" height="150px" width="180px" ></td>
                        <td class="text-center">
                                <a href="delete-stock.php?id=<?php //e//cho $row['id']?>"class='btn-del'>Delete</a>
                        </td>
                        </tr>
                        <?php  
                        //}
                        ?>
                </thead>
            </table>
        </div>
    </div>
    
</section> 
<script>
var httprequest  = new XMLHttpRequest();

httprequest.open("POST", "Stock_manager/Displaystock" , true);
const rows = document.getElementById("data");
httprequest.send();
httprequest.onreadystatechange = function()
{
  if( httprequest.readyState == 4 && httprequest.status == 200)
  {
        var obj = JSON.parse(httprequest.responseText);
        var html = "";
        for(var i = 0 ; i< obj.length ; i++)
        {
          rows.innerHTML +=
                    '<tbody> ' +
                    '<tr> ' +
                    '<td> ' +  obj[i].fname  +  '</td>' +  
                    '<td> ' + obj[i].lname + ' </td>' +
                    '<td> ' + obj[i].email + ' </td>' +
                    '<td> ' + obj[i].contact + ' </td>' +
                    '<td> ' + obj[i].address + ' </td>' +
                    '<td> ' + obj[i].dob + ' </td>' +
                       '</tr>' + 

                    '</tbody>'
        }
  }

}

  </script> 
<script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
<script type="text/javascript" src="views/js/owner/form.js"></script>
</body>
</html>