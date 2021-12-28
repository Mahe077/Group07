<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require 'config/PathConf.php'; ?>

<head>
    <?php
    if (!isset($_SESSION['userid'])) {
        echo "<script type='text/javascript'>
            localStorage.clear();
        </script>";
    }
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="/site.webmanifest">


    <title>SL MINI Spares</title>

    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/reset-style.css">

    <!-- swiper -->
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" type='text/css' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/customer/index.css">
    <link rel='stylesheet' type='text/css' href="<?php echo $localhost; ?>views/css/swiper.css">
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/alert.css">
</head>

<body onload="index_loader(),removeItem()">
    <!-- header section starts  -->

    <?php
    $this_page = "index.php";
    include_once 'global/header-ws.php';
    ?>
    <!-- home section starts  -->
    <main>
        <section class="home" id="home">
            <div class="content">
                <!--  error alerting will display here -->
                <?php
                include_once 'global/alert.php';
                ?>
                <h3>Welcome to <br>SL MINI Spares</h3>
                <p>Your vehicle is save in our hands. We are specilize in complete auto care at a low cost and in a professional manner.</p>
                <a href="#" class="btn">Try now</a>
            </div>

            <!-- Slider main container -->
            <div class="swiper" id="home">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide" style="background-image: url('assets/car/cars/2.jpg');"></div>
                    <div class="swiper-slide" style="background-image: url('assets/car/cars/3.jpg');"></div>
                    <div class="swiper-slide" style="background-image: url('assets/car/cars/4.jpg');"></div>
                    <div class="swiper-slide" style="background-image: url('assets/car/cars/5.jpeg');"></div>
                    <div class="swiper-slide" style="background-image: url('assets/car/cars/6.jpg');"></div>
                    <div class="swiper-slide" style="background-image: url('assets/car/cars/7.jpg');"></div>
                    <div class="swiper-slide" style="background-image: url('assets/car/cars/8.jpg');"></div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>
        <!-- home section ends -->

        <!-- info section starts  -->
        <section class="about" id="about">
            <h1 class="heading"> <span>about</span> us </h1>
            <div class="row">
                <div class="image">
                    <img src="assets/car/info-img/engine.gif" alt="">
                </div>

                <div class="content">
                    <h3>what makes we are special?</h3>
                    <p>Driving one of the best cars? Bring it to the best SL MINI Spares team! With our years of experience and know-how, we have built a large knowledge base for all vehicle in Sri lanka.</p>
                    <p>Servicing all mechanical repairs, from regular and preventative maintenance, to things such as brake service, tune-ups, oil change, drive-line service, transmission service, all electronic services, full electronic diagnosis, software coding and programming, walnut blasting service, full and complete engine rebuilds, transmission rebuilds and much much more........</p>
                    <a href="https://en.wikipedia.org/wiki/Engine" class="btn">learn more</a>
                </div>
            </div>

            <div class="row r2">
                <div class="image" style="order: 2">
                    <img src="assets/car/info-img/3.jpg" alt="">
                </div>
                <div class="content" style="order: 1">
                    <h3>what makes we are special?</h3>
                    <p>When it comes to upgrades and performance enhancements on your vehicle, there is one name in the business that is synonymous with excellence; SL MINI Spares. </p>
                    <p>Our vast inventory of high-end auto parts is second to none.</p>
                    <a href="service.php" class="btn">learn more</a>
                </div>
            </div>
        </section>
        <!-- info section ends  -->

        <!-- review section starts  -->

        <section class="review" id="review">

            <h1 class="heading">
                <span>Feed</span>back
            </h1>
            <div class="swiper-container review-slider">
                <div class="swiper-wrapper" id="review-slider_wrapper">
                </div>
            </div>

        </section>

        <!-- review section ends -->

        <!-- Contact sectionn start -->
        <section class="contact" id="contact">
            <h1 class="heading">
                <span>Contact</span> us
            </h1>
            <div class="row">
                <div class="image">
                    <img src="assets/car/animated/1.jpg" alt="">
                </div>
                <form action="">
                    <div class="inputBox">
                        <input type="text" placeholder="Name">
                        <input type="email" placeholder="Email">
                    </div>
                    <div class="inputBox">
                        <input type="text" placeholder="Contact number"><!-- look here  -->
                        <input type="text" placeholder="Subject">
                    </div>
                    <textarea placeholder="Message" name="" id="" cols="30" rows="10"></textarea>
                    <input type="submit" class="btn" value="send message">
                </form>
            </div>
        </section>

        <!-- contact section ends -->

        <!-- brand section  -->
        <section class="brand-container">
            <div class="swiper-container brand-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="assets/brand_logo/audi.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/brand_logo/benz.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/brand_logo/bmw.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/brand_logo/mustang.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/brand_logo/lexus.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/brand_logo/mini.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/brand_logo/toyota.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/brand_logo/ford.png" alt="">
                    </div>

                </div>
            </div>
        </section>
    </main>

    <?php
    include_once 'global/footer.php';
    ?>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="views/js/customer/main-ws.js"></script>
    <script type="text/javascript" src="views/js/customer/index_loader.js"></script>
    <script type="text/javascript" src="views/js/swiper.js"></script>
    <script type="text/javascript" src="views/js/alert.js"></script>
    <script type="text/javascript" src="views/js/customer/cart.js"></script>
    <script type="text/javascript" src="views/js/customer/index_loader.js"></script>

</body>

</html>