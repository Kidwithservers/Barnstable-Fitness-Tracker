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
    }
    else {
        echo "its fucked";
        $login = 1;
    }

    if($login == 0) {
      echo "success";
}
    elseif ($login == 1) {
      echo "Incorect Password";
}
    elseif ($login == 2) {
      echo "Incorrect email or no account";
    }
    else {
      echo "server error";
    }
$query->close();
