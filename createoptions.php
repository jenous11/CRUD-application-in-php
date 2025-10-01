<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>work on how to not insert empty data</p>
    <form action="includes/insert.php" method="post">
        Name of the player:
        <input type="text" name="name" placeholder="enter the name of the player" required>
        <br>
        <br>
        Name of the club:
        <input type="text" name="club" placeholder="enter the name of the club">
        <br>
        <br>
        Name of the position:
        <input type="text" name="position" placeholder="enter the postion of play">
        <br>
        <br>
        <input type="submit" name="submit">
    </form>
  
</body>

</html>