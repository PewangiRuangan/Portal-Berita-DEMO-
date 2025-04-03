<?php
$mysqli = new mysqli('localhost', 'root', '', 'news_portal');
if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

// Get the news ID from the query string
$newsId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the news article from the database
$stmt = $mysqli->prepare('SELECT * FROM news WHERE id = ?');
$stmt->bind_param('i', $newsId);
$stmt->execute();
$article = $stmt->get_result()->fetch_assoc();

if (!$article) {
    die('News article not found.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($article['title']); ?> - News Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>
    <main class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <article class="news-details">
                    <h1 class="mb-3"><?php echo htmlspecialchars($article['title']); ?></h1>
                    <p class="text-muted mb-4">
                        Published on <?php echo htmlspecialchars(date('F j, Y', strtotime($article['created_at']))); ?>
                    </p>
                    <img src="<?php echo htmlspecialchars($article['image_url'] ?? 'https://via.placeholder.com/800'); ?>" alt="News Image" class="img-fluid mb-4">
                    <p class="lead"><?php echo htmlspecialchars($article['description']); ?></p>
                    <p><?php echo nl2br(htmlspecialchars($article['content'] ?? 'No additional content available.')); ?></p>
                </article>
            </div>
            <div class="col-lg-4">
                <aside class="related-news">
                    <h3 class="mb-3">Related News</h3>
                    <?php
                    // Fetch related news articles
                    $stmt = $mysqli->prepare('SELECT id, title, image_url FROM news WHERE category = ? AND id != ? ORDER BY created_at DESC LIMIT 5');
                    $stmt->bind_param('si', $article['category'], $newsId);
                    $stmt->execute();
                    $relatedNews = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                    foreach ($relatedNews as $related) {
                        echo '<div class="card flex-row shadow-sm border-0 p-3 mb-3">';
                        echo '<img src="' . htmlspecialchars($related['image_url'] ?? 'https://via.placeholder.com/100') . '" class="card-img-left img-fluid" alt="Related News" style="width: 100px; object-fit: cover; border-radius: 5px;">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title text-primary">' . htmlspecialchars($related['title']) . '</h5>';
                        echo '<a href="news-details.php?id=' . htmlspecialchars($related['id']) . '" class="btn btn-outline-primary mt-2">Read More</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </aside>
            </div>
        </div>
    </main>
    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
