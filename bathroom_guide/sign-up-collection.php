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

$query = "SELECT * FROM user WHERE email='$email'";
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt->fetchALL(PDO::FETCH_ASSOC);

if (sizeof($users) > 0) {
  require 'error-screen-account.html';
} else {
  $query = 'INSERT INTO user(name, email, password) VALUES(:name, :email, :password)';

  $statement = $db->prepare($query);

  $statement->bindParam(':name', $name);
  $statement->bindParam(':email', $email);
  $statement->bindParam(':password', $password);
  $statement->execute();

  header("location: home.html");
  die("Page should have been redirected");
}





?>
