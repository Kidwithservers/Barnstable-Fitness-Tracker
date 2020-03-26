<?php
 header("Access-Control-Allow-Origin: *");
 $con=mysqli_connect("localhost","webapp","@Tit1000");
 mysqli_select_db($con, "bfs_fitness_info");
?>
