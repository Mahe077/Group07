<header class="header">

    <a href="#" class="logo">
        <?php
        if ($this_page === 'index.php') {
            echo "<img src='assets/logo.png' alt=''>";
        }
        // } else {
        //     echo "<img src='../img/logo.png' alt=''>";
        // }
        ?>
    </a>

    <nav class="navbar">
        <?php
        if ($this_page != "index.php") {
            echo "<a href='index.php'>Home</a>";
        } else {
            echo "<a href='#home'>Home</a>";
        }
        ?>
        <a href="product.php">Products</a>
        <a href="service.php">Services</a>
        <a href="quotation.php">Quotation</a>
        <?php
        if ($this_page != "index.php") {
            echo "<a href='index.php#about'>About</a>";
            echo "<a href='index.php#contact'>Contact</a>";
        } else {
            echo "<a href='#about'>About</a>";
            echo "<a href='#contact'>Contact</a>";
        }
        ?>
    </nav>

    <div class="icons">
        <a href="message.php">
            <div class='fas fa-bell' id='bell-btn'>
                <div class ="fa-bell-span">+9</div>
            </div>
        </a>
        <div class="fas fa-shopping-cart" id="cart-btn">
            <div class="fa-shopping-cart-span">+9</div>
        </div>
        <div class="fas fa-user-circle" id="profile-btn"></div>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <div class="profile-container">
        <?php
        if (isset($_SESSION['username'])) {
            echo "<a href='profile.php'>Profile</a>";
            echo "<a href='Log_out'>Log Out</a>";
        } else {
            echo "<a href='Log_in'>Log In</a>";
            echo "<a href='Sign_up'>Sign Up</a>";
        }
        ?>

    </div>
    <div class="cart-items-container">
        <div class="cart-body">

            <!-- cart items render here -->

        </div>
        <a href="checkout.php" class="btn">checkout now</a>
    </div>
</header>

<!-- header section ends -->