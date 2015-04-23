 function initialize() {
        
        var mapOptions = {
          center: { lat:  39.368279, lng: -96.869202},
          zoom: 4,
          mapTypeId: google.maps.MapTypeId.TERRAIN
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
        
       
layer = new google.maps.FusionTablesLayer({
    query: {
      select: 'Location',
      from: '1QQhR2vBc6HbDeoTr5P4EBw3U5_yYRfhp9jK09c0x'
    },
    styles: [{
      where: 'CandidateID = 1',
      markerOptions: {
        iconName: 'h_blue'
      }
      },
      
      {
      where: 'CandidateID = 2',
      markerOptions: {
        iconName: 'p'
      }
    
    },
     {
      where: 'CandidateID = 3',
      markerOptions: {
        iconName: 'r'
      }
    
    },
     {
      where: 'CandidateID = 4',
      markerOptions: {
        iconName: 'c'
      }
    
    }]
   
   
  
  });
  layer.setMap(map);
  
}

      google.maps.event.addDomListener(window, 'load', initialize);
      
      console.log("where is my map?");