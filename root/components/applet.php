<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
  <div class="d-flex justify-content-center">
    <div class="w-75 p-3">
      <br>
      <form class="p-3 mb-2 bg-dark text-white rounded" action="../scripts/insertApplet.php" method="post">
        <div class="row">
          <div class="col">
            <div class="d-flex justify-content-center">
              <h1> Applet Form </h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <br>
            <label for="deviceName">Device name*</label>
            <input class="form-control" type="text" name="device_name" id="deviceName">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <br>
            <label for="eventName1">Event Name*</label>
            <input class="form-control" type="text" name="event_name_1" id="eventName1">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <br>
            <label for="eventName2">Inverse Event Name (optional)</label>
            <input class="form-control" type="text" name="event_name_2" id="eventName2">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <br>
            <label for="iftttKey">IFTTT Key*</label>
            <input class="form-control" type="text" name="ifttt_key" id="iftttKey">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <br>
            <div class="d-flex justify-content-center">
              <input class="btn btn-info" type="submit" value="Submit">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <br>
            <div class="d-flex justify-content-center">
              <a class="btn btn-danger" onclick="javascript: window.close();">Close</a>
            </div>
          </div>
        </div>
        <p class="text-right text-danger">*required</p>
      </form>
    </div>
  </div>

</body>
</html>
