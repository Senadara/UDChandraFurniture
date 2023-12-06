<?php

$host = 'localhost';
$dbname = 'udchandrafurniture';
$username = 'root'; 
$password = '';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
