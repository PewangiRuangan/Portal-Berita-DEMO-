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

// Fetch all news from the database
$result = $mysqli->query('SELECT * FROM news ORDER BY created_at DESC');
$news = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage News</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>
    <main class="admin-page">
        <section class="manage-news">
            <h1>Manage News</h1>
            <table class="news-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($news as $article): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($article['title']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($article['image_url'] ?? 'https://via.placeholder.com/100'); ?>" alt="News Thumbnail" class="news-thumbnail"></td>
                            <td>
                                <a href="edit-news.php?id=<?php echo $article['id']; ?>" class="btn-edit">Edit</a>
                                <a href="delete-news.php?id=<?php echo $article['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this news?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    <?php include 'partials/footer.php'; ?>
</body>
</html>
