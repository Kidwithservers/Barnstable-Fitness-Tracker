<?php
    header("Access-Control-Allow-Origin: *");
    $con = mysqli_connect("localhost","webapp","@Tit1000","bfs_fitness_info");
    if ($con->connect_error) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    die("Connection failed: " . $conn->connect_error);
  }
?>
