<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$mysqli = new mysqli('localhost', 'root', '', 'news_portal');

if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validasi input
    if (empty($name) || empty($email) || empty($password)) {
        die('Semua kolom harus diisi!');
    }

    // Cek apakah email sudah digunakan
    $stmt = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        die('Email sudah terdaftar. Silakan gunakan email lain.');
    }
    $stmt->close();

    // Hash password sebelum disimpan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Handle profile photo upload
    $profilePhotoPath = null;
    if (!empty($_FILES['profile_photo']['name'])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = uniqid() . "_" . basename($_FILES['profile_photo']['name']);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $targetFilePath)) {
            $profilePhotoPath = $targetFilePath; // Simpan path ke database
        } else {
            die('Gagal mengunggah foto profil.');
        }
    }

    // Simpan data ke database
    $stmt = $mysqli->prepare("INSERT INTO users (name, email, password, profile_photo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $profilePhotoPath);
    
    if ($stmt->execute()) {
        $_SESSION['user_id'] = $mysqli->insert_id;
        header('Location: index.php');
        exit;
    } else {
        die('Gagal mendaftar: ' . $stmt->error);
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - News Portal</title>
</head>
<body>
    <h1>Buat Akun</h1>
    <form method="POST" action="register.php" enctype="multipart/form-data">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="profile_photo">Foto Profil:</label>
        <input type="file" id="profile_photo" name="profile_photo" accept="image/*">
        
        <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="login.php">Masuk di sini</a></p>
</body>
</html>
