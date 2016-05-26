<?php

$name = $email = $password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['pass']);
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
$query = 'INSERT INTO user(name, email, password) VALUES(:name, :email, :password)';

$statement = $db->prepare($query);

$statement->bindParam(':name', $name);
$statement->bindParam(':email', $email);
$statement->bindParam(':password', $password);
$statement->execute();

?>
