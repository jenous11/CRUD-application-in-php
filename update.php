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
         <!-- <form action="update.php " method="get" contenteditable="false" class="d-grid justify-content-center">
             ID
            <div class="mb-3">
            <input type="text" name="id" required >
            <p contenteditable="true"><?php echo $id?> </p>
            </div>
            Pname
            <div class="mb-3">
            <input type="text" name="pname" required>
            <p contenteditable="true"><?php echo $pname?> </p>

            </div>
               Club
            <div class="mb-3">
            <input type="text" name="club" required >
            </div>
            Position
            <div class="mb-3">
            <input type="text" name="position" required >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>  -->

        <form action="update.php" method="get">
  <div class="mb-3">
    <label for="plantext" class="form-label">id </label>
    <input type="text" name="id" class="form-control"  aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">pname</label>
    <input type="text" name="pname"class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">club</label>
    <input type="text" name="club"class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">position</label>
    <input type="text" name="position"class="form-control" id="exampleInputPassword1">
  </div>
  
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