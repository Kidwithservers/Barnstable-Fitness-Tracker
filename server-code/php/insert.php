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
$steps =$_POST['steps'];
$date =$_POST['date'];

$query = $con->prepare("INSERT INTO `main_data` (name, steps, date) VALUES (?, ?, ?)");
$query->bind_param("sss", $name, $steps, $date);
$query->execute();
$query->close();

//mysqli_query($con, "INSERT INTO `main_data` (name, steps, date) VALUES ('$name', '$steps', '$date') ") or die(mysqli_error($con));


?>
