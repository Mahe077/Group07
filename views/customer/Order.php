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

<body onload="orderload(<?php echo $_SESSION['userid'] ?>),removeItem(),tableItemsRemomver()">
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

        <h2 class="heading">Order <span>Management</span></h2>
        <section class="cart-table table">
            <form action="test.html" method="post">
                <div class="row row-header">
                    <div class="col col-1">item</div>
                    <div class="col col-2">Qty</div>
                    <div class="col col-3">Price</div>
                </div>
                <div class="table-body">
                    <!-- <a href="Order/loadAll(14)"></a> -->
                    <!-- <div class="row row-data">
                        <div class="col col-1" id="rd-1">
                            </i>Air filter
                        </div>
                        <div class="col col-2">
                            <input type="number" min="0" name="amount" value="1" />
                        </div>
                        <div class="col col-3">
                            <div class="col col-4">Rs: 50000.00</div>
                            <div class="col col-5"> <i class="fas remove fa-trash-alt"></i></div>
                        </div>
                    </div>
                    <div class="row row-data" id="rd-2">
                        <div class="col col-1">
                            Air filter
                        </div>
                        <div class="col col-2">
                            <input type="number" min="0" name="amount" value="1" />
                        </div>
                        <div class="col col-3">
                            <div class="col col-4">Rs: 50000.00</div>
                            <div class="col col-5"><i class="fas fa-check-circle"></i></div>
                        </div>
                    </div>
                    <div class="row row-data" id="rd-3">
                        <div class="col col-1">
                            Air filter
                        </div>
                        <div class="col col-2">
                            <input type="number" min="0" name="amount" value="1" />
                        </div>
                        <div class="col col-3">
                            <div class="col col-4">Rs: 50000.00</div>
                            <div class="col col-5"><i class="fas fa-check-circle"></i></div>
                        </div>
                    </div>
                    <div class="row row-data" id="rd-4">
                        <div class="col col-1">
                            Air filter
                        </div>
                        <div class="col col-2">
                            <input type="number" min="0" name="amount" value="1" />
                        </div>
                        <div class="col col-3">
                            <div class="col col-4">Rs: 50000.00</div>
                            <div class="col col-5"> <i class="fas remove fa-trash-alt"></i></div>
                        </div>
                    </div> -->
                </div>
            </form>
        </section>
        <section class="total">
            <p id="sub-total">
                <strong>Total</strong>: <span id="stotal">Rs 10000.00</span><br>
            </p>
        </section>
        <section class="links">
            <ul id="shopping-cart-actions">
                <li>
                    <input type="submit" name="update" id="update-cart" class="btn" value="Update" />
                </li>
            </ul>
        </section>
    </main>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/main-ws.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/cart.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/order-load.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/order.js"></script>

</body>

</html>