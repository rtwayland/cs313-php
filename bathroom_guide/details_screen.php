<?php
  require 'database_loader.php';
  require 'bathroom1_loader.php';
?>

     <!DOCTYPE html>
     <html>

     <head>
         <meta charset="utf-8" lang="en" />
         <meta name="author" content="Raleigh Wayland" />
         <title>View Bathroom Details</title>

         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
         <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

         <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
         <link rel="stylesheet" type="text/css" href="main.css" />
     </head>

     <body>
         <div class="app-wrapper">
             <div class="ratings-bar">
                 <a href="home.php" id="back-home">HOME</a>
                 <a href="map_screen.php" id="back-map">BACK TO MAP</a>
             </div>

             <ul class="nav nav-tabs">
                 <li class="active"><a href="#">MEN</a></li>
                 <li><a href="womens_page.php">WOMEN</a></li>
             </ul>
             <div id="ratings-page">
                 <?php
                      echo '<h1>'.$bathroom['name']."</h1>\n";
                      echo '<p>'.$bathroom['street']."\n<br>\n";
                      echo $bathroom['city'].', '.$bathroom['state'];
                      echo ' '.$bathroom['zip']."</p>\n";
                 ?>
                 <table>
                   <tr>
                     <td><h2>Overall Cleanliness: </h2></td>
                     <td><h2><span id="bathClean"><?php echo $men_rating['cleanliness']; ?></span></h2></td>
                   </tr>
                   <tr>
                     <td><h2>Private Restroom: </h2></td>
                     <td><h2><?php echo $men_rating['private_bath']; ?></h2></td>
                   </tr>
                   <tr>
                     <td><h2>Changing Table: </h2></td>
                     <td><h2><?php echo $men_rating['changing_table']; ?></h2></td>
                   </tr>
                   <tr>
                     <td><h2>Outside Pet Area: </h2></td>
                     <td><h2><?php echo $men_rating['pet_area']; ?></h2></td>
                   </tr>
                   <tr>
                     <td><h2>Soap Quality: </h2></td>
                     <td><h2><?php echo $men_rating['soap_quality']; ?></h2></td>
                   </tr>
                 </table>

                 <?php
                   session_start();
                   if (isset($_SESSION['user'])) {
                 ?>
                 <a href="rate_screen.php?id=<?=$bathroom['id']?>" style="text-decoration: none;">
                     <div class="rate-button-details">
                         <h4>Rate This Bathroom</h4>
                     </div>
                 </a>
                 <?php
                   } else {
                 ?>
                 <a href="error-screen-rate-prohibit.html" style="text-decoration: none;">
                     <div class="rate-button-details">
                         <h4>Rate This Bathroom</h4>
                     </div>
                 </a>
                 <?php
                   }
                 ?>
             </div>
         </div>
     </body>

     </html>
