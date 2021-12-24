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
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/reset-style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/header.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/checkout.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/alert.css">

</head>

<body onload="displayCheckout(),removeItem(),tableItemsRemomver()">
    <!-- header section starts  -->

    <?php
    $this_page = "profile.php";
    include_once 'views/global/header-ws.php';
    ?>
    <!-- home section starts  -->
    <main>
        <!--  error alerting will display here -->
        <?php
        include_once 'views/global/alert.php';
        ?>
        <h2 class="heading">Check <span>Out</span></h2>
        <section class="cart-table table">
            <form action="test.html" method="post">
                <div class="row row-header">
                    <div class="col col-1">item</div>
                    <div class="col col-2">Qty</div>
                    <div class="col col-3">Price</div>
                </div>
                <div class="table-body checkout">
                   
                </div>
            </form>
        </section>
        <section class="total">
            <p id="sub-total">
                <strong>Total</strong> : RS<span id="stotal">0</span>
            </p>
        </section>
        <section class="links">
            <ul id="shopping-cart-actions">
                <!-- <li>
                    <input type="submit" name="update" id="update-cart" class="btn" value="Update Cart">
                </li> -->
                <li>
                    <input type="submit" name="delete" id="empty-cart" class="btn" value="Empty Cart" onclick="ClearAll()">
                </li>
                <li>
                    <a href="Product" class="btn">Products</a>
                    <!-- <a href="#" class="btn">Continue Shopping</a> -->
                </li>
                <!-- 	<li>
					<a href="buy-now.php" class="btn">Buy now</a>
				</li> -->
            </ul>
        </section>
    </main>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/main-ws.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/cart.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/order.js"></script>
   
</body>

</html>