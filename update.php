    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Form</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    </head>
    <body>
        <button><a href="view.php">Back</a></button>
        <br>
    </body>
    </html>
    <!-- php logic  for getting stuff -->
    <?php
    if (isset($_GET['id'])) {
        $id =    $_GET['id'];
        $pname = $_GET['pname'];
        $club =  $_GET['club'];
        $position = $_GET['position'];
    }
        
        echo $id;
        echo "<br>";
        echo  $pname;
        echo "<br>";
        echo  $club;
        echo "<br>";
        echo  $position;
        echo "<br>";
    ?>

    <!-- Giving inputs to change them -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Form</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    </head>
    <body> 
        <!-- <br> -->
         <!-- <form action="update.php" method="get">
            id:
            <input type="text" name="id" placeholder="enter id" contenteditable="true">
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
            <input type="submit" name="submit">
        </form>
         -->

        <!-- the bootstrapped ones -->
        <form action="update.php " method="get" contenteditable="true">
            <div class="mb-3">
                <label for="exampleInputID" class="form-label">ID</label>
                <input type="text" name="id" >
            </div>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Pname</label>
                <input type="text" name="pname" >
            </div>
            <div class="mb-3">
                <label type="form-check-label" for="exampleCheck1">Club</label>
                <input type="text" name="club" >
            </div>
            <div class="mb-3">
                <label type="form-check-label" for="exampleCheck1">Position</label>
                <input type="text" name="position" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
        
    </body>
    </html> 
        
        <!-- php logic for updating -->
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