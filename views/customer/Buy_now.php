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

    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/footer.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/alert.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/form.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/float-cotainer.css">

</head>
<body>
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
                    <img src="../img/car/animated/7.jpg" alt="">
                </div>
                <form class="form" method="post" action="https://sandbox.payhere.lk/pay/checkout">
                    <form class="form" method="post" action="../controller/buy-now.inc.php">
                        <input type="hidden" name="merchant_id" value="1218705"> <!-- Replace your Merchant ID -->
                        <input type="hidden" name="return_url" value="<?php echo $localhost; ?>Product">
                        <input type="hidden" name="cancel_url" value="<?php echo $localhost; ?>Profile">
                        <input type="hidden" name="notify_url" value="<?php echo $localhost; ?>Payment">

                        <h3>Payment Details</h3>
                        <div class="inputBox">
                            <input type="text" name="order_id" value="1">
                            <input type="hidden" name="items" value="Items" placeholder="Select items">
                            <input type="text" name="item_name_1" value="sdfsdf">

                        </div>
                        <div class="inputBox">
                            <input type="number" class="quantity" name="quantity_1" value="1" min="1" max="5" placeholder=" Enter qty" onchange="changeprice()">
                            <input class="amount_1" type="text" name="amount_1" value="500">
                        </div>
                        <h3>Total price</h3>
                        <div class="inputBox">
                            <input type="text" name="currency" value="LKR">
                            <input class="amount" type="text" name="amount" value="500">
                        </div>
                        <input type="button" class="btn" value="Pay advance" onclick="return paymethod()">
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
                            <input type="hidden" name="country" value="Sri Lanka">
                            <input type="text" name="city" value="<?php echo $_SESSION['city']; ?>">
                        </div>
                        <div class="box"><input type="checkbox" name="delivery" id="delivery" value="Yes">
                            <label for="delivery" style="font-size: 15px; font-weight: 600; color: black;">Do you need delivery services</label>
                        </div>
                        <div>
                            <!-- <input style= "width: 220px;" type="button" class="btn" value="Dilivery service" onclick="deliveryInfo()"> -->
                            <input type="submit" class="btn" value="Buy Now">
                        </div>
            </div>
            </form>
        </section>
    </main>
    <?php
    include_once 'pages/footer.php';
    ?>
    <script type="text/javascript" src="js/main-1.js"></script>
    <script type="text/javascript" src="js/buy_now.js"></script>
    <script>
        function changeprice() {
            let amount = document.querySelector(".amount");
            let quantity = document.querySelector(".quantity");
            let amount_1 = document.querySelector(".amount_1");

            console.log(amount_1.value, quantity.value)

            amount.value = amount_1.value * quantity.value;
        }
        // 		function paymethod() {
        // 	let amount = document.querySelector(".amount");
        // 	let count = 0;
        // 	var advance = amount.value;
        // 	if (confirm("pay by advance")) {
        // 		count++;
        // 		amount.value = (amount.value*10)/100;
        // 		if (amount.value < 30 || count >1) {
        // 			amount.value = advance;
        // 		}

        // 	}else{
        // 		amount.value = advance;
        // 	}
        // 	console.log("payment",amount.value,count);
        // }
    </script>
    <script type="text/javascript" src="js/cart.js"></script>
    <script type="text/javascript" src="js/alert.js"></script>
</body>

</html>