<?php
include "db.php";
$name=$_POST['name'];
$rows=array();
$query = $con->prepare("SELECT * FROM `main_data` WHERE `name` = '?' ORDER BY `date` DESC;");
$query->bind_param("s", $name);
$query->execute();
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
