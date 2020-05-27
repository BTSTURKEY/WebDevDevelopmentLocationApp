<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include_once("../scripts/dbConfig.php");


$sql = "DELETE FROM geofence_table";

if(mysqli_query($connection, $sql)) {
  mysqli_close($connection);
  echo 'Success';

}
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  mysqli_close($connection);
}
?>
