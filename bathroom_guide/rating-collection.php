<?php

$gender = $cleanliness = $private_bath = $change_table = $pets = $soap = $bath_id = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gender = test_input($_POST['gender']);
    $cleanliness = test_input($_POST['cleanliness']);
    $private_bath = test_input($_POST['private_bath']);
    $change_table = test_input($_POST['change_table']);
    $pets = test_input($_POST['pets']);
    $soap = test_input($_POST['soap']);
    $bath_id = test_input($_POST['bath_id']);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

require 'database_loader.php';
$db = loadDatabase();
$query = 'INSERT INTO rating(gender, cleanliness, private_bath, changing_table, pet_area, soap_quality, bathroom_id) VALUES(:gender, :cleanliness, :private_bath, :change_table, :pets, :soap, :bath_id)';

$statement = $db->prepare($query);

$statement->bindParam(':gender', $gender);
$statement->bindParam(':cleanliness', $cleanliness);
$statement->bindParam(':private_bath', $private_bath);
$statement->bindParam(':change_table', $change_table);
$statement->bindParam(':pets', $pets);
$statement->bindParam(':soap', $soap);
$statement->bindParam(':bath_id', $bath_id);
$statement->execute();

header("location: rating-confirmation.html");
die("Page should have been redirected");

?>
