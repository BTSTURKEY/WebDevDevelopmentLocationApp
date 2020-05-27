<?php
include("scripts/dbConfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (empty($_POST['username'])){
    header("Refresh:0");
    exit();
  }

  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");

  $row = $query -> fetch_assoc();
  if ($username == $row['username'] && $password == $row['password']){
    $_SESSION["loggedin"] = true;
    header("Refresh:0");
  }
  else{
    header("Refresh:0");
    exit();
  }
}
?>
<div class="d-flex justify-content-center">
  <div class="w-50 p-3">
    <br><br><br>
    <form method="post" class="p-3 mb-2 bg-dark text-white rounded">
      <div class="row">
        <div class="col">
          <div class="d-flex justify-content-center">
            <h1> <img src="img/appLogo.png" width="50" height="50" class="d-inline-block align-top" alt=""> LocateMe </h1>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <br>
          <label>Username</label>
          <input type="text" class="form-control" name="username" id="username">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <br>
          <label>Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <br>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-info">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
