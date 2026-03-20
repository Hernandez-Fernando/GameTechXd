<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head(); ?>
</head>
<body>
        <header class="header">
            <div class="container">
                <div class="header__grid">
                    <div class="header__brand">
                        <a href="<?php echo get_site_url(); ?>" class="brand__link">
                            <img src="<?php echo get_theme_file_uri('img/gametech-logo.png'); ?>" alt="GameTechXd Logo" class="brand__logo">
                            <h2 class="brand__name">GameTechXd</h2>
                        </a>
                    </div>
                    <nav class="nav__menu">
                        <ul class="nav__list">
                            <li class="nav__item"><a href="#" class="nav__link">Articles</a></li>
                            <li class="nav__item"><a href="single.html" class="nav__link">News</a></li>
                            <li class="nav__item"><a href="#" class="nav__link">Reviews</a></li>
                            <li class="nav__item"><a href="#" class="nav__link">Tips & Guides</a></li>
                        </ul>
                    </nav>
    
                    <div class="nav__social">
                        <a href="#" class="nav__social-icon" title="Subscribe to our Youtube Channel"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#" class="nav__social-icon" title="Follow Us on X!"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="#" class="nav__social-icon" title="Follow Us on BlueSky!"><i class="fa-brands fa-bluesky"></i></a>
                        <a href="#" class="nav__social-icon" title="Subscribe to our Twitch Profile!"><i class="fa-brands fa-twitch"></i></a>
                    </div>
                </div>
            </div>
        </header>