<?php
$db = loadDatabase();

$stmt = $db->prepare('SELECT * FROM bathroom');
//$stmt->bindValue(':id', $bathId, PDO::PARAM_INT);
$stmt->execute();
$bathrooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
$emparray = array();
foreach ($bathrooms as $row) {
  $emparray[] = $row;
}
//echo json_encode($emparray);
//write to json file
$jsonFile = fopen('bathrooms.json', 'w');
fwrite($jsonFile, json_encode($emparray));
fclose($jsonFile);

 ?>
