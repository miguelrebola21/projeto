@extends ('main')

@section ('content')
<link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>
var __adobewebfontsappname__="dreamweaver"
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script><script src="http://use.edgefonts.net/source-sans-pro:n6:default.js" type="text/javascript"></script>

<script src="http://maps.googleapis.com/maps/api/js"></script>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(38.755137,-9.231547,427);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:17,
  mapTypeId:google.maps.MapTypeId.HYBRID
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker=new google.maps.Marker({
  position:myCenter,
    icon:'icon.png'
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
  <div id="googleMap" style="width:600px;height:340px;"></div>
@stop