<?php
include "db.php";
if(isset($_POST['update']))
{
$name=$_POST['name'];
$steps=$_POST['steps'];
$date=$_POST['date'];
$q=mysqli_query($con,"UPDATE `main_data` SET `name` ='$name', `steps` ='$steps', `date` ='$date' where `name` ='$name'");
if($q)
echo "success";
else
echo "error";
}
?>
