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

<body>
    <!-- header section starts  -->

    <?php
    $this_page = "profile.php";
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

            <form action="#">
                <h2 class="heading">Send <span>Message</span></h2>
                <textarea placeholder="Message" name="" id="" cols="30" rows="10"></textarea>
                <input type="submit" class="btn" value="send">
            </form>
        </div>
        <section class="notify">
            <h2 class="heading"> Notifi<span>cation</span></h2>
            <section class="notification-area">
                <h2>Hi,</h2>
                <h3 class="date">21-09-2021</h3>
                <h3>This is the quotation</h3><br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci sit facilis non accusamus accusantium atque, ipsum magni assumenda obcaecati veniam fugiat quidem, est, totam consequuntur sint tenetur maxime corporis voluptates.</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum dolor unde dolorem, cupiditate provident expedita perferendis aperiam possimus error reprehenderit inventore molestias dignissimos tempora corrupti culpa veniam pariatur! Quidem sunt recusandae natus, rem, voluptatem a nisi cum corporis illo fugiat minima? Veniam, neque laborum a beatae magnam nobis iure vitae hic adipisci unde nulla in ullam facilis cupiditate velit sint.
                </p>
                <a class="btn" href="buy-now.php">Accepct</a>
                <a class="btn">Ignore</a>
                <h4 class="time">20:14</h4>
            </section>
            <section class="notification-area">
                <h2>Hi,</h2>
                <h3 class="date">21-09-2021</h3>
                <h3>About your car's transmission problem</h3><br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci sit facilis non accusamus accusantium atque, ipsum magni assumenda obcaecati veniam fugiat quidem, est, totam consequuntur sint tenetur maxime corporis voluptates.</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum dolor unde dolorem, cupiditate provident expedita perferendis aperiam possimus error reprehenderit inventore molestias dignissimos tempora corrupti culpa veniam pariatur! Quidem sunt recusandae natus, rem, voluptatem a nisi cum corporis illo fugiat minima? Veniam, neque laborum a beatae magnam nobis iure vitae hic adipisci unde nulla in ullam facilis cupiditate velit sint.
                </p>
                <a class="btn" onclick="deliveryInfo()">Reply</a>
                <h4 class="time">20:14</h4>
            </section>
            <section class="notification-area">
                <h2>Hi,</h2>
                <h3 class="date">21-09-2021</h3>
                <h3>This is the quotation</h3><br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci sit facilis non accusamus accusantium atque, ipsum magni assumenda obcaecati veniam fugiat quidem, est, totam consequuntur sint tenetur maxime corporis voluptates.</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum dolor unde dolorem, cupiditate provident expedita perferendis aperiam possimus error reprehenderit inventore molestias dignissimos tempora corrupti culpa veniam pariatur! Quidem sunt recusandae natus, rem, voluptatem a nisi cum corporis illo fugiat minima? Veniam, neque laborum a beatae magnam nobis iure vitae hic adipisci unde nulla in ullam facilis cupiditate velit sint.
                </p>
                <a class="btn" href="buy-now.php">Accepct</a>
                <a class="btn">Ignore</a>
                <h4 class="time">20:14</h4>
            </section>
        </section>

        <div class="message-icon">
            <i class="fas fa-comment-dots message-icon-holder" onclick="deliveryInfo()"></i>
        </div>
    </main>

    <script type="text/javascript" src="views/js/customer/main-ws.js"></script>
    <script type="text/javascript" src="views/js/customer/order.js"></script>
    <script type="text/javascript" src="views/js/customer/cart.js"></script>
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