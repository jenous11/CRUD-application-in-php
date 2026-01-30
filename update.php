<?php
require_once "includes/connect.php";

$message = "";
$player = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // ── Update logic ───────────────────────────────────────
    $id       = $_POST['id']       ?? null;
    $pname    = trim($_POST['pname']    ?? '');
    $club     = trim($_POST['club']     ?? '');
    $position = trim($_POST['position'] ?? '');

    if ($id && $pname && $club && $position) {
        try {
            $sql = "UPDATE players
                    SET PNAME = :pname, CLUB = :club, POSITION = :position
                    WHERE ID = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':pname'    => $pname,
                ':club'     => $club,
                ':position' => $position,
                ':id'       => $id
            ]);

            header("Location: view.php?msg=Player+updated");
            exit();
        } catch (PDOException $e) {
            $message = "Database error: " . $e->getMessage();
        }
    } else {
        $message = "Please fill all fields.";
    }
}

// ── Load player data to show in form (GET request) ───────
elseif (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    try {
        $sql = "SELECT * FROM players WHERE ID = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $player = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$player) {
            $message = "Player not found.";
        }
    } catch (PDOException $e) {
        $message = "Error loading player: " . $e->getMessage();
    }
} else {
    $message = "No player ID provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Player</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <a href="view.php" class="btn btn-secondary mb-3">← Back to list</a>

    <h2>Update Player</h2>

    <?php if ($message): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <?php if ($player || ($_SERVER["REQUEST_METHOD"] === "POST" && !$message)): ?>
        <form method="post" class="mt-4">
            <input type="hidden" name="id" value="<?= htmlspecialchars($player['ID'] ?? $_POST['id'] ?? '') ?>">

            <div class="mb-3">
                <label class="form-label">Player Name</label>
                <input type="text" name="pname" class="form-control"
                       value="<?= htmlspecialchars($player['PNAME'] ?? $_POST['pname'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Club</label>
                <input type="text" name="club" class="form-control"
                       value="<?= htmlspecialchars($player['CLUB'] ?? $_POST['club'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Position</label>
                <input type="text" name="position" class="form-control"
                       value="<?= htmlspecialchars($player['POSITION'] ?? $_POST['position'] ?? '') ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    <?php endif; ?>

</body>
</html>
