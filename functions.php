<?php
function gametechxd_files() {
    wp_enqueue_style('gametechxd_main', get_stylesheet_uri());
    wp_enqueue_style('google_fonts', '//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    wp_enqueue_script('font_awesome', '//kit.fontawesome.com/ef3b619be6.js');
}

add_action('wp_enqueue_scripts', 'gametechxd_files');
add_action('login_enqueue_scripts', 'gametechxd_files');

function gametechxd_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('excerpt');
    add_post_type_support( 'guide', 'excerpt' );
}

add_action('setup_theme', 'gametechxd_features');


// Customize Login Screen
function customLogin() {
    return esc_url(site_url('/'));
}

add_filter('login_headerurl', 'customLogin');

function gametechxd_login_logo() { ?>
    <style type="text/css">
        #login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/gametech-logo.png);
            height: 140px;
            width: 320px;
            background-size: contain;
            background-repeat: no-repeat;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'gametechxd_login_logo' );

// Request First and Last Name
add_action( 'register_form', 'myplugin_register_form' );
function myplugin_register_form() {

    $first_name = ( ! empty( $_POST['first_name'] ) ) ? trim( $_POST['first_name'] ) : '';
    $last_name = ( ! empty( $_POST['last_name'] ) ) ? trim( $_POST['last_name'] ) : '';

        ?>
        <p>
            <label for="first_name"><?php _e( 'First Name', 'mydomain' ) ?><br />
                <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr( wp_unslash( $first_name ) ); ?>" size="25" /></label>
        </p>

        <p>
            <label for="last_name"><?php _e( 'Last Name', 'mydomain' ) ?><br />
                <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr( wp_unslash( $last_name ) ); ?>" size="25" /></label>
        </p>

        <?php
    }

    //2. Add validation. In this case, we make sure first_name and last_name is required.
    add_filter( 'registration_errors', 'myplugin_registration_errors', 10, 3 );
    function myplugin_registration_errors( $errors, $sanitized_user_login, $user_email ) {

        if ( empty( $_POST['first_name'] ) || ! empty( $_POST['first_name'] ) && trim( $_POST['first_name'] ) == '' ) {
            $errors->add( 'first_name_error', __( '<strong>ERROR</strong>: You must include a first name.', 'mydomain' ) );
        }
        if ( empty( $_POST['last_name'] ) || ! empty( $_POST['last_name'] ) && trim( $_POST['last_name'] ) == '' ) {
            $errors->add( 'last_name_error', __( '<strong>ERROR</strong>: You must include a last name.', 'mydomain' ) );
        }
        return $errors;
    }

    //3. Finally, save our extra registration user meta.
    add_action( 'user_register', 'myplugin_user_register' );
    function myplugin_user_register( $user_id ) {
        if ( ! empty( $_POST['first_name'] ) ) {
            update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
            update_user_meta( $user_id, 'last_name', trim( $_POST['last_name'] ) );
        }
    }




// Redirect Subscribers to HomePage
add_action('admin_init', 'redirectHomePage');

function redirectHomePage() {
    $currentUser = wp_get_current_user();

    if(count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

// Hide Admin Bar for Subscribers
add_action('wp_loaded', 'hideAdminBar');

function hideAdminBar() {
    $currentUser = wp_get_current_user();

    if(count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
        show_admin_bar(false);
    }
}

// Custom Post Types

function gametechxd_post_types() {
//     register_post_type('news', array(
//     'public' => true,
//     'show_in_rest' => true,
//     'labels' => array(
//       'name' => 'News',
//       'add_new_item' => 'Create a News',
//       'edit_item' => 'Edit New',
//       'all_items' => 'All News',
//       'singular_name' => 'New'
//     ),
//     'menu_icon' => 'dashicons-media-document'
//   ));

    register_post_type('affiliate', array(
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Affiliate Links',
            'add_new_item' => 'Create a Affiliate Link',
            'edit_item' => 'Edit Affiliate Link',
            'all_items' => 'All Affiliate Links',
            'singular_name' => 'Affiliate Link'
        ),
        'menu_icon' => 'dashicons-admin-links'
    ));

    // register_post_type('review', array(
    //     'public' => true,
    //     'show_in_rest' => true,
    //     'labels' => array(
    //         'name' => 'Reviews',
    //         'add_new_item' => 'Create a Review',
    //         'edit_item' => 'Edit Review',
    //         'all_items' => 'All Reviews',
    //         'singular_name' => 'Review'
    //     ),
    //     'menu_icon' => 'dashicons-star-half'
    // ));

    register_post_type('guide', array(
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Tips & Guides',
            'add_new_item' => 'Create a Tips & Guides',
            'edit_item' => 'Edit Tip & Guide',
            'all_items' => 'All Tips & Guides',
            'singular_name' => 'Guide'
        ),
        'menu_icon' => 'dashicons-games',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    ));

}

add_action('init', 'gametechxd_post_types');

// Featuring Posts
function get_featured_posts($position, $count) {
    return new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => $count,
        'meta_query' => array(
            array(
                'key' => 'featured_position',
                'value' => $position,
                'compare' => '='
            )
        )
    ));
}


