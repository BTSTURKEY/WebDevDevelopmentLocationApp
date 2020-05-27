<?php
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include_once("scripts/dbConfig.php");

$sql = "SELECT * from geofence_table";

$result = mysqli_query($connection, $sql);

if(mysqli_num_rows($result) > 0){
  echo 'FALSE';
}
else{
  echo 'TRUE';
}
?>
