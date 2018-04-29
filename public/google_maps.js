
function myMap()
{
  myLocation=new google.maps.LatLng(47.1742482, 27.57529039999997);
  var mapOptions= {
    center:myLocation,
    zoom:16, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("google-map"),mapOptions);

  var marker = new google.maps.Marker({
    position: myLocation,
  });
  marker.setMap(map);
}

// AIzaSyC5WeMOGA2ezX4oAVZBatY-R9R52Gc9QnA  API key