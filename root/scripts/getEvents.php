<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include_once("../scripts/dbConfig.php");

$query1 = "SELECT Event_Name_1 FROM applet_table";
$query2 = "SELECT Event_Name_2 FROM applet_table";

$result1 = mysqli_query($connection, $query1);
$result2 = mysqli_query($connection, $query2);

while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
  echo $userLabel='<option>'.$row1['Event_Name_1'].'</option>';
}

while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
  echo $userLabel='<option>'.$row2['Event_Name_2'].'</option>';
}
?>
