<?php
require 'config/PathConf.php';
if (!isset($_SESSION['userid'])) {
    $_SESSION['error'] = 'invalidAccess';
    header("location: ".$localhost."Log_in");
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
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/alert.css">
</head>
<!-- <body onload=" return paymethod()"> -->

<body>
    <?php
    $this_page = "Return.php";
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
                    <img src="<?php echo $localhost; ?>assets/car/animated/4.jpg" alt="">
                </div>
                <form class="form" method="post" action="<?php echo $localhost; ?>Order/AddReturn">
                    <h3>Payment Details</h3>
                    <div class="inputBox">
                        <input type="number" min="1" name="order_id" placeholder="Enter Order  id">
                    </div>
                    <textarea placeholder="Enter the reason" name="reason" id="" cols="30" rows="10" style="font-size: 1.5rem;"></textarea>

                    <input type="submit" name="submit" class="btn" value="Return item">
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
        echo "<script type='text/javascript' src='".$localhost."views/js/customer/Notification_header.js'></script>";
    }
    ?>
</body>

</html>