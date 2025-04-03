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

// Handle form submission for adding news
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $mysqli->real_escape_string($_POST['title']);
    $description = $mysqli->real_escape_string($_POST['description']);
    $category = $mysqli->real_escape_string($_POST['category']);
    $imagePath = null;

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $targetDir = __DIR__ . "/uploads/news/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $imagePath = $targetDir . uniqid() . "_" . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            die('Failed to upload image.');
        }
        $imagePath = 'uploads/news/' . basename($imagePath); // Save relative path
    }

    $stmt = $mysqli->prepare('INSERT INTO news (title, description, image_url, category) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssss', $title, $description, $imagePath, $category);
    $stmt->execute();

    header('Location: manage-news.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News - News Portal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>
    <main class="admin-page">
        <section class="add-news">
            <h1>Add News</h1>
            <form method="POST" action="add-news.php" enctype="multipart/form-data">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter news title" required>
                
                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter news description" required></textarea>
                
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
                
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="national">National</option>
                    <option value="international">International</option>
                    <option value="economy">Economy</option>
                    <option value="sports">Sports</option>
                    <option value="technology">Technology</option>
                    <option value="automotive">Automotive</option>
                </select>
                
                <button type="submit">Add News</button>
            </form>
        </section>
    </main>
    <?php include 'partials/footer.php'; ?>
</body>
</html>
