<?php
if (!isset($_SESSION['userid'])) {
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
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/reset-style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/header.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/notification.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/footer.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/alert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/float-container.css">
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
    <style>
        .floating-container.active {
            top: 0;
        }

        .floating-container form #remember {
            margin: 2rem 0;
        }

        .floating-container #floating-container-close {
            position: absolute;
            top: 2rem;
            right: 3rem;
            font-size: 2rem;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>

<body onload="removeItem()">
    <!-- header section starts  -->

    <?php
    $this_page = "notification.php";
    include_once 'views/global/header-ws.php';
    ?>
    <!--  error alerting will display here -->

    <!-- home section starts  -->

    <main>
        <?php
        include_once 'views/global/alert.php';
        ?>
        <div class="floating-container">

            <i class="fas fa-times" id="floating-container-close"></i>

            <form action="Notification/InsertNotify" method="post">
                <h2 class="heading">Send <span>Message</span></h2>
                <textarea placeholder="Message" name="msg" id="" cols="66" rows="10"></textarea>
                <input type="submit" name="submit" class="btn" value="send">
            </form>
        </div>
        <section class="notify">
            <h2 class="heading"> Notifi<span>cation</span></h2>
            <section class="notification-body">
                <!-- notifications will be render through notification.js -->
            </section>
        </section>

        <div class="message-icon">
            <i class="fas fa-comment-dots message-icon-holder" onclick="deliveryInfo()"></i>
        </div>
    </main>

    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/main-ws.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/order.js"></script>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/cart.js"></script>
    <?php
    if (isset($_SESSION['userid'])) {
        echo "<script type='text/javascript' src='".$localhost."views/js/customer/Notification_header.js'></script>";
        echo "<script type='text/javascript' src='".$localhost."views/js/customer/notification.js'></script>";
    }
    ?>
    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/alert.js"></script>
    <script>
        let msg = document.querySelector(".message-icon-holder");

        function deliveryInfo() {
            loginForm.classList.add('active');
        }
        let loginForm = document.querySelector('.floating-container');
        let formClose = document.querySelector('#floating-container-close');

        window.onscroll = () => {
            loginForm.classList.remove('active');
        }

        formClose.addEventListener('click', () => {
            loginForm.classList.remove('active');
        });
    </script>

</body>

</html>