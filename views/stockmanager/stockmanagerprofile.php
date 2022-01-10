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
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/stockmanager/stockmanagerprofile.css">
    <!-- <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/form.css"> -->
    
    <title>Document</title>
</head>
<body>
<?php
    $this_page = "stockmanagerprofile.php";
    include_once 'stockmanagerdashboard.php';
?> 

<section class="information">

<div class="container">
    <div class="profile-container">
        <div class="row">
        <form name="form" class="form" action="Profile/updateUser" method="POST" enctype="multipart/form-data">
                <div class="prof-img">
                    <img src="<?php echo $_SESSION['image_path']; ?>">
                    <div class="edit-button">
                        <label for="reset" class="pencil">
                            <i class="fas fa-user-edit"></i>
                            <input style="display:none;" id="reset" type="file" name="image" accept="Image/">
                        </label>
                    </div>
                </div>
                <div class="inputBox">
                
                    <input class="input-field" type="text" name="fname" value="<?php echo $_SESSION['fname']; ?>" placeholder="Enter First Name">
                   
                    <input class="input-field" type="text" name="sname" value="<?php echo $_SESSION['lname']; ?>" placeholder="Enter Second Name" required>
                </div>
                <div class="inputBox">
                
                    <input class="input-field" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Enter E-mail Address" required>
                  
                    <input class="input-field" type="text" name="address" value="<?php echo $_SESSION['address']; ?>" placeholder="Enter Address" required>
                </div>
                  
                <div class="inputBox">
                   
                    <input class="input-field" type="tel" pattern="[0-9]{10}" name="contact" value="<?php echo $_SESSION['contact']; ?>" placeholder="Enter Contact Number" required>
                </div>
                <div class="inputBox">
                   
                <input class="btn" type="submit" name="submit" value="RESET">
               </div>
                
                
            </form>
            </div>
        </section>



    </div>
</div>

</section>

</body>
</html>