    <?php
    if (isset($_GET['id'])) {
        $id =    $_GET['id'];
        $pname = $_GET['pname'];
        $club =  $_GET['club'];
        $position = $_GET['position'];

        echo "id: ".  $id;
        echo "<br>";
        echo "pname: ".$pname;
        echo "<br>";
        echo "club: ".$club;
        echo "<br>";
        echo "position: ".$position;
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
        <button><a href="view.php">Back</a></button>

    <form action="update.php" method="get">
        id:    
        <input type="text" name="id" placeholder="enter id">
        <br>
        name:    
        <input type="text" name="pname" placeholder="enter pname">
        <br>
        club:    
        <input type="text" name="club" placeholder="enter club">
        <br>
        position:    
        <input type="text" name="position" placeholder="enter position">
        <br>
     
        <input type="submit" name="submit" >
    </form>


</body>
</html>
<?php
      try {
        require "includes/connect.php";
        $sql = "UPDATE players SET PNAME = :pname, CLUB= :club, POSITION= :position WHERE ID= :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":pname", $pname);
        $stmt->bindParam(":club", $club);
        $stmt->bindParam(":position", $position);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $pdo = null;
        $stmt = null;
        
        exit();
    } catch (PDOException $e) {
        echo "<br>";
        echo "error " . $e->getMessage();
        echo "<br>";
    }
?>