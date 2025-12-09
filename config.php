<?php

$host = "localhost";
$dbname = "vemotto_db";
$username = "root";
$password = ""; // default for xampp

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
    die("Database Connection Error: " . $e->getMessage());
}
