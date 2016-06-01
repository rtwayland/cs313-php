<?php
  $bath_id = $_GET['id'];
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" lang="en" />
    <meta name="author" content="Raleigh Wayland" />
    <title>Rate This Bathroom</title>
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="main.css" />

</head>

<body>
    <div class="app-wrapper">
        <div class="ratings-bar">
            <a href="home.php" id="back-home">HOME</a>
            <a href="map_screen.php" id="back-map">BACK TO MAP</a>
        </div>
        <div id="rate-page">

            <form id="rating-form" action="rating-collection.php" method="post">
                <h1>Men or Women</h1>
                <div class="wrapper">
                    <div class="toggle_radio">
                        <input type="radio" class="toggle_option" id="first_toggle" name="gender" value="men">
                        <input type="radio" checked class="toggle_option" id="second_toggle" name="gender" value="women">

                        <label for="first_toggle">
                            <p>MEN </p>
                        </label>
                        <label for="second_toggle">
                            <p>WOMEN </p>
                        </label>
                        <div class="toggle_option_slider">
                        </div>
                    </div>
                </div>
                <h1>Overall Cleanliness</h1>
                <div class="wrapper">
                    <div class="toggle_radio extended_toggle">

                        <input type="radio" class="toggle_option" id="first_clean" name="cleanliness" value="bad">

                        <input type="radio" checked class="toggle_option" id="second_clean" name="cleanliness" value="decent">

                        <input type="radio" class="toggle_option" id="third_clean" name="cleanliness" value="good">


                        <label for="first_clean">
                            <p>BAD </p>
                        </label>
                        <label for="second_clean">
                            <p>DECENT </p>
                        </label>
                        <label for="third_clean">
                            <p>GOOD </p>
                        </label>

                        <div class="toggle_option_slider">
                        </div>
                    </div>
                </div>

                <h1>Private Restroom</h1>
                <div class="wrapper">
                    <div class="toggle_radio">
                        <input type="radio" class="toggle_option" id="first_toggle2" name="private_bath" value="0">
                        <input type="radio" checked class="toggle_option" id="second_toggle2" name="private_bath" value="1">

                        <label for="first_toggle2">
                            <p>NO </p>
                        </label>
                        <label for="second_toggle2">
                            <p>YES </p>
                        </label>
                        <div class="toggle_option_slider">
                        </div>
                    </div>
                </div>
                <h1>Changing Table</h1>
                <div class="wrapper">
                    <div class="toggle_radio">
                        <input type="radio" class="toggle_option" id="first_toggle3" name="change_table" value="0">
                        <input type="radio" checked class="toggle_option" id="second_toggle3" name="change_table" value="1">

                        <label for="first_toggle3">
                            <p>NO </p>
                        </label>
                        <label for="second_toggle3">
                            <p>YES </p>
                        </label>
                        <div class="toggle_option_slider">
                        </div>
                    </div>
                </div>
                <h1>Outside Pet Area</h1>
                <div class="wrapper">
                    <div class="toggle_radio">
                        <input type="radio" class="toggle_option" id="first_toggle4" name="pets" value="0">
                        <input type="radio" checked class="toggle_option" id="second_toggle4" name="pets" value="1">

                        <label for="first_toggle4">
                            <p>NO </p>
                        </label>
                        <label for="second_toggle4">
                            <p>YES </p>
                        </label>
                        <div class="toggle_option_slider">
                        </div>
                    </div>
                </div>
                <h1>Soap Quality</h1>
                <div class="wrapper">
                    <div class="toggle_radio extended_toggle">

                        <input type="radio" class="toggle_option" id="first_soap" name="soap" value="bad">

                        <input type="radio" checked class="toggle_option" id="second_soap" name="soap" value="decent">

                        <input type="radio" class="toggle_option" id="third_soap" name="soap" value="good">


                        <label for="first_soap">
                            <p>BAD </p>
                        </label>
                        <label for="second_soap">
                            <p>DECENT </p>
                        </label>
                        <label for="third_soap">
                            <p>GOOD </p>
                        </label>

                        <div class="toggle_option_slider">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="bath_id" value="<?=$bath_id?>">
                <!--<input type="submit">-->
                <!-- <button class="login-button" type="submit" name="button">Sign Up</button> -->
                <button class="submit-button" type="submit" name="button">Submit</button>
                <!-- <a href="map_screen.php">
                    <div id="submit-button">Submit</div>
                </a> -->
            </form>
        </div>
</body>

</html>
