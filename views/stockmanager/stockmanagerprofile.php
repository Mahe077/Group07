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
                        <!-- <i class="fas fa-user"></i> -->
                        <input class="input-field" type="text" name="fname" value="<?php echo $_SESSION['fname']; ?>" placeholder="Enter First Name">
                        <!-- <i class="fas fa-user"></i> -->
                        <input class="input-field" type="text" name="sname" value="<?php echo $_SESSION['lname']; ?>" placeholder="Enter Second Name" required>
                    </div>
                    <div class="inputBox">
                        <!-- <i class="fa fa-envelope-o"></i> -->
                        <input class="input-field" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Enter E-mail Address" required>
                        <!-- <i class="fa fa-address-card"></i> -->
                        <input class="input-field" type="text" name="address" value="<?php echo $_SESSION['address']; ?>" placeholder="Enter Address" required>
                    </div>
                    <div class="inputBox">
                        <!-- <i class="fa fa-flag" ></i> -->
                        <!-- <input class="input-field" type="text" name="city" value="<?php echo $_SESSION['city']; ?>" placeholder="Enter City" required> -->


                        
                        <!-- <i class="fa fa-flag-checkered" ></i> -->
                        <!-- <input class="input-field" list="select" name="district" placeholder="Enter district" value="<?php echo $_SESSION['district']; ?>" required>
                        <datalist id="select">
                            <option value="Galle"></option>
                            <option value="Matara"></option>
                            <option value="Hambanthota"></option>
                            <option value="Rathnapura"></option>
                            <option value="Colobmo"></option>
                            <option value="Gampaha"></option>
                            <option value="Kaluthara"></option>
                            <option value="Kurunagala"></option>
                            <option value="chillaw"></option>
                            <option value="Jaffna"></option>
                            <option value="Trincomalee"></option>
                            <option value="Batticola"></option>
                            <option value="Ampara"></option>
                            <option value="Badulla"></option>
                            <option value="Anuradhapura"></option>
                            <option value="Kandy"></option>
                            <option value="Mannar"></option>
                            <option value="Puttalam"></option>
                            <option value="Kegalle"></option>
                            <option value="Nuwara Eliya"></option>
                            <option value="Matale"></option>
                            <option value="Polonnaruwa"></option>
                            <option value="Monaragala"></option>
                            <option value="kilinochchi"></option>
                            <option value="Vavniya"> </option>
                        </datalist>
                    </div> -->
                    <!-- district input field -->
                    <div class="inputBox">
                        <!-- <i class="fa fa-envelope-open-o" aria-hidden="true"></i> -->
                        <!-- <input class="input-field" type="number" name="postalcode" value="<?php echo $_SESSION['postal_code']; ?>" placeholder="Enter Postal Code" min="100" max="100000" pattern="[0-9]{5}" required> -->


                        <!-- <i class="fa fa-phone" ></i> -->
                        <input class="input-field" type="tel" pattern="[0-9]{10}" name="contact" value="<?php echo $_SESSION['contact']; ?>" placeholder="Enter Contact Number" required>
                    </div>
                    <input class="btn" type="submit" name="submit" value="RESET">
                </form>
            </div>
        </section>



    </div>
</div>

</section>

</body>
</html>