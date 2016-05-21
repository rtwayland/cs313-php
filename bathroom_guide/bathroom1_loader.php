<?php
$db = loadDatabase();

// $maverikId = $_GET["location"];
$bathId = 1;
$stmt = $db->prepare('SELECT * FROM rating WHERE bathroom_id=:id');
$stmt->bindValue(':id', $bathId, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$rating = $rows[0];

$stmt = $db->prepare('SELECT * FROM bathroom WHERE id=:id');
$stmt->bindValue(':id', $bathId, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$bathroom = $rows[0];

 ?>
