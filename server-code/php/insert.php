<?php
include 'db.php';
set_time_limit(20);
require_once  "bulletproof.php";
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

// This function will run within each post array including multi-dimensional arrays
function ExtendedAddslash(&$params)
{
        foreach ($params as &$var) {
            // check if $var is an array. If yes, it will start another ExtendedAddslash() function to loop to each key inside.
            is_array($var) ? ExtendedAddslash($var) : $var=addslashes($var);
            unset($var);
        }
}

// Initialize ExtendedAddslash() function for every $_POST variable
ExtendedAddslash($_POST);

$name =$_POST['name'];
$steps =$_POST['steps'];
$date =$_POST['date'];
echo $date;
//$image =$_FILES['image'];
$image = new Bulletproof\Image($_FILES);
$image->setLocation(__DIR__ . '/images');
$image->setSize(1, 50000000);


if($image["image"]){
  //$upload = $image->upload();
  //var_dump($upload);
  if($image->upload()){
      $img_id = $image->getName() . '.' . $image->getMime();
    }else{
      echo $image->getError();
      echo "fail at second if";
    }
}


$img_url = "<img src='https://fit-track.octs.tech/phonegap/database/images/" . $img_id . "' alt='verification image' width='75' hight='75' border='0'>" ;

$query = $con->prepare("INSERT INTO `main_data` (name, steps, date, Image_URL) VALUES (?, ?, ?, ?)");
$query->bind_param("ssss", $name, $steps, $date, $img_url);
$query->execute();
$query->close();
?>
