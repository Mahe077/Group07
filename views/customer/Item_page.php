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

    <main onload="item_render()">
        <section class="form-content">
            <h1 class="heading">
                <span>Iteam</span> page
            </h1>
            <div class="row">
                <div class="image">
                    <img src="../../assets/parts/engine/air-filter-1.png" alt="">
                </div>
                <form class="form" name="form" action="buy-now.php">
                    <h3>air-filter</h3>

                    <div class="inputBox">
                        <input type="number" min="0" value="1" name="">
                        <div>
                            <p class="sub-head-1"><span class="sub-head-2">Available </span>: 5</p>
                            <p class="sub-head-1"><span class="sub-head-2">Price </span>: Rs 5000000.00</p>
                        </div>

                    </div>
                    <div class="inputBox">
                        <div class="color-options">
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

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                        <p><span class="sub-head">Manufacture </span>: BMW</p>
                        <p><span class="sub-head">Model </span>: BMW</p>
                        <p><span class="sub-head">Part number </span>: 4591362194</p>
                        
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