<?php
require 'config/PathConf.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SL MINI Spares</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/reset-style.css" />

    <!-- swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/item_page.css">

</head>

<body>
    <!-- header section starts  -->
    <?php
    $this_page = "profile.php";
    include_once 'views/global/header-ws.php';
    ?>

    <main>
        <section class="form-content">
            <h1 class="heading">
                <span>Iteam</span> page
            </h1>
            <div class="row">
                <div class="image">
                    <img src="<?php echo $localhost . $_SESSION['item'][0]['image_path']; ?>" alt="">
                </div>
                <form class="form" name="form" action="buy-now.php">
                    <h3><?php echo ($_SESSION['item'][0][11]); ?></h3>

                    <div class="inputBox">
                        <input type="number" min="0" value="1" max="<?php echo ($_SESSION['item'][0][8]); ?>" name="">
                        <div>
                            <p class="sub-head-1"><span class="sub-head-2">Available </span>: <?php echo ($_SESSION['item'][0][8]); ?></p>
                            <p class="sub-head-1"><span class="sub-head-2">Price </span>: Rs <?php echo ($_SESSION['item'][0][4]); ?></p>
                        </div>

                    </div>
                    <div class="inputBox">
                        <div class="color-options">
                            <?php
                            // foreach ($_SESSION['item'][0][10] as $key => $value) {
                            //     echo "input type='radio' name='color-options' id='color' value=" . $key . "<label class='color' style='background-color:.$key.' for='color'></label>";
                            // }
                            echo "<input type='radio' name='color-options' id='color' value=" . $_SESSION['item'][0][10] . "><label class='color' style='background-color:" . $_SESSION['item'][0][10] . "' for='color'></label>";
                            ?>
                            <input type="radio" name="color-options" id="color" value="yellow">
                            <label class="color" style="background-color:yellow" for="color"></label>
                            <input type="radio" name="color-options" id="color" value="white">
                            <label class="color" style="background-color:white" for="color"></label>
                            <input type="radio" name="color-options" id="color" value="orange">
                            <label class="color" style="background-color:orange" for="color"></label>
                            <input type="radio" name="color-options" id="color" value="red">
                            <label class="color" style="background-color:red" for="color"></label>
                        </div>
                    </div>

                    <div class="description">

                        <h3>Description</h3>

                        <p><?php echo ($_SESSION['item'][0][13]); ?></p>

                        </br>
                        <ul>
                            <li>
                                <p><span class="sub-head">Manufacture </span>: <?php echo ($_SESSION['item'][0][6]); ?></p>
                            </li>
                            <li>
                                <p><span class="sub-head">Model </span>: BMW</p>
                            </li>
                            <li>
                                <p><span class="sub-head">Part number </span>: <?php echo ($_SESSION['item'][0][7]); ?></p>
                            </li>
                            <?php if ($_SESSION['item'][0][5]) {
                                echo "<li><p><span class='sub-head'>Part size </span>: " . $_SESSION['item'][0][5] . "</p></li>";
                            } ?>
                            <li>
                                <p><span class="sub-head">Type</span>: <?php echo ($_SESSION['item'][0][12]); ?></p>
                            </li>
                        </ul>
                        </br>
                        <p>Refund only valid within 7 days from the receving date.</p>
                        <!-- <p><span class="sub-head" style="color:red !important;"><?php echo ($_SESSION['item'][0][3]); ?></span></p> -->
                        </br>
                    </div>
                    <div class="actions">
                        <input type="submit" name="submit" class="btn" value="Add to cart">
                        <input type="submit" name="submit" class="btn" value="buy now">
                    </div>

                </form>
            </div>

        </section>

    </main>


    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/item.js"></script>
    <!-- <script type="text/javascript" src="<?php echo $localhost; ?>views/js/swiper.js"></script> -->

    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/main-ws.js"></script>

    <script type="text/javascript" src="<?php echo $localhost; ?>views/js/customer/cart.js"></script>
</body>

</html>