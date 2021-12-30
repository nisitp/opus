<?php
/**
 * Opus Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Opus-Blog
 */

define('THEME', get_template_directory_uri());

function opus_setup() {
    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', __('Primary Menu', 'opus'));
    
    add_theme_support('post-thumbnails');
    add_image_size('featured-image', 831, 285, array('center', 'center'));
    add_image_size('featured-image-small', 250, 250, array('center', 'center'));        
    
}

function remove_admin_bar() {
  if (!current_user_can('edit_posts') && !is_admin()) {
    show_admin_bar(false);
  }
}

add_action('after_setup_theme', 'opus_setup');
add_action('after_setup_theme', 'remove_admin_bar');
/**
 * Enqueue scripts and styles for front-end.
 */
function opus_scripts_styles() {
    // Loads our main stylesheet.
    wp_enqueue_style('google-fonts', "https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800");
    wp_enqueue_style('font-awesome', "https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css");
    wp_enqueue_style('opus-style', THEME."/assets/css/main.css");

    // Loads our main js script.
    wp_enqueue_script('opus-script', THEME."/assets/js/main.js", array('jquery'));
}
add_action('wp_enqueue_scripts', 'opus_scripts_styles');

function opus_login_stylesheet() {
    wp_enqueue_style('opus-login', THEME."/assets/css/login.css");
}
function opus_login_js() {
    wp_enqueue_script('opus-login-script', THEME."/assets/js/login.js", array('jquery'));
}
add_action('login_enqueue_scripts', 'opus_login_stylesheet');
add_action('login_enqueue_scripts', 'opus_login_js');

function opus_typekit() {
    ?>
        <script src="https://use.typekit.net/amf5jth.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <?php
}
add_action('wp_head', 'opus_typekit');

function opus_title() {
    if(is_front_page()) {
        bloginfo('name');
        echo " | ";
        bloginfo('description');
    } else {
        wp_title('');
        echo " | ";
        bloginfo('name');
    }
}

function opus_remove_more_link_scroll($link) {
    return '<a class="article__read-more" href="' . get_permalink() . '">Read more +</a>';
}
add_filter('the_content_more_link', 'opus_remove_more_link_scroll');

if(function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id'   => 'sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget__title">',
        'after_title'   => '</h4>'
    ));
}

function opus_posts_link_attributes() {
    return 'class="pagination__link"';
}
add_filter('next_posts_link_attributes', 'opus_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'opus_posts_link_attributes');

add_filter('jpeg_quality', create_function('', 'return 90;'));

remove_action('wp_head', 'wp_generator');
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

function opus_widget_authors_deregister() {
    remove_action('wp_head', 'widget_authors_style');
}
add_action('init', 'opus_widget_authors_deregister');

function opus_set_posts_per_page($query) {
    global $wp_the_query;
    if($query === $wp_the_query && isset($_GET['items']) && $_GET['items'] > 0) {
        $query->set('posts_per_page', $_GET['items']);
    }
    return $query;
}
add_action('pre_get_posts', 'opus_set_posts_per_page');

function opus_add_brand_materials_post_type() {
    $labels = array(
        'name'                => __('Brand Materials'),
        'singular_name'       => __('Brand Material'),
        'menu_name'           => __('Brand Materials'),
        'parent_item_colon'   => __('Parent Brand Material'),
        'all_items'           => __('All Brand Material'),
        'view_item'           => __('View Brand Material'),
        'add_new_item'        => __('Add Brand Material'),
        'add_new'             => __('Add'),
        'edit_item'           => __('Edit Brand Material'),
        'update_item'         => __('Updae Brand Material'),
        'search_items'        => __('Search Brand Material'),
        'not_found'           => __('Not found'),
        'not_found_in_trash'  => __('Not found in trash'),
    );
    
    $args = array(
        'labels'              => $labels,
        'supports'            => array(
            'title',
            'thumbnail',
            'excerpt',
            'page-attributes'
        ),
        'taxonomies'          => array('admin-tag', 'post_tag'),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-portfolio',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type('brand-materials', $args);
}
add_action('init', 'opus_add_brand_materials_post_type', 0);

function newPrintTree($tree, $count = 0){
	//modified function here

    if (!is_null($tree) && count($tree) > 0) {

        if ($count == 0) echo '<ul id="org" style="display:none">'; else echo '<ul>';
        foreach ($tree as $node) {


            $userid = (int)$node['name'];
            $user_info = get_userdata($userid);
            //$ojt = get_user_meta($userid, 'org_job_title', true);

            $user_data = get_user_by('id', $userid);

            $org_role = get_user_meta($userid, 'org_job_title', true);

            $user_b = '<div id="" data-id="bio' . $userid . '" class="overlay1">
<div class="popup1">
		<a class="close1" href="#">&times;</a>
		<div class="content1">

' . nl2br(get_the_author_meta('description', $userid)) . '
</div></div>
</div><a href="#bio' . $userid . '" class="bio' . $userid . '">';

            if (get_the_author_meta('description', $userid) != '') {
                $user_b = $user_b;
            } else {
                $user_b = '';
            }


            $org_date = date("m Y", strtotime(get_userdata($userid)->user_registered));;


            $uimg = get_user_meta($userid, 'shr_pic', true);
            $image = wp_get_attachment_image_src($uimg, 'thumbnail');
            if (!empty($uimg)) {
                echo '<li id="' . $userid . '">  ' . $user_b . '<img src="' . $image[0] . '">' . $user_data->display_name . '<small> ' . $org_role . ' </small></a>';
                if ($count != 0 && is_admin()) { echo '<span class="name_c" id="' . $userid . '"></span><a class="rmv-nd close" href="javascript:void(0);">Remove</a>'; }
            } else {
					echo '<li id="' . $userid . '">  ' . $user_b . ' ' . get_avatar($userid) . $user_data->display_name . '<small> ' . $org_role . ' </small></a>';

//                 echo '<li id="' . $userid . '">  ' . $user_b . ' ' . get_avatar($userid) . $user_data->display_name . '<small> ' . $org_role . ' </small><small><a href="/load-user/'.$userid.'" data-uid="'.$userid.'" class="load-user-detail">Show More Detail</a></small></a><div class="user-detail"></div>';

                if ($count != 0 && is_admin()) { echo '<span class="name_c" id="' . $userid . '"></span><a class="rmv-nd close" href="javascript:void(0);">Remove</a>'; }

            }

            newPrintTree($node['children'], 1);
            echo '</li>';
        }
        echo '</ul>';
    }

}

// GC adds for admin body classes
add_filter( 'body_class', function( $classes ) {
	$terms = get_terms('admin-tag');
	foreach ($terms as $term) {
		if (has_term($term->slug, 'admin-tag')) {

			$customClasses[] = $term->slug;
		}
	}
	
	if (is_user_logged_in()) {
    $customClasses[] = "logged-in";
	} else {
    $customClasses[] = "logged-out";  	
	}

	if (count($customClasses)) {
	    return array_merge( $classes, $customClasses );
	} else { return $classes; }
} );

// whitelists for force login

function my_forcelogin_whitelist( $whitelist ) {
  $whitelist[] = site_url( '/lostpassword/' );
  return $whitelist;
}
add_filter('v_forcelogin_whitelist', 'my_forcelogin_whitelist', 10, 1);

/* A shortcode to get the post body up until the <!- More -> tag */
function weave_content_more($atts) {
global $post;
$content = $post->post_content;
 
if ( preg_match( '/<!--more(.*?)?-->/', $content, $matches ) ) {
    $content = explode( $matches[0], $content, 2 );
} else {
    $content = array( $content );
}
 
$output = $content[0];
 
apply_filters( 'the_content', $output );
$output = str_replace( ']]>', ']]>', $output );
return $output;
}
 
add_shortcode('weave-content-more', 'weave_content_more');

class OpusAuthorsWidget extends WP_Widget {
    public function __construct() {
        $widget_details = [
            'classname' => 'widget_authors',
            'description' => 'Display Authors'
        ];
        parent::__construct('opus-authors-widget', 'Opus Authors', $widget_details);
    }

    public function form($instance) {
        //
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        echo $args['before_title'].apply_filters('widget_title', 'Authors', $instance, $this->id_base).$args['after_title'];

        $users = get_users([
            'who' => 'authors',
            'number' => -1,
            'orderby' => 'ID',
            'order' => 'ASC',
            'has_published_posts' => true,
            'exclude' => [0],
        ]);

        if(!empty($users)) {
            echo '<ul>';
            foreach($users as $user) {
                $count = count_user_posts($user->ID);
                if($count > 0) {
                    echo '<li>';
                    echo get_avatar($user->ID, 40);
                    echo '<a href="' . $user->user_url . '">' . $user->display_name . '</a>';
                    echo ' (' . $count . ')';
                    echo '</li>';
                }
            }
            echo '</ul>';
        }

        echo $args['after_widget'];
    }
  
    public function update($new_instance, $old_instance) {
        //
    }
}
add_action('widgets_init', function() {
     register_widget('OpusAuthorsWidget');
});