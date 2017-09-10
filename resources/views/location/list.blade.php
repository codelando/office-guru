@extends('layouts.office-guru')

@section('content')
<main>
    <section class="offices pad-top">
        <div class="container">
            <h2>Oficinas encontradas</h2>
            <div class="col-sm-12 col-md-8 col-lg-8">
                @include('location._list')
                {{ $locations->links() }}
            </div>
            <style>
                #map { 
                    width: 100%; 
                    height: 600px; 
                    margin-top: 36px; }
            </style>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div id="map"></div>
                <div style="visibility:;">
                    <label for="raddressInput">Buscar oficina:</label>
                    <input type="text" id="addressInput" size="15" value="ubicación" />
                    <label for="radiusSelect">Distancia:</label>
                    <select id="radiusSelect" label="Radius">
                        <option value="10" selected>10 kms</option>
                        <option value="5">5 kms</option>
                        <option value="3">3 kms</option>
                        <option value="1">1 km</option>
                    </select>
                    <input type="button" id="searchButton" value="Buscar"/>
                </div>
                <div style="visibility:;"><select id="locationSelect" style="width: 50%; visibility: hidden"></select></div>
                <script>
                  var map;
                  var markers = [];
                  var infoWindow;
                  var locationSelect;

                    function initMap() {
                      var buenosAires = {lat: -34.603722, lng: -58.381592};
                      map = new google.maps.Map(document.getElementById('map'), {
                        center: buenosAires,
                        zoom: 12,
                        mapTypeId: 'roadmap',
                        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
                      });
                      infoWindow = new google.maps.InfoWindow();

                      searchButton = document.getElementById("searchButton").onclick = searchLocations;

                      locationSelect = document.getElementById("locationSelect");
                      locationSelect.onchange = function() {
                        var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
                        if (markerNum != "none"){
                          google.maps.event.trigger(markers[markerNum], 'click');
                        }
                      };
                    }

                   function searchLocations() {
                     var address = document.getElementById("addressInput").value;
                     var geocoder = new google.maps.Geocoder();
                     geocoder.geocode({address: address}, function(results, status) {
                       if (status == google.maps.GeocoderStatus.OK) {
                        searchLocationsNear(results[0].geometry.location);
                       } else {
                         alert(address + ' not found');
                       }
                     });
                   }

                   function clearLocations() {
                     infoWindow.close();
                     for (var i = 0; i < markers.length; i++) {
                       markers[i].setMap(null);
                     }
                     markers.length = 0;

                     locationSelect.innerHTML = "";
                     var option = document.createElement("option");
                     option.value = "none";
                     option.innerHTML = "See all results:";
                     locationSelect.appendChild(option);
                   }

                   function searchLocationsNear(center) {
                     clearLocations();

                     var radius = document.getElementById('radiusSelect').value;
                     var searchUrl = '{{ route('location.markers') }}?latitude=' + center.lat() + '&longitude=' + center.lng() + '&radius=' + radius;
                     downloadUrl(searchUrl, function(data) {
                        drawLocations(data);
                     });
                   }

                    function drawLocations(json) {
                        var location = json;
                        if (typeof json !== 'object') {
                            locations = JSON.parse(json);
                        }
                        var bounds = new google.maps.LatLngBounds();
                        locations.forEach(function (location, index) {
                            var latlng = new google.maps.LatLng(
                                parseFloat(location.latitude),
                                parseFloat(location.longitude)
                            );

                            createOption(location.name, location.distance, index);
                            createMarker(latlng, location.name);
                            bounds.extend(latlng);
                        });

                        map.fitBounds(bounds);
                        locationSelect.style.visibility = "visible";
                        locationSelect.onchange = function() {
                            var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
                            google.maps.event.trigger(markers[markerNum], 'click');
                        }
                    }

                   function createMarker(latlng, name, address) {
                      var html = "<b>" + name + "</b> <br/>" + address;
                      var marker = new google.maps.Marker({
                        map: map,
                        position: latlng
                      });
                      google.maps.event.addListener(marker, 'click', function() {
                        infoWindow.setContent(html);
                        infoWindow.open(map, marker);
                      });
                      markers.push(marker);
                    }

                   function createOption(name, distance, num) {
                      var option = document.createElement("option");
                      option.value = num;
                      option.innerHTML = name;
                      locationSelect.appendChild(option);
                   }

                   function downloadUrl(url, callback) {
                      var request = window.ActiveXObject ?
                          new ActiveXObject('Microsoft.XMLHTTP') :
                          new XMLHttpRequest;

                      request.onreadystatechange = function() {
                        if (request.readyState == 4) {
                          request.onreadystatechange = doNothing;
                          callback(request.responseText, request.status);
                        }
                      };

                      request.open('GET', url, true);
                      request.send(null);
                   }

                   function doNothing() {}

                   locations = {!! $locations->toJson() !!};
                   window.onload = drawLocations(locations.data);
                </script>
                <script async defer
                src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_APP_KEY') }}&callback=initMap">
                </script>

            </div>
        </div>
    </section>  
</main>
@endsection