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
   <?php 
    print_r($this->users)
    ?> 
    <?php 
    // if(isset($_SESSION['error'])){
    //     echo $_SESSION['error'];
    //     // if($_SESSION['error'] == "hi13"){
    //     //     echo "123456789";
    //     // }else{
    //     //     // echo "hi";
    //     //     echo $_SESSION['error'];
    //     // }
    // } 
    // echo $data;
    // print_r($this->users);
    // print_r($this->id);
    // print_r($_SESSION['cartid'][0][0])
    // print_r($this->amount);
    // foreach ($this->users as $key => $value) {
    //     // $this->getItem($this->users);
    //     print_r($value[0]);
    // }

    ?>
    <form action="/Test/A" method="post">
    <input type="text" name="username">
    <input type="submit" value="submit">
</form>
</body>
</html>