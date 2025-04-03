<?php
include_once __DIR__ . '/../fetch-news.php';

$query = isset($_GET['query']) ? trim($_GET['query']) : '';
$articles = [];

if (!empty($query)) {
    $mysqli = new mysqli('localhost', 'root', '', 'news_portal');
    if ($mysqli->connect_error) {
        die('Database connection failed: ' . $mysqli->connect_error);
    }

    // Search for news in the database by title or description
    $stmt = $mysqli->prepare('SELECT * FROM news WHERE title LIKE ? OR description LIKE ? ORDER BY created_at DESC');
    $searchTerm = '%' . $query . '%';
    $stmt->bind_param('ss', $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    $articles = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - News Portal</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php include __DIR__ . '/../partials/header.php'; ?>
    <main>
        <h1>Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
        <?php if (empty($articles)): ?>
            <p class="error">No results found for your search.</p>
        <?php else: ?>
            <section class="news-grid">
                <?php foreach ($articles as $article): ?>
                    <div class="news-card">
                        <img src="<?php echo htmlspecialchars($article['image_url'] ?? 'https://via.placeholder.com/300'); ?>" alt="News Image">
                        <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                        <p><?php echo htmlspecialchars($article['description']); ?></p>
                        <a href="../news-details.php?id=<?php echo htmlspecialchars($article['id']); ?>">Read more</a>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
    </main>
    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>
