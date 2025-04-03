<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$mysqli = new mysqli('localhost', 'root', '', 'news_portal');
if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

// Fetch user details
$stmt = $mysqli->prepare('SELECT * FROM users WHERE id = ?');
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - News Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>
    <main class="container py-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="<?php echo htmlspecialchars($user['profile_photo'] ?? 'https://via.placeholder.com/150'); ?>" alt="Profile Photo" class="img-fluid rounded-circle mb-3">
                <h3><?php echo htmlspecialchars($user['name']); ?></h3>
                <p class="text-muted"><?php echo htmlspecialchars($user['email']); ?></p>
            </div>
            <div class="col-md-8">
                <h2>Profile Details</h2>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td><?php echo htmlspecialchars($user['name']); ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                        </tr>
                        <tr>
                            <th>Joined</th>
                            <td><?php echo htmlspecialchars(date('F j, Y', strtotime($user['created_at']))); ?></td>
                        </tr>
                    </tbody>
                </table>
                <a href="edit-profile.php" class="btn btn-primary">Edit Profile</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </main>
    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
