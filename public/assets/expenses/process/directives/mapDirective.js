app.directive('mapDirective', [
  '$http',
  '$state',
  '$stateParams',
  '$rootScope',
  function directive($http,$state,$stateParams,$rootScope) {
    return {
      restrict: "A",
      scope: true,
      link: function link( scope, element, attributeSet )
      {
        console.log( "mapDirective Runinng !" );

        var iconMarkerBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        var map;
        var infoWindow;
        var currentPositionMarker ;
        var myLatlng;
        var infowindow = [];

        var markers = [];
        var directionsRenderer = [];
        var selected_notif_arr = [];

        var directionsService = new google.maps.DirectionsService();
        var directionsMatrixservice = new google.maps.DistanceMatrixService();


        scope.active_notif = [];

        scope.notif_list = [
          {
            id : 1,
            latlng : {lat:8.5090004, lng:124.76753},
            message : `Hi! I have a big mouth.`,
            name : `Anal Alzula`,
            img : 'allan.jpg',
            icon : 'allanIcon.jpg',
          },
          {
            id : 2,
            latlng : {lat:8.4890626, lng:124.5964074},
            message : `Help!`,
            name : `Matt Batman`,
            img : 'matt.jpg',
            icon : 'mattIcon.jpg',
          },
          {
            id: 3,
            latlng : {lat:8.4754904, lng:124.6197734},
            message : `Hi! I'm a Pervert`,
            name : `Manyak Kun`,
            img : 'billy.jpg',
            icon : 'billyIcon.jpg',
          },
          {
            id: 4,
            latlng : {lat:8.480177, lng:124.642613},
            message : `Hi! I'm also a Pervert`,
            name : `Kuya ni Manyak Kun`,
            img : 'jhon.jpg',
            icon : 'jhonIcon.jpg',
          },
        ];

        scope.selectNotif = ( notif ) =>{
          // console.log(notif);
          var checkActive = $.inArray( notif.id, scope.active_notif );
          // console.log(checkActive);
          if( checkActive < 0 ){
            notif.active = true;
            selected_notif_arr.push(notif.latlng);
            scope.active_notif.push(notif.id);
            
            scope.calcRoute(notif);
            scope.addMarker(notif);
            scope.addInfoWindow(notif);
            
          }else{
            notif.active = false;
            markers[checkActive].setMap(null);
            markers.splice(checkActive,1);
            directionsRenderer[checkActive].setMap(null);
            directionsRenderer.splice(checkActive,1);
            selected_notif_arr.splice(checkActive,1);
            scope.active_notif.splice(checkActive,1);
          }

          var bounds = new google.maps.LatLngBounds();
          bounds.extend( currentPositionMarker.getPosition() );

          for (var i = 0; i < selected_notif_arr.length; i++) {
            bounds.extend(new google.maps.LatLng(selected_notif_arr[i].lat, selected_notif_arr[i].lng));
          }

          map.fitBounds(bounds);

          if( selected_notif_arr.length == 0 ){
            map.setZoom(12);
          }
        }


        //====== MAP INITIALIZATIONS =======//

        scope.calcRoute = ( notif ) =>{

          var request = {
            origin: currentPositionMarker.getPosition(),
            destination: notif.latlng,
            travelMode: 'DRIVING'
          };
          directionsService.route(request, function(result, status) {
            if (status == 'OK') {
              console.log(result);
              directionsRenderer[$.inArray( notif.id, scope.active_notif )] = new google.maps.DirectionsRenderer({
                draggable: true,
                map: map,
                suppressMarkers: true
              });

              directionsRenderer[$.inArray( notif.id, scope.active_notif )].setMap(map);
              directionsRenderer[$.inArray( notif.id, scope.active_notif )].setDirections(result);

              directionsRenderer[$.inArray( notif.id, scope.active_notif )].addListener('directions_changed', function() {
                computeTotalDistance(directionsRenderer[$.inArray( notif.id, scope.active_notif )].getDirections());
              });
            }
          });

          directionsMatrixservice.getDistanceMatrix({
            origins: [currentPositionMarker.getPosition()],
            destinations: [notif.latlng],
            travelMode: 'DRIVING',
            // transitOptions: TransitOptions,
            // drivingOptions: DrivingOptions,
            // unitSystem: UnitSystem,
            // avoidHighways: Boolean,
            // avoidTolls: Boolean,
          }, function success(response, status) {
            console.log(response);
          });
        }

        scope.addMarker = ( notif ) =>{
          var position = new google.maps.LatLng(notif.latlng.lat, notif.latlng.lng);
          var imageIcon = {
            url: 'assets/expenses/img/users/' + notif.icon,
            // This marker is 20 pixels wide by 32 pixels high.
            size: new google.maps.Size(50, 50),
            // The origin for this image is (0, 0).
            origin: new google.maps.Point(0, 0),
            // The anchor for this image is the base of the flagpole at (0, 32).
            anchor: new google.maps.Point(25, 50),
          };

          markers[ $.inArray( notif.id, scope.active_notif ) ] = new google.maps.Marker({
            position: position,
            map: map,
            icon: imageIcon,
            animation: google.maps.Animation.DROP,
          });
        }

        scope.addInfoWindow = ( notif ) =>{
          var contentString = notif.name + ` : ` + notif.message;

          infowindow[ $.inArray( notif.id, scope.active_notif ) ] = new google.maps.InfoWindow({
            content: contentString
          });

          markers[ $.inArray( notif.id, scope.active_notif ) ].addListener('click', function() {
            scope.closeAllInfoWindows();
            infowindow[$.inArray( notif.id, scope.active_notif )].open(map, markers[ $.inArray( notif.id, scope.active_notif ) ]);
          });
        }

        scope.closeAllInfoWindows = ( ) =>{
          for (var i = 0; i < infowindow.length; i++) {
            infowindow[i].close();
          }
        }

        scope.initMap = () => {
          map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          });

          var myoverlay = new google.maps.OverlayView();
          myoverlay.draw = function () {
            this.getPanes().markerLayer.id='markerLayer';
          };
          myoverlay.setMap(map);

          scope.autoUpdateMap();
        }

        scope.autoUpdateMap = () => {
          navigator.geolocation.getCurrentPosition(
            function success(position) {  
            console.log(position.coords);

            var newPoint = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            if (currentPositionMarker) {
              currentPositionMarker.setPosition(newPoint);
            }else {
              // var newPoint = new google.maps.LatLng(8.4787481, 124.6037888);
              currentPositionMarker = new google.maps.Marker({
                position: newPoint,
                map: map,
                animation: google.maps.Animation.DROP,
              });
            }

            map.setCenter(newPoint);
          }, 
          function error(err) {  
            console.log(err);
          },{
            maximumAge:60000, 
            timeout:5000, 
            enableHighAccuracy:true
          }); 

          // setTimeout(scope.autoUpdateMap, 5000);
        }

        scope.onLoad = ( ) =>{
          scope.initMap();
        }

        scope.onLoad();

      }
    }


  }
])