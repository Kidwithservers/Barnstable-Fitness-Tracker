<?php
include "db.php";
date_default_timezone_set('America/New_York');
$date=date("Y-m-d");
$rows=array();
$q=mysqli_query($con, "SELECT * FROM `main_data` WHERE `date` = '$date' ORDER BY `steps` DESC LIMIT 10;");
if (mysqli_num_rows($q) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($q)) {
      // echo $row["name"] . $row["steps"]. $row["date"];
      $rows[] = $row;
}
print json_encode($rows);

} else {
    echo "0 results";
}
?>
