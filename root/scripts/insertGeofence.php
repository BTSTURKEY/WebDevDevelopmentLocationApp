<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include_once("../scripts/dbConfig.php");

$tl_lat = mysqli_real_escape_string($connection, $_POST['tl_lat']);
$tl_long = mysqli_real_escape_string($connection, $_POST['tl_long']);
$tr_lat = mysqli_real_escape_string($connection, $_POST['tr_lat']);
$tr_long = mysqli_real_escape_string($connection, $_POST['tr_long']);
$br_lat = mysqli_real_escape_string($connection, $_POST['br_lat']);
$br_long = mysqli_real_escape_string($connection, $_POST['br_long']);
$bl_lat = mysqli_real_escape_string($connection, $_POST['bl_lat']);
$bl_long = mysqli_real_escape_string($connection, $_POST['bl_long']);


$checkSql = "SELECT * from geofence_table";

$checkResult = mysqli_query($connection, $checkSql);

if(mysqli_num_rows($checkResult) > 0){
  $insertSql = "UPDATE geofence_table SET GeoFence_ID='1',TL_Lat=$tl_lat,
  TL_Long=$tl_long,TR_Lat=$tr_lat,TR_Long=$tr_long,BL_Lat=$bl_lat,
  BL_Long=$bl_long,BR_Lat=$br_lat,BR_Long=$br_long";
}
else{
  $insertSql = "INSERT INTO geofence_table (TL_Lat, TL_Long, TR_Lat, TR_Long, BL_Lat,
    BL_Long, BR_Lat, BR_Long, Device_Inside) VALUES ('$tl_lat', '$tl_long','$tr_lat',
      '$tr_long','$bl_lat','$bl_long','$br_lat','$br_long', 'TRUE')";
    }

    if(mysqli_query($connection, $insertSql)){
      echo 'Success';
      mysqli_close($connection);
    }
    else {
      echo "Error: " . $insertSql . "<br>" . mysqli_error($connection);
      mysqli_close($connection);
    }
    ?>
