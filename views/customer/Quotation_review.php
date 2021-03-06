<?php
if (!isset($_SESSION['userid'])) {
    header("location: Log_in/LoadPage/Review");
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
    $this_page = "Quotation_review.php";
    include_once 'views/global/header-ws.php';
    ?>
    <main>
        <section class="form-content">
            <h2 class="heading">Add <span>Quotation review </span></h2>
            <div class="row">
                <div class="image">
                <img src="<?php echo $localhost; ?>assets/car/animated/2.jpg" alt="">
                </div>
                <form class="form" method="post" action="<?php echo $localhost; ?>Review/special_order_review_insert/<?php echo $this->orderid;?>">
                    <div class="inputBox">
                        <input type="text" name="first_name" value="<?php echo $_SESSION['fname']; ?>" required>
                        <input type="text" name="last_name" value="<?php echo $_SESSION['lname']; ?>" required>
                        <input type="hidden" name="orderId" value="<?php echo $this->orderid; ?>" required>
                    </div>
                    <div class="inputBox">
                    <textarea placeholder="Comment" name="comment" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" required/>
                        <label for="star1" title="text">1 star</label>
                    </div>
                    <br><br><br>

                    <input type="submit" class="btn" name="submit" value="Submit">

            </div>
            </form>
        </section>
    </main>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/main-ws.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/cart.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
    <?php
    if (isset($_SESSION['userid'])) {
        echo "<script type='text/javascript' src='".$localhost."views/js/customer/Notification_header.js'></script>";
    }
    ?>
</body>

</html>