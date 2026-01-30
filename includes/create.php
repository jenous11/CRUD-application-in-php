<?php
$dsn = "mysql:host=localhost;dbname=playemanager";
$username = "brad";
$password = "password";

try {
  require_once "connect.php";
  $pdo = new PDO($dsn, $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE IF NOT EXISTS playermanager";
  // use exec() because no results are returned
  $pdo->exec($sql);
  // echo "Database created successfully<br>";
} catch (PDOException $e) {
  echo "error" . $e->getMessage();
}

$pdo = null;
