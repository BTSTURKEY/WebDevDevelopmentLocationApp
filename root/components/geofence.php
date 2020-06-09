<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  die(header("Location: https://turkltd.co.uk"));
}
?>

<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../stylesheet.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div id="add" class="w-75 p-3">
    <div class="d-flex justify-content-center">
      <div class="p-3 mb-2 bg-dark text-white rounded" action="../scripts/insertAutomation.php" method="post">
        <div class="row">
          <div class="col">
            <div class="d-flex justify-content-center">
              <h1> Add Automation </h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <label for="taskname">Name for automation</label>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <input class="btn btn-light text-left" type="text" name="task_name" id="taskname">
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <label class="mt-3">Activate</label>
          </div>
          <div class="col d-flex justify-content-center">
            <label class="mt-3">When you</label>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <select id="taskevent" name="event" class="btn btn-light"><?php include("../scripts/getEvents.php");?></select>
          </div>
          <div class="col d-flex justify-content-center">
            <select id="taskoption" name="condition" class="btn btn-light">
              <option> Enter the geofence </option>
              <option> Exit the geofence </option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <button id="submit" class="btn btn-info mt-3 mr-1" onclick="inputAutomation();">Submit</button>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <button class="btn btn-info mt-3 mr-1" onclick="refresh();">Back</button>
            <button class="btn btn-danger mt-3 ml-1" onclick="javascript: window.close();">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-center mt-5">
    <div id="continue" class="w-75 p-3">
      <div class="p-3 mb-2 bg-dark text-white rounded" action="../components/geofence.php" method="post">
        <div class="row">
          <div class="col">
            <div class="d-flex justify-content-center">
              <h1>Automation Added</h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <button class="btn btn-info mt-3 mr-1" onclick="addAutomation();">Add more</button>
            <button class="btn btn-info mt-3 ml-1" onclick="refresh();">Back to menu</button>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="d-flex justify-content-center">
              <button class="btn btn-danger mt-3" onclick="javascript: window.close();">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="edit" class="w-75 p-3">
    <?php include("../scripts/displayAutomation.php");?>
  </div>

</body>
</html>

<script>
editAutomation();

function addAutomation(){
  taskname.value = null;
  document.getElementById('edit').style.display='none';
  document.getElementById('continue').style.display='none';
  document.getElementById('add').style.display='initial';
}
function editAutomation(){
  document.getElementById('add').style.display='none';
  document.getElementById('continue').style.display='none';
  document.getElementById('edit').style.display='initial';
}
function continueAutomation(){
  document.getElementById('add').style.display='none';
  document.getElementById('edit').style.display='none';
  document.getElementById('continue').style.display='initial';
}

function refresh(){
  location.reload();
}

function deleteWarning(Automation_ID){
  if (Automation_ID == 0){
    Swal.fire({
      width: 400,
      backdrop: 'rgba(3, 23, 26, 0.68)',
      html: '<h1> Are you sure?????</h1><br>'+
      '<p> Pressing yes will remove all records'+
      '<button class="btn btn-info ml-1" onclick="deleteAutomation('+Automation_ID+'); Swal.close();"> Yes delete all</button>'+
      '<button class="btn btn-danger ml-1" onclick="Swal.close();"> No keep it</button>',
      showConfirmButton: false,
      allowOutsideClick: false,
      allowEscapeKey: false
    })
  }
  else{
    Swal.fire({
      width: 400,
      backdrop: 'rgba(3, 23, 26, 0.68)',
      html: '<h1> Are you sure?</h1><br>'+
      '<button class="btn btn-info ml-1" onclick="deleteAutomation('+Automation_ID+'); Swal.close();"> Yes delete it </button>'+
      '<button class="btn btn-danger ml-1" onclick="Swal.close();"> No keep it</button>',
      showConfirmButton: false,
      allowOutsideClick: false,
      allowEscapeKey: false
    })
  }
}

function deleteAutomation(Automation_ID){
  $.post('../scripts/deleteAutomation.php', {
    a_id:Automation_ID
  },function(response) {
    console.log(response);
  });
  location.reload();
}

function inputAutomation(){
  if(taskname.value == ""){
    Swal.fire({
      width: 400,
      backdrop: 'rgba(3, 23, 26, 0.68)',
      html: '<h1>Oops</h1>'+
      '<p class="mt-3">Please insert a name</p>'+
      '<button class="btn btn-info mt-3" onclick="Swal.close();">Ok</button>',
      showConfirmButton: false,
      allowOutsideClick: false,
      allowEscapeKey: false
    })
  }
  else{
    $.post('../scripts/insertAutomation.php', {
      task_name:taskname.value,
      task_event:taskevent.value,
      condition:taskoption.value,
      operation:"input"
    },function(response) {
      console.log(response);
    });
    continueAutomation();
  }
}

function saveAutomation(){
  var arrayState=[];
  var state = document.getElementsByClassName("checkbox");
  for (let item of state) {
    if(item.checked == false){
      var str = "FALSE";
    }
    else{
      var str = "TRUE";
    }
    arrayState.push(str);
  }

  console.log(arrayState);

  $.post('../scripts/insertAutomation.php', {
    automation_state:arrayState,
    operation:"save"
  },function(response) {
    console.log(response);
  });
  Swal.fire({
    width: 400,
    backdrop: 'rgba(3, 23, 26, 0.68)',
    icon: 'success',
    title: 'Settings saved',
    timer: 1000,
    showConfirmButton: false
  })
}

if ($('#records').children().length == 0){
  document.getElementById('save').style.display='none';
  document.getElementById('removeAll').style.display='none';
}


</script>
