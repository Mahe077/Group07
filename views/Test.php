<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SL MINI SPARES</title>
</head>
<body>
    <h1>Hello World!</h1>
    <h2>User</h2>
    <!-- <?php 
    // print_r($this->users)
    ?> -->
    <?php 
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        // if($_SESSION['error'] == "hi13"){
        //     echo "123456789";
        // }else{
        //     // echo "hi";
        //     echo $_SESSION['error'];
        // }
    } 
    ?>
</body>
</html>