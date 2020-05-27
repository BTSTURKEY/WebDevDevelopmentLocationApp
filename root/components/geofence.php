<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
  <div class="d-flex justify-content-center">
    <div  id="menu" class="w-50 p-3">
      <div class="p-3 mb-2 bg-dark text-white rounded">
        <div class="row">
          <div class="col">
            <div class="d-flex justify-content-center">
              <h1> Geofence form </h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <button class="btn btn-info" onclick="addAutomation();">Add automation</button>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col d-flex justify-content-center">
            <button class="btn btn-info" onclick="editAutomation();">Edit automation</button>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <div class="d-flex justify-content-center">
              <a class="btn btn-danger" onclick="javascript: window.close();">Close</a>
            </div>
          </div>
        </div>
    </div>
  </div>

  <div id="add" class="w-75 p-3">
    <form class="p-3 mb-2 bg-dark text-white rounded" action="../scripts/insertAutomation.php" method="post">
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
          <input class="btn btn-light" type="text" name="task_name" id="taskname">
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
          <select id="event" name="event" class="btn btn-light"><?php include("../scripts/getEvents.php");?></select>
        </div>
        <div class="col d-flex justify-content-center">
          <select id="option" name="condition" class="btn btn-light">
            <option> Enter the geofence </option>
            <option> Exit the geofence </option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col d-flex justify-content-center">
          <input id="submit" class="btn btn-info mt-3" type="submit" name="addSubmit" value="Submit" disabled>
        </div>
      </div>
      <div class="row">
        <div class="col d-flex justify-content-center">
          <a class="btn btn-info mt-3 mr-1" onclick="menuAutomation();">Back</a>
            <a class="btn btn-danger mt-3 ml-1" onclick="javascript: window.close();">Close</a>
          </div>
        </div>
      </div>
  </form>
  </div>

  <div id="edit" class="w-50 p-3">
    <div class="p-3 mb-2 bg-dark text-white rounded">
      <div class="row">
        <div class="col">
          <div class="d-flex justify-content-center">
            <h1> Edit Automation </h1>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col d-flex justify-content-center">
          <button class="btn btn-info" onclick="menuAutomation();">Go Back</button>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <div class="d-flex justify-content-center">
            <a class="btn btn-danger" onclick="javascript: window.close();">Close</a>
          </div>
        </div>
      </div>
  </div>
  </div>

</div>
</body>
</html>

<script>
<?php
if(!empty($_POST['autoForm'])){
  if ($_POST['autoForm'] == "Add another"){
    echo "addAutomation();";
  }
  else{
    echo "menuAutomation();";
  }
}
else{
  echo "menuAutomation();";
}
?>

function menuAutomation(){
document.getElementById('add').style.display='none';
document.getElementById('edit').style.display='none';
document.getElementById('menu').style.display='initial';
}
function addAutomation(){
document.getElementById('menu').style.display='none';
document.getElementById('edit').style.display='none';
document.getElementById('add').style.display='initial';
}
function editAutomation(){
document.getElementById('menu').style.display='none';
document.getElementById('add').style.display='none';
document.getElementById('edit').style.display='initial';
}

taskname.addEventListener("change", function(){
  if (taskname.value != ""){
    document.getElementById("submit").disabled = false;
  }
  else{
    document.getElementById("submit").disabled = true;
  }
});

</script>
