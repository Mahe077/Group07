<?php
require 'config/PathConf.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SL MINI Spares</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/reset-style.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/alert.css">
</head>

<body>

    <?php
    $this_page = "quotation.php";
    include_once 'views/global/header-ws.php';
    ?>
    <!--  error alerting will display here -->
    <?php
    include_once 'views/global/alert.php';
    ?>
    <main>
        <section class="form-content" id="quotation">
            <h1 class="heading">
                <span>ADD</span> Quotation
            </h1>
            <div class="row">
                <div class="image">
                    <img src="assets/car/animated/3.jpg" alt="">
                </div>
                <form class="form" name="form" action="Quotation/addQuotation" method="post" enctype="multipart/form-data">
                    <div class="inputBox">
                        <input type="text" name="part_name" placeholder="Enter the part name.." required><br>
                        <input type="text" name="part_no" placeholder="Enter the part number.." required><br>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="brand" placeholder="Enter the brand name.." required><br>
                        <input type="number" name="amount" min="1" placeholder="Enter the amount.." required><br>
                        <input type="file" name="part_image" class="form-control" id="customFile part_image" accept="Image/" />
                        <input type="submit" name="submit" class="btn" value="submit">

                </form>
            </div>
        </section>
    </main>
    </div>
    <script type="text/javascript" src="views/js/customer/main-ws.js"></script>
    <script type="text/javascript" src="views/js/customer/cart.js"></script>
    <script type="text/javascript" src="views/js/alert.js"></script>

</body>

</html>