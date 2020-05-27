<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include_once("../scripts/dbConfig.php");

$day = 0;
$dayPlus = $day-1;
$device = $_GET['device'];
$deviceSQL = "";

if(!empty($_GET['day'])){
  $day = $_GET['day'];
  $dayPlus = $day-1;
}

$minDay = date("Y/m/d", strtotime("-$day days"));
$maxDay = date("Y/m/d", strtotime("-$dayPlus days"));

if($device != "All"){
  $deviceSQL = "WHERE Time_Stamp
  between \"$minDay\" and \"$maxDay\"
  AND Device_Name = \"$device\"";
}
else{
  $deviceSQL = "WHERE Time_Stamp
  between \"$minDay\" and \"$maxDay\"";
}

$deviceQuery = "SELECT Device_UUID, Device_Name FROM device_table";

$dataQuery = "SELECT location_data.Record_ID, device_table.Device_Name,
location_data.Latitude, location_data.Longitude, location_data.Time_Stamp
FROM location_data
INNER JOIN device_table
ON location_data.Device_UUID=device_table.Device_UUID
$deviceSQL";

$deviceResult = mysqli_query($connection, $deviceQuery);
$dataResult = mysqli_query($connection, $dataQuery);

$overall = array();
$overall['type'] = "FeatureCollection";
$features = array();
$colorArray = array("Orange", "Blue", "Green", "Pink", "Yellow", "Purple", "Teal");
$deviceArray = array();

while ($deviceRow = mysqli_fetch_array($deviceResult, MYSQLI_ASSOC)){
  $deviceArray[] = $deviceRow['Device_Name'];
}

$deviceArayCount = count($deviceArray);

while ($dataRow = mysqli_fetch_array($dataResult, MYSQLI_ASSOC)){

  $device = $dataRow['Device_Name'];
  for ($i = 0; $i <= $deviceArayCount; $i++){
    if ($device == $deviceArray[$i]){
      $color = $colorArray[$i];
      break;
    }
  }

  $ind = array();
  $geometry = array();
  $properties = array();

  $ind["type"] = "Feature";
  $geometry["type"] = "Point";
  $geometry["coordinates"] = array($dataRow['Longitude'], $dataRow['Latitude']);
  $properties["user"] = $dataRow['Device_Name'];
  $properties["color"] = $color;
  $properties["time_stamp"] = substr($dataRow["Time_Stamp"], 11, 8);
  $ind["properties"] = $properties;
  $ind["geometry"] = $geometry;

  array_push($features,$ind);
}

$overall["features"] = $features;

$jsonResult = json_encode($overall, JSON_PRETTY_PRINT);

echo $jsonResult;
?>
