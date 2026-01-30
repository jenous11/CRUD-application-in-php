<?php
$dsn = "mysql:host=localhost;dbname=player_manager";
$username = "root";
$password = "";

try {
    $pdo = new pdo($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connected successfully";
} catch (PDOException $e) {
    die("error: " . $e->getMessage());
}
