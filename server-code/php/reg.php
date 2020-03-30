<?php
include 'db.php';
// This function will run within each post array including multi-dimensional arrays
function ExtendedAddslash(&$params)
{
        foreach ($params as &$var) {
            // check if $var is an array. If yes, it will start another ExtendedAddslash() function to loop to each key inside.
            is_array($var) ? ExtendedAddslash($var) : $var=addslashes($var);
            unset($var);
        }
}

// Initialize ExtendedAddslash() function for every $_POST variable
ExtendedAddslash($_POST);
$name =$_POST['name'];
$email =$_POST['email'];
$password =$_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$query = $con->prepare("SELECT * FROM `users` WHERE `email` = ?");
$query->bind_param("s", $email);
$query->execute();
$query->store_result();
if($query->num_rows > 0) {
      $reg = 2;
}
else {
  $insert = $con->prepare("INSERT INTO `users` (`fullname`, `email` , `password` ) VALUES (?, ?, ?)");
  $insert->bind_param("sss", $name, $email, $hash);
  $insert->execute();
  $query->execute();
  $query->store_result();
}
  if($query->num_rows > 0) {
        $reg = 0;
      }
  else {
        $reg = 1;
}
$query->close();
$insert->close();
if($reg == 0) {
  echo "Account Created";
}
elseif ($reg == 2) {
  echo "Account Already Exists";
}
elseif ($reg == 1) {
  echo "internal server error";
}
