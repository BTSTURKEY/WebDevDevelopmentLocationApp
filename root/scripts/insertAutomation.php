<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include_once("../scripts/dbConfig.php");

$automationName = mysqli_real_escape_string($connection, $_POST['task_name']);
$event = $_POST['event'];
$condition = $_POST['condition'];

$sql = "INSERT INTO automation_table (Automation_Name, Event, Event_Condition)
VALUES ('$automationName', '$event', '$condition')";

if (!empty($_POST['task_name'])){
  if (mysqli_query($connection, $sql)) {
    mysqli_close($connection);
    echo '
    <div class="d-flex justify-content-center mt-5">
    <div id="tryAgain" class="w-75 p-3">
    <form class="p-3 mb-2 bg-dark text-white rounded" action="../components/geofence.php" method="post">
    <div class="row">
    <div class="col">
    <div class="d-flex justify-content-center">
    <h1>Automation Added</h1>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col d-flex justify-content-center">
    <input id="submit" class="btn btn-info mt-3 mr-1" type="submit" name="autoForm" value="Add another">
    <input id="submit" class="btn btn-info mt-3 ml-1" type="submit" name="autoForm" value="Back to menu">
    </div>
    </div>
    <div class="row">
    <div class="col">
    <div class="d-flex justify-content-center">
    <a class="btn btn-danger mt-3" onclick="javascript: window.close();">Close</a>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>';

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    mysqli_close($connection);
  }
}
?>
