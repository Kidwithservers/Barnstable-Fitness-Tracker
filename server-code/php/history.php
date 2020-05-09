<?php
//db connection
include "db.php";

//get data
$name =$_GET['name'];

//query setup and execution
$query = $con->prepare("SELECT `steps`, `date` FROM `main_data` WHERE `name` = ? ORDER BY `date` DESC;");
$query->bind_param("s", $name);
$query->execute();

//data storage
$query->bind_result($data["steps"], $data["date"]);
while ($query->fetch()) {
    $row = [];
    foreach ($data as $key => $val) {
        $row[$key] = $val;
    }
    $array[] = $row;
}

//echo data and end query
echo json_encode($array);
$query->close();

?>
