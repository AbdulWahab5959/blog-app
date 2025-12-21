<footer class="welcome-footer">
    <div class="footer-content">
        <div class="footer-brand">
            <div class="logo">
                <a href="{{ route('dashboard') }}">
                    <div class="logo-icon">
                        <i class="fas fa-pen-nib"></i>
                    </div>
                    <span class="logo-text"><span>Laravel Blog </span></span>
                </a>
            </div>
            <p class="footer-description">The premium platform for content creators and writers.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        <div class="footer-links">
            <div class="link-group">
                <h4>Product</h4>
                <a href="#">Features</a>
                <a href="#">Pricing</a>
                <a href="#">Templates</a>
                <a href="#">Examples</a>
            </div>
            <div class="link-group">
                <h4>Company</h4>
                <a href="#">About</a>
                <a href="#">Blog</a>
                <a href="#">Careers</a>
                <a href="#">Contact</a>
            </div>
            <div class="link-group">
                <h4>Resources</h4>
                <a href="#">Documentation</a>
                <a href="#">Guides</a>
                <a href="#">Support</a>
                <a href="#">API</a>
            </div>
            <div class="link-group">
                <h4>Legal</h4>
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Security</a>
                <a href="#">Cookies</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© {{ date('Y') }} LaravelBlog. All rights reserved.</p>
    </div>
</footer>