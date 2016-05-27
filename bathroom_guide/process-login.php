<?php
$email = $password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

$query = "SELECT email, password FROM user WHERE email='$email'";
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt->fetchALL(PDO::FETCH_ASSOC);

if (sizeof($users) > 0) {
  if ($password == $users[0]['password']) {
      header("location: home.html");
      die("Page should have been redirected");
  } else {
    echo "Wrong password";
  }
} else {
  require 'error-screen-noaccount.html';
}

 ?>
