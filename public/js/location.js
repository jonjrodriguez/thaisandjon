(function() {

  var styles = [
  {
    "featureType": "landscape",
    "stylers": [
      { "color": "#e9e4ee" }
    ]
  },{
    "featureType": "landscape.man_made",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "poi",
    "elementType": "labels.text",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "elementType": "labels.text.stroke",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "transit",
    "elementType": "geometry",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "water",
    "stylers": [
      { "visibility": "simplified" },
      { "color": "#c6cfff" }
    ]
  },{
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "road",
    "elementType": "geometry.stroke",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "road",
    "elementType": "geometry.fill",
    "stylers": [
      { "color": "#ffffff" }
    ]
  },{
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      { "color": "#51095c" }
    ]
  }];

  google.maps.visualRefresh = true;

  var scholastic = new google.maps.LatLng(40.724007, -73.998229);
  var scholastic_image = "images/icons/marker-1.png";

  var marriott = new google.maps.LatLng(40.766292, -73.978508);
  var marriott_image = "images/icons/marker-2.png";

  var parking = new google.maps.LatLng(40.725549, -73.995573);
  var parking_image = "images/icons/marker-3.png";

  function initialize() {
      var mapOptions = {
          zoom: 12,
          center: new google.maps.LatLng(40.746036, -73.990538),
          styles: styles,
          panControl: false,
          mapTypeControl: false,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      }

      var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

      var marker1 = new google.maps.Marker({
          position: scholastic,
          map: map,
          title:"The Scholastic Building",
          icon: scholastic_image
      });

      var marker2 = new google.maps.Marker({
          position: marriott,
          map: map,
          title:"JW Marriott Essex House",
          icon: marriott_image
      });

      var marker3 = new google.maps.Marker({
          position: parking,
          map: map,
          title:"Soho Village Parking",
          icon: parking_image
      });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
})();