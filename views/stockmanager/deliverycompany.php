<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/9c5a05f882.js" crossorigin="anonymous"></script>

    <title>SL MINI SPARES</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
* {
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
  .header{
      background-color: #042434;
  }
  .logo{
    width: 20%;
    height: auto;
  }
  .container{
    margin: auto;
    width: 60%;
    border: 3px solid #55b9bd;
    background-color: #bfddde;
    box-shadow: 0 0 30px rgba(0, 0, 0, .2);
    padding: 10px;
    margin-top: 30px;
    text-align: center;
    padding-bottom: 40px;
    margin-bottom:10px
  }

  a{
  text-decoration: none;
}
.accept {
  color: #FFF;
  background: #44CC44;
  padding: 15px 20px;
  box-shadow: 0 4px 0 0 #2EA62E;
}
.accept:hover {
  background: #6FE76F;
  box-shadow: 0 4px 0 0 #7ED37E;
}
.deny {
  color: #FFF;
  background: tomato;
  padding: 15px 20px;
  box-shadow: 0 4px 0 0 #CB4949;
}
.deny:hover {
  background: rgb(255, 147, 128);
  box-shadow: 0 4px 0 0 #EF8282;
}

    </style>
</head>
<body>
<?php
    $this_page = "deliverycompany.php";
    
?>
<header class="header">
    <img class="logo" src="assets/logo.png">
  </header>
  <div class="container">
      <h1>Delivery Request Conformation</h1>
      <p>Do you want to accept the above requst that we assign you with all delivery details?</p>

      
        <br>
        <a href="Stockmanagerdelivery/confirm" class="accept">ACCEPT <span class="fa fa-check"></span></a>
        <a href="#" class="deny">DENY <span class="fa fa-close"></span></a>

</div>
</body>
</html>