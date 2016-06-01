<?php
  require 'database_loader.php';
  require 'bathroom1_loader.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" lang="en" />
    <meta name="author" content="Raleigh Wayland" />
    <title>Find a Bathroom</title>
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <style>
        #type-selector {
            color: #fff;
            background-color: #4d90fe;
            padding: 5px 11px 0px 11px;
        }

        #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #target {
            width: 345px;
        }
    </style>
</head>

<body>
    <div class="app-wrapper">
        <div class="home-search-bar">
            <a href="home.php">
                <div class="home-button">
                    <h1>HOME</h1></div>
            </a>
            <input type="text" id="pac-input" class="search-field controls" placeholder="Search" />
        </div>

        <div id="map" style="width: 100%; height: 547px"></div>
        <script>
            function initAutocomplete() {
                var maverik = {
                    lat: 43.825759,
                    lng: -111.790017
                };

//                var secondPoint = {
//                    lat: 43.826006,
//                    lng: -111.788708
//                };

                var thirdPoint = {
                    lat: 43.826931,
                    lng: -111.789341
                };

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 16,
                    disableDefaultUI: true,
                    center: maverik
                });

                var marker = new google.maps.Marker({
                    position: maverik,
                    map: map,
                    title: 'Maverik'
                });

//                var secondMarker = new google.maps.Marker({
//                    position: secondPoint,
//                    map: map,
//                    title: 'Maverik'
//                });

                var thirdMarker = new google.maps.Marker({
                    position: thirdPoint,
                    map: map,
                    title: 'Chevron'
                });
                marker.addListener('click', function () {
                    var footer = document.getElementById('map-footer');

                    //var second = document.getElementById('map-footer2');
                    var third = document.getElementById('map-footer3');

                    //second.style.visibility = "hidden";
                    third.style.visibility = "hidden";

                    if (footer.style.visibility == "hidden") {
                        footer.style.visibility = "visible";
                    } else if (footer.style.visibility == "visible") {
                        footer.style.visibility = "hidden";
                    } else
                        footer.style.visibility = "visible";
                });

//                secondMarker.addListener('click', function () {
//                    var footer = document.getElementById('map-footer2');
//
//                    var second = document.getElementById('map-footer');
//                    var third = document.getElementById('map-footer3');
//
//                    second.style.visibility = "hidden";
//                    third.style.visibility = "hidden";
//
//                    if (footer.style.visibility == "hidden") {
//                        footer.style.visibility = "visible";
//                    } else if (footer.style.visibility == "visible") {
//                        footer.style.visibility = "hidden";
//                    } else
//                        footer.style.visibility = "visible";
//                });

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
                    //var second = document.getElementById('map-footer2');
                    var third = document.getElementById('map-footer3');

                    footer.style.visibility = "hidden";
                    //second.style.visibility = "hidden";
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
        </script>
        <a href="add_bath.html"><div class="add-a-bathroom">+</div></a>

        <div id="map-footer" class="map-footers">
            <?php
                 echo '<h1>'.$bathroom['name']."</h1>\n";
                 echo '<p>'.$bathroom['street']."\n<br>\n";
                 echo $bathroom['city'].', '.$bathroom['state'];
                 echo ' '.$bathroom['zip']."</p>\n";

            ?>
            <h2><span id="underline">Overall Rating</span>: <span id="green-font"><?php echo $rating['cleanliness']; ?></span></h2>
            <a href="details_screen.php">
                <div class="detail-button">
                    View Details
                </div>
            </a>
            <br>

              <a href="rate_screen.php?id=<?=$bathroom['id']?>">
                <div class='rate-button'>Rate This Bathroom</div>
              </a>";


            <!-- <button class="login-button" type="button" name="button" onclick="">Rate This Bathroom</button> -->




        </div>

<!--        <div id="map-footer2" class="map-footers">
            <h1>Pizza Hut</h1>
            <p>163 W Main St
                <br> Rexburg, ID 83440</p>
            <h2><span id="underline">Overall Rating</span>: <span id="green-font">DECENT</span></h2>
            <a href="pizza_details_screen.html">
                <div class="detail-button">
                    View Details
                </div>
            </a>
            <br>
            <a href="rate_screen.php">
                <div class="rate-button">
                    Rate This Bathroom
                </div>
            </a>
        </div>-->

        <div id="map-footer3" class="map-footers">
          <?php
               require 'bathroom2_loader.php';
               echo '<h1>'.$bathroom['name']."</h1>\n";
               echo '<p>'.$bathroom['street']."\n<br>\n";
               echo $bathroom['city'].', '.$bathroom['state'];
               echo ' '.$bathroom['zip']."</p>\n";

          ?>
          <h2><span id="underline">Overall Rating</span>: <span id="green-font"><?php echo $rating['cleanliness']; ?></span></h2>
            <a href="chev_details_screen.php">
                <div class="detail-button">
                    View Details
                </div>
            </a>
            <br>
            <a href="rate_screen.php">
                <div class="rate-button">
                    Rate This Bathroom
                </div>
            </a>
        </div>
    </div>

    </div>
    <script src="https://maps.googleapis.com/maps/api/js?&libraries=places&callback=initAutocomplete" async defer></script>
</body>

</html>
