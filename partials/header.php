<header class="main-header">
    <div class="container">
        <div class="logo">
            <a href="index.php?page=home">
                <img src="frontend/assets/images/logo.png" alt="Logo">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php?page=home">Home</a></li>
                <li><a href="index.php?page=categories&category=national">National</a></li>
                <li><a href="index.php?page=categories&category=international">International</a></li>
                <li><a href="index.php?page=categories&category=economy">Economy</a></li>
                <li><a href="index.php?page=categories&category=sports">Sports</a></li>
                <li><a href="index.php?page=categories&category=technology">Technology</a></li>
            </ul>
        </nav>
        <div class="user-section">
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php
                $mysqli = new mysqli('localhost', 'root', '', 'news_portal');
                $stmt = $mysqli->prepare('SELECT name, profile_photo FROM users WHERE id = ?');
                $stmt->bind_param('i', $_SESSION['user_id']);
                $stmt->execute();
                $user = $stmt->get_result()->fetch_assoc();
                $userName = htmlspecialchars($user['name']);
                $profilePhoto = htmlspecialchars($user['profile_photo'] ?? 'https://via.placeholder.com/30');
                ?>
                <div class="profile-dropdown">
                    <button class="profile-btn" onclick="toggleDropdown()">
                        <img src="<?php echo $profilePhoto; ?>" alt="User" class="profile-photo">
                        <span><?php echo $userName; ?></span>
                    </button>
                    <div class="dropdown-menu">
                        <a href="profile.php" class="dropdown-item">Profile</a>
                        <a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="login.php" class="btn">Login</a>
                <a href="register.php" class="btn">Register</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<script>
    function toggleDropdown() {
        const dropdownMenu = document.querySelector('.dropdown-menu');
        dropdownMenu.classList.toggle('active');
    }

    // Header scroll animation
    let lastScrollY = window.scrollY;
    const header = document.querySelector('.main-header');

    window.addEventListener('scroll', () => {
        if (window.scrollY > lastScrollY) {
            header.classList.add('hidden'); // Hide header on scroll down
        } else {
            header.classList.remove('hidden'); // Show header on scroll up
        }
        lastScrollY = window.scrollY;
    });

    // Close the dropdown menu when clicking outside
    document.addEventListener('click', function (event) {
        const dropdown = document.querySelector('.profile-dropdown');
        const dropdownMenu = document.querySelector('.dropdown-menu');
        if (dropdown && !dropdown.contains(event.target)) {
            dropdownMenu.classList.remove('active');
        }
    });
</script>
