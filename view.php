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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
    <button><a href="createoptions.php">Back</a></button>
    <div class="d-flex justify-content-center ">

        <table class="table-primary table-bordered  ">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">club</th>
                    <th scope="col">position</th>
                    <th colspan="2">options</th>

                </tr>
            </thead>
            <?php
            echo "<tbody>";
            if (empty($result)) {
                echo "the database is empty";
                header("location: createoptions.php");
            } else {
                foreach ($result as $rows) {
                    $id = $rows["ID"];
                    $pname = $rows["PNAME"];
                    $club = $rows["CLUB"];
                    $position = $rows["POSITION"];
                    echo "<tr>";
                    echo "<th >".$id."</th>";
                    echo "<td>" . $rows["PNAME"]."</td>";
                    echo "<td>" . $rows["CLUB"]."</td>";
                    echo "<td>" . $rows["POSITION"]."</td>";
                    echo "<td><a href='update.php?id=$id'><button class='btn btn-sm btn-warning'>Edit</button></a></td>";
                    echo "<td>" . "<a href=delete.php?id=$id><button>delete</button></a>"."</td>";
                    echo "</tr>";
                    echo "</tbody>";
                }
            }
            ?>
        </table>
    </div>
</body>

</html>
