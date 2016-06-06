function initAutocomplete() {
    var rexburg = {
        lat: 43.823110,
        lng: -111.792424
    };

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        disableDefaultUI: true,
        center: rexburg
    });
    var request;
    var bathrooms;
    var lat;
    var lon;
    //var marker;

    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest();
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP");
    }

    request.open('GET', 'bathrooms.json', true);
    request.onreadystatechange = function() {
        if ((request.readyState === 4) && (request.status === 200)) {
            bathrooms = JSON.parse(request.responseText);
            //console.log(bathrooms);
            for (var index in bathrooms) {
                if (bathrooms.hasOwnProperty(index)) {
                    var latitude = parseFloat(bathrooms[index].lat);
                    var longitude = parseFloat(bathrooms[index].lon);

                    var bath_location = {
                        lat: latitude,
                        lng: longitude
                    }

                    var marker = new google.maps.Marker({
                        position: bath_location,
                        map: map,
                        title: bathrooms[index].name,
                        id: bathrooms[index].id,
                        address: bathrooms[index].address
                    });

                    marker.addListener('click', function() {
                        var footer = document.getElementById('map-footer');
                        if (footer.style.visibility == "hidden") {
                            footer.style.visibility = "visible";
                        } else if (footer.style.visibility == "visible") {
                            footer.style.visibility = "hidden";
                        } else
                            footer.style.visibility = "visible";
                    });

                    // infoHtml = '<a href="details_screen.php?id=2">View Details</a>';
                    // var infoWindow = new google.maps.InfoWindow();
                    // infoWindow.setContent(infoHtml);
                    //
                    // google.maps.event.addListener(marker, 'click', function() {
                    //     infoWindow.open(map, marker);
                    // });

                }
            }

        }
    }
    request.send();

    map.addListener('click', function() {
        var footer = document.getElementById('map-footer');

        footer.style.visibility = "hidden";

    });

    // Create the search box and link it to the UI element.

    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}
