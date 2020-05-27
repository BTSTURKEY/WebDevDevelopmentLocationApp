<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (empty($_POST['device_name']) || empty($_POST['event_name_1']) || empty($_POST['ifttt_key'])){
die ('
<div class="d-flex justify-content-center">
  <div class="w-75 p-3">
    <br><br><br><br><br>
      <form class="p-3 mb-2 bg-dark text-white rounded" action="../scripts/insertApplet.php" method="post">
        <div class="row">
          <div class="col">
            <div class="d-flex justify-content-center">
              <h1> Missing Data </h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <br>
            <div class="d-flex justify-content-center">
            <a class="btn btn-info text-white" href="../components/applet.php">Try again</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <br>
            <div class="d-flex justify-content-center">
            <a class="btn btn-danger text-white" onclick="javascript: window.close();">Give up</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
');
  }
  include_once("../scripts/dbConfig.php");

  $device_name = mysqli_real_escape_string($connection, $_POST['device_name']);
  $event_name_1 = mysqli_real_escape_string($connection, $_POST['event_name_1']);
  $event_name_2 = mysqli_real_escape_string($connection, $_POST['event_name_2']);
  $ifttt_key = mysqli_real_escape_string($connection, $_POST['ifttt_key']);

  $sql = "INSERT INTO applet_table (Device_Name, Event_Name_1,
    Event_Name_2,IFTTT_Key) VALUES ('$device_name', '$event_name_1',
      '$event_name_2', '$ifttt_key')";

      if (mysqli_query($connection, $sql)) {
        mysqli_close($connection);
        echo '
        <div class="d-flex justify-content-center">
          <div class="w-75 p-3">
            <br><br><br><br><br>
              <form class="p-3 mb-2 bg-dark text-white rounded" action="../scripts/insertApplet.php" method="post">
                <div class="row">
                  <div class="col">
                    <div class="d-flex justify-content-center">
                      <h1> Applet Added </h1>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <br>
                    <div class="d-flex justify-content-center">
                    <a class="btn btn-info text-white" href="../components/applet.php">Add another applet</a>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <br>
                    <div class="d-flex justify-content-center">
                    <a class="btn btn-danger text-white" onclick="javascript: window.close();">Close window</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        ';

      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        mysqli_close($connection);
      }
    }
    else{
      die(header("Location: https://turkltd.co.uk"));
    }
    ?>
