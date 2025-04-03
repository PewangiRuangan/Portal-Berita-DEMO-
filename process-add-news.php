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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $mysqli->real_escape_string($_POST['title']);
    $description = $mysqli->real_escape_string($_POST['description']);
    $category = $mysqli->real_escape_string($_POST['category']);

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageSize = $_FILES['image']['size'];
        $imageType = mime_content_type($imageTmpPath);

        // Validate image type
        if (!in_array($imageType, ['image/png', 'image/jpeg'])) {
            die('Invalid image format. Only PNG and JPG are allowed.');
        }

        // Move the uploaded file to the uploads directory
        $uploadDir = 'uploads/';
        $imagePath = $uploadDir . basename($imageName);
        move_uploaded_file($imageTmpPath, $imagePath);
    } else {
        $imagePath = null; // No image uploaded
    }

    $stmt = $mysqli->prepare('INSERT INTO news (title, description, image_url, category) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssss', $title, $description, $imagePath, $category);
    $stmt->execute();

    header('Location: admin.php');
    exit;
}
?>
