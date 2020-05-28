<?php
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}

include_once("../scripts/dbConfig.php");

$element = array();
$state = array();

$sql = "SELECT * FROM automation_table";

$result = mysqli_query($connection, $sql);

echo '
<div class="d-flex justify-content-center">
<div class="p-3 mb-2 bg-dark text-white rounded">
  <div class="row">
    <div class="col">
      <div class="d-flex justify-content-center">
        <h1>Geofence automation</h1>
      </div>
    </div>
  </div>
  <div id="records">';

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  $element[] =$row['Event'].$row['Automation_Name'];
  $state[] = $row['Active'];

  echo '
    <div class="row mt-1">
      <div class="col d-flex justify-content-center">
        <h5 id="automation_name" class="mt-3">'.$row['Automation_Name'].'</h5>
        </div>
        <div class="col d-flex justify-content-center">
        <input class="checkbox" type="checkbox" id="'.$row['Event'].$row['Automation_Name'].'" onclick="">
        <button class="btn btn-danger ml-3" onclick="deleteWarning('.$row['Automation_ID'].');"> Delete </button>
      </div>
    </div>';
}

echo '
</div>
<div class="row mt-3">
  <div class="col d-flex justify-content-center">
    <button id="save" class="btn btn-info mr-1" onclick="saveAutomation();" >Save changes</button>
    <button class="btn btn-success" onclick="addAutomation();" >Add automation</button>
    <button id="removeAll" class="btn btn-warning ml-1" onclick="deleteWarning(0)" >Remove All</button>
    </div>
  </div>
<div class="row mt-3">
  <div class="col d-flex justify-content-center">
    <a class="btn btn-danger ml-1" onclick="javascript: window.close();">Close</a>
    </div>
  </div>
</div>
<script>';

$completeArray = array_combine($element, $state);

foreach ($completeArray as $x => $y) {
  echo '
  if("'.$y.'" == "TRUE"){
    document.getElementById("'.$x.'").checked = true;
}
';
}

echo '</script>';
?>
