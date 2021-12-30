
<?php
$result;

function invalidToday($date)
{
  $date_now = date("Y-m-d"); // this format is string comparable

  if ($date_now > $date || $date < '1921-01-01') {
    $result = false;
  } else {
    $result = true;
  }
  return $result;
}
function invalidName($tmp)
{
  if (!preg_match("/^[a-zA-Z]*$/", $tmp)) {
    $result = true;
  } elseif (empty($tmp)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}
function invalidString($username)
{
  if (!preg_match("/^[a-zA-Z0-9@#\$%&-_\/ ]*$/", $username)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}
function invalidAddress($address)
{
  if (!preg_match("/^[a-zA-Z0-9-\/,:.\s]*$/", $address)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}
// check this again
function invalidNic($nic)
{
  if (!preg_match("/^[0-9]{9}([0-9]{3}|[vV])$/", $nic)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}
// 
function passwordMatch($password, $repassword)
{
  if ($password !== $repassword) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function filseSize($image, $folder)
{
  $filename = $image['name'];
  $filetmpname = $image['tmp_name'];
  $size = $image['size'];
  $error = $image['error'];
  $type = $image['type'];

  $fileext = explode('.', $filename);
  $fileactualext = strtolower(end($fileext));

  $allowed = array('jpg', 'jpeg', 'png', 'pdf');
  if (in_array($fileactualext, $allowed)) {
    if ($error === 0) {
      if ($size < 10000000) {
        $filenameNew = uniqid('', true) . "." . $fileactualext;
        $fileDestination = 'assets/' . $folder . '/' . $filenameNew;
        move_uploaded_file($filetmpname, $fileDestination);
        return $fileDestination;
      } else {
        $_SESSION['error'] = "toobig";
        header("location:http://localhost/G7/Group07/Sign_up");
        exit();
      }
    } else {
      $_SESSION['error'] = "imageUploadUnsuccess";
      header("location:http://localhost/G7/Group07/Sign_up");
      exit();
    }
  } else {
    $_SESSION['error'] = "invalidfiletype";
    header("location:http://localhost/G7/Group07/Sign_up");
    exit();
  }
}

// function search($conn,$search){
//     $sql = "SELECT * FROM customer WHERE username = ? OR email = ?;";
//     $stmt = mysqli_stmt_init($conn);
//     if (!mysqli_stmt_prepare($stmt, $sql)) {
//       header("location: ../view/index.php?error=stmtfailed");
//     }

//     mysqli_stmt_bind_param($stmt, "ss", $search, $search);
//     mysqli_stmt_execute($stmt);

//     $resultData =mysqli_stmt_get_result($stmt);

//     if ($row = mysqli_fetch_assoc($resultData)) {
//       return $row;
//     }
//     else{
//       $result = false;
//       return $result;
//     }

//     mysqli_stmt_close($stmt);
// }

function invalidStringWithNumber($tmp){
    if (empty($tmp))
      $result = true;
    elseif (preg_match("/^[a-zA-Z0-9-#]*$/", $tmp)) {
      $result = false;
    }
    else{
      $result = true;
    }
    return $result;
} 
function invalidPositiveNumber($tmp)
{
  if (empty($tmp))
    $result = true;
  elseif (preg_match("/^[0-9].*$/", $tmp)) {
    $result = false;
  } else {
    $result = true;
  }
  return $result;
} 
