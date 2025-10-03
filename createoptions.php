<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

</head>

<body>
    <h1 class="text-sm fs mt-4 fs-3 ">Enter Player Details</h1>
    <div class="d-flex mt-5  justify-content-center ">
        <form action="insert.php" method="post">
            <div class="mb-3">
                <label for="pname" class="form-label">pname</label>
                <input type="text" class="form-control form-control-lg" name="name" ">
  </div>
  <div class=" mb-3">
                <label for="club" class="form-label">club</label>
                <input type="text" class="form-control " name="club">
            </div>
            <div class="mb-3 ">
                <label class="form-label" for="position">Position</label>
                <input type="text" class="form-control" name="position">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    </div>

</body>

</html>