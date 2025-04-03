<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Portal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>
    <main class="container">
        <?php
        switch ($page) {
            case 'categories':
                include 'pages/categories.php';
                break;
            case 'about':
                include 'pages/about.php';
                break;
            default:
                include 'pages/home.php';
                break;
        }
        ?>
    </main>
    <?php include 'partials/footer.php'; ?>
</body>
</html>
