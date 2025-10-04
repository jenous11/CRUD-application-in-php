<?php
$dsn = "mysql:host=localhost;dbname=playermanager";
$username = "root";
$password = "";

try {
    $pdo = new pdo($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connected successfully";
} catch (PDOException $e) {
    "error: " . $e->getMessage();
}
