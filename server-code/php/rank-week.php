<?php
//databse connection
include "db.php";

//date information
date_default_timezone_set('America/New_York');
$date=date("Y-m-d");
$lastWeek = date("Y-m-d", strtotime("last sunday"));

//mysql query
$rows=array();
$q=mysqli_query($con, "SELECT `name` AS `Name`, SUM(`steps`) AS `Steps` FROM `main_data` WHERE `date` BETWEEN '$lastWeek' AND '$date' GROUP BY `name` ORDER BY `steps` DESC LIMIT 10;");

//mysql get/parse data
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
