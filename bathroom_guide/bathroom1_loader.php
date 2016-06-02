<?php
$db = loadDatabase();

// $maverikId = $_GET["location"];
$bathId = 1;
$stmt = $db->prepare('SELECT gender, AVG(cleanliness), AVG(private_bath), AVG(changing_table), AVG(pet_area), AVG(soap_quality) FROM rating WHERE bathroom_id=:id');
$stmt->bindValue(':id', $bathId, PDO::PARAM_INT);
$stmt->execute();
$ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);


$stmt = $db->prepare('SELECT * FROM bathroom WHERE id=:id');
$stmt->bindValue(':id', $bathId, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$bathroom = $rows[0];

 ?>
