<?php

try {
    require_once "includes/connect.php";
    $sql = ("SELECT *FROM players ");
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt = null;
} catch (PDOException $e) {
    echo "<br>";
    echo "error" . $e->getMessage();
    echo "<br>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section>
<button><a href="createoptions.php">Back</a></button>
        <?php
        if (empty($result)) {
            echo "the database is empty";
            header("location: createoptions.php");
        } else {
            foreach ($result as $rows) {
                $id = $rows['ID'];
                echo "<br>";
            $id = $rows['ID'];
                echo "<p>" . $rows["PNAME"] . "</p>";
                echo "<p>" . $rows["CLUB"] . "</p>";
                echo "<p>" . $rows["POSITION"] . "</p>";
                // echo ($id); dont need to show this one
                echo "<br>";
                echo "<a href=delete.php?id=$id><button>delete</button></a>";
                echo "<br>";
            }
        }
        ?>
    </section>
</body>

</html>