<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include_once("../scripts/dbConfig.php");

$deviceGET = $_GET['device'];

$lastLocQuery = "SELECT location_data.Record_ID, device_table.Device_Name,
location_data.Latitude, location_data.Longitude, location_data.Time_Stamp
FROM location_data
INNER JOIN device_table
ON location_data.Device_UUID=device_table.Device_UUID
WHERE Device_Name = \"$deviceGET\"
ORDER BY Record_ID DESC LIMIT 1";

$lastLocResult = mysqli_query($connection, $lastLocQuery);

$overall = array();
$overall['type'] = "FeatureCollection";
$features = array();

while ($row = mysqli_fetch_array($lastLocResult, MYSQLI_ASSOC)){
  $ind = array();
  $geometry = array();
  $properties = array();

  $ind["type"] = "Feature";
  $geometry["type"] = "Point";
  $geometry["coordinates"] = array($row['Longitude'], $row['Latitude']);
  $properties["time_stamp"] = substr($row["Time_Stamp"], 11, 8);
  $ind["properties"] = $properties;
  $ind["geometry"] = $geometry;

  array_push($features,$ind);
}

$overall["features"] = $features;

$jsonResult = json_encode($overall, JSON_PRETTY_PRINT);

echo $jsonResult;
?>
