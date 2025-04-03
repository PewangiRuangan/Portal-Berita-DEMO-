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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);

    // Handle profile photo upload
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
        $photoTmpPath = $_FILES['profile_photo']['tmp_name'];
        $photoName = $_FILES['profile_photo']['name'];
        $photoType = mime_content_type($photoTmpPath);

        // Validate image type
        if (!in_array($photoType, ['image/png', 'image/jpeg'])) {
            die('Invalid image format. Only PNG and JPG are allowed.');
        }

        // Move the uploaded file to the uploads directory
        $uploadDir = 'uploads/';
        $photoPath = $uploadDir . $_SESSION['user_id'] . '_profile_photo.' . pathinfo($photoName, PATHINFO_EXTENSION);
        move_uploaded_file($photoTmpPath, $photoPath);

        // Update profile photo path in the database
        $stmt = $mysqli->prepare('UPDATE users SET profile_photo = ? WHERE id = ?');
        $stmt->bind_param('si', $photoPath, $_SESSION['user_id']);
        $stmt->execute();
    }

    // Update user details
    $stmt = $mysqli->prepare('UPDATE users SET name = ?, email = ? WHERE id = ?');
    $stmt->bind_param('ssi', $name, $email, $_SESSION['user_id']);
    $stmt->execute();

    header('Location: profile.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - News Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>
    <main class="container py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Edit Profile</h2>
                <form action="edit-profile.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="profile_photo" class="form-label">Profile Photo</label>
                        <input type="file" id="profile_photo" name="profile_photo" class="form-control" accept=".png, .jpg, .jpeg">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="profile.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </main>
    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
