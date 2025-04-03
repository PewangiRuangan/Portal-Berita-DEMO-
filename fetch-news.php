<?php
function fetchNews() {
    $apiKey = 'f9bfa51ac034450fb425d5043dcff82d';
    $dbNews = fetchNewsFromDatabase();

    $endpoint = 'https://newsapi.org/v2/top-headlines?country=us&apiKey=' . $apiKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    curl_close($ch);

    $apiNews = json_decode($response, true)['articles'] ?? [];
    return array_merge($dbNews, $apiNews);
}

function fetchNewsFromDatabase() {
    $mysqli = new mysqli('localhost', 'root', '', 'news_portal');
    $result = $mysqli->query('SELECT * FROM news ORDER BY created_at DESC');
    $news = $result->fetch_all(MYSQLI_ASSOC);

    // Ensure valid image URLs
    foreach ($news as &$article) {
        if (empty($article['image_url'])) {
            $article['image_url'] = 'https://via.placeholder.com/300'; // Fallback placeholder image
        }
    }

    return $news;
}

function fetchNewsByCategory($category) {
    $apiKey = 'f9bfa51ac034450fb425d5043dcff82d';
    if (empty($apiKey)) {
        return ['error' => 'API key is missing. Please provide a valid API key.'];
    }

    $endpoint = 'https://newsapi.org/v2/top-headlines?country=us&category=' . urlencode($category) . '&apiKey=' . $apiKey;

    // Debugging: Log the endpoint being used
    error_log('Fetching news by category from endpoint: ' . $endpoint);

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    // Execute the request
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        $error = curl_error($ch);
        curl_close($ch);
        return ['error' => 'cURL error occurred: ' . $error];
    }

    // Get HTTP status code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Check for HTTP errors
    if ($httpCode !== 200) {
        return ['error' => 'HTTP error occurred. Status code: ' . $httpCode . '. Endpoint: ' . $endpoint];
    }

    // Decode the JSON response
    $newsData = json_decode($response, true);

    // Check if the API returned articles
    if ($newsData['status'] !== 'ok') {
        return ['error' => 'Failed to fetch news: ' . $newsData['message'] . '. Full response: ' . json_encode($newsData)];
    }

    return $newsData['articles'];
}
?>
