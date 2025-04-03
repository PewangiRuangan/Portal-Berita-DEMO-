<?php
// Database configuration
$db_host = 'localhost';  // This will be provided by your free hosting
$db_name = 'news_portal';
$db_user = '';  // You'll get this from your free hosting
$db_pass = '';  // You'll get this from your free hosting

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?> 