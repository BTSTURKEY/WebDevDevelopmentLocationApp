<?php
$interactiveMap ="";
$manualControl ="";
$addApplet ="";

if(!empty($_POST['navbar'])){
  if($_POST['navbar'] == "interactiveMap"){
    $interactiveMap = "btn-info";
  }
  else if($_POST['navbar'] == "manualControl"){
    $manualControl = "btn-info";
  }
  else if($_POST['navbar'] == "addApplet"){
    $addApplet = "btn-info";
  }
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <form method="post" class="form-inline">
    <button type="submit" name="navbar" value="dashboard"
    class="navbar-brand text-white btn btn-lg btn-outline-info
    border border-dark">
    <img src="img/appLogo.png" width="30" height="30"
    class="d-inline-block align-top">LocateMe</button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <button type="submit" name="navbar" value="interactiveMap"
          class="nav-link text-white btn btn-lg btn-outline-info ml-2
          border border-dark <?php echo "$interactiveMap"?>"> Interactive Map</button>
        </li>
        <li class="nav-item">
          <button type="submit" name="navbar" value="manualControl"
          class="nav-link text-white btn btn-lg btn-outline-info ml-2
          border border-dark <?php echo "$manualControl"?>"> Manual Control</button>
        </li>
        <li class="nav-item dropdown">
          <button type="submit" name="navbar" value="addApplet"
          class="nav-link text-white btn btn-lg btn-outline-info ml-2
          border border-dark <?php echo "$addApplet"?>"> Add Applets</button>
        </li>
      </ul>
    </form>
      <button type="submit" name="navbar" value="logout"
      class="nav-link text-white btn btn-lg btn-outline-danger ml-2
      border border-dark"> Logout</button>
  </nav>
