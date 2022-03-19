<?php
if (!isset($_SESSION['userid']) || $_SESSION['position'] != "CU") {
    $_SESSION['error'] = 'invalidAccess';
    header("location: Log_in");
    exit();
}
require 'config/PathConf.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SL MINI Spares</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/reset-style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/header.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/checkout.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/alert.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>

<body onload="display_orders(<?php echo $_SESSION['userid'] ?>,0),removeItem()">
    <!-- header section starts  -->

    <?php
    $this_page = "order.php";
    include_once 'views/global/header-ws.php';
    ?>
    <!-- home section starts  -->

    <main>
        <!--  error alerting will display here -->
        <?php
        include_once 'views/global/alert.php';
        ?>

        <h2 class="heading">Order <span>Management</span></h2>
        <section class="links">
            <ul id="Order-display-actions">
                <li>
                    <a href="#" class="btn order_typr_links" id="pending" name="pending" onclick="display_orders(<?php echo $_SESSION['userid'] ?>,0)">Pending</a>
                </li>
                <li>
                    <a href="#" class="btn order_typr_links" id="preorder_req" name="preorder_req" onclick="display_orders(<?php echo $_SESSION['userid'] ?>,6)">PreOder <i class="fas fa-sync-alt"></i></a>

                </li>
                <li>
                    <a href="#" class="btn order_typr_links" id="preorder_acc" name="preorder_acc" onclick="display_orders(<?php echo $_SESSION['userid'] ?>,7)">PreOder <i class="fas fa-check"></i></a>
                </li>
                <li>
                    <a href="#" class="btn order_typr_links" id="to_deliver" name="to_deliver" onclick="display_orders(<?php echo $_SESSION['userid'] ?>,1)">To deliver</a>
                </li>
                <li>
                    <a href="#" class="btn order_typr_links" id="to_review" name="to_review" onclick="display_orders(<?php echo $_SESSION['userid'] ?>,8)">To review</a>
                </li>
                <li>
                    <a href="#" class="btn order_typr_links" id="cancel" name="cancel" onclick="display_orders(<?php echo $_SESSION['userid'] ?>,2)">Cancellation</a>
                </li>
            </ul>
        </section>
        <section class="cart-table table">
            <div class="row row-header">
                <div class="col col-0">OrderId</div>
                <div class="col col-1">item</div>
                <div class="col col-2">Qty</div>
                <div class="col col-3">Price</div>
            </div>
            <div class="table-body">
                <!-- table content will be rendered by the order.js -->
            </div>
            <div class="test">
                <?php
                    if(isset($_SESSION["pay_all"])){
                        print_r($_SESSION["pay_all"]);
                    }
                ?>
            </div>
        </section>
        <section class="total">
            <p id="sub-total">
                <strong>Total</strong>: Rs<span id="stotal"></span><br>
            </p>
        </section>
    </main>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/main-ws.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/cart.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/order-load.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/order.js"></script>
    <?php
    if (isset($_SESSION['userid'])) {
        echo "<script type='text/javascript' src='" . $localhost . "views/js/customer/Notification_header.js'></script>";
    }
    if(isset($_SESSION["pay_all"])){
        echo "  <script type='text/javascript'>
                    localStorage.clear('productInCart');
                    localStorage.clear('totalCost');
                    localStorage.clear('cartumbers');
                    document.querySelector('.fa-shopping-cart-span').textContent = 0;
                </script>";
    }
    ?>

</body>

</html>