<?php
  require 'database_loader.php';
  require 'bathroom1_loader.php';
  require 'bathroom_json.php';
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
        <!-- Google Map -->
        <script src="google-map.js"></script>
        <!-- Add Bathroom -->
        <a href="add_bath.html"><div class="add-a-bathroom">+</div></a>
        <!-- Map Footers -->
        <div id="map-footer" class="map-footers">
            <?php
                 echo '<h1>'.$bathroom['name']."</h1>\n";
                 echo '<p>'.$bathroom['street']."\n<br>\n";
                 echo $bathroom['city'].', '.$bathroom['state'];
                 echo ' '.$bathroom['zip']."</p>\n";
            ?>
            <h2><span id="underline">Overall Rating</span>: <?=$rating['cleanliness']; ?></h2>
            <a href="details_screen.php?id=<?=$bathroom['id']?>">
                <div class="detail-button">
                    View Details
                </div>
            </a>
            <br>
            <?php
              session_start();
              if (isset($_SESSION['user'])) {
            ?>
              <a href="rate_screen.php?id=<?=$bathroom['id']?>">
                <div class='rate-button'>Rate This Bathroom</div>
              </a>
            <?php
              } else {
            ?>
              <a href="error-screen-rate-prohibit.html">
                <div class='rate-button'>Rate This Bathroom</div>
              </a>
            <?php
              }
            ?>

        </div>
    </div>

    </div>
    <script src="https://maps.googleapis.com/maps/api/js?&libraries=places&callback=initAutocomplete" async defer></script>
</body>

</html>
