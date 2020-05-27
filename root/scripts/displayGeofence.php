<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include_once("../scripts/dbConfig.php");

$sql = "SELECT * FROM geofence_table";

$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
echo '{
  "type": "FeatureCollection",
  "crs": {
    "type": "name",
    "properties": {
      "name": "urn:ogc:def:crs:OGC:1.3:CRS84"
    }
  },
  "features": [
    {
      "type": "Feature",
      "properties": {
        "name": "Geofence"
      },
      "geometry": {
        "type": "Polygon",
        "coordinates": [
          [
            [
              '.$row['TL_Long'].',
              '.$row['TL_Lat'].'
            ],
            [
              '.$row['TR_Long'].',
              '.$row['TR_Lat'].'
            ],
            [
              '.$row['BR_Long'].',
              '.$row['BR_Lat'].'
            ],
            [
              '.$row['BL_Long'].',
              '.$row['BL_Lat'].'
            ]
          ]
        ]
      }
    }
      ]
    }';
  }
?>
