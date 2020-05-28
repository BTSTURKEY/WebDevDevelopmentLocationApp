<?php
if($_SERVER['REQUEST_METHOD']!='POST'){
  die(header("Location: https://turkltd.co.uk"));
}
include_once("dbConfig.php");

$value = $_POST['applet'];

if ($value == "All"){
  $sql = "DELETE FROM applet_table";
}
else{
  $sql = 'DELETE FROM applet_table WHERE Device_Name ="'.$value.'"';

}

if(mysqli_query($connection, $sql)) {
  mysqli_close($connection);
  echo 'Success';

}
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  mysqli_close($connection);
}
?>
