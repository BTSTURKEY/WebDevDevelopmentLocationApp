<?php
if($_SERVER['REQUEST_METHOD']!='POST'){
  die(header("Location: https://turkltd.co.uk"));
}
include_once("dbConfig.php");

$value = $_POST['a_id'];

if ($value == 0){
  $sql = "DELETE FROM automation_table";
}
else{
  $sql = "DELETE FROM automation_table WHERE Automation_ID = $value";

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
