<?php
include 'db.php';
header('Access-Control-Allow-Origin: *');
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

//query and get useranme and password
$email =$_POST['email'];
$password =$_POST['password'];
$query = $con->prepare("SELECT `password` FROM `users` WHERE `email` = ?");
$query->bind_param("s", $email);
$query->execute();
$query->bind_result($hash);
while ($query->fetch()) {

}

//passowrd verification
$pass_vas = (password_verify($password, $hash));
    if ($pass_vas == true) {

//teacher role varification query
      $role = $con->prepare("SELECT `role` FROM `users` WHERE `email` = ?");
      $role->bind_param("s", $email);
      $role->execute();

      $role->bind_result($role);
      while ($role->fetch()) {

      }

//teacher role verification
      if($role == "techer" || $role == "admin"){

//fetch name of user
      $login = 0;
      $exec = $con->prepare("SELECT `fullname` FROM `users` WHERE `email` = ?");
      $exec->bind_param("s", $email);
      $exec->execute();

      $exec->bind_result($name);
      while ($exec->fetch()) {

      }
            }
    else {
        $login = 3;
    }
}
  else {
    $login = 1
  }

//event handler
    if($login == 0) {
      echo $name;
}
    elseif ($login == 1) {
      echo "1";
}
    elseif ($login == 2) {
      echo "2";
    }
    elseif ($login == 3) {
      echo "3";
    }
    else {
      echo "server error";
    }
$query->close();
