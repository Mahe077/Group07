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
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/reset-style.css">

    <!-- swiper -->
    <link rel="stylesheet" type='text/css' href="<?php echo $localhost; ?>views/css/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- boxicon cdn link  -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/sidebar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/product.css">
</head>

<body onload="productload(),removeItem()" id="product_page">
    <!-- header section starts  -->
    <?php
    $this_page = "profile.php";
    include_once 'views/global/header.php';
    ?>
    <!--  error alerting will display here -->
    <?php
    include_once 'views/global/alert.php';
    ?>
    <!-- header section ends  -->

    <main >

        <div class="sidebar close">
            <ul class="nav-links">
                <li>
                    <a href="#">
                        <i class='bx bx-grid-alt'></i>
                        <span class="link_name">Dashboard</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Dashboard</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bxs-car-garage'></i>
                            <span class="link_name">Products</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Products</a></li>
                        <li><a href="product.php">ALL</a></li>
                        <form action="return category()">
                            <li>
                                <p class="filter-links"><input type="hidden" value="Engine">Engine</p>
                            </li>
                            <li>
                                <p class="filter-links"><input type="hidden" value="Brake">Brake</p>
                            </li>
                            <li>
                                <p class="filter-links"><input type="hidden" value="Suspension & steering">Suspension & steering</p>
                            </li>
                            <li>
                                <p class="filter-links"><input type="hidden" value="Transmission">Transmission</p>
                            </li>
                            <li>
                                <p class="filter-links"><input type="hidden" value="Cooling & heating">Cooling & heating</p>
                            </li>
                            <li>
                                <p class="filter-links"><input type="hidden" value="Eletrical & lighting">Eletrical & lighting</p>
                            </li>
                            <li>
                                <p class="filter-links"><input type="hidden" value="body & exhaust">Body & exhaust</p>
                            </li>
                        </form>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-filter-alt'></i>
                            <span class="link_name">Filters</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">filters</a></li>
                        <li><a href="product.php">ALL</a></li>
                        <form>
                            <li>
                                <p class="filter-links"><input type="radio" name="genuiness" value="genuine">Genuine</p>
                            </li>
                            <li>
                                <p class="filter-links"><input type="radio" name="genuiness" value="Compatible">Compatible</p>
                            </li>
                            <!-- <hr> -->
                            <!-- <li>
                                <p class="filter-links">price</p><input min="0" max="1000000" type="range" name="price" id="price" step="100" value="Compatible">
                                <output class="price-output" for="price"></output>
                            </li> -->

                        </form>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="home-section outer-container">
            <div class="products">
                <div class="container">
                    <h1 class="lg-title">Lowerst price from us</h1>
                    <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco.</p>
                    <h2 class="backToProduct sm-title"></h2>

                    <div class="product-items">
                        <!-- products loads here -->
                    </div>
                </div>
            </div>
        </div>


    </main>

    <script type="text/javascript" src="views/js/customer/product.js"></script>
    <script type="text/javascript" src="views/js/customer/main.js"></script>
    <script type="text/javascript" src="views/js/customer/sidebar.js"></script>
    <script type="text/javascript" src="views/js/alert.js"></script>
    <script type="text/javascript" src="views/js/customer/cart.js"></script>
</body>

</html>