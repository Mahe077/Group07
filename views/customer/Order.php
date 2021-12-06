<?php        
    if(!isset($_SESSION['userid']) || $_SESSION['position'] != "CU"){
        header("location: signin.php?error=invalidAccess");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SL MINI Spares</title>
    <link rel="stylesheet" type="text/css" href="css/reset-style.css" />
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="css/checkout.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" href="css/alert.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>

<body>
    <!-- header section starts  -->

    <?php
    $this_page = "order.php";
    include_once 'pages/header-1.php';
    ?>
    <!-- home section starts  -->

    <main>
        <h2 class="heading">Order <span>Management</span></h2>
        <section class="cart-table table">
            <form action="test.html" method="post">
                <div class="row row-header">
                    <div class="col col-1">item</div>
                    <div class="col col-2">Qty</div>
                    <div class="col col-3">Price</div>
                </div>
                <div class="row row-data">
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
    <?php
    include_once 'pages/footer.php';
    ?>
    <script type="text/javascript" src="js/main-1.js"></script>
    <script type="text/javascript" src="js/order.js"></script>
    <script type="text/javascript" src="js/cart.js"></script>

</body>

</html>