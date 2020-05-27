<div class="d-flex justify-content-center mt-3">
  <h1> Welcome to LocateMe </h1>
</div>

<div class="d-flex justify-content-center mt-3">
  <div class="w-50">
    <div class="d-flex justify-content-center">
      <h5> A web application that works in conjuction with the
        LocateMe App </h5>
      </div>

      <div class="d-flex justify-content-center mt-4">
        <p> You can use this web application to do the following, click them
          to learn more!</p>
        </div>

        <div class="container d-flex justify-content-center">
          <div class="row">
            <button class="tablinks" onclick="showContent(event,'default')"

            id="default"hidden></button>
            <button class="col mr-3 tablinks btn btn-light border-info
            text-info text-center"
            onclick="showContent(event,'locationData')">
            <p>View your geographical location data</p>
          </button>
          <button class="col ml-3 mr-3 tablinks btn btn-light text-info
          text-center"
          onclick="showContent(event,'manualControl')">
          <p>Manually control IoT devices</p>
        </button>
        <button class="col ml-3 tablinks btn btn-light text-info text-center"
        onclick="showContent(event,'geoFence')">
        <p>Setup a geofence around your house</p>
      </button>
      <button class="col ml-3 tablinks btn btn-light text-info text-center"
      onclick="showContent(event,'more')">
      <p>More features</p>
    </button>
  </div>
</div>
<div class="row">
  <div class="col text-center mt-3">
    <p>Click on one of the texts above to learn more</p>
  </div>
</div>

<div class="col text-center mt-5">
  <div id="locationData" class="tabcontent text-justify">
    <p>Using the LocateMe application send periodic geographical
      location data every 5 seconds. This data is then inserts it into
      a database table. From there the data is projected onto the
      interactive map where you can view the activity of a single device
      or all devices simultaneously while choosing the specific day that
      you would like to view.</p>
    </div>
    <div id="manualControl" class="tabcontent text-justify">
      <p>Connect your IFTTT applets to LocateMe so that you can control
        your IoT devices with the click of a button. First create the
        applet on IFTTT and then add them to LocateMe. All of your
        applets can be viewed in Manual Control.</p>
      </div>
      <div id="geoFence" class="tabcontent text-justify">
        <p>Using the interactive map you can add a geofence around your
          home so that a specific applet that you have set up will interact
          with your location depending on if you are within the area or not.</p>
        </div>
        <div id="more" class="tabcontent text-justify">
          <p>This application can be taken further depending on your
            usecase:</p>
            <ul>
              <li>Track a family members phone to make sure they are safe.</li>
              <li>View the last known location of a device if you have
                misplaced or lost it.</li>
                <li>Alert you when a device has been removed from the
                  premise.</li>
              </ul>
            </div>
            <div id="default" class="tabcontent">
              <p> </p>
            </div>
          </div>

          <script>
          function showContent(evt, tabName) {
            var i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace("border-info",
              "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " border-info";
          }
          document.getElementById("default").click();
          </script>
