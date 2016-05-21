<?php
function loadDatabase()
{
    $dbHost = 'localhost';
    $dbUser = 'bath_app_user';
    $dbPassword = 'pass';

    $dbName = 'bathroom_guide';
    try {
        $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
    } catch (Exception $e) {
        echo $e;
        die();
    }

    return $db;
}
?>
