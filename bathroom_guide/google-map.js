function initAutocomplete() {
    var rexburg = {
      lat: 43.823110,
      lng: -111.792424
    };

    var maverik = {
        lat: 43.825759,
        lng: -111.790017
    };

    var thirdPoint = {
        lat: 43.826931,
        lng: -111.789341
    };

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        disableDefaultUI: true,
        center: rexburg
    });

    var marker = new google.maps.Marker({
        position: maverik,
        map: map,
        title: 'Maverik'
    });


    var thirdMarker = new google.maps.Marker({
        position: thirdPoint,
        map: map,
        title: 'Chevron'
    });
    marker.addListener('click', function () {
        var footer = document.getElementById('map-footer');

        var third = document.getElementById('map-footer3');

        third.style.visibility = "hidden";

        if (footer.style.visibility == "hidden") {
            footer.style.visibility = "visible";
        } else if (footer.style.visibility == "visible") {
            footer.style.visibility = "hidden";
        } else
            footer.style.visibility = "visible";
    });



    thirdMarker.addListener('click', function () {
        var footer = document.getElementById('map-footer3');

        //var second = document.getElementById('map-footer2');
        var third = document.getElementById('map-footer');

        //second.style.visibility = "hidden";
        third.style.visibility = "hidden";

        if (footer.style.visibility == "hidden") {
            footer.style.visibility = "visible";
        } else if (footer.style.visibility == "visible") {
            footer.style.visibility = "hidden";
        } else
            footer.style.visibility = "visible";
    });

    map.addListener('click', function () {
        var footer = document.getElementById('map-footer');
        var third = document.getElementById('map-footer3');

        footer.style.visibility = "hidden";
        third.style.visibility = "hidden";

    });

    // Create the search box and link it to the UI element.

    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function () {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {
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
