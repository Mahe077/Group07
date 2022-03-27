<!DOCTYPE html>
<html lang="en">
<!-- <?php
    session_start();
?> -->
<?php require 'config/PathConf.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/forget_password.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/alert.css">
    <title>Document</title>
    
</head>
<body>
<?php
    $this_page = "forget_password.php";
    
?>
<!--  error alerting will display here -->
<?php
        include_once 'views/global/alert.php';
        ?>
<header class="header">
    <img class="logo" src="assets/logo.png">
  </header>
    <div class="container">
        <div class="container1" id="container1">
        <h1>Forget Password?</h1>
        <p>To Verify Your Email Please Enter Your User Name</p>
       
        <form action="Forget_password/forget" method="post">
        <p>
            <div class="input-section">
                <label for="username"><i class='bx bxs-user'></i></label>
                <input type="username" name="username" id="username" class="username" placeholder="User Name" required>
            </div>    
            </p>
            <button type="submit" class="submitbutton" name="submit">Confirm</button>
        </form>
        </div>


        <div class="container2" id="container2">
        <h1>Verify this is you</h1>
        <p>To Verify You please enter the verification code in your e-mail</p>
        <form action="Forget_password/match" method="POST">
            <p>
            <div class="input-section">
                <label for="verfication_code"><i class='bx bx-key' ></i></label>
                <input type="text" name="code" id="code" placeholder="verify_code"  required>
            </div>    
            </p>
            <button type="submit" class="submitbutton" name="submit">Verify</button>
        </form>
        </div>
    </div>
    <script type="text/javascript" src="views/js/forget.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
</body>
</html>