<div id="map"></div>
    <script>

function initMap() {
  
        var myLatLng = {lat: -25.363, lng: 131.044};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: myLatLng
  });
  
  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });
  
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTPJqSgi-STtvuS9eVRgO0_KhtHjjJASY&signed_in=true&callback=initMap"></script>