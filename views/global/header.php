<header class="header">

    <a href="#" class="logo">
        <?php
        if ($this_page === 'index.php') {
            echo "<img src='assets/logo.png' alt=''>";
        } else {
            echo "<img src=" . $localhost . "assets/logo.png alt=''>";
        }
        ?>
    </a>

    <nav class="navbar">
        <?php
        if ($this_page != "index.php") {
            echo "<a href='Index'>Home</a>";
        } else {
            echo "<a href='#home'>Home</a>";
        }
        ?>
        <a href="Product">Products</a>
        <a href="Service">Services</a>
        <a href="Quotation">Quotation</a>
        <?php
        if ($this_page != "index.php") {
            echo "<a href='Index#about'>About</a>";
            echo "<a href='Index#contact'>Contact</a>";
        } else {
            echo "<a href='#about'>About</a>";
            echo "<a href='#contact'>Contact</a>";
        }
        ?>
    </nav>

    <div class="icons">
        <div class='fas fa-search' id='search-btn'></div>
        <a href="message.php">
            <div class='fas fa-bell' id='bell-btn'>
                <div class="fa-bell-span">0</div>
            </div>
        </a>
        <div class="fas fa-shopping-cart" id="cart-btn">
            <div class="fa-shopping-cart-span">0</div>
        </div>
        <div class="fas fa-user-circle" id="profile-btn"></div>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <form class="search-form" onsubmit="return doSearch()">
        <input name="search" type="search" id="search-box" placeholder="search here..." required>
        <button type="submit" class="submit-search" name="submit"><i for="search-box" class="fas fa-search search-submit"></i></button>
    </form>

    <div class="profile-container">
        <?php
        if (isset($_SESSION['username'])) {
            echo "<a href='Profile'>Profile</a>";
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
        <a href="Checkout" class="btn">checkout now</a>
    </div>
</header>

<!-- header section ends -->