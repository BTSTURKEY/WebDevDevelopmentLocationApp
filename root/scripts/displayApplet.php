<?php
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include("scripts/dbConfig.php");

$sql = "SELECT Device_Name, Event_Name_1, Event_Name_2, IFTTT_Key FROM applet_table";

$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

  if($row['Event_Name_2'] != ''){
    echo '
    <script>
    $(document).ready(function(){
      $("#'.$row['Event_Name_1'].'").click(function(){
        $.post("https://cors-anywhere.herokuapp.com/https://maker.ifttt.com/trigger/'.$row['Event_Name_1'].'/with/key/'.$row['IFTTT_Key'].'",
        function(data,status){
          alert(data + "\n" + status);
        });
      });
    });
    $(document).ready(function(){
      $("#'.$row['Event_Name_2'].'").click(function(){
        $.post("https://cors-anywhere.herokuapp.com/https://maker.ifttt.com/trigger/'.$row['Event_Name_2'].'/with/key/'.$row['IFTTT_Key'].'",
        function(data,status){
          alert(data + "\n" + status);
        });
      });
    });
    </script>

    <div class="card ml-2 mb-5" style="width: 15rem;">
    <div class="card-body">
    <div class="d-flex justify-content-center">
    <h5 class="card-title">'.$row['Device_Name'].'</h5>
    </div>
    <div class="d-flex justify-content-center">
    <button id="'.$row['Event_Name_1'].'"class="btn btn-info">On</button>
    <button id="'.$row['Event_Name_2'].'"class="btn btn-dark ml-2">Off</button>
    </div>
    </div>
    </div>
    <br>
    ';
  }
  else{
    echo '
    <script>
    $(document).ready(function(){
      $("#'.$row['Event_Name_1'].'").click(function(){
        $.post("https://cors-anywhere.herokuapp.com/https://maker.ifttt.com/trigger/'.$row['Event_Name_1'].'/with/key/'.$row['IFTTT_Key'].'",
        function(data,status){
          alert(data + "\n" + status);
        });
      });
    });
    </script>

    <div class="card ml-2 mb-5" style="width: 15rem;">
    <div class="card-body">
    <div class="d-flex justify-content-center">
    <h5 class="card-title">'.$row['Device_Name'].'</h5>
    </div>
    <div class="d-flex justify-content-center">
    <button id="'.$row['Event_Name_1'].'"class="btn btn-info">Activate</button>
    </div>
    </div>
    </div>
    <br>
    ';
  }
}
?>
