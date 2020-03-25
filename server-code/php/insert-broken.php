<?php
    include "db.php";
    if(isset($_POST['insert']))
    {
    $name=$_POST['name'];
    $steps=$_POST['steps'];
    $date=$_POST['date'];
    $query="INSERT INTO main_data (name, steps, date) VALUES (?,?,?)";
    //$query=mysqli_query($con,"INSERT INTO `main_data` ( `name` , `steps` , `date` ) VALUES ('$name','$steps','$date')");
    $stmt = mysqli_prepare($query);
    $stmt->bind_param("sss", $name, $steps, $date);
    $stmt->execute();
    printf("%d Row inserted.\n", $stmt->affected_rows);
    $stmt->close();
  }
?>
