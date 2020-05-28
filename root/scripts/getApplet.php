<?php
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include_once("scripts/dbConfig.php");

$sql = "SELECT Applet_ID, Device_Name FROM applet_table";
$result = mysqli_query($connection, $sql);

echo '<option> All </option>';
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  echo'<option>'.$row['Device_Name'].'</option>';
}
?>
