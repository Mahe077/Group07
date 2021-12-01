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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar"><?php include_once 'common.php';?></div>
  <section class="home-section">
    <?php include_once 'navigation.php';?>
      <div class="form-container">
        <div class="item-content">
          <div class="close">+</div>
            <form  method="POST" action="insert_item/insert_data" enctype="multipart/form-data">
                  <div class="input-box-container">
                    <div class="input-boxes">
                      <!-- <div class="slt">
                        <select name="cat_id" id="" class="select-opt" required>
                        
                          <option value="">Select Category</option>
                          
                          <?php
                            //  while($row = mysqli_fetch_assoc($cat)){
                              ?> 
                              <option value="<?php //echo $row['id']?>"><?php //echo $row['category_name']?></option>

                              <?php
                             //}
                          ?>
                        </select> 
                      </div> -->
                      <div class="item-form">
                          <input class="input" name="productId"type="text" placeholder="Product Id" required>
                      </div>
                      <div class="item-form">
                        <input class="input" name="brand" type="text" placeholder="brand " required>
                      </div>
                      <div class="item-form">
                        <input class="input" name="price" type="text" placeholder="price" required>
                      </div>
                      <div class="item-form">
                        <input class="input" name="partNo" type="text" placeholder="partNo" required>
                      </div>
                      <!-- <div class="img-file">
                        <input class="input" name="img" id= "file" type="file" accept="image/*">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp
                        <label for="file">Choose an image</label>
                      </div><br> -->
                      <input type="submit" name="submit" class="item-btn" value="Insert New Item">
                    </div>
                    <div class="input-boxes">
                      <div class="slt">
                        <select name="type" id="select-opt" class="input" required>
                        <option value="">Select type</option>
                          <option value="Genuin">Genuin</option>
                          <option value="Compatible">Compatible</option>
                        </select>
                      </div>
                      <div class="item-form">
                        <input class="input" name="partNo_Manufacturer" type="text" placeholder="partNo_Manufacturer" required>
                      </div>
                      <div class="item-form">
                        <input class="input" name="amount" type="text" placeholder="Amount" required>
                      </div>
                      <div class="item-form">
                        <input class="input" name="size" type="text" placeholder="Size" required>
                      </div>
                    </div>      
                  </div>
            </form>
          </div>
          </div>  
      </div>
  </section>
  <script type="text/javascript" src="views/js/owner/owner-reports.js"></script>
  <script type="text/javascript" src="views/js/owner/form.js"></script> 
</body>
</html>