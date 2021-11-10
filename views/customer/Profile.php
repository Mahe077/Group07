<<?php
    if (!isset($_SESSION['userid'])) {
        $_SESSION['error'] = 'invalidAccess';
        header("location: Log_in");
        exit();
    }
    require 'config/PathConf.php';
    ?> <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/header.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/profile.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/sidebar.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/form.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/alert.css">
        <!-- Boxiocns CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
        input[type="file"] {
            display: block;
        }
    </style>

    <body>
        <?php
        $this_page = "profile.php";
        include_once 'views/global/header-ws.php';
        ?>
        <!--  error alerting will display here -->
        <?php
        include_once 'views/global/alert.php';
        ?>
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
                            <i class='bx bx-package'></i>
                            <span class="link_name" style="white-space: nowrap;">Order manager</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow' style="margin-left: -6px;"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" style="white-space: nowrap;" href="#">Order Manager</a></li>
                        <li><a href="order.php">General orders</a></li>
                        <li><a href="special-order.php">Special orders</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="password-reset.php">
                            <i class='bx bx-shield-quarter'></i>
                            <span class="link_name" style="white-space: nowrap;">Password Reset</span>
                        </a>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="password-reset.php">Password Reset</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="refund.php">
                            <i class="fas fa-money-bill-wave"></i>
                            <span class="link_name" style="white-space: nowrap;">Refund</span>
                        </a>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="refund.php">Refund</a></li>
                    </ul>
                </li>
                <li>
                    <a href="message.php">
                        <i class='bx bx-bell'></i>
                        <span class="link_name">Notifications</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="message.php">Notifications</a></li>
                    </ul>
                </li>
                <li>
                    <div class="profile-details">
                        <div class="profile-content">
                            <img src="<?php echo $_SESSION['image_path']; ?>" alt="profileImg">
                        </div>
                        <div class="name-job">
                            <div class="profile_name"><?php echo $_SESSION['username'] ?></div>
                        </div>
                        <a href="../controller/logout.inc.php"><i class='bx bx-log-out'></i></a>
                    </div>
                </li>
            </ul>
        </div>

        <section class="home-section bio-data form-content ">
            <div class="row">
                <form name="form" class="form" action="Profile/updateUser" method="POST" enctype="multipart/form-data">
                    <div class="prof-img">
                        <img src="<?php echo $_SESSION['image_path']; ?>">
                        <div class="edit-button">
                            <label for="reset" class="pencil">
                                <i class="fas fa-user-edit"></i>
                                <input style="display:none;" id="reset" type="file" name="image" accept="Image/">
                            </label>
                        </div>
                    </div>
                    <div class="inputBox">
                        <!-- <i class="fas fa-user"></i> -->
                        <input class="input-field" type="text" name="fname" value="<?php echo $_SESSION['fname']; ?>" placeholder="Enter First Name">
                        <!-- <i class="fas fa-user"></i> -->
                        <input class="input-field" type="text" name="sname" value="<?php echo $_SESSION['lname']; ?>" placeholder="Enter Second Name" required>
                    </div>
                    <div class="inputBox">
                        <!-- <i class="fa fa-envelope-o"></i> -->
                        <input class="input-field" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Enter E-mail Address" required>
                        <!-- <i class="fa fa-address-card"></i> -->
                        <input class="input-field" type="text" name="address" value="<?php echo $_SESSION['address']; ?>" placeholder="Enter Address" required>
                    </div>
                    <div class="inputBox">
                        <!-- <i class="fa fa-flag" ></i> -->
                        <input class="input-field" type="text" name="city" value="<?php echo $_SESSION['city']; ?>" placeholder="Enter City" required>


                        <!-- <i class="fa fa-flag-checkered" ></i> -->
                        <input class="input-field" list="select" name="district" placeholder="Enter district" value="<?php echo $_SESSION['district']; ?>" required>
                        <datalist id="select">
                            <option value="Galle"></option>
                            <option value="Matara"></option>
                            <option value="Hambanthota"></option>
                            <option value="Rathnapura"></option>
                            <option value="Colobmo"></option>
                            <option value="Gampaha"></option>
                            <option value="Kaluthara"></option>
                            <option value="Kurunagala"></option>
                            <option value="chillaw"></option>
                            <option value="Jaffna"></option>
                            <option value="Trincomalee"></option>
                            <option value="Batticola"></option>
                            <option value="Ampara"></option>
                            <option value="Badulla"></option>
                            <option value="Anuradhapura"></option>
                            <option value="Kandy"></option>
                            <option value="Mannar"></option>
                            <option value="Puttalam"></option>
                            <option value="Kegalle"></option>
                            <option value="Nuwara Eliya"></option>
                            <option value="Matale"></option>
                            <option value="Polonnaruwa"></option>
                            <option value="Monaragala"></option>
                            <option value="kilinochchi"></option>
                            <option value="Vavniya"> </option>
                        </datalist>
                    </div>
                    <!-- district input field -->
                    <div class="inputBox">
                        <!-- <i class="fa fa-envelope-open-o" aria-hidden="true"></i> -->
                        <input class="input-field" type="number" name="postalcode" value="<?php echo $_SESSION['postal_code']; ?>" placeholder="Enter Postal Code" min="100" max="100000" pattern="[0-9]{5}" required>


                        <!-- <i class="fa fa-phone" ></i> -->
                        <input class="input-field" type="tel" pattern="[0-9]{10}" name="contact" value="<?php echo $_SESSION['contact']; ?>" placeholder="Enter Contact Number" required>
                    </div>
                    <input class="btn" type="submit" name="submit" value="RESET">
                </form>
            </div>
        </section>

        <script type="text/javascript" src="views/js/customer/main-ws.js"></script>
        <script type="text/javascript" src="views/js/customer/sidebar.js"></script>
        <script type="text/javascript" src="views/js/alert.js"></script>
        <script type="text/javascript" src="views/js/customer/cart.js"></script>
    </body>

    </html>