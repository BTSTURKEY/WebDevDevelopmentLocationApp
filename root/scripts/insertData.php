<?php
include_once("dbConfig.php");

if($_SERVER['REQUEST_METHOD']!='POST'){
  die(header("Location: https://turkltd.co.uk"));
}
  $uuid = $_POST['UUID'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];
  $time_stamp = $_POST['time_stamp'];

  $sql = "INSERT INTO location_data (Device_UUID, Latitude, Longitude, Time_Stamp)
  VALUES ('$uuid', '$latitude', '$longitude', '$time_stamp')";
  if(mysqli_query($connection, $sql)){
    echo("Record inserted");
  }
  else{
    echo("SQL Query: " . $sql);
    echo("Insert failed: " . mysqli_error($connection));
  }
?>
