<?php
include_once __DIR__ . '/../fetch-news.php';
$category = isset($_GET['category']) ? $_GET['category'] : 'general';
$articles = fetchNewsFromDatabaseByCategory($category);

function fetchNewsFromDatabaseByCategory($category) {
    $mysqli = new mysqli('localhost', 'root', '', 'news_portal');
    $stmt = $mysqli->prepare('SELECT * FROM news WHERE category = ? ORDER BY created_at DESC');
    $stmt->bind_param('s', $category);
    $stmt->execute();
    $result = $stmt->get_result();
    $news = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($news as &$article) {
        if (empty($article['image_url'])) {
            $article['image_url'] = 'https://via.placeholder.com/300';
        }
    }

    return $news;
}
?>
<div class="container category-news">
    <h1 class="mb-4 text-center text-uppercase text-primary"><?php echo htmlspecialchars($category); ?> News</h1>
    <?php if (!empty($articles)): ?>
        <?php foreach ($articles as $article): ?>
            <div class="news-card">
                <img src="<?php echo htmlspecialchars($article['image_url']); ?>" alt="News Image">
                <div class="news-card-body">
                    <h5 class="news-title"><?php echo htmlspecialchars($article['title']); ?></h5>
                    <p class="news-meta"><?php echo htmlspecialchars(date('F j, Y', strtotime($article['created_at']))); ?></p>
                    <a href="news-details.php?id=<?php echo htmlspecialchars($article['id']); ?>" class="btn">Read More</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center text-muted">No news found for this category.</p>
    <?php endif; ?>
</div>

