<?php
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

$db_host = 'localhost';
$db_username = 'webapp';
$db_password = '@Tit1000';
$db_name = 'bfs_fitness_info';

$con=mysqli_connect( $db_host, $db_username, $db_password) or die(mysqli_error());
mysqli_select_db($con, $db_name);


mysqli_query($con, "INSERT INTO `main_data` (name, steps, date) VALUES ('$name', '$steps', '$date') ") or die(mysqli_error($con));


?>
