<footer class="main-footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-logo">
                <img src="frontend/assets/images/logo.png" alt="Beugot News Logo">
                <p>Your Trusted News Source</p>
            </div>
            <div class="footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php?page=home">Home</a></li>
                    <li><a href="index.php?page=categories&category=national">National</a></li>
                    <li><a href="index.php?page=categories&category=international">International</a></li>
                    <li><a href="index.php?page=about">About Us</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h4>Follow Us</h4>
                <div class="social-icons">
                    <a href="https://facebook.com" target="_blank" aria-label="Facebook">
                        <img src="frontend/assets/icons/facebook.svg" alt="Facebook">
                    </a>
                    <a href="https://twitter.com" target="_blank" aria-label="Twitter">
                        <img src="frontend/assets/icons/twitter.svg" alt="Twitter">
                    </a>
                    <a href="https://instagram.com" target="_blank" aria-label="Instagram">
                        <img src="frontend/assets/icons/instagram.svg" alt="Instagram">
                    </a>
                    <a href="https://youtube.com" target="_blank" aria-label="YouTube">
                        <img src="frontend/assets/icons/youtube.svg" alt="YouTube">
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Beugot News. All rights reserved.</p>
        </div>
    </div>
</footer>
<script>
    const footer = document.querySelector('.main-footer');

    window.addEventListener('scroll', () => {
        if (window.scrollY + window.innerHeight >= document.body.offsetHeight) {
            footer.classList.add('visible'); // Show footer on scroll up
        } else {
            footer.classList.remove('visible'); // Hide footer otherwise
        }
    });
</script>
