<?php
include "db.php";
if(isset($_GET['name']))
{
$name=$_GET['name'];
$q=mysqli_query($con, "delete from `main_data` where `name` ='$name'"); 
if($q)
echo "success";
else
echo "error";
}
?>
