<?php
if (!isset($_SESSION['userid'])) {
    $_SESSION['error'] = 'invalidAccess';
    header("location: Log_in");
    exit();
}
require 'config/PathConf.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SL MINI Spares</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/reset-style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/header.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/alert.css">
</head>
<!-- <body onload=" return paymethod()"> -->

<body>
    <?php
    $this_page = "Refund.php";
    include_once 'views/global/header-ws.php';
    ?>
    <main>
        <?php
        include_once 'views/global/alert.php';
        ?>
        <section class="form-content">
            <h2 class="heading">Refund <span>NOW</span></h2>
            <div class="row">
                <div class="image">
                    <img src="assets/car/animated/4.jpg" alt="">
                </div>
                <form class="form" method="post" action="#">
                    <input type="hidden" name="merchant_id" value="1218705"> <!-- Replace your Merchant ID -->
                    <input type="hidden" name="return_url" value="<?php echo $localhost; ?>Refund">
                    <input type="hidden" name="cancel_url" value="<?php echo $localhost; ?>Profile">
                    <input type="hidden" name="notify_url" value="<?php echo $localhost; ?>Payment">

                    <h3>Payment Details</h3>
                    <div class="inputBox">
                        <input type="text" name="order_id" placeholder="Enter Order  id">
                        <input type="text" id="items" name="items" placeholder="Enter item name">
                    </div>
                    <div class="inputBox">
                        <input type="text" name="currency" value="LKR">
                        <input class="amount" type="text" name="amount" placeholder="Enter the price">
                    </div>
                    <br>
                    <br>
                    <h3>Customer Details</h3>
                    <div class="inputBox">
                        <input type="text" name="first_name" value="<?php echo $_SESSION['fname']; ?>">
                        <input type="text" name="last_name" value="<?php echo $_SESSION['lname']; ?>">
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>">
                        <input type="text" name="phone" value="<?php echo $_SESSION['contact']; ?>">
                    </div>
                    <div class="inputBox">
                        <input type="text" name="address" value="<?php echo $_SESSION['address']; ?>">
                        <input type="text" name="country" value="Sri Lanka">
                        <input type="text" name="city" value="<?php echo $_SESSION['city']; ?>">
                        <input type="text" name="district" value="<?php echo $_SESSION['district']; ?>">
                    </div>
                    <textarea placeholder="Reason" name="reason" id="" cols="30" rows="10" style="font-size: 1.5rem;"></textarea>

                    <input type="submit" name="submit" class="btn" value="Refund Now">
                </form>
            </div>

        </section>
    </main>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/main-ws.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/buy_now.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/cart.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
</body>

</html>