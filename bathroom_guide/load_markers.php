<?php
require 'database_loader.php';

$db = loadDatabase();

$stmt = $db->prepare('SELECT name, lat, lon FROM bathroom');
//$stmt->bindValue(':id', $bathId, PDO::PARAM_INT);
$stmt->execute();
$ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($ratings as $value) {
  echo $value['name'] . "<br>\n";
  echo $value['lat'] . "<br>\n";
  echo $value['lon'] . "<br>\n";
}
 ?>
