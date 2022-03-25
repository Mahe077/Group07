<?php
require 'config/PathConf.php';
if (!isset($_SESSION['userid'])) {
    $_SESSION['error'] = 'invalidAccess';
    header("location: " . $localhost . "Log_in");
    exit();
}
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

    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/alert.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/form.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/float-cotainer.css">

</head>

<body onload="renderPage(<?php echo $this->itemId; ?>)">
    <?php
    $this_page = "buy_ow.php";
    include_once 'views/global/header-ws.php';
    ?>
    <main>
        <!--  error alerting will display here -->
        <?php
        include_once 'views/global/alert.php';
        ?>
        <section class="form-content">
            <h2 class="heading">BUY <span>NOW</span></h2>
            <div class="row">
                <div class="image">
                    <img src="<?php echo $localhost; ?>assets/car/animated/4.jpg" alt="">
                </div>

                <form class="form" method="post" action="https://sandbox.payhere.lk/pay/checkout">
                <!-- <form class="form" method="post" action="<?php echo $localhost; ?>Payment/pay"> -->
                    <input type="hidden" name="merchant_id" value="1218705"> <!-- Replace your Merchant ID -->
                    <input type="hidden" name="return_url" value="<?php echo $localhost; ?>Product">
                    <input type="hidden" name="cancel_url" value="<?php echo $localhost; ?>Profile">
                    <input type="hidden" name="notify_url" value="<?php echo $localhost; ?>Payment">

                    <h3>Payment Details</h3>
                    <div class="inputBox">
                        <input type="hidden" name="order_id" value="0">
                        <input type="hidden" id="items" name="items" value="Singel order" placeholder="Select items">
                        <input type="text" id="item_name_1" name="item_name_1" value="sdfsdf">
                    </div>
                    <div class="inputBox">
                        <input type="hidden" id="item_id_1" name="item_id_1" value="<?php echo $this->itemId; ?>">
                        <input type="number" class="quantity_1" name="quantity_1" value="1" min="1" max="5" placeholder=" Enter quantity" onchange="changeprice(1)">
                        <input class="amount_1" type="text" name="amount_1" placeholder="Enter the amount" value="1" readonly="readonly"> 
                        <input class="unit_price_1" type="hidden" name="unit_price_1" value="1">
                    </div>
                    <h3>Total price</h3>
                    <div class="inputBox">
                        <input type="text" name="currency" value="LKR">
                        <input class="amount" type="text" name="amount" placeholder="Total price" value="1"  readonly="readonly">
                    </div>
                    <input type="button" class="btn" value="Pay advance" onclick="return paymethod()">
                    <br>
                    <br>
                    <h3>Customer Details</h3>
                    <div class="inputBox">
                        <input type="text" name="first_name" value="<?php echo $_SESSION['fname']; ?>" required >
                        <input type="text" name="last_name" value="<?php echo $_SESSION['lname']; ?>" required >
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" required>
                        <input type="text" name="phone" value="<?php echo $_SESSION['contact']; ?>" required > 
                    </div>
                    <div class="inputBox">
                        <input type="text" name="address" value="<?php echo $_SESSION['address']; ?>" required>
                        <input type="text" name="country" value="Sri Lanka" required>
                        <input type="text" name="city" value="<?php echo $_SESSION['city']; ?>" required>
                        <input type="text" name="district" value="<?php echo $_SESSION['district']; ?>" required>
                    </div>
                    <div class="box"><input type="checkbox" name="delivery" id="delivery" value="Yes">
                        <label for="delivery" style="font-size: 15px; font-weight: 600; color: black;">Do you need delivery services</label>
                    </div>
                    <div>
                        <input type="submit" name="submit" class="btn" value="Buy Now">
                    </div>
                    <!-- </form> -->
                </form>
            </div>
        </section>
    </main>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/main-ws.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/buy_now.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/cart.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
    <?php
    if (isset($_SESSION['userid'])) {
        echo "<script type='text/javascript' src='" . $localhost . "views/js/customer/Notification_header.js'></script>";
    }
    ?>
</body>

</html>