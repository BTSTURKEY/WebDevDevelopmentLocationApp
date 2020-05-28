<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include_once("dbConfig.php");

if ($_POST['operation'] == "input"){
  $automationName = mysqli_real_escape_string($connection, $_POST['task_name']);
  $event = $_POST['task_event'];
  $condition = $_POST['condition'];

  $sql = "INSERT INTO automation_table (Automation_Name, Event, Event_Condition, Active)
  VALUES ('$automationName', '$event', '$condition', 'FALSE')";

  if (!empty($_POST['task_name'])){
    if (mysqli_query($connection, $sql)) {
      mysqli_close($connection);

    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      mysqli_close($connection);
    }
  }
}
else{
  $i = 0;
  $arrayState = $_POST['automation_state'];

  $sqlSelect = "SELECT Automation_ID, Automation_Name, Active FROM automation_table";
  $resultSelect = mysqli_query($connection, $sqlSelect);

  while ($row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC)){
    $sqlUpdate = 'UPDATE automation_table SET Active="'.$arrayState[$i].'" WHERE Automation_Name="'.$row["Automation_Name"].'"';

    if(mysqli_query($connection, $sqlUpdate)){
      echo 'Success';
    }
    else {
      echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($connection);
    }
    $i++;
  }
}





?>
