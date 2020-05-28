<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="mt-3 d-flex justify-content-center">
  <h1> Control your devices below:</h1>
</div>
<div class="d-flex justify-content-end">
  <button class="btn btn-danger mr-3" onclick="removeApplet();"> Remove applet </button>
</div>
<div class="mt-3">
  <div class="d-flex justify-content-center flex-wrap flex-row bd-highlight mb-3">
    <?php
    include("scripts/displayApplet.php");
    ?>
  </div>
</div>

<script>
function removeApplet(){
  Swal.fire({
    width: 400,
    backdrop: 'rgba(3, 23, 26, 0.68)',
    title: 'Which applet would you like to remove?',
    html: '<div class="row d-flex justify-content-center"><select'+
    ' id="appletSelected" class="btn btn-light"><?php include("scripts/getApplet.php")?></select></div>'+
    '<button class="btn btn-danger mt-3 mr-1" onclick="deleteApplet(); Swal.close();">Delete</button>'+
    '<button class="btn btn-info mt-3 ml-1" onclick="Swal.close();">Cancel</button>',
    showConfirmButton: false,
    allowOutsideClick: false,
    allowEscapeKey: false
  })
}

function deleteApplet(){
  $.post('scripts/deleteApplet.php', {
    applet:document.getElementById("appletSelected").value
  },function(response) {
    console.log(response);
  });
  location.reload();
}
</script>
