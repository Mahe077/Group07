<?php
require 'config/PathConf.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SL MINI Spares</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/reset-style.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/customer/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $localhost; ?>views/css/form.css">
    <link rel="stylesheet" href="<?php echo $localhost; ?>views/css/alert.css">
</head>

<body onload="removeItem()">

    <?php
    $this_page = "profile.php";
    include_once 'views/global/header-ws.php';
    ?>
    <!--  error alerting will display here -->
    <?php
    include_once 'views/global/alert.php';
    ?>
    <main>
        <section class="form-content">
            <h1 class="heading">
                <span>Service</span> recommendation
            </h1>
            <div class="row">
                <div class="image">
                    <img src="assets/car/animated/4.jpg" alt="">
                </div>
                <form class="form" name="form" action="#" method="post" id="reservation">
                    <h3>General Vehicle Services</h3>
                    <div class="inputBox">
                        <input type="text" placeholder="Vehicle - Year/Make/Model" name="vehicle-info" required>
                        <input type="textarea" placeholder="Service Requested" name="service" required>
                    </div>
                    <input type="submit" name="submit" class="btn" value="Recommendations">

                </form>
            </div>
        </section>
        <section class="about">
            <form action="#" method="post">
                <div class="row">
                    <div class="content">
                        <h3>Popular Vehicle Services</h3>
                        <p>Although we offer whatever car services you may require we would like to give a little more information on some of the more popular ones below. If you don't see what you need listed on this page either above or below here... just call in and we'll get you booked for whatever your car needs.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="content">
                        <h3>Oil Change</h3>
                        <p>
                            Regular vehicle maintenance and oil changes are important factors in extending the life of your vehicle here in Calgary. For the best performance, we at Euroworks recommend that you change your oil and filter every three months or 5,000 kilometres. Engine Oil performs vital functions in a vehicle's engine which allows for durability and longevity; ensure you have your oil services up to date and call us for your next appointment.
                        </p>
                        <input type="submit" name="submit" class="btn" value="Recommendations">
                    </div>
                </div>
                <div class="row">
                    <div class="content">
                        <h3>Vehicle Inspections</h3>
                        <p>
                            Before you buy a car here in Calgary (or anywhere else for that matter), head out on the road, or pay for repairs... bring your car in for a EuroApproved Inspection. The reason is simple, you can have a Journeyman Mechanic inspect your car and then advise you on any needed repairs. We provide a report that is easy to understand and allows you to focus on what repairs need completing most urgently. We will provide you with a price of what repairs will cost, what needs to be completed, and what kind of time-frame it will take to complete the needed repairs. This will help you budget your repairs and keep your vehicle in great driving order.
                        </p>
                        <input type="submit" name="submit" class="btn" value="Recommendations">
                    </div>
                </div>
                <div class="row">
                    <div class="content">
                        <h3>Vehicle Diagnostics</h3>
                        <p>
                            Vehicle DiagnosticsDue to current requirements, modern vehicles are equipped with modern technology and electronic management systems that control all basic and detailed information and all running data. We have state of the art technology to allow us to properly connect, diagnose and effectively carry out the correct changes to your vehicles. Don't feel you have to go to the large dealerships and pay their prices to get professional car electronics repairs in Calgary.
                        </p>
                        <input type="submit" name="submit" class="btn" value="Recommendations">
                    </div>
                </div>
                <div class="row">
                    <div class="content">
                        <h3>Driveline Systems</h3>
                        <p>
                            Your car's Drivetrain is a vital power-transmitting component and key to dependability. It's responsible for flow of power from the engine to the wheels and their are many components included that make up this major part of your vehicle. You do not want to take these components for granted until something goes wrong. That "something" can range from leaks or strange noises to Shifting Problems to total failure. If you do a lot of stop-and-go-driving, heavy driving, or otherwise subject your vehicle to unusual service, you do want make a stop and have us take look at your vehicle. With regular checks and maintenance you can expect two bonuses: a more dependable car, as well fewer bills... which all Calgarians can appreciate!
                        </p>
                        <input type="submit" name="submit" class="btn" value="Recommendations">
                    </div>
                </div>
                <div class="row">
                    <div class="content">
                        <h3>Vehicle Tune-Up</h3>
                        <p>

                            Infrequent tune-ups can lead to poor Fuel Mileage, rough running, and difficult starting. Call Euroworks in Calgary to schedule an Engine Diagnostic test to determine your tune-up needs, whether it's a fuel injector service to restore Engine Performance, power and mileage or fuel filter and air filter replacements.
                        </p>
                        <input type="submit" name="submit" class="btn" value="Recommendations">
                    </div>
                </div>
                <div class="row">
                    <div class="content">
                        <h3>Brake Services</h3>
                        <p>

                            Your brakes are probably the most important part of your car. Without an intake s ystem, you'll just sit there. But seriously, brakes aren't something to play around with. If your car is having a Braking Problem, whether it's weak brakes, a mushy pedal, grinding sounds - whatever your brake problem is, you need to ensure you repair it as soon as possible. You don't want to be brake-less on Deerfoot, right Alberta? We'll help you diagnose your braking problem so you know what repairs to make.
                        </p>
                        <input type="submit" name="submit" class="btn" value="Recommendations">
                    </div>
                </div>
            </form>
        </section>
    </main>
    </div>
    <script type="text/javascript" src="views/js/customer/main-ws.js"></script>
    <script type="text/javascript" src="views/js/customer/cart.js"></script>
</body>

</html>