<!DOCTYPE html>
<html lang="en">
<?php require 'config/PathConf.php'; ?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/signin.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/alert.css">
    <title>SL MINI Spares</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <nav id="navbar"></nav>
    <main>
        <!--  error alerting will display here -->
        <?php
        include_once 'views/global/alert.php';
        ?>

        <div class="form-signin">
            <form action="Log_in/logIn" method="POST" class="signin" id="signinform" name="form">
                <h1 class="title">Sign in</h1><br><br>
                <div class="input-field"><i class="fa fa-user"></i>
                    <input type="text" autocomplete="off" name="username" placeholder="  Username" required><br>
                    <div id="username-error">Please re-fill your Username.</div>
                </div>
                <div class="input-field"><i class="fa fa-key"></i>
                    <input type="password" name="password" placeholder="  Password" required><br>
                    <div id="password-error">Incorrect Password.</div>
                </div>
                <button name="submit" id="btn">Log In</button><br>
                <div class="bottom-text">
                    <p class="btmtxt">Forgot your <strong>Username</strong> or <a href="forgetpasswordsetpassword.php" class="form-link"><strong>Password</strong></a>?
                </div>
                <div class="bottom-text">
                    <br>
                    <p class="btmtxt">Don't have an account? Create account <a href="signup.php" class="form-link"><strong>Sign Up</strong></a></p>
                </div>
            </form>
        </div>
        <div class="content">
            We specialize in complete auto care<br> at a low
            cost and in a professional manner.
        </div>
        <div class="gif">
            <img src="<?php echo $localhost; ?>assets/log_in/log.gif" alt="">
        </div>
    </main>
    <!-- <script src="../js/signin.js"></script> -->
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
</body>

</html>