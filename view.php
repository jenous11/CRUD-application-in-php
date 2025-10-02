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
                echo "<br>";
                $id = $rows["ID"];
                $pname = $rows["PNAME"];
                $club = $rows["CLUB"];
                $position = $rows["POSITION"];
                echo "<br>";


                echo "<p>" . $rows["PNAME"] . "</p>";
                echo "<p>" . $rows["CLUB"]  . "</p>";
                echo "<p>" . $rows["POSITION"] . "</p>";
                
                echo "<p>" . "<a href='update.php?id=$id&pname=$pname&club=$club&position=$position'>
                          <button> edit </button>
                         </a>" . "</p>";
                echo "<br>";

                // this is chat gpted way, still works good 
    //             echo "<p><a href='update.php?id=" . urlencode($id) .
    //  "&pname=" . urlencode($pname) .
    //  "&club=" . urlencode($club) .
    //  "&position=" . urlencode($position) . "'>edit</a></p>";

                
                
                
                
                echo "<button> <a href=delete.php?id=$id> delete </a> </button>";
                echo "<br>";
            }
        }
        ?>
    </section>
</body>

</html>