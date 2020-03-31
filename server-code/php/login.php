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

$email =$_POST['email'];
$password =$_POST['password'];
$query = $con->prepare("SELECT `password` FROM `users` WHERE `email` = ?");
$query->bind_param("s", $email);
$query->execute();

$query->bind_result($hash);
while ($query->fetch()) {

}
$pass_vas = (password_verify($password, $hash));
    if ($pass_vas == true) {
      $login = 0;
      $exec = $con->prepare("SELECT `fullname` FROM `users` WHERE `email` = ?");
      $exec->bind_param("s", $email);
      $exec->execute();

      $exec->bind_result($name);
      while ($exec->fetch()) {

      }
            }
    else {
        $login = 1;
    }

    if($login == 0) {
      echo $name;
}
    elseif ($login == 1) {
      echo "1";
}
    elseif ($login == 2) {
      echo "2";
    }
    else {
      echo "server error";
    }
$query->close();
