<?php

$host = "localhost";
$dbname = "myfirstdatabase1";
$dbusername = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection Failed: " . $e->getMessage());
}