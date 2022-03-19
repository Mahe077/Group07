<?php
$result;

function Deteminesize($image, $folder)
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