<?php
  session_start();
  $user = $_SESSION['user'];
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" lang="en" />
    <meta name="author" content="Raleigh Wayland" />
    <title>Bathroom Guide Home</title>
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>
    <div class="app-wrapper" id="home-screen">
        <div id="home-padding"></div>
        <div id="logo">
            <h1>Bathroom Guide</h1></div>
        <a href="map_screen.php">
            <div id="find-button">
                <h1>FIND</h1></div>
        </a>
        <?php
          session_start();
          if (isset($_SESSION['user'])) {
        ?>
          <a href="rate_screen_from_home.html">
              <div id="rate-button" style="margin-bottom: 20px;">
                  <h1>RATE</h1></div>
          </a>
        <?php
          } else {
        ?>
          <a href="error-screen-rate-prohibit.html">
              <div id="rate-button" style="margin-bottom: 20px;">
                  <h1>RATE</h1></div>
          </a>
        <?php
          }
        ?>
<div class="home-logins">
  <a class="login-button inline" href="login.html">Login</a>
  <a class="login-button inline" href="sign-up.html">Sign Up</a>
  <a class="login-button inline" href="#">Log Out</a>
</div>


    </div>
</body>

</html>
