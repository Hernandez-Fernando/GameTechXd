<?php get_header(); ?>

        <section class="banner">
            <div class="container">
                <div class="banner__grid">
                    <?php $main_featured = get_featured_posts('main', 1);

                    if ($main_featured->have_posts()) :
                        while ($main_featured->have_posts()) : $main_featured->the_post(); ?>
                <div class="trending__card" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo get_the_post_thumbnail_url(); ?>');">
                            <div class="card__categories"><ul class="card__catlist">
                            <?php $categories = get_the_category();
                            foreach ($categories as $category) { 
                                if($category->name !='Featuring') { ?>
                            <li class="card__catitem"><a href="<?php echo get_category_link( $category->term_id ); ?>" class="card__catlink"><?php echo $category->name; } }?></a></li></ul></div>
                            <div class="card__text-box">
                            <div class="card__title"><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>
                            <div class="card__description"><p><?php the_excerpt(); ?></p></div>
                    </div>
                </div>
                <?php 
                    endwhile;
                endif;
                wp_reset_postdata(); 
                
                $secondary_featured = get_featured_posts('secondary', 2);

                if ($secondary_featured->have_posts()) :
                    while ($secondary_featured->have_posts()) : $secondary_featured->the_post();
                ?>
                    <div class="secondary__card" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('<?php echo get_the_post_thumbnail_url(); ?>');">
                            <div class="card__categories"><ul class="card__catlist">
                            <?php $categories = get_the_category();
                            foreach ($categories as $category) { 
                                if($category->name !='Featuring') { ?>
                            <li class="card__catitem"><a href="<?php echo get_category_link( $category->term_id ); ?>" class="card__catlink"><?php echo $category->name; } }?></a></li></ul></div>
                            <div class="card__title"><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>
                </div>

                <?php 
                    endwhile;
                endif;
                
                wp_reset_postdata(); ?>
                    
                </div>
            </div>
        </section>
    <main class="main">
        <div class="container">
            <div class="feed__grid">
                <section class="feed">
                    <h1 class="feed__header">Recent Posts</h1>

                    <?php 
                        $category_id = get_cat_ID('Featuring');
                        $blogPosts = new WP_Query(array(
                            'post_type' => array('post', 'review', 'news'),
                            'category__not_in' => array($category_id),
                            'post_status'    => 'publish'
                        ));
                    
                    while($blogPosts->have_posts()) { 
                        $blogPosts->the_post();
                        $publishDate = get_human_post_age();
                        ?>
                    
                    <div class="post__card">
                        <a href="<?php the_permalink(); ?>">
                        <div class="card__thumbnail"  style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                        </a>
                        <div class="card__body">
                            <div class="card__categories"><ul class="card__catlist">
                            <?php $categories = get_the_category();
                            foreach ($categories as $category) { 
                                if($category->name !='Featuring') { ?>
                            <li class="card__catitem"><a href="<?php echo get_category_link( $category->term_id ); ?>" class="card__catlink"><?php echo $category->name; } }?></a></li><li class="card__date card__catitem <?php if ($publishDate == 'Today!') echo 'today'; ?>"><?php echo $publishDate; ?></li></ul></div>
                            <div class="card__title"><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>
                            <div class="card__description"><p><?php the_excerpt(); ?></p></div>
                        </div>
                </div></a>
                <?php }; wp_reset_postdata(); ?>
                
                <a href="#" class="loadmore__button">Load More Articles</a>
                </section>
                <aside class="sidebar">
                    <div class="gradient__card">
                        <h2 class="gradient__card-title">Active Poll</h2>
                        <?php if ( function_exists( 'vote_poll' ) && ! in_pollarchive() ): ?>
        <?php get_poll();?>
        <!-- <?php display_polls_archive_link(); ?> -->
<?php endif; ?>
                        <!-- <p class="gradient__card-text">What’s your most anticipated game of the year?</p>
                        <form action="" class="poll">
                            <div class="poll__group">
                                <input type="radio" name="poll" id="1" class="poll__option-input"><label for="1" class="poll__option-label"><span class="poll__option-button"></span>GTA 6</label>
                            </div>
                            <div class="poll__group">
                                <input type="radio" name="poll" id="2" class="poll__option-input"><label for="2" class="poll__option-label"><span class="poll__option-button"></span>Wolverine</label>
                            </div>
                            <div class="poll__group">
                                <input type="radio" name="poll" id="3" class="poll__option-input"><label for="3" class="poll__option-label"><span class="poll__option-button"></span>Fabel</label>
                            </div>
                            <div class="poll__group">
                                <input type="radio" name="poll" id="4" class="poll__option-input"><label for="4" class="poll__option-label"><span class="poll__option-button"></span>Gears Of War: E-Day</label>
                            </div>
                            <div class="poll__group">
                                <input type="radio" name="poll" id="5" class="poll__option-input"><label for="5" class="poll__option-label"><span class="poll__option-button"></span>007: First Light</label>
                            </div>
                            <div class="poll__group">
                                <input type="radio" name="poll" id="6" class="poll__option-input"><label for="6" class="poll__option-label"><span class="poll__option-button"></span>Resident Evil: Requieum</label>
                            </div>
                            <button class="poll__button">Vote! 🗳️</button>
                        </form>
                        <a href="#" class="poll__results-button">See results</a> -->
                    </div>
                    <div class="gradient__card">
                        <h2 class="gradient__card-title">Top Articles</h2>
                        <ul class="topArticles__list">
                            <li class="topArticles__item"><a href="" class="topArticles__link">Xbox Ally X gets first price increase since launch</a></li>
                            <li class="topArticles__item"><a href="" class="topArticles__link">Resident Evil: Reqium is a great game</a></li>
                            <li class="topArticles__item"><a href="" class="topArticles__link">Returning to shorter developing time is what studios need</a></li>
                            <li class="topArticles__item"><a href="" class="topArticles__link">Is AI affecting game development?</a></li>
                            <li class="topArticles__item"><a href="" class="topArticles__link">Mario Tenis Fever Review</li>
                            <li class="topArticles__item"><a href="" class="topArticles__link">RAM Prices Will affect pricing on PCs and consoles</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
        <section class="newsletter">
            <div class="container">
                <div class="newsletter__grid">
                    <div class="newsletter__body">
                        <h1 class="newsletter__title">Become part of the community!</h1>
                        <p>Subscribe to our newsletter and receive our latest articles every week, right in your mailbox.</p>
                    </div>
                    <div class="newsletter__body">
                        <form action="#" class="newsletter__form">
                            <input id="email" class="form__input" type="email" placeholder="Type your email">
                            <label for="email"></label>
                            <input class="cta__button" type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="affiliated py-medium">
            <div class="container">
                <div class="affiliated__header">
                    <div class="gradient__card">
                        <h2 class="gradient__card-title">Favorite Gear</h2>
                        <p class="gradient__card-text">Buy our favorite gear through our Affiliated Links and support us at no extra cost to you.</p>
                    </div>
                </div>
                <div class="affiliated__posts horizontal-scroll">
                    <div class="card bg-primary">
                        <div class="card-image" style="background-image: url('img/pulse.jpeg');"></div>
                        <div class="card-body">
                            <h1 class="card-title">PS Pulse Explore</h1>
                            <p class="card-description">Experience a new era in gaming audio at home and on the go with extraordinary sound with planar magnetic drivers and a lossless PlayStation Link™ connection.</p>
                            <a href="" class="card__button">Buy Now</a>
                        </div>
                    </div>
                    <div class="card bg-primary">
                        <div class="card-image" style="background-image: url('img/monitor.jpg');"></div>
                        <div class="card-body">
                            <h1 class="card-title">Alienware 32 4K QD-OLED Gaming Monitor</h1>
                            <p class="card-description">An unrivaled viewing experience in every scene with our 32-inch QD-OLED monitor, featuring a 4K resolution, curved panel, Dolby Vision and 240Hz refresh rate.</p>
                            <a href="" class="card__button">Buy Now</a>
                        </div>
                    </div>
                    <div class="card bg-primary">
                        <div class="card-image" style="background-image: url('img/chair.jpg');"></div>
                        <div class="card-body">
                            <h1 class="card-title">GTPlayer Gaming Chair</h1>
                            <p class="card-description">Introducing the GT800A Gaming Chair perfect for games and life. Featuring an ergonomic design is available in eight color options. </p>
                            <a href="" class="card__button">Buy Now</a>
                        </div>
                    </div>
                    <div class="card bg-primary">
                        <div class="card-image" style="background-image: url('img/jsaux.png');"></div>
                        <div class="card-body">
                            <h1 class="card-title">JSAUX 7-1 Docking Station</h1>
                            <p class="card-description">Elevate your gaming experience with 4K@120Hz HDMI 2.1 output, Gigabit Ethernet, USB-C PD charging, USB-C 3.0, dual USB-A 3.0 ports, and RGB-powered USB-C.</p>
                            <a href="" class="card__button">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php get_footer(); ?>