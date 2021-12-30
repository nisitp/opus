<?php
/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /assets/build/style.min.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-2.1.4.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr.min.js
 * 3. /theme/assets/js/scripts.js
 */
function theme_scripts() {
    $assets = array(
        'css'                => '/assets/build/style.min.css',
        'js'                 => '/assets/build/scripts.min.js',
        'jquery'             => '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js',
        'fullscreenParallax' => '/assets/build/fullscreenParallax-0.1.1.min.js',
        'wow_js'             => '/assets/build/wow.min.js',
    );

	wp_enqueue_style('select2_css', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css', '4.0.3', null);
    wp_enqueue_style('theme_css', get_template_directory_uri() . $assets['css'], false, filemtime(get_template_directory() . $assets['css']));
    wp_enqueue_style('slickjs_css', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css', '1.6.0', null);
    wp_enqueue_style('fancybox_css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css', '3.0.47', null);
    wp_enqueue_style('animate_css', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', '3.5.2', null);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('jquery');
	wp_enqueue_script('select2_js', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', array(), '4.0.3', true);
    wp_enqueue_script('slickjs', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array(), '1.6.0', true);
    wp_enqueue_script('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js', array(), '3.0.47', true);
    wp_enqueue_script('theme_js', get_template_directory_uri() . $assets['js'], array(), filemtime(get_template_directory() . $assets['js']), true);
    wp_enqueue_script('fullscreenParallax', get_template_directory_uri() . $assets['fullscreenParallax'], array(), filemtime(get_template_directory() . $assets['fullscreenParallax']), true);
	wp_localize_script( 'theme_js', 'og_obj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script('wow_js', get_template_directory_uri() . $assets['wow_js'], array(), filemtime(get_template_directory() . $assets['wow_js']), true);
    wp_enqueue_script('waypoints', '//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js', array(), '4.0.1', true);
    wp_enqueue_script('waypoints-inview', '//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/shortcuts/inview.min.js', array(), '4.0.1', true);

    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-1.10.2.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'theme_scripts', 100);
