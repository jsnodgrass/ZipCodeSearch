<!DOCTYPE HTML>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
<title>Zip Code Search</title>
<link type="text/css" rel="stylesheet" href="main.css" />

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"> </script>
<script type="text/javascript"> 
function validateForm()
{
var x=document.forms["ZipCode"]["Zip"].value;
if (x==null || x=="" || (isNaN(x)))
  {
  alert("Please Enter a Valid Zip Code");
  return false;
  }
}

function initialize(x,y)
{
    var latlng = new google.maps.LatLng(x,y);
    var myOptions =
    {
    zoom: 8,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);
     
    var marker = new google.maps.Marker({
        position: latlng});
     // To add the marker to the map, call setMap();
     marker.setMap(map);
}

</script>


</head>

<body>

<div id="header">
<h1 class="center">Zip Code Search</h1>
</div>
