<?php get_header(); 
    while(have_posts()) {
        the_post(); ?>

        <section class="single__banner">
            <div class="container">
                <h1 class="article__title"><?php the_title(); ?></h1>
                <p class="article__excerpt">Last updated: March 13, 2026</p>

                <p class="article__excerpt">Welcome to GameTech Xd. Your privacy is important to us. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website.</p>
            </div>
        </section>
       <div class="custom-shape-divider-top-1773538585">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
</div>
    <main class="main__article">
        <div class="container">
            <div class="feed__grid">
                <article class="article__body">
                    <?php the_content();
                        }
                    ?>

                </article>
                <aside class="sidebar">
                    <div class="gradient__card">
                        <h2 class="gradient__card-title">Related Posts</h2>
                        <p class="gradient__card-text">Great Articles from our blog to help you find your next big game.</p>
                    </div>
                    <div class="card bg-primary">
                        <div class="card-image" style="background-image: url('img/rog-xbox.jpg');"></div>
                        <div class="card-body">
                            <h1 class="card-title">Xbox Ally X gets first price increase since launch</h1>
                            <p class="card-description">Right at the turn of the year, ASUS sparked fear of potential ROG Xbox Ally price increases due to the ongoing RAM crisis, and it now looks like that's starting to play out over in Japan.</p>
                        </div>
                    </div>
                    <div class="card bg-primary">
                        <div class="card-image" style="background-image: url('img/gamepass-shelve.jpg.webp');"></div>
                        <div class="card-body">
                            <h1 class="card-title">Should You Cancel Xbox Game Pass? Everything to Know on the Price Hikes and New Features</h1>
                            <p class="card-description">Xbox users face price increases on their monthly gaming subscription, making it a great time to check if you’re on the right tier or if you even need to subscribe at all.</p>
                            
                        </div>
                    </div>
                    <div class="card bg-primary">
                        <div class="card-image" style="background-image: url('img/ally.jpg');"></div>
                        <div class="card-body">
                            <h1 class="card-title">ROG XBOX Ally X: The best hardware, still held back by Windows</h1>
                            <p class="card-description">The ASUS ROG XBOX Ally X is not an Xbox; but can play games better than Windows even whith Windows inside.</p>
                            
                        </div>
                    </div>
                </aside>
                <aside class="mobile-sidebar">
                    <h1>Related Posts</h1>
                    <div class="post__card">
                        <div class="card__thumbnail"  style="background-image: url('img/rog-xbox.jpg');"></div>
                        <div class="card__body">
                            <div class="card__title"><h1>Xbox Ally X gets first price increase since launch</h1></div>
                        </div>
                    </div>
                    <div class="post__card">
                        <div class="card__thumbnail"  style="background-image: url('img/gamepass-shelve.jpg.webp');"></div>
                        <div class="card__body">
                            <div class="card__title"><h1>Should You Cancel Xbox Game Pass? Everything to Know on the Price Hikes and New Features</h1></div>
                        </div>
                    </div>
                    <div class="post__card">
                        <div class="card__thumbnail"  style="background-image: url('img/ally.jpg');"></div>
                        <div class="card__body">
                            <div class="card__title"><h1>ROG XBOX Ally X: The best hardware, still held back by Windows</h1></div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>
   <?php get_footer(); ?>