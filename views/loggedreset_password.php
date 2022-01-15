<!DOCTYPE html>
<html lang="en">
<?php require 'config/PathConf.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/reset_password.css">
    <title>Document</title>
</head>
<body>
<?php
    $this_page = "loggedreset_password.php";
?> 

<header class="header">
    <img class="logo" src="assets/logo.png">
  </header>
<div class="container">
    <form action="Reset_password/reset" method = "POST" enctype="multipart/form-data">


            
                <h2>Reset Your Password</h2>
            <!-- <div class="input-section">
                <label for="username"><i class='bx bx-key' ></i></label>
                <input type="text" name="username" id="username" placeholder="Enter Username" required>
            </div>     -->
            
            <p>
            <div class="input-section">
                <label for="passowrd"><i class='bx bx-key' ></i></label>
                <input type="passowrd" name="passowrd" id="passowrd" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>    
            </p>
            <p>
            <div class="input-section">
                <label for="confirmpassword"><i class='bx bx-key' ></i></label>
                <input type="repassword" name="repassword" id="repassword" placeholder="Confirm Password" minlength="8" required>
            </div>    
            </p>

    <button type="submit" class="submitbutton" name="submit">Reset Password</button>
    </form>
</div>
</body>
</html>