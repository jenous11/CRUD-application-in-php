<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pname    = $_POST["name"];
        $club     = $_POST["club"];
        $position = $_POST["position"];
        try {
            require_once "connect.php";
            $sql = "INSERT INTO players(PNAME,CLUB,POSITION) VALUES (:pname ,:club, :position);";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":pname", $pname);
            $stmt->bindParam(":club", $club);
            $stmt->bindParam(":position", $position);
            $stmt->execute();
            $stmt = null;
            $pdo = null;
            header("location: ../view.php ");
            exit();
            die();
        } catch (PDOException $e) {
            echo "error" . $e->getMessage();
        }
    } else {
        header("location: ../createoptions.php ");
        exit();
    }
?>
