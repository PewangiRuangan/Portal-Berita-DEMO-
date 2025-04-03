<?php
session_start();

// Tampilkan semua error untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Koneksi ke database
    $mysqli = new mysqli('localhost', 'root', '', 'news_portal');
    if ($mysqli->connect_error) {
        throw new Exception('Database connection failed: ' . $mysqli->connect_error);
    }
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}

// Inisialisasi variabel error
$error = "";

// Handle form submission untuk login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = 'Email dan password harus diisi!';
    } else {
        // Cek apakah email ada di database
        $stmt = $mysqli->prepare('SELECT id, email, password FROM users WHERE email = ?');
        if (!$stmt) {
            die('Error preparing statement: ' . $mysqli->error);
        }

        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Simpan user ke session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                // Redirect ke halaman utama
                header('Location: index.php');
                exit;
            } else {
                $error = 'Password salah!';
            }
        } else {
            $error = 'Email tidak ditemukan!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - News Portal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="login-page">
        <h1>Login ke News Portal</h1>
        
        <!-- Menampilkan pesan error jika ada -->
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <section class="login-options">
            <h2>Masuk</h2>
            <form method="POST" action="login.php">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit" name="login">Login</button>
            </form>

            <p>Atau login dengan:</p>
            <button onclick="alert('Google login coming soon!')">Login dengan Google</button>
            <button onclick="alert('Facebook login coming soon!')">Login dengan Facebook</button>
        </section>

        <p>Belum punya akun? <a href="register.php">Buat akun</a></p>
    </main>
</body>
</html>
