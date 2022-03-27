<header class="header">

    <a href="#" class="logo">
        <?php
        if ($this_page === 'index.php') {
            echo "<img src='assets/logo.png' alt=''>";
        } else {
            echo "<img src=".$localhost."assets/logo.png alt=''>";
        }
        ?>
    </a>

    <nav class="navbar">
        <?php
        if ($this_page != "index.php") {
            echo "<a href='".$localhost."index'>Home</a>";
        } else {
            echo "<a href='#home'>Home</a>";
        }
        ?>
        <a href="<?php echo $localhost; ?>Product">Products</a>
        <a href="<?php echo $localhost; ?>Service">Services</a>
        <a href="<?php echo $localhost; ?>Quotation">Quotation</a>
        <?php
        if ($this_page != "index.php") {
            echo "<a href='". $localhost."Index#about'>About</a>";
            echo "<a href='". $localhost."Index#contact'>Contact</a>";
        } else {
            echo "<a href='". $localhost."#about'>About</a>";
            echo "<a href='". $localhost."#contact'>Contact</a>";
        }
        ?>
    </nav>

    <div class="icons">
        <a href="<?php echo $localhost; ?>Notification">
            <div class='fas fa-bell' id='bell-btn'>
                <div class ="fa-bell-span">0</div>
            </div>
        </a>
        <div class="fas fa-shopping-cart" id="cart-btn">
            <div class="fa-shopping-cart-span">0</div>
        </div>
        <div class="fas fa-user-circle" id="profile-btn"></div>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <div class="profile-container">
        <?php
        if (isset($_SESSION['username'])) {
            echo "<a href='". $localhost."Profile'>Profile</a>";
            echo "<a href='". $localhost."Log_out'>Log Out</a>";
        } else {
            echo "<a href='". $localhost."Log_in'>Log In</a>";
            echo "<a href='". $localhost."Sign_up'>Sign Up</a>";
        }
        ?>

    </div>
    <div class="cart-items-container">
        <div class="cart-body">

            <!-- cart items render here -->

        </div>
        <?php
            echo "<a href='".$localhost."Checkout' class='btn'>checkout now</a>";
        ?>
    </div>
</header>

<!-- header section ends -->