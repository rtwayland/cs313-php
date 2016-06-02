<?php

$name = $street = $city = $state = $zip = $lat = $lon = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = test_input($_POST['name']);
    $street = test_input($_POST['street']);
    $city = test_input($_POST['city']);
    $state = test_input($_POST['state']);
    $zip = test_input($_POST['zip']);
    $lat = test_input($_POST['lat']);
    $lon = test_input($_POST['lon']);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

$address = $street . ", " . $city . ", " . $state;

require 'database_loader.php';
$db = loadDatabase();
$query = 'INSERT INTO bathroom(name, street, city, state, zip, address, lat, lon) VALUES(:name, :street, :city, :state, :zip, :address, :lat, :lon)';

$statement = $db->prepare($query);

$statement->bindParam(':name', $name);
$statement->bindParam(':street', $street);
$statement->bindParam(':city', $city);
$statement->bindParam(':state', $state);
$statement->bindParam(':zip', $zip);
$statement->bindParam(':address', $address);
$statement->bindParam(':lat', $lat);
$statement->bindParam(':lon', $lon);
$statement->execute();

header("location: bathroom-confirmation.html");
die("Page should have been redirected");

?>
