<?php
require "includes/connect.php";

if (isset($_GET['id'])) {
    echo $_GET['id'];
    $id = $_GET['id'];
    try {
        $sql = "DELETE FROM players WHERE ID = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $pdo = null;
        $stmt = null;
        header("location: view.php");
        exit();        
    } catch (PDOException $e) {
        echo "error: " . $e->getMessage();
    }
} else {
    echo "error while deleting";
    // header("location: view.php");
}
