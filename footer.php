<footer class="footer">
        <div class="container">
            <div class="footer__grid">
                <!--<ul class="footer__nav-list">
                    <li class="footer__nav-item"><a href="<?php echo get_site_url(); ?>" class="footer__nav-link">Home</a></li>
                    <li class="footer__nav-item"><a href="" class="footer__nav-link">Articles</a></li>
                    <li class="footer__nav-item"><a href="<?php echo site_url('/blog'); ?>" class="footer__nav-link">News</a></li>
                    <li class="footer__nav-item"><a href="" class="footer__nav-link">Reviews</a></li>
                    <li class="footer__nav-item"><a href="" class="footer__nav-link">Tips & Guides</a></li>
                    <li class="footer__nav-item"><a href="<?php echo site_url('/about-us'); ?>" class="footer__nav-link">About</a></li>
                    <li class="footer__nav-item"><a href="<?php echo site_url('/privacy-policy'); ?>" class="footer__nav-link">Privacy Policy</a></li>
                    <li class="footer__nav-item"><a href="" class="footer__nav-link">Affiliated Links</a></li>
                </ul> -->
                <?php 
                        wp_nav_menu(array(
                            'theme_location' => 'footerNav'
                        )); ?>
                <div class="footer__brand">
                    <div class="footer__brand-logo">
                        <img src="<?php echo get_theme_file_uri('img/gametech-logo.png'); ?>" alt="GameTechXd Logo" class="brand__logo">
                        <h2 class="brand__name">GameTechXd</h2>
                    </div>
                    <div class="footer__social">
                        <a href="#" class="nav__social-icon" title="Subscribe to our Youtube Channel"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#" class="nav__social-icon" title="Follow Us on X!"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="#" class="nav__social-icon" title="Follow Us on BlueSky!"><i class="fa-brands fa-bluesky"></i></a>
                        <a href="#" class="nav__social-icon" title="Subscribe to our Twitch Profile!"><i class="fa-brands fa-twitch"></i></a>
                    </div>
                </div>
            </div>
            <p class="copywrite">Copyright &copy; 2026 GameTech Xd All rights reserved</p>
        </div>
        <div class="custom-shape-divider-bottom-1642982198">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="shape-extender"></div>
    </footer>

    <!-- <script src="https://kit.fontawesome.com/ef3b619be6.js" crossorigin="anonymous"></script> -->
    <?php wp_footer(); ?>
</body>
</html>