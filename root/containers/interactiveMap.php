<link rel="stylesheet" type="text/css" href="ol/ol.css?rnd=132">
<link rel="stylesheet" type="text/css" href="ol/map.css?rnd=132">
<script src="ol/ol.js"></script>

<div class="p-2 mb-0 jumbotron">
  <div class="row">
    <select id="UserSelect" class="btn btn-light ml-3 mr-5 mb-1"><?php include("scripts/getDevice.php");?></select>
    <h3 id="date" class="display-5 ml-4 pl-5"></h3>
  </div>
  <div class="row lead mt-1">
    <button id="LastLocButton" class="btn btn-dark ml-3" onclick="lastLocation();"disabled><img src="img/map_marker.png" width=10 height=15> Last known location</button>
    <button id="IncMyButton" class="btn btn-dark ml-3" onclick="incrementDay();">Previous Day</button>
    <button id="ResetButton" class="btn btn-dark ml-1" onclick="resetDay();" disabled>Today</button>
    <button id="DecMyButton" class="btn btn-dark ml-1" onclick="decrementDay();" disabled>Next Day</button>
    <button id="RefreshButton" class="btn btn-dark ml-3" onclick="refreshMap();">
      <svg class="bi bi-arrow-repeat" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M2.854 7.146a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L2.5 8.207l1.646 1.647a.5.5 0 0 0 .708-.708l-2-2zm13-1a.5.5 0 0 0-.708 0L13.5 7.793l-1.646-1.647a.5.5 0 0 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0 0-.708z"/>
      <path fill-rule="evenodd" d="M8 3a4.995 4.995 0 0 0-4.192 2.273.5.5 0 0 1-.837-.546A6 6 0 0 1 14 8a.5.5 0 0 1-1.001 0 5 5 0 0 0-5-5zM2.5 7.5A.5.5 0 0 1 3 8a5 5 0 0 0 9.192 2.727.5.5 0 1 1 .837.546A6 6 0 0 1 2 8a.5.5 0 0 1 .501-.5z"/>
      </svg>
    Refresh Map</button>
    <button id="setupGeofence" class="btn btn-dark ml-3" onclick="geofenceSetup();">
      <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
      <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
      </svg>
    Draw Geofence area</button>
    <button id="editGeofence" class="btn btn-dark ml-1" onclick="geofenceEdit();">
      <svg class="bi bi-tools" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M0 1l1-1 3.081 2.2a1 1 0 0 1 .419.815v.07a1 1 0 0 0 .293.708L10.5 9.5l.914-.305a1 1 0 0 1 1.023.242l3.356 3.356a1 1 0 0 1 0 1.414l-1.586 1.586a1 1 0 0 1-1.414 0l-3.356-3.356a1 1 0 0 1-.242-1.023L9.5 10.5 3.793 4.793a1 1 0 0 0-.707-.293h-.071a1 1 0 0 1-.814-.419L0 1zm11.354 9.646a.5.5 0 0 0-.708.708l3 3a.5.5 0 0 0 .708-.708l-3-3z"/>
      <path fill-rule="evenodd" d="M15.898 2.223a3.003 3.003 0 0 1-3.679 3.674L5.878 12.15a3 3 0 1 1-2.027-2.027l6.252-6.341A3 3 0 0 1 13.778.1l-2.142 2.142L12 4l1.757.364 2.141-2.141zm-13.37 9.019L3.001 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/></svg>
    Geofence settings</button>
    <button id="removeGeofence" class="btn btn-dark ml-1" onclick="geofenceRemove();">
      <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
    Delete Geofence</button>
  </div>
</div>

<div id="map" class="map">
  <div id="popup"></div>
</div>

<span id="status"></span>

<script>
var day = 0;
var device = "All";
var baseURL = "scripts/displayData.php";
var draw;
var selected = null;
var allowPopup = true;
var drawnFeature = null;
var importedFeature = null;
var firstGeofence = "<?php include("scripts/checkGeofence.php");?>";
var element = document.getElementById('popup');
var status = document.getElementById('status');
var date = new Date();

if (firstGeofence == "TRUE"){
  document.getElementById("editGeofence").disabled = true;
  document.getElementById("removeGeofence").disabled = true;
}

document.getElementById("date").innerHTML = date.toLocaleDateString();
document.getElementById("UserSelect").addEventListener("change", function(){
  if (deviceName() == 'All'){
    document.getElementById("LastLocButton").disabled = true;
    displayAllPoints();
  }
  else{
    document.getElementById("LastLocButton").disabled = false;
    displaySpecificDevice();
  }
});

var tile = new ol.layer.Tile({
  source: new ol.source.OSM()
});

var view= new ol.View({
  center: ol.proj.fromLonLat([0.1278, 51.5074]),
  zoom: 6,
  minZoom: 3,
  maxZoom: 19
});

var map = new ol.Map({
  target: 'map',
  layers: [
    tile
  ],
  view: view
});

var vector = new ol.layer.Vector({
  source: new ol.source.Vector({
    format: new ol.format.GeoJSON(),
    url: baseURL + '?device=' + device + '&day=' + day
  })
});


var drawnSource = new ol.source.Vector({
  format: new ol.format.GeoJSON(),
  url: 'scripts/displayGeofence.php'
});

var drawVector = new ol.layer.Vector({
  source:drawnSource
});

drawnSource.once('change', function(evt){
  if (drawnSource.getState() === 'ready') {
    importedFeature = drawnSource.getFeatures()[0];
  }
});

var highlightStyle = new ol.style.Style({
  image: new ol.style.Circle({
    radius: 10,
    fill: new ol.style.Fill({
      color: 'Black'
    }),
    stroke: new ol.style.Stroke({
      color: 'Black',
      width: 0.5
    })
  })
});

var popup = new ol.Overlay({
  element: element,
  positioning: 'bottom-center',
  stopEvent: false,
  offset: [0, -50]
});

vector.setZIndex(99);
map.addLayer(vector);
map.addOverlay(popup);
map.addLayer(drawVector);

vector.getSource().once('change', function(evt){
  map.removeLayer(vector);
  vector.setStyle(colorStyle);
  map.addLayer(vector);
  if (vector.getSource().getState() === 'ready') {
    if (vector.getSource().getFeatures().length > 0) {
      view.fit(vector.getSource().getExtent(), {padding: [100, 50, 50, 100], duration: 2000});
    }
  };
});

map.on('click', function(e) {
  if (selected !== null) {
    selected.setStyle(undefined);
    selected = null;
  }
  var feature = map.forEachFeatureAtPixel(e.pixel, function(feature) {
    selected = feature;
    return feature;
  });
  if (allowPopup == true && feature !=drawnFeature && feature !=importedFeature){
    if(feature) {
      $(element).popover("dispose");
      var coordinates = feature.getGeometry().getCoordinates();
      feature.setStyle(highlightStyle);
      popup.setPosition(coordinates);
      $(element).popover({
        placement: 'top',
        html: true,
        content: feature.get('time_stamp')
      });
      $(element).popover("show");
      setTimeout(disposePopup, 3000);
    }
    else {
      $(element).popover("dispose");
    }
  }
});

var colorStyle = function(feature, resolution) {
  const color = feature.get('color').toUpperCase();
  var style = new ol.style.Style({
    image: new ol.style.Circle({
      radius: 8,
      fill: new ol.style.Fill({
        color: color
      }),
      stroke: new ol.style.Stroke({
        color: 'Black',
        width: 0.5
      })
    })
  });
  return style;
}

function disposePopup(){
  $(element).popover("dispose");
}

function deviceName(){
  var deviceName = document.getElementsByTagName("option")
  [document.getElementById("UserSelect").selectedIndex].label;
  return deviceName;
}

function displayAllPoints(){
  device = deviceName();

  document.getElementById("date").innerHTML = date.toLocaleDateString();

  map.setLayerGroup(new ol.layer.Group());
  map.addLayer(tile);

  var newUrl = baseURL + '?device=' + device + '&day=' + day;

  vector = new ol.layer.Vector({
    source: new ol.source.Vector({
      format: new ol.format.GeoJSON(),
      url: newUrl
    })
  });
  vector.setZIndex(99);
  map.addLayer(vector);
  map.addLayer(drawVector);

  vector.getSource().once('change', function(evt){
    map.removeLayer(vector);
    vector.setStyle(colorStyle);
    map.addLayer(vector);
    if (vector.getSource().getState() === 'ready') {
      if (vector.getSource().getFeatures().length > 0) {
        view.fit(vector.getSource().getExtent(), {padding: [100, 50, 50, 100], duration: 2000});
      }
    };
  });
}

function displaySpecificDevice(){
  device = deviceName();

  document.getElementById("date").innerHTML = date.toLocaleDateString();

  map.setLayerGroup(new ol.layer.Group());
  map.addLayer(tile);

  var newUrl = baseURL + '?device=' + device + '&day=' + day;

  vector = new ol.layer.Vector({
    source: new ol.source.Vector({
      format: new ol.format.GeoJSON(),
      url: newUrl
    })
  });
  vector.setZIndex(99);
  map.addLayer(vector);
  map.addLayer(drawVector);

  vector.getSource().once('change', function(evt){
    map.removeLayer(vector);
    vector.setStyle(colorStyle);
    map.addLayer(vector);
    if (vector.getSource().getState() === 'ready') {
      if (vector.getSource().getFeatures().length > 0) {
        view.fit(vector.getSource().getExtent(), {padding: [100, 50, 50, 100], duration: 2000});
      }
    };
  });
}

function lastLocation(){
  day = 0;

  date = new Date();
  var txt = "Last Recorded Location";
  document.getElementById("date").innerHTML = txt;

  map.setLayerGroup(new ol.layer.Group());
  map.addLayer(tile);

  document.getElementById("DecMyButton").disabled = true;
  document.getElementById("ResetButton").disabled = false;

  var lastLocURL = 'scripts/lastLocation.php?device=' + deviceName();

  var lastLocSource = new ol.source.Vector({
    format: new ol.format.GeoJSON(),
    url: lastLocURL
  });

  vector = new ol.layer.Vector({
    source: lastLocSource,
    style: new ol.style.Style({
      image: new ol.style.Circle({
        radius: 8,
        stroke: new ol.style.Stroke({
          color: 'black',
          width: 0.5
        }),
        fill: new ol.style.Fill({
          color: 'red'
        })
      })
    })
  });
  vector.setZIndex(99);
  map.addLayer(vector);
  map.addLayer(drawVector);

  vector.getSource().once('change', function(evt){
    if (lastLocSource.getState() === 'ready') {
      if (lastLocSource.getFeatures().length > 0) {
        view.fit(lastLocSource.getExtent(), {duration: 2000});
      }
    };
  });
}

function incrementDay(){
  day += 1;
  device = deviceName();

  date.setDate(date.getDate() - 1);
  document.getElementById("date").innerHTML = date.toLocaleDateString();

  map.setLayerGroup(new ol.layer.Group());
  map.addLayer(tile);

  var newUrl = baseURL + '?device=' + device + '&day=' + day;

  vector = new ol.layer.Vector({
    source: new ol.source.Vector({
      format: new ol.format.GeoJSON(),
      url: newUrl
    })
  });
  vector.setZIndex(99);
  map.addLayer(vector);
  map.addLayer(drawVector);

  document.getElementById("DecMyButton").disabled = false;
  document.getElementById("ResetButton").disabled = false;

  vector.getSource().once('change', function(evt){
    map.removeLayer(vector);
    vector.setStyle(colorStyle);
    map.addLayer(vector);
    if (vector.getSource().getState() === 'ready') {
      if (vector.getSource().getFeatures().length > 0) {
        view.fit(vector.getSource().getExtent(), {padding: [100, 50, 50, 100], duration: 2000});
      }
    };
  });
}

function decrementDay(){
  day -= 1;
  device = deviceName();

  date.setDate(date.getDate() + 1);
  document.getElementById("date").innerHTML = date.toLocaleDateString();

  map.setLayerGroup(new ol.layer.Group());
  map.addLayer(tile);

  var newUrl = baseURL + '?device=' + device + '&day=' + day;

  vector = new ol.layer.Vector({
    source: new ol.source.Vector({
      format: new ol.format.GeoJSON(),
      url: newUrl
    })
  });
  vector.setZIndex(99);
  map.addLayer(vector);
  map.addLayer(drawVector);

  if(day <= 0){
    document.getElementById("DecMyButton").disabled = true;
    document.getElementById("ResetButton").disabled = true;
  }
  vector.getSource().once('change', function(evt){
    map.removeLayer(vector);
    vector.setStyle(colorStyle);
    map.addLayer(vector);
    if (vector.getSource().getState() === 'ready') {
      if (vector.getSource().getFeatures().length > 0) {
        view.fit(vector.getSource().getExtent(), {padding: [100, 50, 50, 100], duration: 2000});
      }
    };
  });
}

function resetDay(){
  day = 0;
  device = deviceName();

  date = new Date();
  document.getElementById("date").innerHTML = date.toLocaleDateString();

  map.setLayerGroup(new ol.layer.Group());
  map.addLayer(tile);

  var newUrl = baseURL + '?device=' + device + '&day=' + day;

  vector = new ol.layer.Vector({
    source: new ol.source.Vector({
      format: new ol.format.GeoJSON(),
      url: newUrl
    })
  });
  vector.setZIndex(99);
  map.addLayer(vector);
  map.addLayer(drawVector);

  if(day <= 0){
    document.getElementById("DecMyButton").disabled = true;
  }
  if (day == 0){
    document.getElementById("ResetButton").disabled = true;
  }
  vector.getSource().once('change', function(evt){
    map.removeLayer(vector);
    vector.setStyle(colorStyle);
    map.addLayer(vector);
    if (vector.getSource().getState() === 'ready') {
      if (vector.getSource().getFeatures().length > 0) {
        view.fit(vector.getSource().getExtent(), {padding: [100, 50, 50, 100], duration: 2000});
      }
    };
  });
}

function refreshMap(){
  map.setLayerGroup(new ol.layer.Group());
  map.addLayer(tile);

  document.getElementById("date").innerHTML = date.toLocaleDateString();

  var newUrl = baseURL + '?device=' + device + '&day=' + day;

  vector = new ol.layer.Vector({
    source: new ol.source.Vector({
      format: new ol.format.GeoJSON(),
      url: newUrl
    })
  });
  vector.setZIndex(99);
  map.addLayer(vector);
  map.addLayer(drawVector);

  vector.getSource().once('change', function(evt){
    map.removeLayer(vector);
    vector.setStyle(colorStyle);
    map.addLayer(vector);
    if (vector.getSource().getState() === 'ready') {
      if (vector.getSource().getFeatures().length > 0) {
        view.fit(vector.getSource().getExtent(), {padding: [100, 50, 50, 100], duration: 2000});
      }
    };
  });
}

function geofenceSetup(){
  if (firstGeofence == 'TRUE'){
    Swal.fire({
      imageUrl: 'img/appLogo.png',
      imageWidth: 200,
      imageHeight: 200,
      backdrop: 'rgba(3, 23, 26, 0.68)',
      html: '<h1> Just to let you know!</h1><br>'+
      '<p>You can only have <b>ONE</b> Geofence at a time.<br><br>'+
      'Drag a square over your house to create<br> a Geofence area!</p>'+
      '<button class="btn btn-info mt-3 mr-1" onclick="drawGeofence(); Swal.close();">'+
      '<svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16"'+
      ' fill="currentColor" xmlns="http://www.w3.org/2000/svg">'+
      '<path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>'+
      '<path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>'+
      '</svg> Create a Geofence</button>'+
      '<button class="btn btn-danger mt-3 ml-1" onclick="Swal.close();">'+
      '<svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16"'+
      ' fill="currentColor" xmlns="http://www.w3.org/2000/svg">'+
      '<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>'+
      '<path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>'+
      '<path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>'+
      '</svg> Cancel</button>',
      showConfirmButton: false,
      allowOutsideClick: false,
      allowEscapeKey: false
    })
  }
  else{
    Swal.fire({
      imageUrl: 'img/info.png',
      imageWidth: 200,
      imageHeight: 200,
      backdrop: 'rgba(3, 23, 26, 0.68)',
      html: '<h1> Warning!</h1><br>'+
      '<p>You can only have <b>ONE</b> Geofence at a time.<br><br>'+
      'Drag a square over your house to create a<br> <b>NEW</b> Geofence area!</p>'+
      '<button class="btn btn-info mt-3 mr-1" onclick="drawGeofence(); Swal.close();">'+
      '<svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16"'+
      ' fill="currentColor" xmlns="http://www.w3.org/2000/svg">'+
      '<path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>'+
      '<path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>'+
      '</svg> Create a new Geofence</button>'+
      '<button class="btn btn-danger mt-3 ml-1" onclick="Swal.close();">'+
      '<svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16"'+
      ' fill="currentColor" xmlns="http://www.w3.org/2000/svg">'+
      '<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>'+
      '<path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>'+
      '<path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>'+
      '</svg> Keep old Geofence</button>',
      showConfirmButton: false,
      allowOutsideClick: false,
      allowEscapeKey: false
    })
  }
}

function drawGeofence(){
  map.removeLayer(drawVector);

  if(drawnFeature != null){
    drawnSource.removeFeature(drawnFeature);
  }
  drawnSource = new ol.source.Vector();

  drawVector = new ol.layer.Vector({
    source:drawnSource
  });
  draw = new ol.interaction.Draw({
    source: drawnSource,
    type: new ol.style.Circle(),
    freehand: true,
    geometryFunction: ol.interaction.Draw.createBox()
  });
  map.addInteraction(draw);

  draw.on('drawend', function(evt){
    firstGeofence = 'FALSE';
    document.getElementById("editGeofence").disabled = false;
    document.getElementById("removeGeofence").disabled = false;


    map.removeInteraction(draw);

    allowPopup = true;
    map.addLayer(drawVector);

    drawnFeature = evt.feature;
    var feature = evt.feature.getGeometry().getExtent();

    //Conversion code from EPSG:3857 to EPSG:4326 written by onderaltintas
    //https://gist.github.com/onderaltintas/6649521
    var longitude_1 = feature[0] * 180 / 20037508.34;
    var longitude_2 = feature[2] * 180 / 20037508.34;
    var latitude_2 = Math.atan(Math.exp(feature[1] * Math.PI / 20037508.34)) * 360 / Math.PI - 90;
    var latitude_1 = Math.atan(Math.exp(feature[3] * Math.PI / 20037508.34)) * 360 / Math.PI - 90;

    var TL = [latitude_1, longitude_1];
    var TR = [latitude_1, longitude_2];
    var BR = [latitude_2, longitude_2];
    var BL = [latitude_2, longitude_1];

    var data = {
      tl_lat:TL[0],
      tl_long:TL[1],
      tr_lat:TR[0],
      tr_long:TR[1],
      br_lat:BR[0],
      br_long:BR[1],
      bl_lat:BL[0],
      bl_long:BL[1]
    };
    $.post('scripts/insertGeofence.php', data, function(response) {
      console.log(response);
    });
  });
}

function geofenceRemove(){
  Swal.fire({
    imageUrl: 'img/danger.png',
    imageWidth: 200,
    imageHeight: 200,
    backdrop: 'rgba(3, 23, 26, 0.68)',
    html: '<h1> Are you sure?</h1><br>'+
    '<p> Deletion will remove <b>ALL</b> of the settings<br> that you configured!</p>'+
    '<button class="btn btn-info mt-3 ml-1" onclick=" geofenceDelete(); Swal.close();"> Yes delete it </button>'+
    '<button class="btn btn-danger mt-3 ml-1" onclick="Swal.close();"> No keep it</button>',
    showConfirmButton: false,
    allowOutsideClick: false,
    allowEscapeKey: false
  })

}

function geofenceDelete() {
  firstGeofence = 'TRUE';
  document.getElementById("editGeofence").disabled = true;
  document.getElementById("removeGeofence").disabled = true;

  map.removeLayer(drawVector);

  var drawnSource = new ol.source.Vector({
    format: new ol.format.GeoJSON(),
    url: null
  });

  drawVector = new ol.layer.Vector({
    source:drawnSource
  });

  $.get("scripts/removeGeofence.php");
  return false;
}

function geofenceEdit(){
  window.open('components/geofence.php','popup',
  'width=700,height=500,left=1000'); return false;
}
</script>
