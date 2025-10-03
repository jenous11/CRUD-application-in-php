<?php
// if (($_SERVER["REQUEST_METHOD"] == "GET")) {
// // if(isset($_GET['id'])){
//     $pname = $_POST["pname"];
//     $club = $_POST["club"];
//     $position = $_POST["position"];
//     try {
//         require "includes/connect.php";
//         $sql = "UPDATE players SET PNAME = :pname, CLUB= :club, POSITION= :position WHERE ID= :id;";
//         $stmt = $pdo->prepare($sql);
//         $stmt->bindParam(":pname", $pname);
//         $stmt->bindParam(":club", $club);
//         $stmt->bindParam(":position", $position);
//         $stmt->bindParam(":id", $id);
//         $stmt->execute();
//         $pdo = null;
//         $stmt = null;
//         header("location: view.php");
//         exit();
//     } catch (PDOException $e) {
//         echo "<br>";
//         echo "error " . $e->getMessage();
//         echo "<br>";
//     }
// } else {
//     echo "<br>";
//     echo "error while getting update element";
//     echo "<br>";
// }


    //   try {
    //     require "includes/connect.php";
    //     $sql = "UPDATE players SET PNAME = :pname, CLUB= :club, POSITION= :position WHERE ID= :id;";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindParam(":pname", $pname);
    //     $stmt->bindParam(":club", $club);
    //     $stmt->bindParam(":position", $position);
    //     $stmt->bindParam(":id", $id);
    //     $stmt->execute();
    //     $pdo = null;
    //     $stmt = null;
    //     header("location: update.php");
    //     exit();
    // } catch (PDOException $e) {
    //     echo "<br>";
    //     echo "error " . $e->getMessage();
    //     echo "<br>";
    // }
// } else {
//     echo "<br>";
//     echo "error while getting update element";
//     echo "<br>";
// }
?>