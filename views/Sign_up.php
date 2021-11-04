<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SL MINI Spares</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/G7/Group07/views/css/customer/header.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/G7/Group07/views/css/form.css">
    <link rel="stylesheet" href="http://localhost/G7/Group07/views/css/alert.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="header">
        <!-- <img class="logo" src="../img/logo.png"> -->
    </header>
    <div class="form-container">
        <section class="form-content" id="signup">
            <h1 class="heading">Create <span>Account</span></h1>
            <?php
            include_once 'views/global/alert.php';
            ?>
            <div class="row">
                <div class="image">
                    <img src="assets/car/animated/1.jpg" alt="">
                </div>
                <form name="form" action="Sign_up/sign" class="form" method="post" enctype="multipart/form-data">

                    <div class="inputBox">
                        <input type="text" name="fname" placeholder="Enter First name" required><br>
                        <input type="text" name="sname" placeholder="Enter Second name" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="username" placeholder="Enter User Name" required><br>
                        <input type="email" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="psw" name="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                        <input type="password" id="repswrd" name="repassword" placeholder="Re-Enter Password" minlength="8" required>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="address" placeholder="Enter Address" required><br>
                        <input type="text" name="city" placeholder="Enter City" required>
                    </div>
                    <div class="inputBox">
                        <input list="select" name="district" placeholder="Enter District" required>
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
                            <option value="Vavniya"></option>
                        </datalist><br>
                        <input type="number" name="postalcode" placeholder="Enter Postal Code" min="100" max="100000" pattern="[0-9]{5}" required>
                    </div>
                    <div class="inputBox">
                        <input type="tel" pattern="[0-9]{10}" name="contact" placeholder="Enter Contact Number" required>
                        <input type="file" name="userimage" class="form-control" id="userimage" accept="Image/" required>
                        <input type="hidden" name="position" value="CU">
                    </div>
                    <input type="submit" name="submit" class="btn" value="Sign up">
                </form>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="http://localhost/G7/Group07/views/js/alert.js"></script>
</body>

</html>