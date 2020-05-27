<div class="d-flex justify-content-center mt-3 mb-3">
  <h1> Adding an applet </h1>
</div>

<div class="d-flex justify-content-center">
  <div class="w-50">
    <div class="d-flex justify-content-center">
      <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
          <button class="nav-link tablinks btn btn-outline-info btn-info text-white btn-lg mr-3"
          onclick="showContent(event,'IFTTT')">IFTTT</button>
        </li>
        <li class="nav-item">
          <button class="nav-link tablinks btn btn-outline-info btn-lg ml-3"
          onclick="showContent(event,'LocateMe')">LocateMe</button>
        </li>
        <li class="nav-item">
          <button class="tablinks" onclick="showContent(event,'holder')"
          id="default" hidden>test</button>
        </li>
      </ul>
    </div>

    <div id="holder" class="tabcontent">
      <img src="img/appLogo.png" width="300" height="300"
      class="rounded mx-auto d-block">
    </div>

    <div id="IFTTT" class="tabcontent">
      <p class="text-center"><b>To add a applet to <u>IFTTT</u> please follow
        the following instrutions:</b></p>
        <ul class="text-justify text-sm-left mb-4">
          <li> Open the pop up window by clicking on <b>Create an IFTTT
            applet</b>.</li>
            <br>
            <li> Click on <b>THIS</b> and set the trigger to receive a web request
              via <b>WebHooks</b>.</li>
              <br>
              <li> Enter a name for the event e.g. <i>DeskLight_On</i> and create
                the trigger.</li>
                <br>
                <li> Next click on <b>THAT</b> and set the action as your Smart device
                  service, e.g. <i>SmartLife, etc</i>. </li>
                  <br>
                  <li> Choose the action you wish to happen e.g. <i>Turn on, Turn off,
                    Set light colour, etc</i>. </li>
                    <br>
                    <li> Select the device linked to your account that will follow the
                      action selected. </li>
                      <br>
                      <li> Review and finish the applet, note down the event name for
                        later </li>
                      </ul>
                      <a href="https://ifttt.com/create"
                      target="popup" class="btn btn-dark d-flex justify-content-center"
                      onclick="window.open('https://ifttt.com/create','popup',
                      'width=700,height=700,left=1000'); return false;">
                      Create an IFTTT applet
                    </a>
                  </div>

                  <div id="LocateMe" class="tabcontent">
                    <p class="text-center font-weight-bold"> To add a applet to <u>LocateMe</u>
                      please follow the following instrutions: </p>
                      <ul class="text-justify text-sm-left mb-4">
                        <li> Click the button below to launch a pop up window containing a
                          form</li>
                          <br>
                          <li> To fill out the form you will need the <b>Event name</b> and your
                            <b>IFTTT key</b> that can be found <a class="text-info"
                            href="https://ifttt.com/maker_webhooks" target="_blank"> here</a>.
                            <i>(click documentation in the top right, make sure you are logged
                              in first!)</i></li>
                            </ul>
                            <a href="../components/applet.php"
                            target="popup" class="btn btn-dark d-flex justify-content-center"
                            onclick="window.open('https://turkltd.co.uk/components/applet.php','popup',
                            'width=700,height=700,left=1000'); return false;">
                            Implement an IFTTT applet
                          </a>
                        </div>
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
                        tablinks[i].className =
                        tablinks[i].className.replace("btn-info text-white",
                        "");
                      }
                      document.getElementById(tabName).style.display = "block";
                      evt.currentTarget.className += " btn-info text-white";
                    }
                    document.getElementById("default").click();
                    </script>
