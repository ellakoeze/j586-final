 function initialize() {
        var myLatlng = { lat: 35.9333, lng: -79.0333};
        
        var mapOptions = {
          center: { lat: 35.9333, lng: -79.0333},
          zoom: 22,
          mapTypeId: google.maps.MapTypeId.TERRAIN
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
        
        
          var contentString = '<p>' + myLatlng + '</p>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });
        
        
         var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Chapel Hill'
          });
     
      google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
      
      console.log("where is my map?");