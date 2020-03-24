<?php
include "db.php";
    if(isset($_POST['insert']))
    {
    $name=$_POST['name'];
    $steps=$_POST['steps'];
    $date=$_POST['date'];
    $q=mysqli_query($con,"INSERT INTO `main_data` ( `name` , `steps` , `date` ) VALUES ('$name','$steps','$date')");
    if($q)
    echo "success";
    else
    echo "error";
    }
?>
