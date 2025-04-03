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
    $image_url = $mysqli->real_escape_string($_POST['image_url']);
    $category = $mysqli->real_escape_string($_POST['category']);

    $stmt = $mysqli->prepare('INSERT INTO news (title, description, image_url, category) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssss', $title, $description, $image_url, $category);
    $stmt->execute();

    header('Location: admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add News</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>
    <main class="admin-page">
        <section class="add-news">
            <h1>Add News</h1>
            <form action="process-add-news.php" method="POST" enctype="multipart/form-data">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter news title" required>
                
                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter news description" rows="5" required></textarea>
                
                <label for="image">Upload Image (PNG, JPG):</label>
                <input type="file" id="image" name="image" accept=".png, .jpg" required>
                
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
        <section class="manage-news-link">
            <a href="manage-news.php" class="btn-manage-news">Go to Manage News</a>
        </section>
    </main>
    <?php include 'partials/footer.php'; ?>
</body>
</html>
