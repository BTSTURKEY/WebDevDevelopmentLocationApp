<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include_once("scripts/dbConfig.php");

$deviceQuery = "SELECT * FROM device_table";
$deviceResult = mysqli_query($connection, $deviceQuery);

echo '<option label="All"> All </option> ';
while ($deviceRow = mysqli_fetch_array($deviceResult, MYSQLI_ASSOC)){
  $userLabel='<option label="' . $deviceRow["Device_Name"] . '">"' . $deviceRow['Device_Name'] . '"</option>';
  echo $userLabel;
}
?>
