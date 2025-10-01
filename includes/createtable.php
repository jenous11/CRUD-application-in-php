<?php

require_once "connect.php";

try {
    $sql = "CREATE TABLE players(ID INT (255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
PNAME VARCHAR(255) NOT NULL, 
CLUB VARCHAR(255),
POSITION VARCHAR(255)
)";
    $pdo->exec($sql);
    echo "<br>";
    echo "Table created successfully";
    echo "<br>";
} catch (PDOException $e) {
    echo "<br>";
    echo "error: " . $e->getMessage();
}
