<?php
include("dbConfig.php");

$deviceUUID = array();
$anyDeviceInside = "FALSE";
$sqlGeofence = "SELECT * from geofence_table";
$resultGeofence = mysqli_query($connection, $sqlGeofence);
$deviceInside;

while($rowGeofence = mysqli_fetch_array($resultGeofence, MYSQLI_ASSOC)) {
  $deviceInside = $rowGeofence["Device_Inside"];

  $sqlDevice = "SELECT Device_UUID FROM device_table";
  $resultDevice = mysqli_query($connection, $sqlDevice);

  while($rowDevice = mysqli_fetch_array($resultDevice, MYSQLI_ASSOC)) {
    $sqlLastRecordID = "SELECT * FROM location_data WHERE Device_UUID='". $rowDevice['Device_UUID'] . "' ORDER BY Record_ID DESC LIMIT 1";
    $resultLastRecordID = mysqli_query($connection, $sqlLastRecordID);
    $recordID;

    while($lastRecord = mysqli_fetch_array($resultLastRecordID, MYSQLI_ASSOC)) {
      $recordID = $lastRecord['Record_ID'];
    }

    $sqlLocation = "SELECT * FROM location_data WHERE Device_UUID='"
    . $rowDevice['Device_UUID']. "' AND Latitude between '" . $rowGeofence['BL_Lat']
    . "' and '" . $rowGeofence['TL_Lat'] . "' AND Longitude between '" . $rowGeofence['TL_Long']
    . "' and '" . $rowGeofence['TR_Long'] . "' AND Record_ID = '$recordID'";
    $resultLocation = mysqli_query($connection, $sqlLocation);

    if(mysqli_num_rows($resultLocation) > 0){
      $anyDeviceInside = "TRUE";
    }
  }
}

if($anyDeviceInside == "FALSE" && $deviceInside == "TRUE"){
  $sqlExit = "SELECT * from automation_table WHERE Active = 'TRUE' AND Event_Condition = 'Exit the geofence'";
  $resultExit = mysqli_query($connection, $sqlExit);
  while($rowExit = mysqli_fetch_array($resultExit, MYSQLI_ASSOC)) {
    $sqlExitApplet = "SELECT * from applet_table
    WHERE Event_Name_1 ='".$rowExit['Event']."'
    OR Event_Name_2 ='".$rowExit['Event']."'";
    $resultExitApplet = mysqli_query($connection, $sqlExitApplet);
    while($rowExitApplet= mysqli_fetch_array($resultExitApplet, MYSQLI_ASSOC)){
      $htmlQuery = "https://maker.ifttt.com/trigger/".$rowExit['Event']."/with/key/".$rowExitApplet['IFTTT_Key'];
      file_get_contents($htmlQuery);

      $updateExit = "UPDATE geofence_table SET Device_Inside='FALSE'";
      mysqli_query($connection, $updateExit);
      die("");
    }
  }
}
else if($anyDeviceInside == "TRUE" && $deviceInside == "FALSE"){
  $sqlEnter = "SELECT * from automation_table WHERE Active = 'TRUE' AND Event_Condition = 'Enter the geofence'";
  $resultEnter = mysqli_query($connection, $sqlEnter);
  while($rowEnter = mysqli_fetch_array($resultEnter, MYSQLI_ASSOC)) {
    $sqlEnterApplet = "SELECT * from applet_table
    WHERE Event_Name_1 ='".$rowEnter['Event']."'
    OR Event_Name_2 ='".$rowEnter['Event']."'";
    $resultEnterApplet = mysqli_query($connection, $sqlEnterApplet);
    while($rowEnterApplet= mysqli_fetch_array($resultEnterApplet, MYSQLI_ASSOC)){
      $htmlQuery = "https://maker.ifttt.com/trigger/".$rowEnter['Event']."/with/key/".$rowEnterApplet['IFTTT_Key'];
      file_get_contents($htmlQuery);
      $updateEnter = "UPDATE geofence_table SET Device_Inside='TRUE'";
      mysqli_query($connection, $updateEnter);
      die("");
    }
  }
}
?>
