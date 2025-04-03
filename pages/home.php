<?php
include_once 'fetch-news.php';
$articles = fetchNews();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - News Portal</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <main>
        <section class="carousel">
            <h2>Trending News</h2>
            <div class="carousel-container">
                <?php if (!isset($articles['error']) && !empty($articles)): ?>
                    <?php foreach (array_slice($articles, 0, 5) as $article): ?>
                        <div class="carousel-item">
                            <img src="<?php echo htmlspecialchars($article['urlToImage'] ?? $article['image_url'] ?? 'https://via.placeholder.com/300'); ?>" alt="Trending News">
                            <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                            <a href="news-details.php?id=<?php echo htmlspecialchars($article['id'] ?? 0); ?>">Read more</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="error"><?php echo htmlspecialchars($articles['error']); ?></p>
                <?php endif; ?>
            </div>
        </section>
        <section class="news-grid">
            <h2>Latest News</h2>
            <?php
            if (isset($articles['error'])) {
                echo '<p class="error">' . htmlspecialchars($articles['error']) . '</p>';
            } else {
                foreach (array_slice($articles, 0, 7) as $article) { // Limit to 7 news boxes
                    echo '<div class="news-card">';
                    echo '<img src="' . htmlspecialchars($article['urlToImage'] ?? $article['image_url'] ?? 'https://via.placeholder.com/300') . '" alt="News Image">';
                    echo '<h3>' . htmlspecialchars($article['title']) . '</h3>';
                    echo '<p>' . htmlspecialchars($article['description']) . '</p>';
                    echo '<a href="news-details.php?id=' . htmlspecialchars($article['id'] ?? 0) . '">Read more</a>';
                    echo '</div>';
                }
            }
            ?>
        </section>
        <section class="youtube-videos">
            <h2>Latest Videos from CNN Indonesia</h2>
            <div class="video-grid">
                <div class="video-box">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/Lar8gAM81Hw?si=xA_rYaap-3Rd6WCm" 
                            title="CNN Indonesia Video 1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
                <div class="video-box">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/GPl3qs9ZJXE?si=tvF2FcIDD8soniyo" 
                            title="CNN Indonesia Video 2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
                <div class="video-box">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/irR2X8IFzVo?si=QcY4nyfDyJ4v-fHY" 
                            title="CNN Indonesia Video 3" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
                <div class="video-box">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/cuDSNAIo0cA?si=ZllooiTakoBCaiR_" 
                            title="CNN Indonesia Video 4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
                <div class="video-box">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/yY68AhR4J3Q?si=TXejk49PtCUvsy7K" 
                            title="CNN Indonesia Video 5" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
                <div class="video-box">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/HjZ3jSCubhA?si=1Y_Wav9W_S5X5ybv" 
                            title="CNN Indonesia Video 6" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
                <div class="video-box">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/4nuzHnc6oVI?si=Moara-jdUjH1xS6L" 
                            title="CNN Indonesia Video 7" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
                <div class="video-box">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/_t-NLpkqxTI?si=OZVQSmPzdQO42WYN" 
                            title="CNN Indonesia Video 8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
                <div class="video-box">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/_t-NLpkqxTI?si=OZVQSmPzdQO42WYN" 
                            title="CNN Indonesia Video 8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
                <div class="video-box">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/_t-NLpkqxTI?si=OZVQSmPzdQO42WYN" 
                            title="CNN Indonesia Video 8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
