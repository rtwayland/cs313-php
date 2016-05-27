<?php

$name = $street = $city = $state = $zip = $soap = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = test_input($_POST['name']);
    $street = test_input($_POST['street']);
    $city = test_input($_POST['city']);
    $state = test_input($_POST['state']);
    $zip = test_input($_POST['zip']);
    $soap = test_input($_POST['soap']);
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
$query = 'INSERT INTO bathroom(name, street, city, state, zip) VALUES(:name, :street, :city, :state, :zip)';

$statement = $db->prepare($query);

$statement->bindParam(':name', $name);
$statement->bindParam(':street', $street);
$statement->bindParam(':city', $city);
$statement->bindParam(':state', $state);
$statement->bindParam(':zip', $zip);
$statement->execute();

header("location: bathroom-confirmation.html");
die("Page should have been redirected");

?>
