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
    <!-- php logic  for  when id is set and method is get  -->
    <?php
    if (isset($_GET['id'])) {
        $id =    $_GET['id'];
        $pname = $_GET['pname'];
        $club =  $_GET['club'];
        $position = $_GET['position'];
    }
    // echoing out outputs
    echo "<div class='d-flex justify-content-center'>";
    echo"<form action='update.php' method='get'>";    
    echo"<p contenteditable='true'>$id</p>";
        // echo "<br>";
        echo  $pname;
        echo "<br>";
        echo  $club;
        echo "<br>";
        echo  $position;
        // echo "<br>";
        // echo"<input></input>";
    echo"</form>";    

    echo "</div>";
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
    
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

        <!-- the bootstrapped ones -->
         <form action="update.php " method="get" contenteditable="false" class="d-grid justify-content-center">
             ID
            <div class="mb-3">
            <input type="text" name="id" >
            <p contenteditable="true"><?php echo $id?> </p>
            </div>
            Pname
            <div class="mb-3">
            <input type="text" name="pname" >
            <p contenteditable="true"><?php echo $pname?> </p>

            </div>
               Club
            <div class="mb-3">
            <input type="text" name="club" >
            </div>
            Position
            <div class="mb-3">
            <input type="text" name="position" >
            </div>
            <!-- <textarea contenteditable="true"><//?php echo $id?></textarea> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
    </body>
    </html>  

        <!-- php logic for updating the database-->
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