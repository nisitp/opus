<?php

require_once( dirname( __FILE__ ) . "/classes/wpv-wp-filter-state.class.php" );
require_once( dirname( __FILE__ ) . "/classes/wpv-render-filters.class.php" );

/**
 * Array of shortcodes that will be offered in the Views dialog popup.
 *
 * Each element must be an array with three elements:
 * 1. shortcode slug
 * 2. shortcode display name
 * 3. callback function
 *
 * @since unknown
 */
global $wpv_shortcodes;

$wpv_shortcodes = array();

$wpv_shortcodes['wpv-post-title'] = array('wpv-post-title', __('Post title', 'wpv-views'), 'wpv_shortcode_wpv_post_title');
$wpv_shortcodes['wpv-post-link'] = array('wpv-post-link', __('Post title with a link', 'wpv-views'), 'wpv_shortcode_wpv_post_link');
$wpv_shortcodes['wpv-post-url'] = array('wpv-post-url', __('Post URL', 'wpv-views'), 'wpv_shortcode_wpv_post_url');
$wpv_shortcodes['wpv-post-body'] = array('wpv-post-body', __('Post body', 'wpv-views'), 'wpv_shortcode_wpv_post_body');
$wpv_shortcodes['wpv-post-excerpt'] = array('wpv-post-excerpt', __('Post excerpt', 'wpv-views'), 'wpv_shortcode_wpv_post_excerpt');
$wpv_shortcodes['wpv-post-date'] = array('wpv-post-date', __('Post date', 'wpv-views'), 'wpv_shortcode_wpv_post_date');
$wpv_shortcodes['wpv-post-author'] = array('wpv-post-author', __('Post author', 'wpv-views'), 'wpv_shortcode_wpv_post_author');
$wpv_shortcodes['wpv-post-featured-image'] = array('wpv-post-featured-image', __('Post featured image', 'wpv-views'), 'wpv_shortcode_wpv_post_featured_image');
$wpv_shortcodes['wpv-post-id'] = array('wpv-post-id', __('Post ID', 'wpv-views'), 'wpv_shortcode_wpv_post_id');
$wpv_shortcodes['wpv-post-slug'] = array('wpv-post-slug', __('Post slug', 'wpv-views'), 'wpv_shortcode_wpv_post_slug');
$wpv_shortcodes['wpv-post-type'] = array('wpv-post-type', __('Post type', 'wpv-views'), 'wpv_shortcode_wpv_post_type');
$wpv_shortcodes['wpv-post-format'] = array('wpv-post-format', __('Post format', 'wpv-views'), 'wpv_shortcode_wpv_post_format');
$wpv_shortcodes['wpv-post-status'] = array('wpv-post-status', __('Post status', 'wpv-views'), 'wpv_shortcode_wpv_post_status');
$wpv_shortcodes['wpv-post-comments-number'] = array('wpv-post-comments-number', __('Post comments number', 'wpv-views'), 'wpv_shortcode_wpv_comments_number');
$wpv_shortcodes['wpv-post-class'] = array('wpv-post-class', __('Post class', 'wpv-views'), 'wpv_shortcode_wpv_post_class');
$wpv_shortcodes['wpv-post-edit-link'] = array('wpv-post-edit-link', __('Post edit link', 'wpv-views'), 'wpv_shortcode_wpv_post_edit_link');
$wpv_shortcodes['wpv-post-menu-order'] = array('wpv-post-menu-order', __('Post menu order', 'wpv-views'), 'wpv_shortcode_wpv_post_menu_order');
$wpv_shortcodes['wpv-post-next-link'] = array( 'wpv-post-next-link', __( 'Post next link', 'wpv-views' ), 'wpv_shortcode_wpv_post_next_link' );
$wpv_shortcodes['wpv-post-previous-link'] = array( 'wpv-post-previous-link', __( 'Post previous link', 'wpv-views' ), 'wpv_shortcode_wpv_post_previous_link' );



// NOTE:  Put all "post" shortcodes before 'wpv-post-field' so they appear in the right order in various popups.
$wpv_shortcodes['wpv-post-field'] = array('wpv-post-field', __('Post field', 'wpv-views'), 'wpv_shortcode_wpv_post_field');
// @todo wow, wpv-for-each does not work with usermeta or termmeta...
$wpv_shortcodes['wpv-for-each'] = array('wpv-for-each', __('Post field iterator', 'wpv-views'), 'wpv_for_each_shortcode');


$wpv_shortcodes['wpv-comment-title'] = array('wpv-comment-title', __('Comment title', 'wpv-views'), 'wpv_shortcode_wpv_comment_title');
$wpv_shortcodes['wpv-comment-body'] = array('wpv-comment-body', __('Comment body', 'wpv-views'), 'wpv_shortcode_wpv_comment_body');
$wpv_shortcodes['wpv-comment-author'] = array('wpv-comment-author', __('Comment Author', 'wpv-views'), 'wpv_shortcode_wpv_comment_author');
$wpv_shortcodes['wpv-comment-date'] = array('wpv-comment-date', __('Comment Date', 'wpv-views'), 'wpv_shortcode_wpv_comment_date');

$wpv_shortcodes['wpv-taxonomy-title'] = array('wpv-taxonomy-title', __('Taxonomy title', 'wpv-views'), 'wpv_shortcode_wpv_tax_title');
$wpv_shortcodes['wpv-taxonomy-link'] = array('wpv-taxonomy-link', __('Taxonomy title with a link', 'wpv-views'), 'wpv_shortcode_wpv_tax_title_link');
$wpv_shortcodes['wpv-taxonomy-url'] = array('wpv-taxonomy-url', __('Taxonomy URL', 'wpv-views'), 'wpv_shortcode_wpv_tax_url');
$wpv_shortcodes['wpv-taxonomy-slug'] = array('wpv-taxonomy-slug', __('Taxonomy slug', 'wpv-views'), 'wpv_shortcode_wpv_tax_slug');
$wpv_shortcodes['wpv-taxonomy-id'] = array('wpv-taxonomy-id', __('Taxonomy ID', 'wpv-views'), 'wpv_shortcode_wpv_tax_id');
$wpv_shortcodes['wpv-taxonomy-description'] = array('wpv-taxonomy-description', __('Taxonomy description', 'wpv-views'), 'wpv_shortcode_wpv_tax_description');
$wpv_shortcodes['wpv-taxonomy-field'] = array('wpv-taxonomy-field', __('Taxonomy field', 'wpv-views'), 'wpv_shortcode_wpv_tax_field');
$wpv_shortcodes['wpv-taxonomy-post-count'] = array('wpv-taxonomy-post-count', __('Taxonomy post count', 'wpv-views'), 'wpv_shortcode_wpv_tax_items_count');
$wpv_shortcodes['wpv-taxonomy-archive'] = array('wpv-taxonomy-archive', __('Taxonomy page info', 'wpv-views'), 'wpv_shortcode_wpv_taxonomy_archive');


// $wpv_shortcodes['wpv-control'] = array('wpv-control', __('Filter control', 'wpv-views'), 'wpv_shortcode_wpv_control');

$wpv_shortcodes['wpv-bloginfo'] = array('wpv-bloginfo', __('Site information', 'wpv-views'), 'wpv_bloginfo');
$wpv_shortcodes['wpv-search-term'] = array('wpv-search-term', __('Search term', 'wpv-views'), 'wpv_search_term');
$wpv_shortcodes['wpv-archive-title'] = array('wpv-archive-title', __('Archive title', 'wpv-views'), 'wpv_archive_title');
$wpv_shortcodes['wpv-archive-link'] = array('wpv-archive-link', __('Post archive link', 'wpv-views'), 'wpv_archive_link');

//User shortcodes
$wpv_shortcodes['wpv-current-user'] = array('wpv-current-user', __('Current user info', 'wpv-views'), 'wpv_current_user');
$wpv_shortcodes['wpv-user'] = array('wpv-user', __('Show user data', 'wpv-views'), 'wpv_user');
$wpv_shortcodes['wpv-login-form'] = array('wpv-login-form', __('Login form', 'wpv-views'), 'wpv_shortcode_wpv_login_form');
$wpv_shortcodes['wpv-logout-link'] = array('wpv-logout-link', __('Logout link', 'wpv-views'), 'wpv_shortcode_wpv_logout_link');
$wpv_shortcodes['wpv-forgot-password-form'] = array('wpv-forgot-password-form', __('Forgot password form', 'wpv-views'), 'wpv_shortcode_wpv_forgot_password_form');
$wpv_shortcodes['wpv-forgot-password-link'] = array('wpv-forgot-password-link', __('Forgot password link', 'wpv-views'), 'wpv_shortcode_wpv_forgot_password_link');
$wpv_shortcodes['wpv-reset-password-form'] = array('wpv-reset-password-form', __('Reset password form', 'wpv-views'), 'wpv_shortcode_wpv_reset_password_form');

if (defined('WPV_WOOCOMERCE_VIEWS_SHORTCODE')) {
	$wpv_shortcodes['wpv-wooaddcart'] = array('wpv-wooaddcart', __('Add to cart button', 'wpv-views'), 'wpv-wooaddcart');
}
if (defined('WPV_WOOCOMERCEBOX_VIEWS_SHORTCODE')) {
	$wpv_shortcodes['wpv-wooaddcartbox'] = array('wpv-wooaddcartbox', __('Add to cart box', 'wpv-views'), 'wpv-wooaddcartbox');
}

// register the short codes
foreach ($wpv_shortcodes as $shortcode) {
	if (function_exists($shortcode[2])) {
		add_shortcode($shortcode[0], $shortcode[2]);
	}
}

// Init taxonomies shortcode
wpv_post_taxonomies_shortcode();

/**
 * Get the shortcode via name.
 *
 * @since unknown
 */
function wpv_get_shortcode($name) {
	global $wpv_shortcodes;

	foreach ($wpv_shortcodes as $shortcode) {
		if ($shortcode[1] == $name) {
			return $shortcode[0];
		}
	}

	if ($name == 'Taxonomy View') {
		return WPV_TAXONOMY_VIEW;
	}

	if ($name == 'Post View') {
		return WPV_POST_VIEW;
	}

	return null;
}

/**
 * Views-Shortcode: wpv-bloginfo
 *
 * Description: Display bloginfo values.
 *
 * Parameters:
 * 'show' => parameter for show.
 *   "name" displays site title (Ex. "Testpilot")(Default)
 *   "description" displays tagline (Ex. Just another WordPress blog)
 *   "admin_email" displays (Ex. admin@example.com)
 *   "url" displays site url (Ex. http://example/home)
 *   "wpurl" displays home url (Ex. http://example/home/wp)
 *   "stylesheet_directory" displays stylesheet directory (Ex. http://example/home/wp/wp-content/themes/child-theme)
 *   "stylesheet_url" displays stylesheet url (Ex. http://example/home/wp/wp-content/themes/child-theme/style.css)
 *   "template_directory" displays template directory (Ex. http://example/home/wp/wp-content/themes/parent-theme)
 *   "template_url" displays template url (Ex. http://example/home/wp/wp-content/themes/parent-theme)
 *   "atom_url" displays url to feed in atom format (Ex. http://example/home/feed/atom)
 *   "rss2_url" displays url to feed in rss2 format (Ex. http://example/home/feed)
 *   "rss_url" displays url to feed in rss format (Ex. http://example/home/feed/rss)
 *   "pingback_url" displays pingback url (Ex. http://example/home/wp/xmlrpc.php)
 *   "rdf_url" displays rdf url(Ex. http://example/home/feed/rdf)
 *   "comments_atom_url" displays comments atom url (Ex. http://example/home/comments/feed/atom)
 *   "comments_rss2_url" displays comments rss2 url (Ex. http://example/home/comments/feed)
 *   "charset" displays site charset (Ex. UTF-8)
 *   "html_type" displays site html type (Ex. text/html)
 *   "language" displays site language (Ex. en-US)
 *   "text_direction" displays site text direction (Ex. ltr)
 *   "version" displays WordPress version (Ex. 3.1)
 *
 * Example usage:
 * url: [vpw-bloginfo show="url"]
 *
 * Link:
 * List of available parameters <a href="http://codex.wordpress.org/Function_Reference/bloginfo#Parameters">http://codex.wordpress.org/Function_Reference/bloginfo#Parameters</a>
 *
 * Note:
 *
 */

function wpv_bloginfo( $atts ){

	$atts = shortcode_atts( 
		array(
			'show' => 'name'
		),
		$atts 
	);
	$out = '';
	
	switch ( $atts['show'] ) {
		case 'name':
		case 'description':
		case 'admin_email':
		case 'url':
		case 'wpurl':
		case 'stylesheet_directory':
		case 'stylesheet_url':
		case 'template_directory':
		case 'template_url':
		case 'atom_url':
		case 'rss2_url':
		case 'rss_url':
		case 'pingback_url':
		case 'rdf_url':
		case 'comments_atom_url':
		case 'comments_rss2_url':
		case 'charset':
		case 'html_type':
		case 'language':
		case 'version':
			$out = get_bloginfo( $atts['show'], 'display' );
			break;
		case 'text_direction':
			if ( function_exists( 'is_rtl' ) ) {
                $out = is_rtl() ? 'rtl' : 'ltr';
            } else {
                $out = 'ltr';
            }
			break;
		default:
			$out = '';
			break;
	}
	
	apply_filters( 'wpv_shortcode_debug','wpv-bloginfo', json_encode( $atts ), '', 'Data received from cache', $out );
	return $out;
}

/**
* wpv_shortcodes_register_wpv_bloginfo_data
*
* Register the wpv-bloginfo shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_bloginfo_data' );

function wpv_shortcodes_register_wpv_bloginfo_data( $views_shortcodes ) {
	$views_shortcodes['wpv-bloginfo'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_bloginfo_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_bloginfo_data() {
    $data = array(
        'name' => __( 'Site information', 'wpv-views' ),
        'label' => __( 'Site information', 'wpv-views' ),
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'show' => array(
                        'label' => __( 'Show this information', 'wpv-views'),
                        'type' => 'select',
                        'options' => array(
                            'name' => __( 'Site name', 'wpv-views' ),
							'description' => __( 'Site description', 'wpv-views' ),
							'admin_email' => __( 'Administration email', 'wpv-views' ),
							'url' => __( 'Site address (URL)', 'wpv-views' ),
							'wpurl' => __( 'WordPress address (URL)', 'wpv-views' ),
							'stylesheet_directory' => __( 'Stylesheet directory URL of the active theme', 'wpv-views' ),
                            'stylesheet_url' => __( 'Primary CSS file URL of the active theme', 'wpv-views' ),
							'template_directory' => __( 'URL of the active theme\'s directory', 'wpv-views' ),
							'atom_url' => __( 'Atom feed URL', 'wpv-views' ),
							'rss2_url' => __( 'RSS 2.0 feed URL', 'wpv-views' ),
                            'rss_url' => __( 'RSS 0.92 feed URL', 'wpv-views' ),
							'pingback_url' => __( 'Pingback XML-RPC file URL', 'wpv-views' ),
							'rdf_url' => __( 'RDF/RSS 1.0 feed URL', 'wpv-views' ),
							'comments_atom_url' => __( 'Comments Atom feed URL ', 'wpv-views' ),
							'comments_rss2_url' => __( 'Comments RSS 2.0 feed URL', 'wpv-views' ),
                            'charset' => __( 'Encoding for pages and feeds', 'wpv-views' ),
							'html_type' => __( 'Content-Type of WordPress HTML pages', 'wpv-views' ),
							'language' => __( 'Language', 'wpv-views' ),
							'text_direction' => __( 'Text direction', 'wpv-views' ),
							'version' => __( 'WordPress version', 'wpv-views' )
                        ),
                        'default' => 'name',
						'documentation' => '<a href="http://codex.wordpress.org/Function_Reference/bloginfo" target="_blank">' . __( 'WordPress bloginfo function', 'wpv-views' ) . '</a>'
                    ),
                ),
            ),
        ),
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-search-term
 *
 * Description: Display search term value
 *
 * Parameters:
 * 'param' => Default = s
 *
 * Example usage:
 * url: [wpv-search-term param="my-field"]
 *
 */

function wpv_search_term( $attr ) {
	extract(
		shortcode_atts(
			array(
				'param' => 's',
				'separator' => ', '
			),
			$attr
		)
	);
	$out = '';
	if ( isset( $_GET[$param] ) ) {
		$term = $_GET[$param];
		if ( is_array( $term ) ) {
			$out = implode( $separator, $term );
		} else {
			$out = $term;
		}
		$out = esc_attr( urldecode( wp_unslash( $out ) ) );
	}
	return $out;
}

/**
* wpv_shortcodes_register_wpv_search_term_data
*
* Register the wpv-search-term shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_search_term_data' );

function wpv_shortcodes_register_wpv_search_term_data( $views_shortcodes ) {
	$views_shortcodes['wpv-search-term'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_search_term_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_search_term_data() {
	$data = array(
        'name' => __( 'Search term', 'wpv-views' ),
        'label' => __( 'Search term', 'wpv-views' ),
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'param' => array(
                        'label' => __( 'URL parameter', 'wpv-views'),
                        'type' => 'text',
						'description' => __( 'Watch this URL parameter. Defaults to "s", which is the natural search parameter.', 'wpv-views' ),
						'default' => 's'
                    ),
					'separator' => array(
                        'label' => __( 'Separator when multiple', 'wpv-views'),
                        'type' => 'text',
						'default' => ', ',
						'description' => __( 'When there are more than one values on that URL parameter, display this separator between them.', 'wpv-views' )
                    ),
                ),
            ),
        ),
    );
	return $data;
}

/**
 * Views-Shortcode: wpv-archive-title
 *
 * Description: Display archive title for current type of archive.
 *
 * Parameters: None
 *
 * Example usage:
 * At title of the archive. [wpv-archive-title]
 *
 * Link:
 *
 * Note: Inspired partly by https://developer.wordpress.org/reference/functions/the_archive_title/
 *
 */
function wpv_archive_title( $attr ) {
    $out = '';

    if ( function_exists( 'get_the_archive_title' ) /* WP 4.1+ */ ) {
        $out = get_the_archive_title();
    } else {
        $out = wpv_get_the_archive_title();
    }

    apply_filters( 'wpv_shortcode_debug', 'wpv-archive-title', json_encode( $attr ), '', '', $out );

    return $out;
}

/**
 * Views-Shortcode: wpv-archive-link
 *
 * Description: Display archive link for selected post type.
 *
 * Parameters:
 * 'name' => post_type_name for show (Default = current post type).
 *
 * Example usage:
 * Archive link for places is on [wpv-archive-link name="places"]
 *
 * Link:
 *
 * Note:
 *
 */
function wpv_archive_link($attr){
	extract(
		shortcode_atts( array('name' => ''), $attr )
	);
	$out = '';
	if($name != ''){
		$out  = get_post_type_archive_link($name);
	}
	if($out==''){
		global $post;// @todo check if instaceof Post
		if(isset($post->post_type) and $post->post_type!=''){
			$out = get_post_type_archive_link($post->post_type);
		}
	}
	apply_filters('wpv_shortcode_debug','wpv-archive-link', json_encode($attr), '', '', $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_archive_link_data
*
* Register the wpv-archive-link shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_archive_link_data' );

function wpv_shortcodes_register_wpv_archive_link_data( $views_shortcodes ) {
	$views_shortcodes['wpv-archive-link'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_archive_link_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_archive_link_data() {
	$options = array(
		'' => __( 'Current post', 'wpv-views' )
	);
	$post_types_with_archive = get_post_types(
		array(
			'public' => true,
			'has_archive' => true
		),
		'objects'
	);
    foreach ( $post_types_with_archive as $post_type_slug => $post_type_data ) {
        $options[$post_type_slug] = $post_type_data->labels->singular_name;
    }
    $data = array(
        'name' => __( 'Link to WordPress archive page', 'wpv-views' ),
        'label' => __( 'Link to WordPress archive page', 'wpv-views' ),
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'name' => array(
                        'label' => __( 'Post type archive', 'wpv-views'),
                        'type' => 'select',
                        'options' => $options,
						'default' => '',
						'description' => __( 'Display the link to the selected post type archive page', 'wpv-views' )
                    ),
                ),
            ),
        ),
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-current-user
 *
 * Description: Display information about current user.
 *
 * Parameters:
 * 'info' => parameter for show.
 *   "display_name" displays user's display name (Default)
 *   "login" displays user's login
 *   "firstname" displays user's first name
 *   "lastname" displays user's last name
 *   "email" displays user's email
 *   "id" displays user's user_id
 *   "logged_in" displays true if user is logged in, false if not
 *   "role" displays user's role
 *
 * Example usage:
 * Current user is [wpv-current-user info="display_name"]
 *
 * Link:
 *
 * Note:
 *
 * @since 2.4.0 Added the option to use [wpv-user field="profile_picture"] to fetch the user profile picture. The "field"
 *              attribute of the shortcode can take several values. If those values match a user column, we get that data.
 *              If not, we default to a usermeta field with that key. The "profile_picture" for the "field" attribute is
 *              neither a user column nor a usermeta field key, so we are reserving this value for a purpose that has no
 *              database match.
 *
 */

function wpv_current_user($attr){
	global $current_user;

    $default_size = 96;

    extract(
        $attr = shortcode_atts(
            array(
                'info' => 'display_name',
                'profile-picture-size' => $default_size,
                'profile-picture-default-url' => '',
                'profile-picture-alt' => false,
                'profile-picture-shape' => 'circle',
            ),
            $attr
        )
    );

	$out = '';

	if ( $current_user->ID > 0 ) {
		switch ($info) {
			case 'login':
				$out = $current_user->user_login;
				break;
			case 'firstname':
				$out = $current_user->user_firstname;
				break;
			case 'lastname':
				$out = $current_user->user_lastname;
				break;
			case 'email':
				$out = $current_user->user_email;
				break;
			case 'id':
				$out = $current_user->ID;
				break;
			case 'display_name':
				$out = $current_user->display_name;
				break;
            case 'profile_picture':
                $out = wpv_get_avatar( $current_user->ID, $attr['profile-picture-size'], $attr['profile-picture-default-url'], $attr['profile-picture-alt'], $attr['profile-picture-shape'] );
                break;
			case 'logged_in':
				$out = 'true';
				break;
			case 'role':
				if (
					isset( $current_user->roles ) 
					&& is_array( $current_user->roles ) 
					&& isset( $current_user->roles[0] )
				) {
					$out = $current_user->roles[0];
				}
				break;
			default:
				$out = $current_user->display_name;
				break;
		}
	} else {
		switch ($info) {
			case 'logged_in':
				$out = 'false';
				break;
			default:
				$out = '';
				break;
		}
	}
	apply_filters('wpv_shortcode_debug','wpv-current-user', json_encode($attr), '', 'Data received from cache', $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_current_user_data
*
* Register the wpv-current-user shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_current_user_data' );

function wpv_shortcodes_register_wpv_current_user_data( $views_shortcodes ) {
	$views_shortcodes['wpv-current-user'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_current_user_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_current_user_data() {
    $data = array(
        'name' => __( 'Current user information', 'wpv-views' ),
        'label' => __( 'Current user information', 'wpv-views' ),
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'info' => array(
                        'label' => __( 'Information', 'wpv-views'),
                        'type' => 'radio',
                        'options' => array(
                            'display_name'	=> __('Display name', 'wpv-views'),
							'firstname'		=> __('First name', 'wpv-views'),
							'lastname'		=> __('Last name', 'wpv-views'),
							'login'			=> __('User Login Name', 'wpv-views'),
                            'email'			=> __('Email', 'wpv-views'),
                            'id'			=> __('User ID', 'wpv-views'),
                            'logged_in'		=> __('Logged in', 'wpv-views'),
                            'role'			=> __('User role', 'wpv-views'),
                            'profile_picture' => __( 'Profile picture', 'wpv-views' ),
                        ),
                        'default' => 'display_name',
						'description' => __( 'Display the selected information for the current user', 'wpv-views' ),
						'documentation' => '<a href="http://codex.wordpress.org/Function_Reference/get_userdata" target="_blank">' . __( 'WordPress get_userdata function', 'wpv-views' ) . '</a>'
                    ),
                    'profile-picture-size' => array(
                        'label' => __( 'Size', 'wpv-views' ),
                        'type' => 'text',
                        'description' => __( 'Size of the current user\'s profile picture in pixels.', 'wpv-views' ),
                    ),
                    'profile-picture-alt' => array(
                        'label' => __( 'Alternative text', 'wpv-views' ),
                        'type' => 'text',
                        'description' => __( 'Alternative text for the current user\'s profile picture.', 'wpv-views' ),
                    ),
                    'profile-picture-shape' => array(
                        'label' => __( 'Shape', 'wpv-views'),
                        'type' => 'select',
                        'options' => array(
                            'circle' => __( 'Circle', 'wpv-views' ),
                            'square' => __( 'Square', 'wpv-views' ),
                            'custom' => __( 'Custom', 'wpv-views' ),
                        ),
                        'default' => 'circle',
                        'description' => __( 'Display the current user\'s profile picture in this shape. For "custom" shape, custom CSS is needed for "wpv-profile-picture-shape-custom" CSS class.', 'wpv-views' ),
                    ),
                    'profile-picture-default-url' => array(
                        'label' => __( 'Default URL', 'wpv-views' ),
                        'type' => 'text',
                        'description' => __( 'Default url for an image. Leave blank for the "Mystery Man".', 'wpv-views' )
                    ),
                ),
            ),
        ),
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-login-form
 *
 * Description: Display WordPress login form.
 *
 * Parameters:
 *  "redirect_url" redirects to this URL after successful login. Absolute URL.
 *  "allow_remember" displays the "Remember me" feature (checkbox)
 *  "remember_default" sets "allow_remember" checked status by default
 *
 * Example usage:
 *  [wpv-if evaluate="[wpv-current-user info="logged_in"]" condition="true"]
 *  [/wpv-if]
 *  [wpv-login-form]
 *
 * Link:
 *
 * Note:
 *  Façade for http://codex.wordpress.org/Function_Reference/wp_login_form
 */
function wpv_shortcode_wpv_login_form( $atts ) {
    
    if ( is_user_logged_in() ) {
        /* Do not display anything if a user is already logged in */
        return '';
    }

    // WordPress gets the current URL this way
    $current_url = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
	if (
		defined( 'DOING_AJAX' )
		&& DOING_AJAX
		&& isset( $_REQUEST['action'] )
		&& (
			$_REQUEST['action'] == 'wpv_get_view_query_results' 
			|| $_REQUEST['action'] == 'wpv_get_archive_query_results'
		)
	) {
		$current_url = wp_get_referer();
	}

    extract( 
		shortcode_atts(
            array(
				'redirect_url'		=> $current_url,
				'redirect_url_fail'	=> '',
				'allow_remember'	=> false,
				'remember_default'	=> false,
            ), 
			$atts 
		)
    );

    $args = array(
        'echo'				=> false,
        'redirect'			=> $redirect_url, /* Use absolute URLs */
		'redirect_fail'		=> $redirect_url_fail,
        'remember'			=> $allow_remember,
        'value_remember'	=> $remember_default
    );

    $out = wpv_login_form( $args );
    apply_filters( 'wpv_shortcode_debug', 'wpv-login-form', json_encode( $atts ), '', '', $out );
    return $out;
}

/**
* Provides a simple login form for use anywhere within WordPress.
*
* The login format HTML is echoed by default. Pass a false value for `$echo` to return it instead.
* Borrowed from wp_login_form almost entirely.
*
* @since 2.1
*
* @param array $args {
*     Optional. Array of options to control the form output. Default empty array.
*
*     @type bool   $echo           Whether to display the login form or return the form HTML code.
*                                  Default true (echo).
*     @type string $redirect       URL to redirect to. Must be absolute, as in "https://example.com/mypage/".
*                                  Default is to redirect back to the request URI.
*     @type string $redirect_fail  URL to redirect to on failure. Must be absolute, as in "https://example.com/mypage/".
*                                  Default is to redirect to the login page.
*     @type string $form_id        ID attribute value for the form. Default 'loginform'.
*     @type string $label_username Label for the username or email address field. Default 'Username or Email'.
*     @type string $label_password Label for the password field. Default 'Password'.
*     @type string $label_remember Label for the remember field. Default 'Remember Me'.
*     @type string $label_log_in   Label for the submit button. Default 'Log In'.
*     @type string $id_username    ID attribute value for the username field. Default 'user_login'.
*     @type string $id_password    ID attribute value for the password field. Default 'user_pass'.
*     @type string $id_remember    ID attribute value for the remember field. Default 'rememberme'.
*     @type string $id_submit      ID attribute value for the submit button. Default 'wp-submit'.
*     @type bool   $remember       Whether to display the "rememberme" checkbox in the form.
*     @type string $value_username Default value for the username field. Default empty.
*     @type bool   $value_remember Whether the "Remember Me" checkbox should be checked by default.
*                                  Default false (unchecked).
*
* }
* @return string|void String when retrieving.
*/
function wpv_login_form( $args = array() ) {
	$defaults = array(
		'echo'				=> true,
		'redirect'			=> ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
		'redirect_fail'		=> '',
		'form_id'			=> 'loginform',
		'label_username'	=> __( 'Username or Email' ),
		'label_password'	=> __( 'Password' ),
		'label_remember'	=> __( 'Remember Me' ),
		'label_log_in'		=> __( 'Log In' ),
		'id_username'		=> 'user_login',
		'id_password'		=> 'user_pass',
		'id_remember'		=> 'rememberme',
		'id_submit'			=> 'wp-submit',
		'remember'			=> true,
		'value_username'	=> isset( $_REQUEST['username'] ) ? $_REQUEST['username'] : '',
		'value_remember'	=> false,
	);

	/**
	* Filters the default login form output arguments.
	*
	* @see wp_login_form()
	*
	* @param array $defaults An array of default login form arguments.
	*/
	$args = wp_parse_args( $args, apply_filters( 'login_form_defaults', $defaults ) );

	/**
	* Filters content to display at the top of the login form.
	*
	* The filter evaluates just following the opening form tag element.
	*
	* @param string $content Content to display. Default empty.
	* @param array  $args    Array of login form arguments.
	*/
	$login_form_top = apply_filters( 'login_form_top', '', $args );

	/**
	* Filters content to display in the middle of the login form.
	*
	* The filter evaluates just following the location where the 'login-password'
	* field is displayed.
	*
	* @param string $content Content to display. Default empty.
	* @param array  $args    Array of login form arguments.
	*/
	$login_form_middle = apply_filters( 'login_form_middle', '', $args );

	/**
	* Filters content to display at the bottom of the login form.
	*
	* The filter evaluates just preceding the closing form tag element.
	*
	* @param string $content Content to display. Default empty.
	* @param array  $args    Array of login form arguments.
	*/
	$login_form_bottom = apply_filters( 'login_form_bottom', '', $args );
	
	$login_form_bottom .= '<input type="hidden" name="wpv_login_form" value="on"/>';
	if ( $args['redirect_fail'] != '' ) {
		$login_form_bottom .= '<input type="hidden" name="wpv_login_form_redirect_on_fail" value="' . esc_url( $args['redirect_fail'] ) . '" />';
	}

	$form = '
		<form name="' . $args['form_id'] . '" id="' . $args['form_id'] . '" action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post">
			' . $login_form_top . '
			<p class="login-username">
				<label for="' . esc_attr( $args['id_username'] ) . '">' . esc_html( $args['label_username'] ) . '</label>
				<input type="text" name="log" id="' . esc_attr( $args['id_username'] ) . '" class="input" value="' . esc_attr( $args['value_username'] ) . '" size="20" />
			</p>
			<p class="login-password">
				<label for="' . esc_attr( $args['id_password'] ) . '">' . esc_html( $args['label_password'] ) . '</label>
				<input type="password" name="pwd" id="' . esc_attr( $args['id_password'] ) . '" class="input" value="" size="20" />
			</p>
			' . $login_form_middle . '
			' . ( $args['remember'] ? '<p class="login-remember"><label><input name="rememberme" type="checkbox" id="' . esc_attr( $args['id_remember'] ) . '" value="forever"' . ( $args['value_remember'] ? ' checked="checked"' : '' ) . ' /> ' . esc_html( $args['label_remember'] ) . '</label></p>' : '' ) . '
			<p class="login-submit">
				<input type="submit" name="wp-submit" id="' . esc_attr( $args['id_submit'] ) . '" class="button-primary" value="' . esc_attr( $args['label_log_in'] ) . '" />
				<input type="hidden" name="redirect_to" value="' . esc_url( $args['redirect'] ) . '" />
			</p>
			' . $login_form_bottom . '
		</form>';

	if ( $args['echo'] )
		echo $form;
	else
		return $form;
}

/**
 * The authenticate filter hook is used to perform additional validation/authentication any time a user logs in to WordPress.
 *
 * @param $user (null|WP_User|WP_Error) WP_User if the user is authenticated. WP_Error or null otherwise.
 * @param $username (string) Username or email address.
 * @param $password (string) User password
 * @return mixed either a WP_User object if authenticating the user or, if generating an error, a WP_Error object.
 *
 * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/authenticate
 *
 * More info: http://wordpress.stackexchange.com/a/183208
 */

add_filter( 'authenticate', 'wpv_authenticate', 30, 3 );

function wpv_authenticate ( $user, $username, $password ) {
	// forcefully capture login failed to forcefully open wpv_wp_login_failed action,
	// so that this event can be captured
	if ( is_wp_error( $user ) ) {
		do_action( 'wpv_wp_login_failed', $username, $user );
	}
	return $user;
};

/**
 * Action to forcefully redirect the user on failed authentication.
 * Redirects to the page where the [wpv-login-form] short code is inserted, if 'redirect_fail_url' attribute is not defined.
 *
 * @param $username (string) Username or email address.
 * @param $user (WP_Error) WP_Error object.
 */

add_action( 'wpv_wp_login_failed', 'wpv_login_form_fail_redirect', 30, 2 );

function wpv_login_form_fail_redirect( $username, $user ) {
	$redirect_url = '';

	if ( isset( $_REQUEST['wpv_login_form'] ) ) {
		if ( isset( $_REQUEST['wpv_login_form_redirect_on_fail'] ) && $_REQUEST['wpv_login_form_redirect_on_fail'] != '' ) {
			$redirect_url = $_REQUEST['wpv_login_form_redirect_on_fail'];
		} elseif ( wp_get_referer() ) {
			$redirect_url = wp_get_referer();
		}
	}

	if( !empty( $redirect_url ) ) {
		$redirect_url = add_query_arg(
			array(
				'username' => $username,
				'fail_reason' => $user->get_error_code()
			),
			$redirect_url
		);

		wp_safe_redirect( $redirect_url );

		exit;
	}
}

/**
 * Filter to add error messages on top of the login form.
 *
 * @param $content (string) HTML content.
 * @param $args (array) Default arguments array.
 *
 * @return string
 *
 * @see wpv_login_form()
 */

add_filter( 'login_form_top', 'wpv_authenticate_errors', 30, 2 );

function wpv_authenticate_errors ( $content, $args ) {
	if (
		isset( $_REQUEST['fail_reason'] )
		&& $_REQUEST['fail_reason'] != ''
	) {
		$error_string = __( '<strong>ERROR</strong>: ', 'wpv-views' );

		switch( $_REQUEST['fail_reason'] ) {
			case 'invalid_username':
				$error_string .= __( 'Invalid username.', 'wpv-views' );
				break;

			case 'incorrect_password':
				$error_string .= __( 'The password you entered for the username <strong>' . $args['value_username'] . '</strong> is incorrect.', 'wpv-views' );
				break;

			case 'empty_password':
				$error_string .= __( 'The password field is empty.', 'wpv-views' );
				break;

			case 'empty_username':
				$error_string .= __( 'The username field is empty.', 'wpv-views' );
				break;

			default:
				$error_string .= __( 'Unknown error.', 'wpv-views' );
				break;
		}

		$content .= apply_filters('wpv_filter_override_auth_errors' , $error_string, 'wp-error', $_REQUEST[ 'fail_reason' ]);
	}

	return $content;
}

/**
 * Filter to override default error messages, with own message strings and/or to add some CSS cosmetics.
 *
 * @param string $message Error message.
 * @param string $class (optional) CSS class to highlight the error message. If supplied, $message is encapsulated in <div>...</div>
 * @param string $code (optional) An error code to identify supplied errors.
 *
 * @return string
 *
 * @see wpv_authenticate_errors() for failed login error codes.
 */
add_filter( 'wpv_filter_override_auth_errors', 'wpv_override_auth_errors', 10, 3 );

function wpv_override_auth_errors( $message, $class = '', $code = '' ) {
	if( !empty( $class ) ) {
		$message = '<div class="' . $class . '">' . $message . '</div>';
	}

	return $message;
}

/**
 * Filter to add general/success messages on top of the login form.
 *
 * @param $content (string) HTML content.
 * @param $args (array) Default arguments array.
 *
 * @return string
 *
 * @since 2.2
 * @see wpv_login_form()
 */

add_filter( 'login_form_top', 'wpv_shortcodes_wpv_login_messages', 30, 2 );
add_filter( 'forgot_password_form_top', 'wpv_shortcodes_wpv_login_messages', 30, 2 );
add_filter( 'reset_password_form_top', 'wpv_shortcodes_wpv_login_messages', 30, 2 );

function wpv_shortcodes_wpv_login_messages ( $content, $args ) {
	$msg_code = '';
	$msg_string = '';

	if ( isset( $_REQUEST['checkemail'] ) && $_REQUEST['checkemail'] != '' ) {
		$msg_code = $_REQUEST['checkemail'];
	}

	if ( isset( $_REQUEST['password'] ) && $_REQUEST['password'] != '' ) {
		$msg_code = $_REQUEST['password'];
	}

	switch( $msg_code ) {
		case 'confirm':
			$msg_string .= __( 'Check your email for the confirmation link.', 'wpv-views' );
			break;

		case 'changed':
			$msg_string .= __( 'Your password has been reset.', 'wpv-views' );
			break;
	}

	$content .= apply_filters( 'wpv_filter_override_auth_errors' , $msg_string, 'wp-success', $msg_code );

	return $content;
}

/**
* wpv_shortcodes_register_wpv_login_form_data
*
* Register the wpv-login-form shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_login_form_data' );

function wpv_shortcodes_register_wpv_login_form_data( $views_shortcodes ) {
	$views_shortcodes['wpv-login-form'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_login_form_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_login_form_data()  {
    $data = array(
        'name' => __( 'Login Form', 'wpv-views' ),
        'label' => __( 'Login Form', 'wpv-views' ),
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'redirect_url' => array(
                        'label' => __( 'Redirect to this URL on success', 'wpv-views'),
                        'type' => 'url',
						'description' => __( 'URL to redirect users after login in. Defaults to the current URL.', 'wpv-views' ),
                    ),
					'redirect_url_fail' => array(
                        'label' => __( 'Redirect to this URL on failure', 'wpv-views'),
                        'type' => 'url',
						'description' => __( 'URL to redirect users when the login fails. Defaults to the current URL.', 'wpv-views' ),
                    ),
					'remember_me_combo'	=> array(
						'label'		=> __( 'Remember me checkbox', 'wpv-views' ),
						'type'		=> 'grouped',
						'fields'	=> array(
							'allow_remember'	=> array(
								'type'			=> 'radio',
								'options'		=> array(
									'true'	=> __( 'Show checkbox', 'wpv-views' ),
									'false'	=> __( 'Hide checkbox', 'wpv-views' ),
								),
								'default'		=> 'false',
							),
							'remember_default' => array(
								'pseudolabel'	=> __( 'Default state', 'wpv-views' ),
								'type'			=> 'radio',
								'options'		=> array(
									'true'	=> __( 'Checked', 'wpv-views' ),
									'false'	=> __( 'Unchecked', 'wpv-views' ),
								),
								'default'		=> 'false',
							),
						)
					),
                ),
            ),
        ),
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-logout-link
 *
 * Description: Display WordPress logout link and uses supplied content as a link label.
 * If no label is supplied, it outputs 'Logout' as a default label.
 *
 * Parameters:
 *  "redirect_url" redirects to this URL after successful logout. Absolute URL.
 *  "class" HTML class attribute for generated A tag
 *  "style" HTML style attribute for generated A tag
 *
 * Example usage:
 *  [wpv-logout-link]Logout[/wpv-logout-link]
 *  [wpv-logout-link]Sign Out[/wpv-logout-link]
 *  [wpv-logout-link class="my-class" style="text-decoration: none;" redirect_url="http://example.com"]
 *  [wpv-logout-link redirect_url="[wpv-post-url]"]Sign out and go to [wpv-post-title][/wpv-logout-link]
 *
 *
 * User Guide: https://wp-types.com/documentation/user-guides/views-shortcodes/#wpv-logout-link
 *
 * @todo: find a way to allow redirect to external links
 *
 * Note:
 *  http://codex.wordpress.org/Template_Tags/wp_logout_url
 *
 * @since 2.1
 */
function wpv_shortcode_wpv_logout_link( $atts, $content = '' ) {
	global $current_user;

	if((int)$current_user->ID <= 0) {
		/* Do not display anything if a user is already logged out */
		return '';
	}

	if (
		defined( 'DOING_AJAX' )
		&& DOING_AJAX
		&& isset( $_REQUEST['action'] )
		&& (
			$_REQUEST['action'] == 'wpv_get_view_query_results' 
			|| $_REQUEST['action'] == 'wpv_get_archive_query_results'
		)
	) {
		// It's an AJAX request - Views AJAX Pagination or Parametric Search Request
		$current_url = wp_get_referer();
	} else {
		// It's non-AJAX request
		// WordPress gets the current URL this way
		$current_url = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
	}

	extract( shortcode_atts(
		array(
			'redirect_url' => $current_url,
			'class' => '',
			'style' => '',
		), $atts )
	);

	// Get logout URL
	$url = wp_logout_url( $redirect_url );

	// Parse the content (if any) for inline short codes
	$outContent = !empty( $content ) ? wpv_do_shortcode( $content ) : '';

	// Assemble the output
	$out = '<a href="' . $url . '"';
	$out .= !empty( $class ) ? ' class="' . esc_attr( $class ) . '"' : '';
	$out .= !empty( $style ) ? ' style="' . esc_attr( $style ) . '"' : '';
	$out .= '>';
	$out .= $outContent;
	$out .= '</a>';

	apply_filters( 'wpv_shortcode_debug', 'wpv-logout-link', json_encode( $atts ), '', '', $out );
	return $out;
}

/**
 * Checks if the supplied URL points to an external site or not.
 *
 * @param $url URL to check
 * @return bool
 * @since 2.1
 *
 * Notes:
 *  - www.example.com and example.com are treated as 2 different URLs (domains).
 *  - This function implements simple check and compares with 'host' of current blog URL.
 *  - Relative paths are of course treated as internal URLs.
 *
 * @todo: Improve the function if needed.
 * @todo: Left for future reference.
 */
function wpv_is_external_url( $url ) {
	$external = false;
	$url_parts = parse_url( $url );
	$blog_url_parts = parse_url( get_bloginfo( 'url' ) );

	if(
		isset( $url_parts['host'] )
		&& !empty( $url_parts['host'] )
		&& $url_parts['host'] != $blog_url_parts['host']
	) {
		$external = true;
	}

	return $external;
}

/**
 * wpv_shortcodes_register_wpv_logout_link_data
 *
 * Register the wpv-logout-link shortcode in the GUI API.
 *
 * @since 2.1
 */

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_logout_link_data' );

function wpv_shortcodes_register_wpv_logout_link_data( $views_shortcodes ) {
	$views_shortcodes['wpv-logout-link'] = array(
			'callback' => 'wpv_shortcodes_get_wpv_logout_link_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_logout_link_data()  {
	$data = array(
		'name' => __( 'Logout Link', 'wpv-views' ),
		'label' => __( 'Logout Link', 'wpv-views' ),
		'attributes' => array(
			'display-options' => array(
				'label' => __( 'Display options', 'wpv-views' ),
				'header' => __( 'Display options', 'wpv-views' ),
				'fields' => array(
					'redirect_url' => array(
						'label' => __( 'Redirect target URL', 'wpv-views' ),
						'type' => 'url',
						'description' => __( 'URL to redirect users after logout. Defaults to the current URL. Redirect is only supported to the URLs within the current blog (or site). Redirection to external URLs (or sites) is not supported.', 'wpv-views' ),
					),
					'class' => array(
						'label' => __( 'Class', 'wpv-views' ),
						'type' => 'text',
						'description' => __( 'Space-separated list of class names that will be added to the anchor HTML tag.', 'wpv-views' ),
						'placeholder' => 'class1 class2',
					),
					'style' => array(
						'label' => __( 'Style', 'wpv-views' ),
						'type' => 'text',
						'description' => __( 'Inline styles that will be added to the anchor HTML tag.', 'wpv-views' ),
						'placeholder' => 'border: 1px solid red; font-size: 2em;',
					),
				),
				'content' => array(
					'label' => __( 'Link label', 'wpv-views' ),
					'description' => __( 'This will be displayed as a text or label for the link.', 'wpv-views' ),
					'default' => __('Logout', 'wpv-views'),
				),
			),
		),
	);
	return $data;
}

////////////////////////// Forgot/Reset Password Flow Starts ///////////////////////////////////
/**
 * Views-Shortcode: wpv-forgot-password-form
 *
 * Description: Display WordPress forgot password form.
 *
 * Parameters:
 *  "redirect_url" redirects to this URL after successful operation. Absolute URL.
 *  "redirect_fail" redirects to this URL after failed operation. Absolute URL.
 *  "reset_password_url" redirects to this URL to reset the password. Absolute URL. This link is sent in email.
 *
 * Example usage:
 *     [wpv-forgot-password-form]
 *
 * Link:
 *
 * @since 2.2
 */
function wpv_shortcode_wpv_forgot_password_form( $atts ) {

	if ( is_user_logged_in() ) {
		/* Do not display anything if a user is already logged in */
		return '';
	}

	// WordPress gets the current URL this way
	$current_url = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
	if (
		defined( 'DOING_AJAX' )
		&& DOING_AJAX
		&& isset( $_REQUEST['action'] )
		&& (
			$_REQUEST['action'] == 'wpv_get_view_query_results'
			|| $_REQUEST['action'] == 'wpv_get_archive_query_results'
		)
	) {
		$current_url = wp_get_referer();
	}

	extract(
		shortcode_atts(
			array(
				'redirect_url'		=> remove_query_arg( array( 'wpv_error' ), $current_url ), //$current_url, //wp_login_url(),
				'redirect_url_fail'	=> remove_query_arg( array( 'checkemail' ), $current_url ), //$current_url,
				'reset_password_url' => ''
			),
			$atts
		)
	);

	$args = array(
		'redirect'			=> $redirect_url, /* Use absolute URLs */
		'redirect_fail'		=> $redirect_url_fail,
		'reset_password' => $reset_password_url
	);

	$out = wpv_forgot_password_form( $args );

	apply_filters( 'wpv_shortcode_debug', 'wpv-forgot-password-form', json_encode( $atts ), '', '', $out );
	return $out;
}

/**
 * Provides a simple forgot password form for use anywhere within WordPress.
 *
 * @since 2.2
 *
 * @param array $args {
 *     Optional. Array of options to control the form output. Default empty array.
 *
 *     @type string $redirect       URL to redirect to. Must be absolute, as in "https://example.com/mypage/".
 *     @type string $redirect_fail  URL to redirect to on failure. Must be absolute, as in "https://example.com/mypage/".
 *     @type string $reset_password URL to redirect to custom reset password page. Must be absolute URL.
 *     @type string $form_id        ID attribute value for the form. Default 'forgotpasswordform'.
 *     @type string $label_username Label for the username or email address field. Default 'Username or Email'.
 *     @type string $id_username    ID attribute value for the username field. Default 'user_login'.
 *     @type string $label_submit	Label for submit buttion. Default 'Get New Password'.
 *     @type string $id_submit      ID attribute value for the submit button. Default 'wp-submit'.
 *     @type string $value_username Default value for the username field. Default empty.
 *
 * }
 * @return string|void String when retrieving.
 */
function wpv_forgot_password_form( $args = array() ) {
	$defaults = array(
		'redirect'			=> ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
		'redirect_fail'		=> ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
		'reset_password'	=> '',
		'form_id'			=> 'forgotpasswordform',
		'label_username'	=> __( 'Username or Email', 'wpv-views' ),
		'id_username'		=> 'user_login',
		'label_submit'		=> __( 'Get New Password', 'wpv-views' ),
		'id_submit'			=> 'wp-submit',
		'value_username'	=> isset( $_REQUEST['username'] ) ? $_REQUEST['username'] : '',
	);

	/**
	 * Filters the default forgot password form output arguments.
	 *
	 * @param array $defaults An array of default login form arguments.
	 */
	$args = wp_parse_args( $args, apply_filters( 'forgot_password_form_defaults', $defaults ) );

	/**
	 * Filters content to display at the top of the form.
	 *
	 * The filter evaluates just following the opening form tag element.
	 *
	 * @param string $content Content to display. Default empty.
	 * @param array  $args    Array of form arguments.
	 */
	$form_top = apply_filters( 'forgot_password_form_top', '', $args );

	/**
	 * Filters content to display in the middle of the form.
	 *
	 * The filter evaluates just before the submit button.
	 *
	 * @param string $content Content to display. Default empty.
	 * @param array  $args    Array of form arguments.
	 */
	$form_middle = apply_filters( 'forgot_password_form_middle', '', $args );

	/**
	 * Filters content to display at the bottom of the login form.
	 *
	 * The filter evaluates just preceding the closing form tag element.
	 *
	 * @param string $content Content to display. Default empty.
	 * @param array  $args    Array of form arguments.
	 */
	$form_bottom = apply_filters( 'forgot_password_form_bottom', '', $args );

	$form_bottom .= '<input type="hidden" name="wpv_forgot_password_form" value="on"/>';
	if ( $args['redirect_fail'] != '' ) {
		$form_bottom .= '<input type="hidden" name="wpv_forgot_password_form_redirect_on_fail" value="' . esc_url( $args['redirect_fail'] ) . '" />';
	}

	if ( $args['reset_password'] != '' ) {
		$form_bottom .= '<input type="hidden" name="wpv_forgot_password_form_reset_password_url" value="' . esc_url( $args['reset_password'] ) . '" />';
	}

	do_action( 'wpv_action_wpv_before_forgot_password_form');

	$form = '
		<form name="' . esc_attr( $args['form_id'] ) . '" id="' . esc_attr( $args['form_id'] ) . '" action="' . wp_lostpassword_url() . '" method="post">
			' . $form_top . '
			<p class="login-username">
				<label for="' . esc_attr( $args['id_username'] ) . '">' . esc_html( $args['label_username'] ) . '</label>
				<input type="text" name="' . esc_attr( $args['id_username'] ) . '" id="' . esc_attr( $args['id_username'] ) . '" class="input" value="' . esc_attr( $args['value_username'] ) . '" size="20" />
			</p>
			' . $form_middle . '
			<p class="login-submit">
				<input type="submit" name="wp-submit" id="' . esc_attr( $args['id_submit'] ) . '" class="button-primary" value="' . esc_attr( $args['label_submit'] ) . '" />
				<input type="hidden" name="redirect_to" value="' . esc_url( $args['redirect'] ) . '" />
			</p>
			' . $form_bottom . '
		</form>';

	do_action( 'wpv_action_wpv_after_forgot_password_form');

	return $form;
}

/**
 * wpv_shortcodes_register_wpv_forgot_password_form_data
 *
 * Register the wpv-forgot-password-form shortcode in the GUI API.
 *
 * @since 2.2
 */

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_forgot_password_form_data' );

function wpv_shortcodes_register_wpv_forgot_password_form_data( $views_shortcodes ) {
	$views_shortcodes['wpv-forgot-password-form'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_forgot_password_form_data'
	);

	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_forgot_password_form_data()  {
	$data = array(
		'name' => __( 'Forgot Password Form', 'wpv-views' ),
		'label' => __( 'Forgot Password Form', 'wpv-views' ),
		'attributes' => array(
			'redirect-options' => array(
				'label' => __('Redirect options', 'wpv-views'),
				'header' => __('Redirect options', 'wpv-views'),
				'fields' => array(
					'redirect_url' => array(
						'label' => __( 'Redirect to this URL on success', 'wpv-views'),
						'type' => 'url',
						'description' => __( 'URL to redirect users after sending password retrieval link. Defaults to the current URL.', 'wpv-views' ),
					),
					'redirect_url_fail' => array(
						'label' => __( 'Redirect to this URL on failure', 'wpv-views'),
						'type' => 'url',
						'description' => __( 'URL to redirect users after failed password retrieval operation. Defaults to the current URL.', 'wpv-views' ),
					),
					'reset_password_url' => array(
						'label' => __( 'URL to custom password reset page', 'wpv-views'),
						'type' => 'url',
						'description' => __( 'URL to custom password reset page when reset password link is clicked in reset password email. Defaults to WordPress reset password URL.', 'wpv-views' ),
					)
				),
			),
		),
	);

	return $data;
}

/**
 * wpv_shortcodes_wpv_do_password_lost
 *
 * Handles custom forgot password form errors.
 *
 * @since 2.2
 */

add_action( 'login_form_lostpassword', 'wpv_shortcodes_wpv_do_password_lost' );

function wpv_shortcodes_wpv_do_password_lost() {
	if (
		'POST' == $_SERVER['REQUEST_METHOD']
		&& isset( $_REQUEST['wpv_forgot_password_form'] )
		&& 'on' == $_REQUEST['wpv_forgot_password_form']
	) {
		$redirect_to = $_REQUEST['redirect_to'];
		$redirect_fail = $_REQUEST['wpv_forgot_password_form_redirect_on_fail'];

		$errors = retrieve_password();

		if ( is_wp_error( $errors ) ) {
			// Errors found
			$redirect_url = add_query_arg( 'wpv_error', join( ',', $errors->get_error_codes() ), $redirect_fail );
		} else {
			// Email sent
			$redirect_url = add_query_arg( 'checkemail', 'confirm', $redirect_to );
		}

		wp_safe_redirect( $redirect_url );
		exit;
	}
}

/**
 * Returns the message body for the password reset email.
 * Called through the retrieve_password_message filter.
 *
 * @param string  $message    Default mail message.
 * @param string  $key        The activation key.
 * @param string  $user_login The username for the user.
 * @param WP_User $user_data  WP_User object.
 *
 * @return string   The mail message to send.
 *
 * @since 2.2
 * @see https://developer.wordpress.org/reference/hooks/retrieve_password_message/
 */

add_filter( 'retrieve_password_message', 'wpv_filter_wpv_replace_retrieve_password_email_body', 10, 4 );

function wpv_filter_wpv_replace_retrieve_password_email_body( $message, $key, $user_login, $user_data ) {
	$reset_password = '';

	if(
		isset( $_REQUEST['wpv_forgot_password_form_reset_password_url'] )
		&& !empty( $_REQUEST['wpv_forgot_password_form_reset_password_url'] )
	) {
		$reset_password = add_query_arg(
			array(
				'action' => 'rp',
				'key' => $key,
				'login' => rawurlencode( $user_login )
			),
			$_REQUEST['wpv_forgot_password_form_reset_password_url']
		);

		// Create new message
		$message  = __( 'Someone has requested a password reset for the following account:', 'wpv-views' ) . "\r\n\r\n";
		$message .= get_home_url() . "\r\n\r\n";
		$message .= sprintf( __( 'Username: %s.', 'wpv-views' ), $user_login ) . "\r\n\r\n";
		$message .= __( "If this was a mistake, just ignore this email and nothing will happen.", 'wpv-views' ) . "\r\n\r\n";
		$message .= __( 'To reset your password, visit the following address:', 'wpv-views' ) . "\r\n\r\n";
		$message .= $reset_password . "\r\n\r\n";
	}

	return $message;
}

/**
 * Views-Shortcode: wpv-reset-password-form
 *
 * Description: Display custom reset password form.
 *
 * Parameters:
 *  "redirect_url" redirects to this URL after successful operation. Absolute URL.
 *  "redirect_fail" redirects to this URL after failed operation. Absolute URL.
 *
 * Example usage:
 *     [wpv-reset-password-form]
 *
 * Link:
 *
 * @since 2.2
 */
function wpv_shortcode_wpv_reset_password_form( $atts ) {

	if ( is_user_logged_in() ) {
		/* Do not display anything if a user is already logged in */
		return '';
	}

	// WordPress gets the current URL this way
	$current_url = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
	if (
		defined( 'DOING_AJAX' )
		&& DOING_AJAX
		&& isset( $_REQUEST['action'] )
		&& (
			$_REQUEST['action'] == 'wpv_get_view_query_results'
			|| $_REQUEST['action'] == 'wpv_get_archive_query_results'
		)
	) {
		$current_url = wp_get_referer();
	}

	extract(
		shortcode_atts(
			array(
				'redirect_url'		=> remove_query_arg( array( 'wpv_error' ), $current_url ), //wp_login_url(),
				'redirect_url_fail'	=> remove_query_arg( array( 'password' ), $current_url )
			),
			$atts
		)
	);

	$login = isset( $_REQUEST['login'] ) ? $_REQUEST['login'] : '';
	$key = isset( $_REQUEST['key'] ) ? $_REQUEST['key'] : '';

	$args = array(
		'redirect'			=> $redirect_url, /* Use absolute URLs */
		'redirect_fail'		=> $redirect_url_fail,
		'rp_login'				=> $login,
		'rp_key'				=> $key
	);

	$out = wpv_reset_password_form( $args );

	apply_filters( 'wpv_shortcode_debug', 'wpv-reset-password-form', json_encode( $atts ), '', '', $out );
	return $out;
}

/**
 * Provides a simple reset password form for use anywhere within WordPress.
 *
 * @since 2.2
 *
 * @param array $args {
 *     Optional. Array of options to control the form output. Default empty array.
 *
 *     @type string $redirect       URL to redirect to. Must be absolute, as in "https://example.com/mypage/".
 *     @type string $redirect_fail  URL to redirect to on failure. Must be absolute, as in "https://example.com/mypage/".
 *     @type string $form_id        ID attribute value for the form. Default 'resetpasswordform'.
 *     @type string $label_pass1 	Label for the new password field. Default 'New password'.
 *     @type string $id_pass1 		ID for the new password field. Default 'pass1'.
 *     @type string $label_pass2 	Label for repeat password field. Default 'Repeat new password'.
 *     @type string $id_pass2   	ID for repeat password field. Default 'pass2'.
 *     @type string $label_submit	Label for submit button. Default 'Reset Password'.
 *     @type string $id_submit      ID attribute value for the submit button. Default 'wp-submit'.
 *     @type string $rp_login       Login name for reset password hidden field. Default empty.
 *     @type string $rp_key		 	Reset password key for the hidden field. Default empty.
 *
 * }
 * @return string|void String when retrieving.
 */
function wpv_reset_password_form( $args = array() ) {
	$defaults = array(
		'redirect'			=> ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
		'redirect_fail'		=> ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
		'form_id'			=> 'resetpasswordform',
		'label_pass1'		=> __( 'New password', 'wpv-views' ),
		'id_pass1'			=> 'pass1',
		'label_pass2'		=> __( 'Repeat new password', 'wpv-views' ),
		'id_pass2'			=> 'pass2',
		'label_submit'		=> __( 'Reset Password', 'wpv-views' ),
		'id_submit'			=> 'wp-submit',
		'rp_login'			=> '',
		'rp_key'			=> ''
	);

	/**
	 * Filters the default reset password form output arguments.
	 *
	 * @param array $defaults An array of default login form arguments.
	 */
	$args = wp_parse_args( $args, apply_filters( 'reset_password_form_defaults', $defaults ) );

	/**
	 * Filters content to display at the top of the form.
	 *
	 * The filter evaluates just following the opening form tag element.
	 *
	 * @param string $content Content to display. Default empty.
	 * @param array  $args    Array of form arguments.
	 */
	$form_top = apply_filters( 'reset_password_form_top', '', $args );

	// Add required hidden fields to form top
	$form_top .= '<input type="hidden" id="user_login" name="rp_login" value="' . esc_attr( $args['rp_login'] ) . '" />';
	$form_top .= '<input type="hidden" name="rp_key" value="' . esc_attr( $args['rp_key'] ) . '" autocomplete="off" />';

	/**
	 * Filters content to display in the middle of the form.
	 *
	 * The filter evaluates just before the submit button.
	 *
	 * @param string $content Content to display. Default empty.
	 * @param array  $args    Array of form arguments.
	 */
	$form_middle = apply_filters( 'reset_password_form_middle', '', $args );

	/**
	 * Filters content to display at the bottom of the login form.
	 *
	 * The filter evaluates just preceding the closing form tag element.
	 *
	 * @param string $content Content to display. Default empty.
	 * @param array  $args    Array of form arguments.
	 */
	$form_bottom = apply_filters( 'reset_password_form_bottom', '', $args );

	$form_bottom .= '<input type="hidden" name="wpv_reset_password_form" value="on"/>';

	if ( $args['redirect_fail'] != '' ) {
		$form_bottom .= '<input type="hidden" name="wpv_reset_password_form_redirect_on_fail" value="' . esc_url( $args['redirect_fail'] ) . '" />';
	}

	$form = '
		<form name="' . esc_attr( $args['form_id'] ) . '" id="' . esc_attr( $args['form_id'] ) . '" action="' . site_url( 'wp-login.php?action=resetpass' ) . '" method="post">
			' . $form_top . '
			<p class="reset-pass">
				<label for="' . esc_attr( $args['id_pass1'] ) . '">' . esc_html( $args['label_pass1'] ) . '</label>
				<input type="password" name="' . esc_attr( $args['id_pass1'] ) . '" id="' . esc_attr( $args['id_pass1'] ) . '" class="input" value="" size="20" />
			</p>
			<p class="reset-pass">
				<label for="' . esc_attr( $args['id_pass2'] ) . '">' . esc_html( $args['label_pass2'] ) . '</label>
				<input type="password" name="' . esc_attr( $args['id_pass2'] ) . '" id="' . esc_attr( $args['id_pass2'] ) . '" class="input" value="" size="20" />
			</p>
			
			<p class="description">' . wp_get_password_hint() . '</p>
			' . $form_middle . '
			<p class="login-submit">
				<input type="submit" name="wp-submit" id="' . esc_attr( $args['id_submit'] ) . '" class="button-primary" value="' . esc_attr( $args['label_submit'] ) . '" />
				<input type="hidden" name="redirect_to" value="' . esc_url( $args['redirect'] ) . '" />
			</p>
			' . $form_bottom . '
		</form>';

	return $form;
}

/**
 * wpv_shortcodes_wpv_do_password_reset
 *
 * Performs password reset based on custom reset password form.
 * Also handles errors and redirects accordingly.
 *
 * @since 2.2
 */

add_action( 'login_form_rp', 'wpv_shortcodes_wpv_do_password_reset' );
add_action( 'login_form_resetpass', 'wpv_shortcodes_wpv_do_password_reset' );

function wpv_shortcodes_wpv_do_password_reset() {
	if (
		'POST' == $_SERVER['REQUEST_METHOD']
		&& isset( $_REQUEST['wpv_reset_password_form'] )
		&& 'on' == $_REQUEST['wpv_reset_password_form']
	) {
		$rp_key = isset( $_REQUEST['rp_key'] ) ? $_REQUEST['rp_key'] : '';
		$rp_login = isset( $_REQUEST['rp_login'] ) ? $_REQUEST['rp_login'] : '';
		$pass1 = isset( $_REQUEST['pass1'] ) ? $_REQUEST['pass1'] : '';
		$pass2 = isset( $_REQUEST['pass2'] ) ? $_REQUEST['pass2'] : '';

		$redirect_to = $_REQUEST['redirect_to'];
		$redirect_fail = $_REQUEST['wpv_reset_password_form_redirect_on_fail'];

		$fail_code = '';

		$user = check_password_reset_key( $rp_key, $rp_login );

		if ( ! $user || is_wp_error( $user ) ) {
			if ( $user && $user->get_error_code() ) {
				$fail_code = $user->get_error_code();
			}

			$redirect_fail = add_query_arg(
				array(
					'login' => $rp_login,
					'key' => $rp_key,
					'wpv_error' => $fail_code
				),
				$redirect_fail
			);

			wp_safe_redirect( $redirect_fail );
			exit;
		}

		if ( empty( $pass1 ) || empty( $pass2 ) ) {
			// Password is empty
			$redirect_fail = add_query_arg(
				array(
					'login' => $rp_login,
					'key' => $rp_key,
					'wpv_error' => 'password_reset_empty'
				),
				$redirect_fail
			);

			wp_safe_redirect( $redirect_fail );
			exit;
		}

		if ( !empty( $pass1 ) && !empty( $pass2 ) ) {
			if ( $pass1 != $pass2 ) {
				// Passwords don't match
				$redirect_fail = add_query_arg(
					array(
						'login' => $rp_login,
						'key' => $rp_key,
						'wpv_error' => 'password_reset_mismatch'
					),
					$redirect_fail
				);

				wp_safe_redirect( $redirect_fail );
                exit;
            }

			// Parameter checks OK, reset password
			reset_password( $user, $pass1 );

			$redirect_to = add_query_arg(
				array(
					'password' => 'changed'
				),
				$redirect_to
			);

			wp_safe_redirect( $redirect_to );
			exit;
		}
	}
}

/**
 * wpv_shortcodes_register_wpv_reset_password_form_data
 *
 * Register the wpv-forgot-password-form shortcode in the GUI API.
 *
 * @since 2.2
 */

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_reset_password_form_data' );

function wpv_shortcodes_register_wpv_reset_password_form_data( $views_shortcodes ) {
	$views_shortcodes['wpv-reset-password-form'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_reset_password_form_data'
	);

	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_reset_password_form_data()  {
	$data = array(
		'name' => __( 'Reset Password Form', 'wpv-views' ),
		'label' => __( 'Reset Password Form', 'wpv-views' ),
		'attributes' => array(
			'redirect-options' => array(
				'label' => __('Redirect options', 'wpv-views'),
				'header' => __('Redirect options', 'wpv-views'),
				'fields' => array(
					'redirect_url' => array(
						'label' => __( 'Redirect to this URL on success', 'wpv-views'),
						'type' => 'url',
						'description' => __( 'URL to redirect users after resetting the password. Defaults to the current URL.', 'wpv-views' ),
					),
					'redirect_url_fail' => array(
						'label' => __( 'Redirect to this URL on failure', 'wpv-views'),
						'type' => 'url',
						'description' => __( 'URL to redirect users after failed password reset operation. Defaults to the current URL.', 'wpv-views' ),
					)
				),
			),
		),
	);

	return $data;
}

/**
 * Filter to add error messages on top of the custom forgot/reset password forms.
 *
 * @param $content (string) HTML content.
 * @param $args (array) Default arguments array.
 *
 * @return string
 *
 * @see wpv_forgot_password_form()
 * @see wpv_reset_password_form()
 */

add_filter( 'forgot_password_form_top', 'wpv_resetpass_errors', 30, 2 );
add_filter( 'reset_password_form_top', 'wpv_resetpass_errors', 30, 2 );

function wpv_resetpass_errors ( $content, $args ) {
	$error_code = '';

	if (
		isset( $_REQUEST['wpv_error'] )
		&& $_REQUEST['wpv_error'] != ''
	) {
		$error_string = __( '<strong>ERROR</strong>: ', 'wpv-views' );
		$error_code = $_REQUEST['wpv_error'];

		switch( $error_code ) {
			case 'expiredkey':
			case 'invalidkey':
			case 'invalid_key':
				$error_string .= __( 'Your password reset link appears to be invalid. Please request a new link.', 'wpv-views' );
				break;

			case 'invalid_email':
				$error_string .= __( 'There is no user registered with that email address.', 'wpv-views' );
				break;

			case 'invalidcombo':
				$error_string .= __( 'Invalid username or email.', 'wpv-views' );
				break;

			case 'password_reset_mismatch':
				$error_string .= __( 'Your entered passwords don\'t match.', 'wpv-views' );
				break;

			case 'password_reset_empty':
				$error_string .= __( 'The password field is empty.', 'wpv-views' );
				break;

			case 'empty_username':
				$error_string .= __( 'Enter a username or email address.', 'wpv-views' );
				break;

			default:
				$error_string .= __( 'Unknown error.', 'wpv-views' );
				break;
		}

		$content .= apply_filters( 'wpv_filter_override_auth_errors' , $error_string, 'wp-error', $error_code );
	}

	return $content;
}
////////////////////////// Forgot/Reset Password Flow Ends ///////////////////////////////////

/**
 * Views-Shortcode: wpv-forgot-password-link
 *
 * Description: Display WordPress forgot password link and uses supplied content as a link label.
 * If no label is supplied, it outputs 'Lost password?' as a default label.
 *
 * Parameters:
 *  "redirect_url" URL to redirect to after retrieving the lost password. Absolute URL.
 *  "class" HTML class attribute for generated A tag
 *  "style" HTML style attribute for generated A tag
 *
 * Example usage:
 *  [wpv-forgot-password-link]Forgot password[/wpv-forgot-password-link]
 *  [wpv-forgot-password-link class="my-class" style="text-decoration: none;" redirect_url="http://example.com"]
 *  [wpv-forgot-password-link redirect_url="[wpv-post-url]"]Forgot password?[/wpv-forgot-password-link]
 *
 *
 * Link:
 * @todo: public documentation link?
 * @todo: find a way to allow redirect to external links
 *
 * Note:
 *  https://codex.wordpress.org/Function_Reference/wp_lostpassword_url
 *
 * @since 2.2
 */
function wpv_shortcode_wpv_forgot_password_link( $atts, $content = '' ) {
	global $current_user;

	if((int)$current_user->ID > 0) {
		/* Do not display anything if a user is already logged in */
		return '';
	}

	// Check for current URL, either it's an AJAX request or a non-AJAX request
	$url_request = $_SERVER['REQUEST_URI'];

	if (
		defined( 'DOING_AJAX' )
		&& DOING_AJAX
		&& isset( $_REQUEST['action'] )
		&& (
			$_REQUEST['action'] == 'wpv_get_view_query_results' 
			|| $_REQUEST['action'] == 'wpv_get_archive_query_results'
		)
	) {
		// It's an AJAX request - Views AJAX Pagination or Parametric Search Request
		$current_url = wp_get_referer();
	} else {
		// It's non-AJAX request
		// WordPress gets the current URL this way
		$current_url = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
	}

	extract( shortcode_atts(
			array(
				'redirect_url' => $current_url,
				'class' => '',
				'style' => '',
			), $atts )
	);

	// Get forgot password URL
	$url = wp_lostpassword_url( $redirect_url );

	// Parse the content (if any) for inline short codes
	$outContent = !empty( $content ) ? wpv_do_shortcode( $content ) : '';

	// Assemble the output
	$out = '<a href="' . $url . '"';
	$out .= !empty( $class ) ? ' class="' . esc_attr( $class ) . '"' : '';
	$out .= !empty( $style ) ? ' style="' . esc_attr( $style ) . '"' : '';
	$out .= '>';
	$out .= $outContent;
	$out .= '</a>';

	apply_filters( 'wpv_shortcode_debug', 'wpv-forgot-password-link', json_encode( $atts ), '', '', $out );
	return $out;
}

/**
 * wpv_shortcodes_register_wpv_forgot_password_link_data
 *
 * Register the wpv-forgot-password-link shortcode in the GUI API.
 *
 * @since 2.1
 */

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_forgot_password_link_data' );

function wpv_shortcodes_register_wpv_forgot_password_link_data( $views_shortcodes ) {
	$views_shortcodes['wpv-forgot-password-link'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_forgot_password_link_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_forgot_password_link_data()  {
	$data = array(
		'name' => __( 'Forgot Password Link', 'wpv-views' ),
		'label' => __( 'Forgot Password Link', 'wpv-views' ),
		'attributes' => array(
			'display-options' => array(
				'label' => __( 'Options', 'wpv-views' ),
				'header' => __( 'Options', 'wpv-views' ),
				'fields' => array(
					'redirect_url' => array(
						'label' => __( 'Redirect URL', 'wpv-views' ),
						'type' => 'url',
						'description' => __( 'URL to redirect to after retrieving the lost password. Defaults to the current URL. Redirect is only supported to the URLs within the current blog (or site). Redirection to external URLs (or sites) is not supported.', 'wpv-views' ),
					),
					'class' => array(
						'label' => __( 'Class', 'wpv-views' ),
						'type' => 'text',
						'description' => __( 'Space-separated list of class names that will be added to the anchor HTML tag.', 'wpv-views' ),
						'placeholder' => 'class1 class2',
					),
					'style' => array(
						'label' => __( 'Style', 'wpv-views' ),
						'type' => 'text',
						'description' => __( 'Inline styles that will be added to the anchor HTML tag.', 'wpv-views' ),
						'placeholder' => 'border: 1px solid red; font-size: 2em;',
					),
				),
				'content' => array(
					'label' => __( 'Link label', 'wpv-views' ),
					'description' => __( 'This will be displayed as a text or label for the link.', 'wpv-views' ),
					'default' => __('Lost password?', 'wpv-views'),
				),
			),
		),
	);
	return $data;
}

/**
 * wpv_whitelisted_domains
 *
 * Adds external domains to allowed redirect hosts, for safe redirection.
 * Required for all redirection attributes to work correctly for external domains.
 *
 * @param $content (array)
 * @return mixed
 *
 * @since 2.3
 */
function wpv_whitelisted_domains( $content, $location ) {
	$settings = WPV_Settings::get_instance();

	if ( isset( $settings->wpv_whitelist_domains ) && $settings->wpv_whitelist_domains != '' ) {
		$whitelisted = $settings->wpv_whitelist_domains;

		foreach( $whitelisted as $domain ) {
			// Check for wildcard characters
			// Only * is supported at this time.
			// @todo: Make it more robust by using Regex or probably the more intelligent solution
			$pos = strpos( $domain, '*' );

			if( false !== $pos ) {
				// If wildcard is in the beginning and followed by a . (dot)
				// there may be a chance of following use case:
				// - xyz.com
				// While the same wildcard is true for:
				// - www.xyz.com
				// - subdomain.xyz.com
				// So we need to get rid of the . (dot) in this case (only first dot after the wildcard)
				if ( $pos == 0 ) {
					$domain = substr_replace( $domain, '', $pos + 1, 1 );
				}

				// Create REGEX pattern.
				// 1) . (dot) in domain name should be escaped
				$pattern = str_replace('.', '\.', $domain);
				// 2) * should be tranlated to (.*?)
				$pattern = str_replace('*', '(.*?)', $pattern);

				// Test the pattern on $location
				preg_match('/'.$pattern.'+$/i', $location, $matches);

				if( isset( $matches[0] ) && !empty( $matches[0] ) ) {
					$content[] = $location;
				}
			} else {
				$content[] = $domain;
			}
		}
	}

	return $content;
}
add_filter('allowed_redirect_hosts', 'wpv_whitelisted_domains', 10, 2);

/**
 * Views-Shortcode: wpv-user
 *
 * Description: Display information for user from the user.
 *
 * Parameters:
 * 'field' => field_key

 *
 * Example usage:
 * Current user is [wpv-user name="custom_name"]
 * specified ID [wpv-user name="custom_name" id="1"]
 *
 * Link:
 *
 * Note:
 *
 * @since 2.4.0 Added the option to use [wpv-user field="profile_picture"] to fetch the user profile picture. The "field"
 *              attribute of the shortcode can take several values. If those values match a user column, we get that data.
 *              If not, we default to a usermeta field with that key. The "profile_picture" for the "field" attribute is
 *              neither a user column nor a usermeta field key, so we are reserving this value for a purpose that has no
 *              database match.
 *
 */

function wpv_user( $attr ) {

    $default_size = 96;

	extract(
        $attr = shortcode_atts(
			array(
			    'field' => 'display_name',
			    'id' => '',
                'size' => $default_size,
                'default-url' => '',
                'alt' => false,
                'shape' => 'circle',
			), 
			$attr 
		)
	);
	//Get data for specified ID
	if ( 
		isset( $id ) 
		&& ! empty( $id )
	) {
		if ( is_numeric( $id ) ) {
			$data = get_user_by( 'id', $id );
			if ( $data ) {
				$user_id = $id;
				if ( isset( $data->data ) ) {
					$data = $data->data;
					$meta = get_user_meta( $id );
				} else {
					return;
				}
			} else {
				return;
			}
		} else {
			return;
		}
	} else {
		global $WP_Views;
		if ( 
			isset( $WP_Views->users_data['term']->ID ) 
			&& ! empty( $WP_Views->users_data['term']->ID ) 
		) {
			$user_id = $WP_Views->users_data['term']->ID;
			$data = $WP_Views->users_data['term']->data;
			$meta = $WP_Views->users_data['term']->meta;
		} else {
			global $current_user;
			if ( $current_user->ID > 0 ) {
				$user_id = $current_user->ID;
				$data = new WP_User( $user_id );
				if ( isset( $data->data ) ) {
					$data = $data->data;
					$meta = get_user_meta( $user_id );
				} else {
					return;
				}
			} else {
				return;
			}
		}
	}
	$out = '';
	switch ( $field ) {
		case 'display_name':
			$out = $data->$field;
			break;
        case 'profile_picture':
            $out = wpv_get_avatar( $data->ID, $attr['size'], $attr['default-url'], $attr['alt'], $attr['shape'] );
            break;
		case 'user_login':
			$out = $data->$field;
			break;
		case 'first_name':
		case 'user_firstname':
			if ( isset( $meta['first_name']) ){
				$out = $meta['first_name'][0];
			}
			break;
		case 'last_name':
		case 'user_lastname':
			if ( isset( $meta['last_name']) ){
				$out = $meta['last_name'][0];
			}
			break;
		case 'nickname':
			if ( isset( $meta['nickname']) ){
				$out = $meta['nickname'][0];
			}
			break;
		case 'email':
		case 'user_email':
			$field = 'user_email';
			$out = $data->$field;
			break;
		case 'nicename':
		case 'user_nicename':
			$field = 'user_nicename';
			$out = $data->$field;
			break;
		case 'user_url':
			$out = $data->$field;
			break;
		case 'user_registered':
			$out = $data->$field;
			break;
		case 'user_status':
			$out = $data->$field;
			break;
		case 'spam':
			$out = isset( $data->$field ) ? $data->$field : '';
			break;
		case 'user_id':
		case 'ID':
			$out = $user_id;
			break;
		default:
			if ( isset( $meta[$field] ) ) {
				$out = $meta[$field][0];
			}
			break;
	}
	apply_filters( 'wpv_shortcode_debug','wpv-user', json_encode( $attr ), '', 'Data received from $WP_Views object', $out );
	return $out;
}

/**
* wpv_shortcodes_register_wpv_user_data
*
* Register the wpv-user shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_user_data' );

function wpv_shortcodes_register_wpv_user_data( $views_shortcodes ) {
	$views_shortcodes['wpv-user'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_user_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_user_data( $parameters = array(), $overrides = array() ) {
	
    $data = array(
        'user-selection'	=> true
    );

    $profile_picture_in_parameters = isset( $parameters['attributes'] )
        && isset( $parameters['attributes']['field'] )
        && 'profile_picture' == $parameters['attributes']['field'];

    $profile_picture_in_overrides = isset( $overrides['attributes'] )
        && isset( $overrides['attributes']['field'] )
        && 'profile_picture' == $overrides['attributes']['field'];

    if ( $profile_picture_in_parameters || $profile_picture_in_overrides ) {
        $data['attributes'] = array(
            'display-options' => array(
                'label' => __( 'Display options', 'wpv-views' ),
                'header' => __( 'Display options', 'wpv-views' ),
                'fields' => array(
                    'size' => array(
                        'label' => __( 'Size', 'wpv-views' ),
                        'type' => 'text',
                        'description' => __( 'Size of the profile picture in pixels.', 'wpv-views' ),
                    ),
                    'alt' => array(
                        'label' => __( 'Alternative text', 'wpv-views' ),
                        'type' => 'text',
                        'description' => __( 'Alternative text for the profile picture.', 'wpv-views' ),
                    ),
                    'shape' => array(
                        'label' => __( 'Shape', 'wpv-views'),
                        'type' => 'select',
                        'options' => array(
                            'circle' => __( 'Circle', 'wpv-views' ),
                            'square' => __( 'Square', 'wpv-views' ),
                            'custom' => __( 'Custom', 'wpv-views' ),
                        ),
                        'default' => 'circle',
                        'description' => __( 'Display the profile picture in this shape. For "custom" shape, custom CSS is needed for "wpv-profile-picture-shape-custom" CSS class.', 'wpv-views' ),
                    ),
                    'default-url' => array(
                        'label' => __( 'Default URL', 'wpv-views' ),
                        'type' => 'text',
                        'description' => __( 'Default url for an image. Leave blank for the "Mystery Man".', 'wpv-views' )
                    ),
                ),
            ),
        );
    }
	
	$dialog_label = __( 'User data', 'wpv-views' );
	$dialog_target = false;
	
	if ( isset( $parameters['attributes']['field'] ) ) {
		$dialog_target = $parameters['attributes']['field'];
	}
	if ( isset( $overrides['attributes']['field'] ) ) {
		$dialog_target = $overrides['attributes']['field'];
	}
	
	if ( $dialog_target ) {
		$dialog_label = wpv_shortcodes_get_wpv_user_data_title( $dialog_target );
	}
	
	$data['name'] 	= $dialog_label;
	$data['label']	= $dialog_label;
	
    return $data;
}

function wpv_shortcodes_get_wpv_user_data_title( $field ) {
	
	$title = __( 'User data', 'wpv-views' );
	
	switch ( $field ) {
		case 'ID':
			$title = __( 'User ID', 'wpv-views' );
			break;
		case 'user_email':
			$title = __( 'User Email', 'wpv-views' );
			break;
		case 'user_login':
			$title = __( 'User Login', 'wpv-views' );
			break;
		case 'user_firstname':
			$title = __( 'First Name', 'wpv-views' );
			break;
		case 'user_lastname':
			$title = __( 'Last Name', 'wpv-views' );
			break;
		case 'nickname':
			$title = __( 'Nickname', 'wpv-views' );
			break;
		case 'display_name':
			$title = __( 'Display Name', 'wpv-views' );
			break;
        case 'profile_picture':
            $title = __( 'Profile Picture', 'wpv-views' );
            break;
		case 'user_nicename':
			$title = __( 'Nicename', 'wpv-views' );
			break;
		case 'description':
			$title = __( 'Description', 'wpv-views' );
			break;
		case 'yim':
			$title = __( 'Yahoo IM', 'wpv-views' );
			break;
		case 'jabber':
			$title = __( 'Jabber', 'wpv-views' );
			break;
		case 'aim':
			$title = __( 'AIM', 'wpv-views' );
			break;
		case 'user_url':
			$title = __( 'User URL', 'wpv-views' );
			break;
		case 'user_registered':
			$title = __( 'Registration Date', 'wpv-views' );
			break;
		case 'user_status':
			$title = __( 'User Status', 'wpv-views' );
			break;
		case 'spam':
			$title = __( 'User Spam Status', 'wpv-views' );
			break;
	}
	
	return $title;
	
}

/**
 * Views-Shortcode: wpv-post-id
 *
 * Description: Display the current post's ID
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * ID is [wpv-post-id]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_post_id($atts){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);

	extract(
		shortcode_atts( array(), $atts )
	);
	$out = '';

	global $post;

	if(!empty($post)){
		$out .= $post->ID;
	}
	apply_filters('wpv_shortcode_debug','wpv-post-id', json_encode($atts), '', 'Data received from cache', $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_id_data
*
* Register the wpv-post-id shortcode in the GUI API.
*
* @since 1.9
*/


add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_id_data' );

function wpv_shortcodes_register_wpv_post_id_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-id'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_id_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_id_data() {
    $data = array(
        'name' => __( 'Post ID', 'wpv-views' ),
        'label' => __( 'Post ID', 'wpv-views' ),
        'post-selection' => true,
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-post-slug
 *
 * Description: Display the current post's slug
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * The slug is [wpv-post-slug]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_post_slug($atts){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);

	extract(
		shortcode_atts( array(), $atts )
	);
	$out = '';

	global $post;

	if(!empty($post)){
		$out .= $post->post_name;
	}
	apply_filters('wpv_shortcode_debug','wpv-post-slug', json_encode($atts), '', 'Data received from cache', $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_slug_data
*
* Register the wpv-post-slug shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_slug_data' );

function wpv_shortcodes_register_wpv_post_slug_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-slug'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_slug_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_slug_data() {
    $data = array(
        'name' => __( 'Post slug', 'wpv-views' ),
        'label' => __( 'Post slug', 'wpv-views' ),
        'post-selection' => true,
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-post-title
 *
 * Description: Display the current post's title
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * You are reading [wpv-post-title]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_post_title($atts){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);

	extract(
		shortcode_atts( array(
			'output' => 'raw'
		), $atts )
	);

	$out = '';

	global $post;

	if(!empty($post)){

		$out .= apply_filters('the_title', $post->post_title);
	}

	// If output="sanitize" then strip tags, escape attributes and replace brackets
	if ( $output == 'sanitize' ) {
		$out = sanitize_text_field( $out );
	//	$out = esc_attr( strip_tags( $out ) );
		$brackets_before = array( '[', ']', '<', '>' );
		$brackets_after = array( '&#91;', '&#93;', '&lt;', '&gt;' );
		$out = str_replace( $brackets_before, $brackets_after, $out );
	}

	apply_filters('wpv_shortcode_debug','wpv-post-title', json_encode($atts), '', 'Data received from cache', $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_title_data
*
* Register the wpv-post-title shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_title_data' );

function wpv_shortcodes_register_wpv_post_title_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-title'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_title_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_title_data() {
    $data = array(
        'name' => __( 'Post title', 'wpv-views' ),
        'label' => __( 'Post title', 'wpv-views' ),
        'post-selection' => true,
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'output' => array(
                        'label' => __( 'Output format', 'wpv-views'),
                        'type' => 'radio',
                        'options' => array(
                            'raw' => __('As stored in the database', 'wpv-views'),
                            'sanitize' => __('Sanitize', 'wpv-views'),
                        ),
                        'default' => 'raw',
						'description' => __('Output the post title as is or sanitize it to use as an HTML attribute.','wpv-views'),
                    ),
                ),
            ),
        ),
    );
    return $data;
}


/**
 * Views-Shortcode: wpv-post-link
 *
 * Description: Display the current post's title as a link to the post
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * Permalink to [wpv-post-link]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_post_link($atts){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);

	extract(
		shortcode_atts( array(
            'style' => '',
            'class' => ''
            ), $atts )
	);

	$out = '';

	global $post;

	if(!empty($post)){

		$post_id = $post->ID;
		// Adjust for WPML support
		// If WPML is enabled, $post_id should contain the right ID for the current post in the current language
		// However, if using the id attribute, we might need to adjust it to the translated post for the given ID
		$post_id = apply_filters( 'translate_object_id', $post_id, $post->post_type, true, null );

		$post_link = wpv_get_post_permalink( $post_id );

        if ( ! empty( $style ) ) {
            $style = ' style="'. esc_attr( $style ) .'"';
        }
        if ( ! empty( $class ) ) {
            $class = ' class="' . esc_attr( $class ) .'"';
        }

		$out .= '<a href="' . $post_link . '"'. $class . $style .'>';
		$out .= apply_filters('the_title', $post->post_title);
		$out .= '</a>';
		apply_filters('wpv_shortcode_debug','wpv-post-link', json_encode($atts), '', 'Filter the_title applied', $out);

	}


	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_link_data
*
* Register the wpv-post-link shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_link_data' );

function wpv_shortcodes_register_wpv_post_link_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-link'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_link_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_link_data() {
    $data = array(
        'name' => __( 'Post link', 'wpv-views' ),
        'label' => __( 'Post link', 'wpv-views' ),
        'post-selection' => true,
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
					'class' => array(
                        'label' => __( 'Class', 'wpv-views'),
                        'type' => 'text',
                        'description' => __( 'Space-separated list of classnames that will be added to the anchor HTML tag.', 'wpv-views' ),
                        'placeholder' => 'class1 class2',
                    ),
					'style' => array(
                        'label' => __( 'Style', 'wpv-views'),
                        'type' => 'text',
						'description' => __( 'Inline styles that will be added to the anchor HTML tag.', 'wpv-views' ),
                        'placeholder' => 'border: 1px solid red; font-size: 2em;',
                    ),
                ),
            ),
        ),
    );
    return $data;
}


/**
 * Get permalink for given post with respect to it's status.
 *
 * Appends "preview=true" argument to the permalink for drafts and pending posts. In all other aspects it behaves
 * exactly like get_permalink().
 *
 * @since 1.7
 *
 * @see http://codex.wordpress.org/Function_Reference/get_permalink
 * @see https://icanlocalize.basecamphq.com/projects/7393061-toolset/todo_items/190442712/comments#comment_296475746
 *
 * @todo Add support for custom post types.
 *
 * @param int $post_id ID of an existing post.
 *
 * @return The permalink URL or false on failure.
 */
function wpv_get_post_permalink( $post_id ) {

	$post_link = get_permalink( $post_id );
	if( false == $post_link ) {
		return false;
	}

	$post_status = get_post_status( $post_id );

	switch( $post_status ) {

		case 'draft':
		case 'pending':
			// append preview=true argument to permalink
			$post_link = esc_url( add_query_arg( array( 'preview' => 'true' ), $post_link ) );
			break;

		default: // also when get_post_status fails and returns false, which should never happen
			// do nothing
			break;
	}

	return $post_link;
}


/**
 * Views-Shortcode: wpv-post-body
 *
 * Description: Display the content of the current post
 *
 * Parameters:
 * 'view_template' => The name of a Content template to use when displaying the post content.
 * 'suppress_filters' => Returns the post body with just the natural WordPress filters applied
 * 'output' => [ normal | raw | inherit ] The format of the output when view_template="None": with wpautop, without wpautop or inherited from the parent Template when aplicable
 *
 * Example usage:
 * [wpv-post-body view_template="None"]
 *
 * Link:
 *
 * Note:
 *
 */
function wpv_shortcode_wpv_post_body($atts){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);

	extract(
		shortcode_atts( array(
			'view_template' => 'None',
			'output' => 'normal'
		), $atts )
	);
	$old_override = null;
	$out = '';
	global $post;

	if (
		! is_object( $post )
		|| empty( $post )
	) {
		return $out;
	}

	if ( post_password_required( $post ) ) {
		$post_protected_password_form = get_the_password_form( $post );

		/**
		* Filter wpv_filter_post_protected_body
		*
		* @param (string) $post_protected_password_form The default WordPress password form
		* @param (object) $post The post object to which this shortcode is related to
		* @param (array) $atts The array of attributes passed to this shortcode
		*
		* @return (string)
		*
		* @since 1.7.0
		*/

		return apply_filters( 'wpv_filter_post_protected_body', $post_protected_password_form, $post, $atts );
	}

	do_action( 'wpv_before_shortcode_post_body' );


	global $WP_Views, $WPV_templates, $WPVDebug;

	if ( 
		isset( $atts['suppress_filters'] ) 
		&& $atts['suppress_filters'] == 'true' 
	) {
		$suppress_filters = true;
	} else {
		$suppress_filters = false;
	}

	$id = '';

	if (isset($atts['view_template'])) {
		if (isset($post->view_template_override) && $post->view_template_override != '') {
			$old_override = $post->view_template_override;
		}
		$post->view_template_override = $atts['view_template'];
		$id = $post->view_template_override;
	}
	if ( strtolower( $id ) == 'none' ) {
		$ct_id = $id;
		$output_mode = $output;
	} else {
		$ct_id = $WPV_templates->get_template_id( $id );
		$output_mode = 'normal';
	}
	
	// If the view_template value is not "None" and does not match a Content Template, restore and return
	// Remember that we must support no view_template attribute too! Backwards compatibility.
	if ( 
		$id != '' 
		&& $ct_id === 0 
	) {
		if ( isset( $post->view_template_override ) ) {
			if ( $old_override ) {
				$post->view_template_override = $old_override;
			} else {
				unset( $post->view_template_override );
			}
		}

		do_action( 'wpv_after_shortcode_post_body' );
		return;
	}
	
	static $stop_infinite_loop_keys;
	
	$view_settings = apply_filters( 'wpv_filter_wpv_get_view_settings', array() );
	$current_item_type = apply_filters( 'wpv_filter_wpv_get_query_type', 'posts' );
	$current_stop_infinite_loop_key = $current_item_type . '-';
	
	$WPVDebug->wpv_debug_start( $ct_id, $atts, 'content-template' );
	$WPVDebug->set_index();
	if ( $WPVDebug->user_can_debug() ) {
		switch( $current_item_type ) {
			case 'posts':
				$WPVDebug->add_log( 'content-template', $post );
				break;
			case 'taxonomy':
				$WPVDebug->add_log( 'content-template', $WP_Views->taxonomy_data['term'] );
				break;
			case 'users':
				$WPVDebug->add_log( 'content-template', $WP_Views->users_data['term'] );
				break;
		}
	}
	if ( !empty( $post ) && isset( $post->post_type ) && $post->post_type != 'view' && $post->post_type != 'view-template' ) {

		// Set the output mode for this shortcode (based on the "output" attribute if the "view_template" attribute is set to None, the selected Template output mode will override this otherwise)
		// normal (default) - restore wpautop, only needed if has been previously removed
		// raw - remove wpautop and set the $wpautop_was_active to true
		// inherit - when used inside a Content Template, inherit its wpautop setting; when used outside a Template, inherit from the post itself (so add format, just like "normal")
		// NOTE BUG: we need to first remove_wpautop because for some reason not doing so switches the global $post to the top_current_page one
		$wpautop_was_removed = $WPV_templates->is_wpautop_removed();
		$wpautop_was_active = false;
		$WPV_templates->remove_wpautop();

		if ( $wpautop_was_removed ) { // if we had disabled wpautop, we only need to enable it again for mode "normal" in view_template="None" (will be overriden by Template settings if needed)
			if ( $output_mode == 'normal' ) {
				$WPV_templates->restore_wpautop('');
			}
		} else { // if wpautop was not disabled, we need to revert its state, but just for modes "normal" and "inherit"; we will enable it globally again after the main procedure
			$wpautop_was_active = true;
			if ( $output_mode == 'normal' || $output_mode == 'inherit' ) {
				$WPV_templates->restore_wpautop('');
			}
		}

		// Remove the icl language switcher to stop WPML from add the
		// "This post is avaiable in XXXX" twice.
		// Before WPML 3.6.0
		add_filter( 'icl_post_alternative_languages', '__return_empty_string', 999 );
		// After WPML 3.6.0
		add_filter( 'wpml_ls_post_alternative_languages', '__return_empty_string', 999 );

		// Check for infinite loops where a View template contains a
		// wpv-post-body shortcode without a View template specified
		// or a View template refers to itself directly or indirectly.
		switch( $current_item_type ) {
			case 'posts':
				$current_stop_infinite_loop_key .= (string) $post->ID . '-';
				break;
			case 'taxonomy':
				$current_stop_infinite_loop_key .= (string) $WP_Views->taxonomy_data['term']->term_id . '-';
				break;
			case 'users':
				$current_stop_infinite_loop_key .= (string) $WP_Views->users_data['term']->ID . '-';
				break;
		}
		if ( isset( $post->view_template_override ) ) {
			$current_stop_infinite_loop_key .= $post->view_template_override;
		} else {
			// This only hapens in the unsupported scenario of no view_template attribute
			$current_stop_infinite_loop_key .= '##no#view_template#attribute##';
		}
		
		if ( ! isset( $stop_infinite_loop_keys[ $current_stop_infinite_loop_key ] ) ) {
			
			/**
			 * Prevent infinite loops: check the looped object ID and view_template_override
			 * which is based on the view_template attribute 
			 * so we can not pass the same object and same CT/None more than once.
			 */
			$stop_infinite_loop_keys[ $current_stop_infinite_loop_key ] = 1;

			if ( $suppress_filters ) {

				/**
				* wpv_filter_wpv_the_content_suppressed
				*
				* Mimics the the_content filter on wpv-post-body shortcodes with attribute suppress_filters="true"
				* Check WPV_template::init()
				*
				* Since 1.8.0
				*/

				$out .= apply_filters( 'wpv_filter_wpv_the_content_suppressed', $post->post_content );

			} else {
				$filter_state = new WPV_WP_filter_state( 'the_content' );
				$out .= apply_filters('the_content', $post->post_content);
				$filter_state->restore( );
			}

			unset( $stop_infinite_loop_keys[ $current_stop_infinite_loop_key ] );
			
		} else {
			
			/**
			 * We are inside an infinite loop: 
			 * break early and add a debug message. 
			 * add some backtrace to the console log.
			 *
			 * Note that we do not return the native post contnt either.
			 */
			 
			if ( current_user_can( 'manage_options' ) ) {
			 
				$infinite_loop_debug = '';
				$infinite_loop_debug .= '<p style="font-weight:bold !important;color: red !important;">'
					. __( 'Content not displayed because it produces an infinite loop.', 'wpv-views' )
					. '<br />';
				
				$infinite_loop_debug .= isset( $atts['view_template'] ) ? 
					sprintf(
						__( 'The wpv-post-body shortcode was called more than once with the attribute view_template="%1$s" over the post "%2$s", triggering an infinite loop.', 'wpv-views' ),
						$atts['view_template'],
						$post->post_title
					) : 
					sprintf(
						__( 'The wpv-post-body shortcode was called more than once over the post "%1$s" and without a \'view_template\' attribute, triggering an infinite loop.', 'wpv-views' ),
						$post->post_title
					);
				
				$infinite_loop_debug .= '</p>';
				
				$out .= $infinite_loop_debug;
				
			}
			
		}
		
		// Before WPML 3.6.0
		remove_filter( 'icl_post_alternative_languages', '__return_empty_string', 999 );
		// After WPML 3.6.0
		remove_filter( 'wpml_ls_post_alternative_languages', '__return_empty_string', 999 );

		// Restore the wpautop configuration only if is has been changed
		if ( $wpautop_was_removed ) {
			$WPV_templates->remove_wpautop();
		} else if ( $wpautop_was_active ) {
			$WPV_templates->restore_wpautop('');
		}
	}

	if (isset($post->view_template_override)) {
		if ($old_override) {
			$post->view_template_override = $old_override;
		} else {
			unset($post->view_template_override);
		}
	}

	$WPVDebug->add_log_item( 'output', $out );
	$WPVDebug->wpv_debug_end();
	apply_filters('wpv_shortcode_debug','wpv-post-body', json_encode($atts), '', 'Output shown in the Nested elements section');

	do_action( 'wpv_after_shortcode_post_body' );
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_body_data
*
* Register the wpv-post-body shortcode in the GUI API.
*
* @since 1.9
*/
add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_body_data' );

function wpv_shortcodes_register_wpv_post_body_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-body'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_body_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_body_data() {
	global $wpdb, $sitepress;
	$values_to_prepare = array();
	$wpml_join = $wpml_where = "";
	if (
		isset( $sitepress ) 
		&& function_exists( 'icl_object_id' )
	) {
		$content_templates_translatable = $sitepress->is_translated_post_type( 'view-template' );
		if ( $content_templates_translatable ) {
			$wpml_current_language = $sitepress->get_current_language();
			$wpml_join = " JOIN {$wpdb->prefix}icl_translations t ";
			$wpml_where = " AND p.ID = t.element_id AND t.language_code = %s ";
			$values_to_prepare[] = $wpml_current_language;
		}
	}
	
	$exclude_loop_templates = '';
	$exclude_loop_templates_ids = wpv_get_loop_content_template_ids();
	// Be sure not to include the current CT when editing one
	if ( isset( $_REQUEST['wpv_suggest_wpv_post_body_view_template_exclude'] ) ) {
		$requested_ex_ids = $_REQUEST['wpv_suggest_wpv_post_body_view_template_exclude'];

		// Refactored to accept an array of excluded content template IDs
		if( is_array( $requested_ex_ids ) ) {
			$exclude_loop_templates_ids = array_merge($exclude_loop_templates_ids, $requested_ex_ids);
		} else {
			// @todo: Left for any backward compatibility
			$exclude_loop_templates_ids[] = $_REQUEST['wpv_suggest_wpv_post_body_view_template_exclude'];
		}
	}
	if (
		isset( $_GET['page'] )
		&& 'ct-editor' == $_GET['page'] 
		&& isset( $_GET['ct_id'] )
	) {
		$exclude_loop_templates_ids[] = $_GET['ct_id'];
	}
	if ( count( $exclude_loop_templates_ids ) > 0 ) {
		$exclude_loop_templates_ids_sanitized = array_map( 'esc_attr', $exclude_loop_templates_ids );
		$exclude_loop_templates_ids_sanitized = array_map( 'trim', $exclude_loop_templates_ids_sanitized );
		// is_numeric + intval does sanitization
		$exclude_loop_templates_ids_sanitized = array_filter( $exclude_loop_templates_ids_sanitized, 'is_numeric' );
		$exclude_loop_templates_ids_sanitized = array_map( 'intval', $exclude_loop_templates_ids_sanitized );
		if ( count( $exclude_loop_templates_ids_sanitized ) > 0 ) {
			$exclude_loop_templates = " AND p.ID NOT IN ('" . implode( "','" , $exclude_loop_templates_ids_sanitized ) . "') ";
		}
	}
	$values_to_prepare[] = 'view-template';
	$view_tempates_available = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT p.ID, p.post_name, p.post_title 
			FROM {$wpdb->posts} p {$wpml_join} 
			WHERE p.post_status = 'publish' 
			{$wpml_where} 
			AND p.post_type = %s 
			{$exclude_loop_templates}
			ORDER BY p.post_title 
			LIMIT 16",
			$values_to_prepare
		)
	);
	if ( count( $view_tempates_available ) > 15 ) {
		$custom_combo_settings = array(
			'label' => __('Display using a Content Template:', 'wpv-views'),
			'type' => 'suggest',
			'action' => 'wpv_suggest_wpv_post_body_view_template',
			'required' => true,
			'placeholder' => __( 'Start typing', 'wpv-views' ),
		);
	} else {
		$options = array(
			'' => __( 'Select one Content Template', 'wpv-views' )
		);
		foreach ( $view_tempates_available as $row ) {
			$options[esc_js($row->post_name)] = esc_html( $row->post_title );
		}
		$custom_combo_settings = array(
			'label' => __('Display using a Content Template:', 'wpv-views'),
			'type' => 'select',
			'options' => $options,
			'default' => '',
			'required' => true,
		);
	}
    $data = array(
        'name' => __( 'Post body', 'wpv-views' ),
        'label' => __( 'Post body', 'wpv-views' ),
        'post-selection' => true,
        'attributes' => array(
			'info'				=> array(
				'label'			=> __( 'Info', 'wpv-views' ),
				'header'		=> __( 'Information', 'wpv-views' ),
				'fields'		=> array(
					'information'	=> array(
						'type'		=> 'info',
						'content'	=> __( 'This field will display the <em>body</em> (main content) of the page.', 'wpv-views' )
					)
				),
			),
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'view_template' => array(
                        'label' => __( 'Content Template to apply', 'wpv-views'),
                        'type' => 'radio',
                        'options' => array(
                            'None' => __( 'No Content Template (display the "body" of the post)', 'wpv-views'),
                            'custom-combo' => $custom_combo_settings,
                        ),
                        'description' => __( 'Select a Content Template to display its content, referred to the current post.', 'wpv-views' ),
                        'default_force' => 'None',
                    ),
                    'suppress_filters' => array(
                        'label'		=> __( 'Third-party filters ', 'wpv-views'),
                        'type'		=> 'radio',
                        'options'	=> array(
                            'true'	=> __( 'Suppress third party filters', 'wpv-views' ),
                            'false'	=> __( 'Keep third party filters', 'wpv-views' ),
                        ),
                        'default'	=> 'false',
						'description' => __( 'Avoid applying third-party filters into the output.', 'wpv-views' )
                    ),
					/*
                    'output' => array(
                        'label' => __( 'Output', 'wpv-views'),
                        'type' => 'radio',
                        'options' => array(
                            'normal' => __('normal', 'wpv-views'),
                            'raw' => __('raw', 'wpv-views'),
                            'inherit' => __('inherit', 'wpv-views'),
                        ),
                        'default' => 'normal',
                    ),
					*/
                ),
            ),
        ),
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-post-excerpt
 *
 * Description: Display the excerpt of the current post
 *
 * Parameters:
 * length => the length of the excerpt in chars or words. Default is 252 chars or the excerpt_length defined by the theme. Prior to 1.5.1 this attribute was not applied to manual excerpts.
 * count => [ char | word ] the method used to count the excerpt.  Default is char. Prior to 1.5.1 char was the only option.
 * more => the string to be added to the excerpt if it needs to be trimmed. Default is ' ...' or the excerpt_more defined by the theme. Prior to 1.5.1 the more string was not applied to manual excerpts.
 * format => [ autop | noautop ] whether the output should be wpautop'ed or not
 *
 * Example usage:
 * [wpv-post-excerpt length="150"]
 *
 * Link:
 *
 * Note:
 * If manual excerpt is set then length parameter is ignored - full manual excerpt is displayed
 *
 */

function wpv_shortcode_wpv_post_excerpt( $atts ) {
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id( $atts );
	
	// Store the current post ID to avoid infinite loops
	static $wpv_post_excerpt_infinite_loop_keys;

	extract(
		shortcode_atts( 
			array(
			'length'	=> 0,
			'count'		=> 'char',
			'more'		=> null,
			'format'	=> 'autop',
			'output'    => 'formatted'
			), 
			$atts 
		)
	);
	$out = $debug = '';

	global $post;

	if ( post_password_required( $post ) ) {

		/**
		* Filter wpv_filter_post_protected_excerpt
		*
		* @param (string) The default WordPress string returned when displaying the excerpt of a password protected post
		* @param (object) $post The post object to which this shortcode is related to
		* @param (array) $atts The array of attributes passed to this shortcode
		*
		* @return (string)
		*
		* @since 1.7.0
		*/

		return apply_filters( 'wpv_filter_post_protected_excerpt', __( 'There is no excerpt because this is a protected post.', 'wpv-views' ), $post, $atts );
	}

	global $WPV_templates;

	if (
		! empty( $post ) 
		&& $post->post_type != 'view' 
		&& $post->post_type != 'view-template'
	) {
		
		// Clone the current global $post as wpv_do_shortcode might modify it
		// For example, an excerpt contining a CRED form hijacks the current global $post
		$post_clone = $post;
		
		if ( isset( $wpv_post_excerpt_infinite_loop_keys[ $post_clone->ID ] ) ) {
			return '';
		}
		
		$wpv_post_excerpt_infinite_loop_keys[ $post_clone->ID ] = true;

		$out_array = array( 'out' => '', 'debug' => '' );

		if ( $output == 'formatted' ) {
			$out_array = wpv_shortcode_wpv_post_excerpt_formatted( $post_clone, $length, $count, $more, $format );
		} else {
			$out_array = wpv_shortcode_wpv_post_excerpt_raw( $post_clone );
		}

		extract( $out_array );
		
		unset( $wpv_post_excerpt_infinite_loop_keys[ $post_clone->ID ] );
		
		// Restore the current global $post
		$post = $post_clone;
	}
	
	apply_filters( 'wpv_shortcode_debug','wpv-post-excerpt', json_encode( $atts ), '', 'Filter the_excerpt applied.' . $debug, $out );

	return $out;
}

/**
 * wpv_shortcode_wpv_post_excerpt_formatted
 *
 * Prepare the formatted post excerpt.
 *
 * @param object    $post_clone     The current post
 * @param int       $length         The shortcode argument value for the 'length' argument of the wpv_post_excerpt shortcode
 * @param string    $count          The shortcode argument value for the 'count' {char|word} argument of the wpv_post_excerpt shortcode
 * @param string    $more           The shortcode argument value for the 'more' argument of the wpv_post_excerpt shortcode
 * @param string    $format         The shortcode argument value for the 'format' argument of the wpv_post_excerpt shortcode
 *
 * @return string The formatted post excerpt
 *
 * @since 2.3.0
 */
function wpv_shortcode_wpv_post_excerpt_formatted( $post_clone, $length, $count, $more, $format ) {
	global $WPV_templates;

	$debug = $out = '';

	// verify if displaying the real excerpt field or part of the content one
	$display_real_excerpt = false;
	$excerpt = $post_clone->post_content;

	if ( ! empty( $post_clone->post_excerpt ) ) {
		// real excerpt content available
		$display_real_excerpt = true;
		$excerpt              = $post_clone->post_excerpt;
	}
	$excerpt = str_replace( ']]>', ']]&gt;', $excerpt );

	if ( $length > 0 ) {
		$excerpt_length = $length;
	} else if( $display_real_excerpt ) {
		$excerpt_length = strlen( $excerpt ); // don't cut manually inserted excerpts if there is no length attribute
	} else {
		$excerpt_length = apply_filters( 'excerpt_length', 252 ); // on automatically created excerpts, apply the core excerpt_length filter
	}

	$excerpt_more = ! is_null( $more )
		? $more
		: apply_filters( 'excerpt_more', ' ' . '...' ); // when no more attribute is used, apply the core excerpt_more filter; it will only be used if the excerpt needs to be trimmed

	/**
	 * Filter wpv_filter_post_excerpt
	 *
	 * This filter lets you modify the string that will generate the excerpt before it's passed through wpv_do_shortcode() and before the length attribute is applied
	 * This way you can parse and delete specific shortcodes from the excerpt, like the [caption] one
	 *
	 * @param $excerpt the string we will generate the excerpt from (the real $post_clone->excerpt or the $post_clone->content) before stretching and parsing the inner shortcodes
	 *
	 * @return $excerpt
	 *
	 * @since 1.5.1
	 */
	$excerpt = apply_filters( 'wpv_filter_post_excerpt', $excerpt );

	if ( strpos( $excerpt, '[wpv-post-excerpt' ) !== false ) {
		$debug .= ' Infinite loop prevented.';
	}

	// evaluate shortcodes before truncating tags
	$excerpt = wpv_do_shortcode( $excerpt );
	if ( $count == 'word' ) {
		$excerpt = wp_trim_words( $excerpt, $excerpt_length, $excerpt_more );
	} else {
		$excerpt = wp_html_excerpt( $excerpt, $excerpt_length, $excerpt_more );
	}

	$wpautop_was_removed = $WPV_templates->is_wpautop_removed();
	if (
		$wpautop_was_removed
		&& $format == 'autop'
	) {
		$WPV_templates->restore_wpautop( '' );
	} else if ( $format == 'noautop' ) {
		$WPV_templates->remove_wpautop();
	}

	// Remove the Content template excerpt filter. We don't want it applied to this shortcode
	remove_filter( 'the_excerpt', array( $WPV_templates, 'the_excerpt_for_archives' ), 1, 1 );

	$out .= apply_filters( 'the_excerpt', $excerpt );

	// restore filter
	add_filter( 'the_excerpt', array( $WPV_templates, 'the_excerpt_for_archives' ), 1, 1 );

	if (
		$wpautop_was_removed
		&& $format == 'autop'
	) {
		$WPV_templates->remove_wpautop();
		$debug .= ' Show RAW data.';
	} else if ( $format == 'noautop' ) {
		$WPV_templates->restore_wpautop( '' );
	}

	return array( 'out' => $out, 'debug' => $debug );
}

/**
 * wpv_shortcode_wpv_post_excerpt_raw
 *
 * Prepare the raw post excerpt.
 *
 * @param object    $post_clone Current post instance
 *
 * @return string   The raw post excerpt
 *
 * @since 2.3.0
 */
function wpv_shortcode_wpv_post_excerpt_raw ( $post_clone ) {
	global $WPV_templates;

	$debug = $out = '';

	$excerpt = $post_clone->post_excerpt;

	$excerpt = str_replace( ']]>', ']]&gt;', $excerpt );

	/**
	 * Filter wpv_filter_post_excerpt
	 *
	 * This filter lets you modify the string that will generate the excerpt before it's passed through wpv_do_shortcode() and before the length attribute is applied
	 * This way you can parse and delete specific shortcodes from the excerpt, like the [caption] one
	 *
	 * @param $excerpt the string we will generate the excerpt from (the real $post_clone->excerpt or the $post_clone->content) before stretching and parsing the inner shortcodes
	 *
	 * @return $excerpt
	 *
	 * @since 1.5.1
	 */
	$excerpt = apply_filters( 'wpv_filter_post_excerpt', $excerpt );

	if ( strpos( $excerpt, '[wpv-post-excerpt' ) !== false ) {
		$debug .= ' Infinite loop prevented.';
	}

	// evaluate shortcodes before truncating tags
	$excerpt = wpv_do_shortcode( $excerpt );

	// Remove the Content template excerpt filter. We don't want it applied to this shortcode
	remove_filter( 'the_excerpt', array( $WPV_templates, 'the_excerpt_for_archives' ), 1, 1 );

	$out = apply_filters( 'the_excerpt', $excerpt );

	// restore filter
	add_filter( 'the_excerpt', array( $WPV_templates, 'the_excerpt_for_archives' ), 1, 1 );

	return array( 'out' => $out, 'debug' => $debug );
}

/**
* wpv_shortcodes_register_wpv_post_excerpt_data
*
* Register the wpv-post-excerpt shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_excerpt_data' );

function wpv_shortcodes_register_wpv_post_excerpt_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-excerpt'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_excerpt_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_excerpt_data() {
    $data = array(
        'name'				=> __( 'Post excerpt', 'wpv-views' ),
        'label'				=> __( 'Post excerpt', 'wpv-views' ),
        'post-selection'	=> true,
        'attributes'		=> array(
            'display-options' => array(
                'label'		=> __('Display options', 'wpv-views'),
                'header'	=> __('Display options', 'wpv-views'),
                'fields'	=> array(
	                'output'	=> array(
		                'label'			=> __( 'Display', 'wpv-views'),
		                'type'			=> 'radio',
		                'options'		=> array(
			                'formatted'	=> __('Formatted based on the options below', 'wpv-views'),
			                'raw'	    => __('As stored in database', 'wpv-views'),
		                ),
		                'default'		=> 'formatted',
	                ),
					'length_combo'	=> array(
						'label'		=> __( 'Excerpt length', 'wpv-views' ),
						'type'		=> 'grouped',
						'fields'	=> array(
							'length'	=> array(
								'pseudolabel'	=> __( 'Length count', 'wpv-views'),
								'type'			=> 'number',
								'default'		=> '',
								'description'	=> __('This will shorten the excerpt to a specific length. Leave blank for default.', 'wpv-views'),
								'placeholder'	=> __('Enter the excerpt length.', 'wpv-views'),
							),
							'count'		=> array(
								'pseudolabel'	=> __( 'Count length by', 'wpv-views'),
								'type'			=> 'radio',
								'options'		=> array(
									'char'		=> __('Characters', 'wpv-views'),
									'word'		=> __('Words', 'wpv-views'),
								),
								'default'		=> 'char',
								'description'	=> __('You can create an excerpt based on the number of words or characters.', 'wpv-views'),
							),
						)
					),
                    'more'		=> array(
                        'label'			=> __( 'Ellipsis text', 'wpv-views'),
                        'type'			=> 'text',
						'description'	=> __('This will be added after the excerpt, as an invitation to keep reading.', 'wpv-views'),
                        'placeholder'	=> __('Read more...', 'wpv-views'),
                    ),
					'format'	=> array(
						'label'			=> __( 'Formatting', 'wpv-views' ),
						'type'			=> 'radio',
						'options' 		=> array(
                            'autop'		=> __('Wrap the excerpt in a paragraph', 'wpv-views'),
                            'noautop'	=> __('Do not wrap the excerpt in a paragraph', 'wpv-views'),
                        ),
						'default'		=> 'autop',
						'description'	=> __( 'Whether the excerpt should be wrapped in paragraph tags.', 'wpv-views' ),
					)
                ),
            ),
        ),
    );
    return $data;
}


/**
 * Views-Shortcode: wpv-post-author
 *
 * Description: Display the author of the current post
 *
 * Parameters:
 * format => The format of the output.
 *   "name" displays the author's name (Default)
 *   "link" displays the author's name as a link
 *   "url" displays the url for the author
 *   "meta" displays the author meta info
 * meta => The meta field to display when format="meta"
 *
 * Example usage:
 * Posted by [wpv-post-author format="name"]
 *
 * Link:
 * For info about the author meta fields, see <a href="http://codex.wordpress.org/Function_Reference/get_the_author_meta">http://codex.wordpress.org/Function_Reference/get_the_author_meta</a>)
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_post_author($atts) {
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);

    $default_size = 96;

	extract(
        $atts = shortcode_atts(
            array(
				'format' => 'name',
				'meta' => 'nickname',
                'profile-picture-size' => $default_size,
                'profile-picture-default-url' => '',
                'profile-picture-alt' => false,
                'profile-picture-shape' => 'circle',
			),
			$atts
		)
	);

	global $authordata; // TODO check if this global is needed here; when switching posts its useless
	if ( empty($authordata) ){
	    global $post;
	    if ( isset($post->post_author) ){
            $current_user = get_userdata($post->post_author );
            $authordata = $current_user;
        }else{
            return '';
        }
    }
	global $post;

	$author_url = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );

	switch ( $format ) {
		case 'link':
			$out = '<a href="' . $author_url . '">' . get_the_author() . '</a>';
			break;

		case 'url':
			$out = $author_url;
			break;

		case 'meta':
			$out = get_the_author_meta( $meta );
			break;

        case 'profile_picture':
            $out = wpv_get_avatar( $post->post_author, $atts['profile-picture-size'], $atts['profile-picture-default-url'], $atts['profile-picture-alt'], $atts['profile-picture-shape'] );
            break;

		default:
			$out = get_the_author();
			break;

	}
	apply_filters('wpv_shortcode_debug','wpv-post-author', json_encode($atts), '', 'Data received from cache', $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_author_data
*
* Register the wpv-post-author shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_author_data' );

function wpv_shortcodes_register_wpv_post_author_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-author'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_author_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_author_data() {
    $data = array(
        'name' => __( 'Post author', 'wpv-views' ),
        'label' => __( 'Post author', 'wpv-views' ),
        'post-selection' => true,
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'format' => array(
                        'label' => __( 'Author information', 'wpv-views'),
                        'type' => 'radio',
                        'options' => array(
                            'name' => __('Author name', 'wpv-views'),
                            'link' => __('Author archive link', 'wpv-views'),
                            'url' => __('Author archive URL', 'wpv-views'),
                            'meta' => __('Author metadata', 'wpv-views'),
                            'profile_picture' => __( 'Author profile picture', 'wpv-views' ),
                        ),
                        'default' => 'name',
						'description' => __( 'Display this information about the current post author.', 'wpv-views' )
                    ),
                    'meta' => array(
                        'label' => __( 'Author metadata', 'wpv-views'),
                        'type' => 'select',
						'default_force' => 'nickname',
                        'options' => array(
							'display_name' => __('Author display name', 'wpv-views'),
							'first_name' => __('Author first name', 'wpv-views'),
                            'last_name' => __('Author last name', 'wpv-views'),
							'nickname' => __('Author nickname', 'wpv-views'),
							'user_nicename' => __('Author nicename', 'wpv-views'),
							'description' => __('Author description', 'wpv-views'),
                            'user_login' => __('Author login', 'wpv-views'),
                            'user_pass' => __('Author password', 'wpv-views'),
							'ID' => __('Author ID', 'wpv-views'),
                            'user_email' => __('Author email', 'wpv-views'),
                            'user_url' => __('Author URL', 'wpv-views'),
                            'user_registered' => __('Author registered date', 'wpv-views'),
                            'user_activation_key' => __('Author activation key', 'wpv-views'),
                            'user_status' => __('Author status', 'wpv-views'),
                            'jabber' => __('Author jabber', 'wpv-views'),
                            'aim' => __('Author aim', 'wpv-views'),
                            'yim' => __('Author yim', 'wpv-views'),
                            'user_level' => __('Author level', 'wpv-views'),
                            'user_firstname' => __('firstname', 'wpv-views'),
                            'user_lastname' => __('lastname', 'wpv-views'),
                            'rich_editing' => __('rich editing', 'wpv-views'),
                            'comment_shortcuts' => __('comment shortcuts', 'wpv-views'),
                            'admin_color' => __('admin_color', 'wpv-views'),
                            'plugins_per_page' => __('plugin per page', 'wpv-views'),
                            'plugins_last_view' => __('plugins last view', 'wpv-views'),

                        ),
						'description' => __( 'Display this metadata if that option was selected on the previous section', 'wpv-views' )
                    ),
                    'profile-picture-size' => array(
                        'label' => __( 'Size', 'wpv-views' ),
                        'type' => 'text',
                        'description' => __( 'Size of the post author\'s profile picture in pixels.', 'wpv-views' ),
                    ),
                    'profile-picture-alt' => array(
                        'label' => __( 'Alternative text', 'wpv-views' ),
                        'type' => 'text',
                        'description' => __( 'Alternative text for the post author\'s profile picture.', 'wpv-views' ),
                    ),
                    'profile-picture-shape' => array(
                        'label' => __( 'Shape', 'wpv-views'),
                        'type' => 'select',
                        'options' => array(
                            'circle' => __( 'Circle', 'wpv-views' ),
                            'square' => __( 'Square', 'wpv-views' ),
                            'custom' => __( 'Custom', 'wpv-views' ),
                        ),
                        'default' => 'circle',
                        'description' => __( 'Display the post author\'s profile picture in this shape. For "custom" shape, custom CSS is needed for "wpv-profile-picture-shape-custom" CSS class.', 'wpv-views' ),
                    ),
                    'profile-picture-default-url' => array(
                        'label' => __( 'Default URL', 'wpv-views' ),
                        'type' => 'text',
                        'description' => __( 'Default image when there is no profile picture. Leave blank for the "Mystery Man".', 'wpv-views' )
                    ),
                ),
            ),
        ),
    );
    return $data;
}

/**
 * wpv_get_avatar
 *
 * Return the avatar based on the provided arguments
 *
 * @param $user_id (integer) The ID of the user, either post author or user from a users listing
 * @param $atts (atts) Shortcode arguments like "size", "alt", "default_url" and "shape".
 *
 * @return (string) Image HTML element that contains the avatar of the selected user.
 *
 * @since 2.4.0
 */

function wpv_get_avatar( $user_id, $size, $default_url, $alt, $shape ) {

    $default_size = 96;

    $size = intval( $size );
    if ( $size <= 0 || $size > 512 ) {
        $size = $default_size;
    }

    $args = array();

    if ( isset( $shape ) && '' != $shape && in_array( $shape, array( 'circle', 'square', 'custom' ) ) ) {
        $args['class'] = 'wpv-profile-picture-shape-' . $shape;
    }

    return get_avatar( $user_id, $size, $default_url, $alt, $args );
}

/**
 * Views-Shortcode: wpv-post-date
 *
 * Description: Display the date of the current post (created or modified)
 *
 * Parameters:
 * format => Format string for the date. Defaults to F jS, Y
 * type => Type of post date; 'created' or 'modified'. Default is 'created'
 *
 * Example usage:
 * Published on [wpv-post-date format="F jS, Y"]
 *
 * Link:
 * Format parameter is the same as here - <a href="http://codex.wordpress.org/Formatting_Date_and_Time">http://codex.wordpress.org/Formatting_Date_and_Time</a>
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_post_date($atts) {
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);

	extract(
		shortcode_atts( array(
			'format' => get_option( 'date_format' ),
			'type' => 'created'
		), $atts )
	);

	$type = strtolower($type);

	if( $type == "created" ) {
		$out = apply_filters('the_time', get_the_time( $format ));
	} elseif ( $type == "modified" ) {
		$out = apply_filters('the_modified_time', get_the_modified_time( $format ));
	}

	apply_filters('wpv_shortcode_debug','wpv-post-date', json_encode($atts), '', 'Data received from cache, filter the_time applied', $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_date_data
*
* Register the wpv-post-date shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_date_data' );

function wpv_shortcodes_register_wpv_post_date_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-date'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_date_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_date_data() {
    $default_format = get_option( 'date_format' );
    $data = array(
        'name' => __( 'Post date', 'wpv-views' ),
        'label' => __( 'Post date', 'wpv-views' ),
        'post-selection' => true,
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'format' => array(
                        'label' => __( 'Date format', 'wpv-views'),
                        'type' => 'radio',
                        'default' => $default_format,
                        'documentation' => '<a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">' . __( 'WordPress Formatting Date and Time', 'wpv-views' ) . '</a>',
                        'options' => array(
                            $default_format => $default_format . ' - ' . date_i18n( $default_format ),
                            'F j, Y g:i a' => 'F j, Y g:i a - ' . date_i18n( 'F j, Y g:i a' ),
                            'F j, Y' => 'F j, Y - ' . date_i18n( 'F j, Y' ),
                            'd/m/y' => 'd/m/y - ' . date_i18n( 'd/m/y' ),
                            'custom-combo' => array(
                                'label' => __('Custom', 'wpv-views' ),
                                'type' => 'text',
                                'placeholder' => 'l, F j, Y',
                            )
                        ),
                    ),
					'type' => array(
						'label' => __( 'What to display', 'wpv-views' ),
						'type' => 'radio',
						'default' => 'created',
						'options' => array(
							'created' => __( 'Display the date when the post was created', 'wpv-views' ),
							'modified' => __( 'Display the date when the post was last modified', 'wpv-views' )
						)
					)
                ),
            ),
        ),
    );
    return $data;
}


/**
 * Views-Shortcode: wpv-post-url
 *
 * Description: Display the url to the current post
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * [wpv-post-url]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_post_url($atts) {
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);

	extract(
		shortcode_atts( array(), $atts )
	);

	$out = '';

	global $post;

	if( !empty( $post ) ) {

		$post_id = $post->ID;

		// Adjust for WPML support
		// If WPML is enabled, $post_id should contain the right ID for the current post in the current language
		// However, if using the id attribute, we might need to adjust it to the translated post for the given ID
		$post_id = apply_filters( 'translate_object_id', $post_id, $post->post_type, true, null );

		$out = wpv_get_post_permalink( $post_id );

	}

	apply_filters('wpv_shortcode_debug','wpv-post-url', json_encode($atts), '', 'Data received from cache', $out);

	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_url_data
*
* Register the wpv-post-url shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_url_data' );

function wpv_shortcodes_register_wpv_post_url_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-url'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_url_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_url_data() {
    $data = array(
        'name' => __( 'Post URL', 'wpv-views' ),
        'label' => __( 'Post URL', 'wpv-views' ),
        'post-selection' => true,
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-post-type
 *
 * Description: Display the current post type
 *
 * Parameters:
 * 'show' => 'slug', 'single' or 'plural'. Defaults to 'slug'
 *
 * Example usage:
 * [wpv-post-type show="single"]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_post_type($atts){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);

	extract(
		shortcode_atts( array('show' => 'slug'), $atts )
	);

	$out = '';

	global $post;


	if(!empty($post)){

		$post_object = get_post_type_object($post->post_type);

		if ( !is_null( $post_object ) ) {

		switch ($show) {
			case 'single':
				$out = $post_object->labels->singular_name;
				break;

			case 'plural':
				$out = $post_object->labels->name;
				break;

			case 'slug':
		$rewrite = $post_object->rewrite;
				$out = ( isset( $rewrite ) && isset( $rewrite['slug'] ) ) ? $rewrite['slug'] : $post->post_type;
				break;

			default:
				$out = $post->post_type;
				break;

		}

		}

	}
	apply_filters('wpv_shortcode_debug','wpv-post-type', json_encode($atts), '', 'Data received from cache', $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_type_data
*
* Register the wpv-post-type shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_type_data' );

function wpv_shortcodes_register_wpv_post_type_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-type'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_type_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_type_data() {
    $data = array(
        'name' => __( 'Post type', 'wpv-views' ),
        'label' => __( 'Post type', 'wpv-views' ),
        'post-selection' => true,
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'show' => array(
                        'label' => __( 'Post type information', 'wpv-views'),
                        'type' => 'radio',
                        'options' => array(
                            'slug' => __('Post type slug', 'wpv-views'),
                            'single' => __('Post type singular name', 'wpv-views'),
                            'plural' => __('Post type plural name', 'wpv-views'),
                        ),
                        'default' => 'slug',
                    ),
                ),
            ),
        ),
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-post-status
 *
 * Description: Display the current post status
 *
 * Parameters:
 *
 * Example usage:
 * This post has a status: [wpv-post-status]
 *
 * Link:
 *
 * Note:
 *
 */

 function wpv_shortcode_wpv_post_status($atts){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);

	$out = '';

	global $post;


	if(!empty($post)){

		$out .= $post->post_status;

	}
	apply_filters('wpv_shortcode_debug','wpv-post-status', json_encode($atts), '', 'Data received from cache', $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_status_data
*
* Register the wpv-post-status shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_status_data' );

function wpv_shortcodes_register_wpv_post_status_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-status'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_status_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_status_data() {
    $data = array(
        'name' => __( 'Post status', 'wpv-views' ),
        'label' => __( 'Post status', 'wpv-views' ),
        'post-selection' => true,
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-post-class
 *
 * Description: Display a space separated list of the current post classes
 *
 * Parameters:
 * 'add' => a space separated list of classnames to add to the default ones
 *
 * Example usage:
 * {{li class="[wpv-post-class]"}}Content{{/li}}
 *
 * Link:
 *
 * Note:
 *
 */

 function wpv_shortcode_wpv_post_class( $atts ) {
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id( $atts );

	global $post;

	extract(
		shortcode_atts( array(
			'add'  => ''
		), $atts )
	);
	
	// get_post_class handles the escaping of the additional classnames.
	// We need to force the $post->post_type classname as it is added in the frontend 
	// but in AJAX it is not included as it is considered backend.
	
	$add .= ' ' . $post->post_type;

	$post_classes = get_post_class( $add );
	$out = implode( ' ', $post_classes );

	apply_filters('wpv_shortcode_debug','wpv-post-class', json_encode($atts), '', 'Data received from get_post_class()', $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_class_data
*
* Register the wpv-post-class shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_class_data' );

function wpv_shortcodes_register_wpv_post_class_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-class'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_class_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_class_data() {
    $data = array(
        'name' => __( 'Post class', 'wpv-views' ),
        'label' => __( 'Post class', 'wpv-views' ),
		'post-selection' => true,
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'add' => array(
                        'label' => __( 'Extra classnames', 'wpv-views'),
                        'type' => 'text',
                        'description' => __('Space-separated list of classnames to be added to the WordPress generated ones.', 'wpv-views'),
                    ),
                ),
            ),
        ),
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-post-format
 *
 * Description: Display the post format (standard|aside|chat|gallery|link|image|quote|status|video|audio|).
 * If post type doesn't support post formats, returns empty string.
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 *  [wpv-if evaluate="'[wpv-post-format]' = 'aside'"]
 *      This is aside format
 *  [/wpv-if]
 *
 * Link:
 *
 * Note:
 * This function returns "standard" instead of <tt>false</tt> as <a href="http://codex.wordpress.org/Function_Reference/get_post_format">get_post_format</a> page recommends.
 *
 */
function wpv_shortcode_wpv_post_format( $atts ) {
    $post_id_atts = new WPV_wpcf_switch_post_from_attr_id( $atts );

    extract(
            shortcode_atts( array(), $atts )
    );

    $out = '';
    global $post;
    if ( !empty( $post ) ) {
        $post_format = get_post_format( $post->ID );
        if ( $post_format !== false ) {
            $out = $post_format;
        } else {
            $out = 'standard';
        }
    }

    apply_filters( 'wpv_shortcode_debug', 'wpv-post-format', json_encode( $atts ), '', 'Data received from cache', $out );

    return $out;
}

/**
* wpv_shortcodes_register_wpv_post_format_data
*
* Register the wpv-post-format shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_format_data' );

function wpv_shortcodes_register_wpv_post_format_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-format'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_format_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_format_data() {
    $data = array(
        'name' => __( 'Post format', 'wpv-views' ),
        'label' => __( 'Post format', 'wpv-views' ),
		'post-selection' => true,
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-post-featured-image
 *
 * Description: Display the featured image of the current post
 *
 * Parameters:
 * 'size' => thumbnail|medium|large|full|custom - defaults to thumbnail
 * 'output' => img|url|alt|id|author|date|description|title|caption - what to display - if empty, will display the IMG tag for legacy, so defaults to img de facto
 *
 * Optional parameters:
 * 'width' => Width of the image - in case of 'size' is 'custom'
 * 'height' => Height of the image - in case of 'size' is 'custom'
 * 'crop' => true|false - default to 'false' Resizing method - crop or proportional - in case of 'size' is 'custom'
 * 				If 'crop' is 'true', image is cropped on 'width' and 'height'
 * 				If 'crop' is 'false', image is resized proportionally, based on 'width' and 'height'
 * 'crop_horizontal' => left|center|right - default to 'center' - if 'crop' is 'true'
 * 'crop_vertical' => top|center|bottom - default to 'center' - if 'crop' is 'true'
 * 'class' => CSS class to be applied - if 'output' is 'img'
 *
 * Legacy prameters:
 * 'raw' => Show url (true) or HTML tag (false) - default to false (HTML tag)
 * 'data' => Show additional image info
 *		  id - attachment ID
 *		  author - attachment author
 *		  date - attachment date
 *		  description - attachment description
 *		  title - attachment title
 *		  caption - attachment title
 *		  original - original size url
 *		  alt - attachment alt
 *
 *
 * Example usage:
 * [wpv-post-featured-image size="medium" raw="false"]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_post_featured_image( $atts ) {
	global $WPVDebug;
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id( $atts );
	extract(
		shortcode_atts( array(
			'size'  => 'thumbnail',
			'output' => '',
			'raw'   => 'false',// DEPRECATED
			'data'  => '',// DEPRECATED
			'attr'  => '',
			'class' => '',
			'width' => '',
			'height' => '',
			'crop' => false,
			'crop_horizontal' => 'center',
			'crop_vertical' => 'center'
		), $atts )
	);
	$out = '';
	$info = array(
		'id' => 'ID',
		'author' => 'post_author',
		'date' => 'post_date',
		'description' => 'post_content',
		'title' => 'post_title',
		'caption' => 'post_excerpt',
		'original' => 'guid'
	);
	// LEGACY - backwards compatibility
	if ( empty( $output ) ) {
		if ( 
			$raw === 'true'  
			|| ! empty( $data ) 
		) {
			if ( empty( $data ) ) {
				$output = 'url';
			} else {
				$output = $data;
			}
		} else {
			$output = 'img';
		}
	}
	// END LEGACY - backwards compatibility

	/**
	 * @todo: OBSOLETE - REMOVE AFTER FINALIZING
	 * Custom image size

	$image_size = $size;

	if (
			'custom' == $size
			&& ( !empty( $width ) || !empty( $height ) )
	) {
		$image_size = array( $width, $height );
	}*/

	if ( 'img' == $output ) {
		if ( ! empty( $attr ) ) {
			// first, escape and strip tags
			$attr = esc_attr( strip_tags( $attr ) );
			// now, hack the ampersands on legitimate query-like attributes
			$valid_attr_before = array( '&amp;title', '&#038;title', '&amp;alt', '&#038;alt', '&amp;class', '&#038;class' );
			$valid_attr_after = array( '#wpv-title-hack#', '#wpv-title-hack#', '#wpv-alt-hack#', '#wpv-alt-hack#', '#wpv-class-hack#', '#wpv-class-hack#' );
			$attr = str_replace( $valid_attr_before, $valid_attr_after, $attr );
			// adjust the brackets
			$brackets_before = array( '[', ']', '&amp;', '&#038;' );
			$brackets_after = array( '&#91;', '&#93;', '&', '&' );
			$attr = str_replace( $brackets_before, $brackets_after, $attr );
			// hack the remaining ampersands, even the ones coming from HTML characters
			$before_sanitize = array( '&' );
			$after_sanitize = array( '#wpv-amperhack#' );
			$attr = str_replace( $before_sanitize, $after_sanitize, $attr );
			// add nack the legitimate ampersands
			$attr = str_replace( '#wpv-title-hack#', '&title', $attr );
			$attr = str_replace( '#wpv-alt-hack#', '&alt', $attr );
			$attr = str_replace( '#wpv-class-hack#', '&class', $attr );
			// parse the attributes
			wp_parse_str( $attr, $attr_array );
			// restore the other ampersands
			$attr_array = str_replace( $after_sanitize, $before_sanitize, $attr_array );
		} else {
			$attr_array = array();
		}
		if ( ! empty( $class ) ) {
			$attr_array['class'] = 'attachment-' . esc_attr( $size ) . '  ' . esc_attr( $class );
		}

		// Custom Image Size
		if ( 'custom' == $size ) {
			$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
			$out_array = wp_get_attachment_image_src($post_thumbnail_id, 'full' );

			if ( $out_array ) {
				if ( $crop ) {
					$crop = array ( $crop_horizontal, $crop_vertical );
				}

				/**
				 * @see wpv_shortcodes_resize_image()
				 */
				$image = apply_filters( 'wpv_filter_wpv_shortcodes_resize_image', $out_array[0], $width, $height, $crop );

				if ( !is_wp_error( $image ) ) {
					$attr_array['src'] = $image;
					$out = wpv_shortcodes_apply_html_tag_attrs( 'img', $attr_array, true, '' );
				}
			}
		} else {
			$out = get_the_post_thumbnail( null, $size, $attr_array );
		}

		$out = apply_filters( 'wpv-post-featured-image', $out );
	} else {
		$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
		if ( !empty( $post_thumbnail_id ) ) {
			switch ( $output ) {
				case 'id':
				case 'author':
				case 'date':
				case 'description':
				case 'title':
				case 'caption':
				case 'original':
					$new_info = get_post( $post_thumbnail_id );
					$new_value = $info[$output];
					$file_info = isset( $new_info->$new_value ) ? $new_info->$new_value : '';
					break;
				case 'alt':
					$file_info = get_post_meta( $post_thumbnail_id , '_wp_attachment_image_alt', true );
					break;
				case 'url':
				default:
					if ( $size == 'full' ) {
						$new_info = get_post( $post_thumbnail_id );
						$file_info = isset( $new_info->guid ) ? $new_info->guid : '';
					} else {
						$out_array = wp_get_attachment_image_src($post_thumbnail_id, $size );
						$file_info = $out_array[0];

						if( 'custom' == $size ) {
							if ( $crop ) {
								$crop = array ( $crop_horizontal, $crop_vertical );
							}

							$image = apply_filters( 'wpv_filter_wpv_shortcodes_resize_image', $out_array[0], $width, $height, $crop );

							if ( !is_wp_error( $image ) ) {
								$file_info = $image;
							}
						}
					}

					$file_info = apply_filters( 'wpv_filter_wpv_shortcodes_set_url_scheme', $file_info );
				break;
			}

			$out = apply_filters( 'wpv-post-featured-image', $file_info );
		}
	}

	apply_filters('wpv_shortcode_debug','wpv-post-featured-image', json_encode($atts), '', 'Filter wpv-post-featured-image applied', $out);

	return $out;
}

/**
 * Scale down an image to fit a particular size and save a new copy of the image.
 * Uses WP_Image_Editor class.
 *
 * @since 2.2
 *
 * @param string $file Image file path.
 * @param int $max_w Maximum width to resize to.
 * @param int $max_h Maximum height to resize to.
 * @param bool $crop Optional. Whether to crop image or resize.
 * @param string $suffix Optional. File suffix.
 * @param string $dest_path Optional. New image file path.
 * @param int $jpeg_quality Optional, default is 90. Image quality percentage.
 *
 * @return mixed WP_Error on failure. String with new destination path.
 *
 * @see https://codex.wordpress.org/Class_Reference/WP_Image_Editor
 */
function wpv_image_resize( $file, $max_w, $max_h, $crop = false,
							$suffix = null, $dest_path = null, $jpeg_quality = 90 ) {

	$image = wp_get_image_editor( $file ); // Return an implementation that extends WP_Image_Editor

	if ( ! is_wp_error( $image ) ) {
		if ( !$suffix ) {
			$suffix = $image->get_suffix();
		}

		$new_file = $image->generate_filename( $suffix, $dest_path );

		$image->set_quality( $jpeg_quality );
		$image->resize( $max_w, $max_h, $crop );
		$image->save( $new_file );

		return $new_file;
	} else {
		return new WP_Error( 'error_loading_image', $image, $file );
	}
}

add_filter( 'wpv_filter_wpv_shortcodes_resize_image', 'wpv_shortcodes_resize_image', 10, 4 );

/**
 * wpv_shortcodes_resize_image
 *
 * Filter to apply image resizing, based on width/height and proportional/cropping.
 * Supports wp_upload_dir() based image locations only.
 *
 * @param $image_url URL of the image
 * @param $width Intended maximum width of the image
 * @param $height Intended maximum height of the image
 * @param bool|array $crop Array of crop positions or 'false'
 *
 * @return mixed Resized image URL or WP_Error
 *
 * @see wpv_image_resize()
 */
function wpv_shortcodes_resize_image( $image_url, $width, $height, $crop )
{
	$uploads = wp_upload_dir();
	// Get image absolute path
	$file = str_replace($uploads['baseurl'], $uploads['basedir'], $image_url);
	$suffix = "{$width}x{$height}";

	if ( false !== $crop ) {
		$suffix .= '_' . implode( '_', $crop );
	}

	$image = wpv_image_resize($file, $width, $height, $crop, $suffix);

	if (!is_wp_error($image)) {
		// Get image URL
		$image = str_replace($uploads['basedir'], $uploads['baseurl'], $image);
	}

	return $image;
}

/**
 * wpv_shortcodes_apply_html_tag_attrs
 *
 * Filter to apply HTML attributes on an intended tag.
 * Also supports self-enclosure of tags or tags enclosing content.
 *
 * @param string $tag An HTML tag
 * @param array $attrs Array of HTML tag attributes (i.e. class, src, width, height, alt and etc)
 * @param bool $self_enclosure Is the tag self enclosed (i.e. <img ... />
 * @param string $optional_content In case if tag isn't self enclosed (i.e. <p>...</p>), the content can be passed to be surrounded by the opening/closing tags as-it-is.
 *
 * @return string
 */
function wpv_shortcodes_apply_html_tag_attrs( $tag = 'img', $attrs = array(), $self_enclosure = true, $optional_content = '' ) {
	$out = '<' . $tag . ' ';

	foreach( $attrs as $key => $val ) {
		$out .= $key . '="' . $val . '" ';
	}

	if( $self_enclosure ) {
		$out .= '/>';
	} else {
		$out .= '>' . $optional_content . '</' . $tag . '>';
	}

	return $out;
}

add_filter( 'wpv_filter_wpv_shortcodes_set_url_scheme', 'wpv_shortcodes_set_url_scheme' );

/**
 * wpv_shortcodes_set_url_scheme
 *
 * Set the scheme for a URL.
 *
 * @param $url
 * @return string URL after setting the scheme as of is_ssl().
 *
 * @see https://codex.wordpress.org/Function_Reference/set_url_scheme
 */
function wpv_shortcodes_set_url_scheme( $url ) {
	return set_url_scheme( $url );
}

/**
* wpv_shortcodes_register_wpv_post_featured_image_data
*
* Register the wpv-post-featured-image shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_featured_image_data' );

function wpv_shortcodes_register_wpv_post_featured_image_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-featured-image'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_featured_image_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_featured_image_data() {
	$options = array(
		'full' => __('Original image', 'wpv-views')
	);
	$template = '%s - (%dx%d)';
	$defined_sizes = array(
		'thumbnail' => __('Thumbnail', 'wpv-views'),
		'medium' => __('Medium', 'wpv-views'),
		'large' => __('Large', 'wpv-views')
	);
    foreach ( $defined_sizes as $ds_key => $ds_label ) {
        $options[$ds_key] = sprintf(
            $template,
            $ds_label,
            get_option(sprintf('%s_size_w', $ds_key)),
            get_option(sprintf('%s_size_h', $ds_key))
        );
    }
    global $_wp_additional_image_sizes;
    if ( ! empty( $_wp_additional_image_sizes) ) {
		foreach ( $_wp_additional_image_sizes as $key => $value ) {
			if ( 'post-thumbnail' == $key ) {
				continue;
			}
			$options[$key] = sprintf(
				$template,
				$key,
				$value['width'],
				$value['height']
			);
		}
	}

	/**
	 * Custom size support
	 *
	 * @since 2.2
	 */
	$options['custom'] = __( 'Custom size...', 'wpv-views' );

    $data = array(
        'name' => __( 'Post featured image', 'wpv-views' ),
        'label' => __( 'Post featured image', 'wpv-views' ),
        'post-selection' => true,
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
					'size' => array(
                        'label'		=> __('Featured image size', 'wpv-views'),
                        'type'		=> 'select',
                        'options'	=> $options,
                        'default'	=> 'thumbnail',
                    ),
					'dimensions_group'	=> array(
						'type'		=> 'grouped',
						'fields'	=> array(
							'width' => array(
								'pseudolabel'	=> __( 'Featured image width', 'wpv-views' ),
								'type'			=> 'text',
								'description'	=> __( 'Custom width of image in pixels.', 'wpv-views' )
							),
							'height' => array(
								'pseudolabel'	=> __( 'Featured image height', 'wpv-views' ),
								'type'			=> 'text',
								'description'	=> __( 'Custom height of image in pixels.', 'wpv-views' )
							)
						)
					),
					'crop' => array(
						'label'		=> __( 'Proportion', 'wpv-views' ),
						'type'		=> 'radio',
						'options'	=> array(
							'false'	=> __( 'Keep opriginal proportion', 'wpv-views' ),
							'true'	=> __( 'Crop to exact dimensions', 'wpv-views' )
						),
						'default' => 'false',
					),
					'crop_group'	=> array(
						'type'			=> 'grouped',
						'fields'		=> array(
							'crop_horizontal' => array(
								'pseudolabel'	=> __('Horizontal crop position', 'wpv-views'),
								'type'			=> 'select',
								'options'		=> array(
									'left'		=> __( 'Left', 'wpv-views' ),
									'center'	=> __('Center', 'wpv-views'),
									'right'		=> __('Right', 'wpv-views')
								),
								'default'		=> 'center',
							),
							'crop_vertical'	=> array(
								'pseudolabel'	=> __('Vertical crop position', 'wpv-views'),
								'type'			=> 'select',
								'options'		=> array(
									'top'		=> __( 'Top', 'wpv-views' ),
									'center'	=> __('Center', 'wpv-views'),
									'bottom'	=> __('Bottom', 'wpv-views')
								),
								'default'		=> 'center',
							),
						)
					),
					'output'	=> array(
                        'label'		=> __('What to display', 'wpv-views'),
                        'type'		=> 'select',
                        'options'	=> array(
							'img'			=> __( 'Image HTML tag', 'wpv-views' ),
							'url'			=> __('URL of the image', 'wpv-views'),
							'title'			=> __('Title of the image', 'wpv-views'),
							'caption'		=> __('Caption of the image', 'wpv-views'),
							'description'	=> __('Description of the image', 'wpv-views'),
                            'alt'			=> __('ALT text for the image', 'wpv-views'),
                            'author'		=> __('Author of the image', 'wpv-views'),
                            'date'			=> __('Date of the image', 'wpv-views'),
                            'id'			=> __('ID of the image', 'wpv-views'),
                        ),
                        'default'	=> 'img',
                    ),
					'class'		=> array(
                        'label'			=> __( 'Class', 'wpv-views'),
                        'type'			=> 'text',
                        'description'	=> __( 'Space-separated list of classnames that will be added to the image HTML tag.', 'wpv-views' ),
                        'placeholder'	=> 'class1 class2',
                    ),
					/*
                    'attr' => array(
                        'type' => 'text',
                        'description' => __('Expects a query-string-like value : attr=”title=a&alt=b&classname=c” will add those attributes to the img HTML tag', 'wpv-views'),
                        'label' => __('Attributes', 'wpv-views'),
                    ),
					*/
                ),
            ),
        ),
    );
    return $data;
}

/** This filter is documented in embedded/inc/wpv-shortcodes-gui.php */
// add_filter('wpv_filter_wpv_shortcodes_gui_api_wpv-post-featured-image-size_options', 'wpv_post_featured_image_size_options', 10, 2);

/**
 * Add post featured-image options to shortcode
 *
 * Add post featured-image shortcode options to shortcode attribute.
 *
 * @since 1.9.0
 *
 * @param array $options 
 *
 */
function wpv_post_featured_image_size_options($options, $type = 'text')
{
    $mask = '%s - (%dx%d)';
    if ( 'radio' == $type ) {
        $mask = '%s <small>(%dx%d)</small>';
    }
    /**
     * first add size to label
     */
    foreach ( array('thumbnail', 'medium', 'large') as $key ) {
        $options[$key] = sprintf(
            $mask,
            $options[$key],
            get_option(sprintf('%s_size_w', $key)),
            get_option(sprintf('%s_size_h', $key))
        );
    }
    global $_wp_additional_image_sizes;
    if ( empty( $_wp_additional_image_sizes) ) {
        return $options;
    }
    foreach ( $_wp_additional_image_sizes as $key => $value ) {
        if ( 'post-thumbnail' == $key ) {
            continue;
        }
        $options[$key] = sprintf(
            $mask,
            preg_replace('/[_-]+/', ' ', $key),
            $value['width'],
            $value['height']
        );
    }
    return $options;
}

/**
* Views-Shortcode: wpv-post-edit-link
*
* Description: Display an edit link for the current post
*
* Parameters:
* label: Optional. What to show in the edit link. ie: 'Edit Video' DEPRECATED
* text: Optional
* style: Optional
* class: Optional
*
* Example usage:
* [wpv-post-edit-link]
*
* Link:
*
* Note:
*
*/
function wpv_shortcode_wpv_post_edit_link( $atts ){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id( $atts );

	extract(
		shortcode_atts( 
			array(
				'style' => '',
				'class' => '',
				'text' => ''
            ),
			$atts 
		)
	);

	$out = '';
	global $post;

	if ( 
		! empty( $post ) 
		&& current_user_can( 'edit_posts' ) 
	) {
        if ( ! empty( $style ) ) {
            $style = ' style="'. esc_attr( $style ) .'"';
        }
        if ( ! empty( $class ) ) {
            $class = ' ' . esc_attr( $class );
        }
		$anchor_text = '';
		if ( isset( $atts['label'] ) ) {
			$anchor_text = sprintf( __( 'Edit %s', 'wpv-views' ), $atts['label'] );
		} else {
			if ( empty( $text ) ) {
				$anchor_text = __('Edit This', 'wpv-views');
			} else {
				$anchor_text = $text;
			}
		}
		$out .= '<a href="' . get_edit_post_link( $post->ID ) . '" class="post-edit-link'. $class .'"'. $style .'>';
		$out .= $anchor_text;
		$out .= '</a>';
	}
	apply_filters('wpv_shortcode_debug','wpv-post-edit-link', json_encode($atts), '', 'Data received from cache', $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_edit_link_data
*
* Register the wpv-post-edit-link shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_edit_link_data' );

function wpv_shortcodes_register_wpv_post_edit_link_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-edit-link'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_edit_link_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_edit_link_data() {
    $data = array(
        'name' => __( 'Post edit link', 'wpv-views' ),
        'label' => __( 'Post edit link', 'wpv-views' ),
        'post-selection' => true,
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'text' => array(
                        'label' => __( 'Edit link text', 'wpv-views'),
                        'type' => 'text',
                        'description' => __('Set the text for the link. Defaults to "Edit This".', 'wpv-views'),
                    ),
					'class' => array(
                        'label' => __( 'Class', 'wpv-views'),
                        'type' => 'text',
                        'description' => __( 'Space-separated list of classnames that will be added to the anchor HTML tag.', 'wpv-views' ),
                        'placeholder' => 'class1 class2',
                    ),
					'style' => array(
                        'label' => __( 'Style', 'wpv-views'),
                        'type' => 'text',
						'description' => __( 'Inline styles that will be added to the anchor HTML tag.', 'wpv-views' ),
                        'placeholder' => 'border: 1px solid red; font-size: 2em;',
                    ),
                ),
            ),
        ),
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-post-menu-order
 *
 * Description: Display the current post's menu order
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * Post menu order is [wpv-post-menu-order]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_post_menu_order($atts){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);

	extract(
		shortcode_atts( array(), $atts )
	);
	$out = '';

	global $post;

	if(!empty($post)){
		$out .= $post->menu_order;
	}
	apply_filters('wpv_shortcode_debug','wpv-post-menu-order', json_encode($atts), '', 'Data received from cache', $out);
	return $out;
}

/**
 * wpv_shortcodes_register_wpv_post_menu_order_data
 *
 * Register the wpv-post-menu-order shortcode in the GUI API.
 *
 * @since 2.3.0
 */


add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_menu_order_data' );

function wpv_shortcodes_register_wpv_post_menu_order_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-menu-order'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_menu_order_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_menu_order_data() {
	$data = array(
		'name' => __( 'Post menu order', 'wpv-views' ),
		'label' => __( 'Post menu order', 'wpv-views' ),
		'post-selection' => true,
	);
	return $data;
}

/**
 * Views-Shortcode: wpv-post-previous-link
 *
 * Description: Display the current post's "Previous Post" link
 *
 * Parameters:
 * 'format' => The link anchor format. Default '&laquo; %%LINK%%'.
 * 'link'   => The link permalink format. Default '%%TITLE%%'.
 *
 * Example usage:
 * [wpv-post-previous-link]
 *
 * @since 2.4.0
 *
 */

function wpv_shortcode_wpv_post_previous_link( $atts ) {
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id( $atts );

	extract(
		shortcode_atts( array(
			'format' => '&laquo; %%LINK%%',
			'link' => '%%TITLE%%',
		), $atts )
	);

	$view_settings = apply_filters( 'wpv_filter_wpv_get_view_settings', array() );
	$context = 'View ' . $view_settings['view_slug'];
	$format = wpv_translate(
		'post_control_for_previous_link_format_' . md5( $format ),
		$format,
		false,
		$context
	);
	$link = wpv_translate(
		'post_control_for_previous_link_text_' . md5( $link ),
		$link,
		false,
		$context
	);

	$processed_shortcode_placeholders = process_post_navigation_shortcode_placeholders( $format, $link );
	$format = $processed_shortcode_placeholders['format'];
	$link = $processed_shortcode_placeholders['link'];

	$out = get_previous_post_link( $format, $link );

	apply_filters( 'wpv_shortcode_debug', 'wpv-post-previous-link', json_encode( $atts ), '', 'Data received from cache', $out );

	return $out;
}

/**
 * wpv_shortcodes_register_wpv_post_previous_link_data
 *
 * Register the wpv-post-previous-link shortcode in the GUI API.
 *
 * @since 2.4.0
 */

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_previous_link_data' );

function wpv_shortcodes_register_wpv_post_previous_link_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-previous-link'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_previous_link_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_previous_link_data() {
	$data = array(
		'name' => __( 'Post previous link', 'wpv-views' ),
		'label' => __( 'Post previous link', 'wpv-views' ),
		'post-selection' => true,
		'attributes' => array(
			'display-options' => array(
				'label' => __( 'Display options', 'wpv-views' ),
				'header' => __( 'Display options', 'wpv-views' ),
				'fields' => array(
					'format' => array(
						'type' => 'text',
						'label' => __( 'Format', 'wpv-views' ),
						'description' => __( 'The link anchor format. Should contain \'%%LINK%%\' in order to display a link, otherwise it will create plain text. Default \'&laquo; %%LINK%%\'.', 'wpv-views' ),
						'default' => '&laquo; %%LINK%%',
					),
					'link' => array(
						'type' => 'text',
						'label' => __( 'Link', 'wpv-views' ),
						'description' => __( 'The link permalink format. Can contain \'%%TITLE%%\' for the previous post title or \'%%DATE%%\' for the previous post date. Default \'%%TITLE%%\'.', 'wpv-views' ),
						'default' => '%%TITLE%%',
					),
				),
			),
		),
	);
	return $data;
}

/**
 * Views-Shortcode: wpv-post-next-link
 *
 * Description: Display the current post's "Next Post" link
 *
 * Parameters:
 * 'format' => The link anchor format. Default '%%LINK%% &raquo;'.
 * 'link'   => The link permalink format. Default '%%TITLE%%'.
 *
 * Example usage:
 * [wpv-post-next-link]
 *
 * @since 2.4.0
 *
 */

function wpv_shortcode_wpv_post_next_link( $atts ) {
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id( $atts );

	extract(
		shortcode_atts( array(
			'format' => '%%LINK%% &raquo;',
			'link' => '%%TITLE%%',
		), $atts )
	);

	$view_settings = apply_filters( 'wpv_filter_wpv_get_view_settings', array() );
	$context = 'View ' . $view_settings['view_slug'];
	$format = wpv_translate(
		'post_control_for_next_link_format_' . md5( $format ),
		$format,
		false,
		$context
	);
	$link = wpv_translate(
		'post_control_for_next_link_text_' . md5( $link ),
		$link,
		false,
		$context
	);

	$processed_shortcode_placeholders = process_post_navigation_shortcode_placeholders( $format, $link );
	$format = $processed_shortcode_placeholders['format'];
	$link = $processed_shortcode_placeholders['link'];

	$out = get_next_post_link( $format, $link );

	apply_filters( 'wpv_shortcode_debug', 'wpv-post-next-link', json_encode( $atts ), '', 'Data received from cache', $out );

	return $out;
}

/**
 * Register the wpv-post-next-link shortcode in the GUI API.
 *
 * @param string $format 	The link anchor format.
 * @param string $link		The link permalink format.
 *
 * @return array The array containing the link anchor and permalink format.
 *
 * @since 2.4.1
 */
function process_post_navigation_shortcode_placeholders( $format, $link ) {
	$format = str_replace( '%%LINK%%', '%link', $format );
	$link = str_replace( '%%TITLE%%', '%title', $link );
	$link = str_replace( '%%DATE%%', '%date', $link );
	return array(
		'format' => $format,
		'link' => $link,
	);
}

/**
 * wpv_shortcodes_register_wpv_next_link_data
 *
 * Register the wpv-post-next-link shortcode in the GUI API.
 *
 * @since 2.4.0
 */

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_next_link_data' );

function wpv_shortcodes_register_wpv_post_next_link_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-next-link'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_next_link_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_next_link_data() {
	$data = array(
		'name' => __( 'Post next link', 'wpv-views' ),
		'label' => __( 'Post next link', 'wpv-views' ),
		'post-selection' => true,
		'attributes' => array(
			'display-options' => array(
				'label' => __( 'Display options', 'wpv-views' ),
				'header' => __( 'Display options', 'wpv-views' ),
				'fields' => array(
					'format' => array(
						'type' => 'text',
						'label' => __( 'Format', 'wpv-views' ),
						'description' => __( 'The link anchor format. Should contain \'%%LINK%%\' in order to display a link, otherwise it will create plain text. Default \'&laquo; %%LINK%%\'.', 'wpv-views' ),
						'default' => '%%LINK%% &raquo;',
					),
					'link' => array(
						'type' => 'text',
						'label' => __( 'Link', 'wpv-views' ),
						'description' => __( 'The link permalink format. Can contain \'%%TITLE%%\' for the next post title or \'%%DATE%%\' for the next post date. Default \'%%TITLE%%\'.', 'wpv-views' ),
						'default' => '%%TITLE%%',
					),
				),
			),
		),
	);
	return $data;
}


/**
 * Views-Shortcode: wpv-post-field
 *
 * Description: Display a custom field of the current post. This displays
 * the raw data from the field. Use the Types plugin the and the [types] shortcode
 * to display formatted fields.
 *
 * Parameters:
 * 'name' => The name of the custom field to display
 * 'index' => The array index to use if the meta key has multiple values. If index is not set then all values will be output
 * 'separator' => The separator between multiple values. Defaults to ', '
 *
 * Example usage:
 * [wpv-post-field name="customfield"]
 *
 * Link:
 *
 * Note:
 *
 * @since unknown
 * @since 2.4   Fixed an issue with a strange shortcode output when a name for the post field in the "wpv-post-field" shortcode is not provided.
 *              When no $key is provided to the "get_post_meta", the function returns data for all keys.
 */

function wpv_shortcode_wpv_post_field($atts) {
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);
	static $wpv_post_field_infinite_loop_keys;
	extract(
		shortcode_atts(
			array(
				'index' => '',
				'name' => '',
				'separator' => ', ',
				'parse_shortcodes' => ''
			),
			$atts
		)
	);

	$out = '';
	$filters = '';
	global $post;

	// When the $name is empty, we should return an empty string, as the "get_post_meta" function will
	// return data for all keys, which is not helpful.
	if ( '' == $name ) {
		return $out;
	}

	if(!empty($post)){
		$meta = get_post_meta($post->ID, $name);

		$meta = apply_filters('wpv-post-field-meta-' . $name, $meta);
		$filters .= 'Filter wpv-post-field-meta-' . $name .' applied. ';
		if ($meta) {

			if ($index !== '') {
				$index = intval($index);
				$filters .= 'displaying index ' . $index . '. ';
				$out .= $meta[$index];
			} else {
				$filters .= 'no index set. ';
				foreach($meta as $item) {
					if ($out != '') {
						$out .= $separator;
					}
					$out .= wpv_maybe_flatten_array( $item, $separator );
				}

			}
		}
	}

	$out = apply_filters('wpv-post-field-' . $name, $out, $meta);

	if ( $parse_shortcodes == 'true' || $parse_shortcodes == 1 ){
	    // Clone $post to $post_clone to prevent conflicts with Cred
		$post_clone = $post;
		if ( isset( $wpv_post_field_infinite_loop_keys[ $post_clone->ID . '-' . $name ] ) ) {
			return '';
		}
		$wpv_post_field_infinite_loop_keys[ $post_clone->ID . '-' . $name ] = true;
		$out = wpv_do_shortcode( $out );
		unset($wpv_post_field_infinite_loop_keys[ $post_clone->ID . '-' . $name ]);
	}

	$filters .= 'Filter wpv-post-field-' . $name . ' applied. ';
	apply_filters('wpv_shortcode_debug','wpv-post-field', json_encode($atts), '', 'Data received from cache. '. $filters, $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_field_data
*
* Register the wpv-post-field shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_field_data' );

function wpv_shortcodes_register_wpv_post_field_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-field'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_field_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_field_data() {
    $data = array(
        'name' => __( 'Post field', 'wpv-views' ),
        'label' => __( 'Post field', 'wpv-views' ),
        'post-selection' => true,
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'name' => array(
                        'label' => __('Custom field', 'wpv-views'),
                        'type' => 'suggest',
						'action' => 'wpv_suggest_wpv_post_field_name',
                        'description' => __('The name of the custom field to display', 'wpv-views'),
                        'required' => true,
                    ),
					'index_info'	=> array(
						'label'		=> __( 'Index and separator', 'wpv-views' ),
						'type'		=> 'info',
						'content'	=> __( 'If the field has multiple values, you can display just one of them or all the values using a separator.', 'pv-views' )
					),
					'index_combo'	=> array(
						'type'		=> 'grouped',
						'fields'	=> array(
							'index' => array(
								'pseudolabel'	=> __( 'Index', 'wpv-views' ),
								'type'			=> 'number',
								'description'	=> __('Leave empty to display all values.', 'wpv-views'),
							),
							'separator' => array(
								'type'			=> 'text',
								'pseudolabel'	=> __( 'Separator', 'wpv-views' ),
								'default'		=> ', ',
							),
						)
					),
					'parse_shortcodes' => array(
						'label'		=> __( 'Parse inner shortcodes', 'wpv-views' ),
                        'type'		=> 'radio',
                        'options'	=> array(
                            'true'	=> __( 'Parse shortcodes inside the field values', 'wpv-views' ),
                            ''		=> __( 'Do not parse shortcodes inside the field values', 'wpv-views' ),
                        ),
                        'default'	=> '',
                    ),
                ),
            ),
        ),
    );
    return $data;
}

/**
 * Views-Shortcode: wpv-post-comments-number
 *
 * Description: Displays the number of comments for the current post
 *
 * Parameters:
 * 'none' => Text if there are no comments. Default - "No Comments"
 * 'one'  => Text if there is only one comment. Default - "1 Comment"
 * 'more' => Text if there is more than one comment. Default "% Comments"
 *
 * Example usage:
 * This post has [wpv-post-comments-number none="No Comments" one="1 Comment" more="% Comments"]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_comments_number($atts) {
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);
	global $WPVDebug, $post;

	if ( function_exists('icl_t') )
	{
		if( isset($atts['none']) )
		{
			icl_register_string('plugin Views', 'No comments-'.md5($atts['none']), $atts['none'] );
			$atts['none'] = icl_t('plugin Views', 'No comments-'.md5($atts['none']), $atts['none'] );
		}
		if( isset($atts['one']) )
		{
			icl_register_string('plugin Views', 'One comment-'.md5($atts['one']), $atts['one'] );
			$atts['one'] = icl_t('plugin Views', 'One comment-'.md5($atts['one']), $atts['one'] );
		}
		if( isset($atts['more']) )
		{
			icl_register_string('plugin Views', 'More comments-'.md5($atts['more']), $atts['more']);
			$atts['more'] = icl_t('plugin Views', 'More comments-'.md5($atts['more']), $atts['more'] );
		}
	}

	extract(
		shortcode_atts(
			array(
				'none' => __('No Comments', 'wpv-views'),
				'one' => __('1 Comment', 'wpv-views'),
				'more' => __('% Comments', 'wpv-views')
			),
			$atts
		)
	);

	ob_start();

	wp_count_comments($post->ID);

	comments_number($none, $one, $more);

	$out = ob_get_clean();
	apply_filters('wpv_shortcode_debug','wpv-post-comments-number', json_encode($atts), $WPVDebug->get_mysql_last(), 'Data received from cache', $out);
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_comments_number_data
*
* Register the wpv-post-comments-number shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_comments_number_data' );

function wpv_shortcodes_register_wpv_post_comments_number_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-comments-number'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_comments_number_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_comments_number_data() {
    $data = array(
        'name' => __( 'Post comments number', 'wpv-views' ),
        'label' => __( 'Post comments number', 'wpv-views' ),
        'post-selection' => true,
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'none' => array(
                        'label' => __( 'Text to display when there are no comments', 'wpv-views'),
                        'type' => 'text',
                        'default' => __('No Comments', 'wpv-views'),
                    ),
                    'one' => array(
                        'label' => __( 'Text to display when there is one comment', 'wpv-views'),
                        'type' => 'text',
                        'default' => __('1 Comment', 'wpv-views'),
                    ),
                    'more' => array(
                        'label' => __( 'Text to display when there is more than one comment', 'wpv-views'),
                        'type' => 'text',
                        'default' => __('% Comments', 'wpv-views'),
						'description' => __( '% - placeholder for the number of comments', 'wpv-views' )
                    ),
                ),
            ),
        ),
    );
    return $data;
}

function wpv_shortcode_wpv_comment_title($atts){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);


}

function wpv_shortcode_wpv_comment_body($atts){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);


}

function wpv_shortcode_wpv_comment_author($atts){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);


}

function wpv_shortcode_wpv_comment_date($atts){
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);


}

/**
 * Views-Shortcode: wpv-taxonomy-title
 *
 * Description: Display the taxonomy title as a plain text
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * [wpv-taxonomy-title]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_tax_title($atts){

	global $WP_Views;
	$out = '';
	$term = $WP_Views->get_current_taxonomy_term();

	if ($term) {
	   $out = $term->name;
	}
	apply_filters('wpv_shortcode_debug','wpv-taxonomy-title', json_encode($atts), '', 'Data received from $WP_Views object.', $out);
	return $out;
}

/**
 * Views-Shortcode: wpv-taxonomy-link
 *
 * Description: Display the taxonomy title within a link
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * [wpv-taxonomy-link]
 *
 * Link:
 *
 * Note:
 *
 */


function wpv_shortcode_wpv_tax_title_link($atts){

	global $WP_Views;
	$out = '';
	$term = $WP_Views->get_current_taxonomy_term();

	if ($term) {
		$out = '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
	}
	apply_filters('wpv_shortcode_debug','wpv-taxonomy-link', json_encode($atts), '', 'Data received from $WP_Views object.', $out);
	return $out;
}


/**
 * Views-Shortcode: wpv-taxonomy-slug
 *
 * Description: Display the taxonomy slug
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * [wpv-taxonomy-slug]
 *
 * Link:
 *
 * Note:
 *
 */
function wpv_shortcode_wpv_tax_slug($atts){

	global $WP_Views;
	$out = '';
	$term = $WP_Views->get_current_taxonomy_term();

	if ($term) {
		$out = $term->slug;
	}

	apply_filters('wpv_shortcode_debug','wpv-taxonomy-slug', json_encode($atts), '', 'Data received from $WP_Views object.', $out);
	return $out;

}

/**
 * Views-Shortcode: wpv-taxonomy-id
 *
 * Description: Display the taxonomy term ID
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * [wpv-taxonomy-id]
 *
 * Link:
 *
 * Note:
 *
 */
function wpv_shortcode_wpv_tax_id($atts){

	global $WP_Views;
	$out = '';
	$term = $WP_Views->get_current_taxonomy_term();

	if ( $term ) {
		$out = $term->term_id;
	}

	apply_filters('wpv_shortcode_debug','wpv-taxonomy-id', json_encode($atts), '', 'Data received from $WP_Views object.', $out);
	return $out;

}

/**
 * Views-Shortcode: wpv-taxonomy-url
 *
 * Description: Display the taxonomy URL as a plain text (not embedded in a HTML link)
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * [wpv-taxonomy-url]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_tax_url($atts){

	global $WP_Views;
	$out= '';
	$term = $WP_Views->get_current_taxonomy_term();

	if ($term) {
		$out = get_term_link($term);
	}
	apply_filters('wpv_shortcode_debug','wpv-taxonomy-url', json_encode($atts), '', 'Data received from $WP_Views object.', $out);
	return $out;
}


/**
 * Views-Shortcode: wpv-taxonomy-description
 *
 * Description: Display the taxonomy description text
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * [wpv-taxonomy-description]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_tax_description($atts){

	global $WP_Views;
	$out = '';
	$term = $WP_Views->get_current_taxonomy_term();

	if ($term) {
		$out = $term->description;
	}
	apply_filters('wpv_shortcode_debug','wpv-taxonomy-description', json_encode($atts), '', 'Data received from $WP_Views object.', $out);
	return $out;
}

/**
* wpv_shortcode_wpv_tax_field - [wpv-taxonomy-field]
*
* Taxonomy term termmeta shortcode
*
* @since 1.12
* @since 2.4    Fixed an issue with a PHP notice when a name for the taxonomy field in the "wpv-taxonomy-field" shortcode is not provided.
 *              When no $key is provided to the "get_term_meta", the function returns an array with all the metadata for the term.
*/

function wpv_shortcode_wpv_tax_field( $atts ) {
	global $wp_version;
	if ( version_compare( $wp_version, '4.4' ) < 0 ) {
		return;
	}
	extract(
		shortcode_atts(
			array(
				'index'		=> '',
				'name'		=> '',
				'separator'	=> ', '
			),
			$atts
		)
	);
	global $WP_Views;
	$out		= '';
	$filters	= '';
	$term		= $WP_Views->get_current_taxonomy_term();
	$meta		= false;

	// When the $name is empty, we should return an empty string, as the "get_term_meta" function will
	// return an array with all the available meta for the term instead of a certain meta value, which is not helpful.
	if ( '' == $name ) {
		return $out;
	}

	if ( ! empty( $term ) ) {
		$meta = get_term_meta( $term->term_id, $name );
		$meta = apply_filters( 'wpv-taxonomy-field-meta-' . $name, $meta );
		$filters .= 'Filter wpv-taxonomy-field-meta-' . $name .' applied. ';
		if ( $meta ) {
			if ( $index !== '' ) {
				$index = intval( $index );
				$filters .= 'displaying index ' . $index . '. ';
				$out .= $meta[ $index ];
			} else {
				$filters .= 'no index set. ';
				foreach ( $meta as $item ) {
					if ( $out != '' ) {
						$out .= $separator;
					}
					$out .= $item;
				}

			}
		}
	}

	$out = apply_filters( 'wpv-taxonomy-field-' . $name, $out, $meta );
	$filters .= 'Filter wpv-taxonomy-field-' . $name . ' applied. ';
	apply_filters( 'wpv_shortcode_debug','wpv-taxonomy-field', json_encode( $atts ), '', 'Data received from cache. '. $filters, $out );
	return $out;
}

/**
* wpv_shortcodes_register_wpv_post_field_data
*
* Register the wpv-post-field shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_taxonomy_field_data' );

function wpv_shortcodes_register_wpv_taxonomy_field_data( $views_shortcodes ) {
	$views_shortcodes['wpv-taxonomy-field'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_taxonomy_field_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_taxonomy_field_data() {
    $data = array(
        'name' => __( 'Taxonomy field', 'wpv-views' ),
        'label' => __( 'Taxonomy field', 'wpv-views' ),
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'name' => array(
                        'label' => __('Taxonomy field', 'wpv-views'),
                        'type' => 'suggest',
						'action' => 'wpv_suggest_wpv_taxonomy_field_name',
                        'description' => __('The name of the field to display', 'wpv-views'),
                        'required' => true,
                    ),
					'index_info'	=> array(
						'label'		=> __( 'Index and separator', 'wpv-views' ),
						'type'		=> 'info',
						'content'	=> __( 'If the field has multiple values, you can display just one of them or all the values using a separator.', 'pv-views' )
					),
					'index_combo'	=> array(
						'type'		=> 'grouped',
						'fields'	=> array(
							'index' => array(
								'pseudolabel'	=> __( 'Index', 'wpv-views' ),
								'type'			=> 'number',
								'description'	=> __('Leave empty to display all values.', 'wpv-views'),
							),
							'separator' => array(
								'type'			=> 'text',
								'pseudolabel'	=> __( 'Separator', 'wpv-views' ),
								'default'		=> ', ',
							),
						)
					),
                ),
            ),
        ),
    );
    return $data;
}


/**
 * Views-Shortcode: wpv-taxonomy-post-count
 *
 * Description: Display the number of posts in a taxonomy
 *
 * Parameters:
 * This takes no parameters.
 *
 * Example usage:
 * [wpv-taxonomy-post-count]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_tax_items_count($atts){
	global $WP_Views;
	$out = '';
	$term = $WP_Views->get_current_taxonomy_term();

	if ($term) {
		$out = $term->count;
	}
	apply_filters('wpv_shortcode_debug','wpv-taxonomy-post-count', json_encode($atts), '', 'Data received from $WP_Views object.', $out);
	return $out;
}

/**
 * Views-Shortcode: wpv-taxonomy-archive
 *
 * Description: Display info for current taxonomy page.
 *
 * Parameters:
 * 'info' =>
 *		  'name' - taxonomy term name (default)
 *		  'slug' - taxonomy term slug
 *		  'description' - taxonomy term description
 *		  'id' - taxonomy term ID
 *		  'taxonomy' - taxonomy
 *		  'parent' - taxonomy term parent
 *		  'count' - total posts with this taxonomy term
 *
 * Example usage:
 * Archive for [wpv-taxonomy-archive info="name"]
 *
 * Link:
 *
 * Note:
 *
 */

function wpv_shortcode_wpv_taxonomy_archive($atts){
	global $WP_Views,$cat, $term;

	$queried_object = get_queried_object();
	if ( !isset($queried_object->term_taxonomy_id) ){
		return;
	}
	$info = '';
	if ( isset($atts['info']) ){
		$info = $atts['info'];
	}
	$out = '';
	if ( empty($info) || $info === 'name' ){
		$out = $queried_object->name;
	}
	if ( $info === 'slug' ){
		$out = $queried_object->slug;
	}
	if ( $info === 'description' ){
		$out = $queried_object->description;
	}
	if ( $info === 'id' ){
		$out = $queried_object->term_taxonomy_id;
	}
	if ( $info === 'taxonomy' ){
		$out = $queried_object->taxonomy;
	}
	if ( $info === 'parent' ){
		$out = $queried_object->parent;
	}
	if ( $info === 'count' ){
		$out = $queried_object->count;
	}
	apply_filters('wpv_shortcode_debug','wpv-taxonomy-archive', json_encode($atts), '', 'Data received from cache.', $out);
	return $out;
}

/**
*
* Add the short codes to javascript so they can be added to the post visual editor toolbar.
*
* $types contains the type of items to add to the toolbar
*
* 	'post' means all wpv-post shortcodes but wpv-post-field in the Basic section.
*	'post-fields-grouped' means non-Types custom fields in the Post field section.
*	'post-extended' means wpv-post-field and wpv-for-each shortcodes in the Basic section.
* 
* 	@important To be used only on native post edit screens:
*		'types-post' means Types custom fields and usermeta fields in their own groups.
*		'types-post-usermeta' means Types usermeta in their own groups.
* 	@important Note that for generic Types items, you can use the wpcf_filter_force_include_types_fields_on_views_dialog filter.
*
* 	'user' means all wpv-user shortcodes with a UserID selector
* 
* 	'body-view-templates' means a CT section listing all available CT.
*
* 	'view' means all available Views. DEPRECATED, use the other ones.
* 	'user-view' means Views listing users.
* 	'taxonomy-view' means Views listing terms.
* 	'post-view' means Views listing posts.
*
* 	'archives' means all WPAs - where is this being used? Nowhere!!
*
* 	'wpml' means some WPML-related shortcodes.
*/

add_action( 'init', 'wpv_generic_register_primary_shortcodes_dialog_groups', -10 );

function wpv_generic_register_primary_shortcodes_dialog_groups() {
	
	global $pagenow, $wpdb;
	$nonce = '';
	
	/**
	 * wpv-post-*** shortcodes
	 */
	
	$group_id	= 'post';
	$group_data	= array(
		'name'		=> __( 'Post data', 'wpv-views' ),
		'target'	=> array( 'posts' ),
		'fields'	=> array()
	);
	
	$post_shortcodes = array(
		'wpv-post-title'			=> __( 'Post title', 'wpv-views' ),
		'wpv-post-link'				=> __( 'Post title with a link', 'wpv-views' ),
		'wpv-post-url'				=> __( 'Post URL', 'wpv-views' ),
		'wpv-post-body'				=> __( 'Post body', 'wpv-views' ),
		'wpv-post-excerpt'			=> __( 'Post excerpt', 'wpv-views' ),
		'wpv-post-date'				=> __( 'Post date', 'wpv-views' ),
		'wpv-post-author'			=> __( 'Post author', 'wpv-views' ),
		'wpv-post-featured-image'	=> __( 'Post featured image', 'wpv-views' ),
		'wpv-post-id'				=> __( 'Post ID', 'wpv-views' ),
		'wpv-post-slug'				=> __( 'Post slug', 'wpv-views' ),
		'wpv-post-type'				=> __( 'Post type', 'wpv-views' ),
		'wpv-post-format'			=> __( 'Post format', 'wpv-views' ),
		'wpv-post-status'			=> __( 'Post status', 'wpv-views' ),
		'wpv-post-comments-number'	=> __( 'Post comments number', 'wpv-views' ),
		'wpv-post-class'			=> __( 'Post class', 'wpv-views' ),
		'wpv-post-edit-link'		=> __( 'Post edit link', 'wpv-views' ),
		'wpv-post-menu-order'		=> __( 'Post menu order', 'wpv-views' ),
		'wpv-post-field'			=> __( 'Post field', 'wpv-views' ),
		'wpv-for-each'				=> __( 'Post field iterator', 'wpv-views' ),
		'wpv-post-previous-link'	=> __( 'Post previous link', 'wpv-views' ),
		'wpv-post-next-link'		=> __( 'Post next link', 'wpv-views' ),
	);
	foreach ( $post_shortcodes as $post_shortcode_slug => $post_shortcode_title ) {
		$group_data['fields'][ $post_shortcode_slug ] = array(
			'name'		=> $post_shortcode_title,
			'shortcode'	=> $post_shortcode_slug,
			'callback'	=> "WPViews.shortcodes_gui.wpv_insert_shortcode_dialog_open({ shortcode: '" . esc_js( $post_shortcode_slug ) . "', title: '" . esc_js( $post_shortcode_title ) . "' })"
		);
	}
	
	do_action( 'wpv_action_wpv_register_dialog_group', $group_id, $group_data );
	
	/**
	 * Taxonomies shortcodes, just register the group to ensure that it will be correctly placed early in the dialog.
	 */
	
	$group_id	= 'post-taxonomy';
	$group_data	= array(
		'name'		=> __( 'Taxonomy', 'wpv-views' ),
		'target'	=> array( 'posts' ),
		'fields'	=> array()
	);
	
	do_action( 'wpv_action_wpv_register_dialog_group', $group_id, $group_data );
	
	/**
	 * wpv-taxonomy-*** shortcodes
	 */
	
	$group_id	= 'taxonomy';
	$group_data	= array(
		'name'		=> __( 'Taxonomy data', 'wpv-views' ),
		'target'	=> array( 'taxonomy' ),
		'fields'	=> array()
	);
	
	$taxonomy_shortcodes = array(
		'wpv-taxonomy-title'		=> __( 'Taxonomy title', 'wpv-views' ),
		'wpv-taxonomy-link'			=> __( 'Taxonomy link', 'wpv-views' ),
		'wpv-taxonomy-url'			=> __( 'Taxonomy URL', 'wpv-views' ),
		'wpv-taxonomy-slug'			=> __( 'Taxonomy slug', 'wpv-views' ),
		'wpv-taxonomy-id'			=> __( 'Taxonomy ID', 'wpv-views' ),
		'wpv-taxonomy-description'	=> __( 'Taxonomy description', 'wpv-views' ),
		'wpv-taxonomy-post-count'	=> __( 'Taxonomy post count', 'wpv-views' ),
	);
	foreach ( $taxonomy_shortcodes as $taxonomy_shortcode_slug => $taxonomy_shortcode_title ) {
		$group_data['fields'][ $taxonomy_shortcode_slug ] = array(
			'name'		=> $taxonomy_shortcode_title,
			'shortcode'	=> $taxonomy_shortcode_slug,
			'callback'	=> ''
		);
	}
	
	$group_data['fields']['wpv-taxonomy-field'] = array(
		'name'		=> __('Taxonomy field', 'wpv-views'),
		'shortcode'	=> 'wpv-taxonomy-field',
		'callback'	=> "WPViews.shortcodes_gui.wpv_insert_shortcode_dialog_open({ shortcode: 'wpv-taxonomy-field', title: '" . esc_js( __('Taxonomy field', 'wpv-views') ). "' })"
	);
	
	do_action( 'wpv_action_wpv_register_dialog_group', $group_id, $group_data );
	
	/**
	 * wpv-user shortcodes
	 */
	
	$wpv_user_shorcode_fields = array(
		'ID'				=> __( 'User ID', 'wpv-views' ),
		'user_email'		=> __( 'User Email', 'wpv-views' ),
		'user_login'		=> __( 'User Login', 'wpv-views' ),
		'user_firstname'	=> __( 'First Name', 'wpv-views' ),
		'user_lastname'		=> __( 'Last Name', 'wpv-views' ),
		'nickname'			=> __( 'Nickname', 'wpv-views' ),
		'display_name'		=> __( 'Display Name', 'wpv-views' ),
        'profile_picture'	=> __( 'Profile Picture', 'wpv-views' ),
		'user_nicename'		=> __( 'Nicename', 'wpv-views' ),
		'description'		=> __( 'Description', 'wpv-views' ),
		'yim'				=> __( 'Yahoo IM', 'wpv-views' ),
		'jabber'			=> __( 'Jabber', 'wpv-views' ),
		'aim'				=> __( 'AIM', 'wpv-views' ),
		'user_url'			=> __( 'User URL', 'wpv-views' ),
		'user_registered'	=> __( 'Registration Date', 'wpv-views' ),
		'user_status'		=> __( 'User Status', 'wpv-views' ),
		'spam'				=> __( 'User Spam Status', 'wpv-views' )
	);
	
	$group_id	= 'user';
	$group_data	= array(
		'name'		=> __( 'User data', 'wpv-views' ),
		'fields'	=> array()
	);
	
	foreach ( $wpv_user_shorcode_fields as $wpv_user_field => $wpv_user_field_title ) {
		$group_data['fields']['wpv-user-' . $wpv_user_field] = array(
			'name'		=> $wpv_user_field_title,
			'shortcode'	=> 'wpv-user field="' . $wpv_user_field . '"',
			'callback'	=> "WPViews.shortcodes_gui.wpv_insert_shortcode_dialog_open({ shortcode: 'wpv-user', title: '" . esc_js( $wpv_user_field_title ) . "', params: {attributes:{field:'" . esc_js( $wpv_user_field ) . "'}} })"
		);
	}
	
	do_action( 'wpv_action_wpv_register_dialog_group', $group_id, $group_data );
	
	/**
	 * Basic data shortcodes
	 */
	
	$group_id	= 'basic';
	$group_data	= array(
		'name'		=> __( 'Basic data', 'wpv-views' ),
		'fields'	=> array()
	);
	
	$basic_shortcodes = array(
		'wpv-bloginfo'			=> __( 'Site information', 'wpv-views' ),
		'wpv-current-user'		=> __( 'Current user information', 'wpv-views' ),
		'wpv-archive-link'		=> __( 'Post type archive link', 'wpv-views' ),
		'wpv-search-term'		=> __( 'Search term', 'wpv-views' ),
	);
	
	foreach ( $basic_shortcodes as $basic_shortcode_slug => $basic_shortcode_title ) {
		$group_data['fields'][ $basic_shortcode_slug ] = array(
			'name'		=> $basic_shortcode_title,
			'shortcode'	=> $basic_shortcode_slug,
			'callback'	=> "WPViews.shortcodes_gui.wpv_insert_shortcode_dialog_open({ shortcode: '" . esc_js( $basic_shortcode_slug ) . "', title: '" . esc_js( $basic_shortcode_title ) . "' })"
		);
	}
	
	$group_data['fields']['wpv-archive-title'] = array(
		'name'		=> __('Archive title', 'wpv-views'),
		'shortcode'	=> 'wpv-archive-title',
		'callback'	=> ''
	);
	
	do_action( 'wpv_action_wpv_register_dialog_group', $group_id, $group_data );
	
}

add_action( 'init', 'wpv_generic_register_secondary_shortcodes_dialog_groups', 110 );

function wpv_generic_register_secondary_shortcodes_dialog_groups() {
	
	global $pagenow, $wpdb;
	$nonce = '';
	
	// Add the wpv-theme-option to the Basic group
	// Needs to happen here since auto-detected frameworks are registred at init:99

	if (
		apply_filters( 'wpv_filter_framework_has_valid_framework', false ) 
		&& apply_filters( 'wpv_filter_framework_count_registered_keys', 0 ) > 0
	) {
		
		$group_id	= 'basic';
		$group_data	= array(
			'fields'	=> array(
				'wpv-theme-option' => array(
					'name'		=> __( 'Theme option', 'wpv-views' ),
					'shortcode'	=> 'wpv-theme-option',
					'callback'	=> "WPViews.shortcodes_gui.wpv_insert_shortcode_dialog_open({ shortcode: 'wpv-theme-option', title: '" . esc_js( __( 'Theme option', 'wpv-views' ) ) . "' })"
				)
			)
		);
		
		do_action( 'wpv_action_wpv_register_dialog_group', $group_id, $group_data );
		
	}
	
	/**
	 * Taxonomies shortcodes, fil the already registered group.
	 *
	 * Register late since Types taxonomies are registered later than init:-10.
	 * Let's assume that manually registered and third party registered taxonomies also need this.
	 */
	
	$group_id	= 'post-taxonomy';
	$group_data	= array();
	
	$taxonomies = get_taxonomies('', 'objects');
	$exclude_tax_slugs = array();
	$exclude_tax_slugs = apply_filters( 'wpv_admin_exclude_tax_slugs', $exclude_tax_slugs );
	foreach ( $taxonomies as $taxonomy_slug => $taxonomy ) {
		if ( 
			in_array( $taxonomy_slug, $exclude_tax_slugs ) 
			|| ! $taxonomy->show_ui
		) {
			continue;
		}
		$group_data['fields'][ $taxonomy_slug ] = array(
			'name'		=> $taxonomy->label,
			'shortcode'	=> 'wpv-post-taxonomy type="' . esc_attr( $taxonomy_slug ) . '" separator=", " format="link" show="name" order="asc"',
			'callback'	=> "WPViews.shortcodes_gui.wpv_insert_shortcode_dialog_open({ shortcode: 'wpv-post-taxonomy', title: '" . esc_js( $taxonomy->label ) . "', params: {attributes:{type:'" . esc_js( $taxonomy_slug ) . "'}} })"
		);
	}
	
	do_action( 'wpv_action_wpv_register_dialog_group', $group_id, $group_data );
	
	/**
	 * Non-Types fields grouped, on demand
	 */
	
	$group_id	= 'non-types-post-fields';
	$group_data	= array(
		'name'		=> __( 'Post fields', 'wpv-views' ),
		'target'	=> array( 'posts' ),
		'fields'	=> array(
			'wpv-non-types-fields' => array(
				'name'		=> __( 'Load non-Types custom fields', 'wpv-views' ),
				'shortcode'	=> '',
				'callback'	=> "WPViews.shortcodes_gui.load_post_field_section_on_demand( event, this )"
			)
		)
	);
	
	do_action( 'wpv_action_wpv_register_dialog_group', $group_id, $group_data );
	
	/**
	 * Password management shortcodes
	 */
	
	$group_id	= 'password-management';
	$group_data	= array(
		'name'		=> __( 'Password management', 'wpv-views' ),
		'fields'	=> array()
	);
	
	$password_shortcodes = array(
		'wpv-login-form'			=> __( 'Login form', 'wpv-views' ),
		'wpv-logout-link'			=> __( 'Logout link', 'wpv-views' ),
		'wpv-forgot-password-form'	=> __( 'Forgot password form', 'wpv-views' ),
		'wpv-reset-password-form'	=> __( 'Reset password form', 'wpv-views' ),
	);
	
	foreach ( $password_shortcodes as $password_shortcode_slug => $password_shortcode_title ) {
		$group_data['fields'][ $password_shortcode_slug ] = array(
			'name'		=> $password_shortcode_title,
			'shortcode'	=> $password_shortcode_slug,
			'callback'	=> "WPViews.shortcodes_gui.wpv_insert_shortcode_dialog_open({ shortcode: '" . esc_js( $password_shortcode_slug ) . "', title: '" . esc_js( $password_shortcode_title ) . "' })"
		);
	}
	
	do_action( 'wpv_action_wpv_register_dialog_group', $group_id, $group_data );
	
	/**
	 * Content Templates
	 */
	
	$ct_objects = get_transient( 'wpv_transient_published_cts' );
	$values_to_exclude = array();
	// Exclude current post, legacy
	if (
		in_array( $pagenow, array( 'post.php' ) )
		&& isset( $_GET["post"] )
		&& is_numeric( $_GET["post"] )
	) {
		$values_to_exclude[] = (int) $_GET["post"];
	}
	// Exclude current Content Template
	if ( 
		isset( $_GET["page"] ) 
		&& 'ct-editor' == $_GET["page"]
		&& isset( $_GET["ct_id"] )
		&& is_numeric( $_GET["ct_id"] )
	) {
		$values_to_exclude[] = (int) $_GET["ct_id"];
	}
	// Exclude all Loop Templates
	$exclude_loop_templates_ids = wpv_get_loop_content_template_ids();
	if ( count( $exclude_loop_templates_ids ) > 0 ) {
		$exclude_loop_templates_ids_sanitized = array_map( 'esc_attr', $exclude_loop_templates_ids );
		$exclude_loop_templates_ids_sanitized = array_map( 'trim', $exclude_loop_templates_ids_sanitized );
		// is_numeric + intval does sanitization
		$exclude_loop_templates_ids_sanitized = array_filter( $exclude_loop_templates_ids_sanitized, 'is_numeric' );
		$exclude_loop_templates_ids_sanitized = array_map( 'intval', $exclude_loop_templates_ids_sanitized );
		if ( count( $exclude_loop_templates_ids_sanitized ) > 0 ) {
			$values_to_exclude = array_merge( $values_to_exclude, $exclude_loop_templates_ids_sanitized );
		}
	}
	// Get available Content Templates
	if ( $ct_objects === false ) {
		$values_to_prepare = array();
		$values_to_prepare[] = 'view-template';
		$view_template_available = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT ID, post_title, post_name FROM {$wpdb->posts}
				WHERE post_type = %s
				AND post_status in ('publish')",
				$values_to_prepare
			)
		);
		set_transient( 'wpv_transient_published_cts', $view_template_available, WEEK_IN_SECONDS );
	} else {
		$view_template_available = $ct_objects;
	}
	// Generate the group
	if ( 
		is_array( $view_template_available ) 
		&& count( $view_template_available ) > 0
	) {
		
		$group_id	= 'content-template';
		$group_data	= array(
			'name'		=> __( 'Content Template', 'wpv-views' ),
			'fields'	=> array()
		);
		foreach ( $view_template_available as $view_template ) {
			if ( ! in_array( $view_template->ID, $values_to_exclude ) ) {
				$group_data['fields'][ $view_template->post_name ] = array(
					'name'		=> $view_template->post_title,
					'shortcode'	=> 'wpv-post-body view_template="' . esc_js( $view_template->post_name ) . '"',
					'callback'	=> ''
				);
			}
		}
		
		do_action( 'wpv_action_wpv_register_dialog_group', $group_id, $group_data );
	}
	
	do_action( 'wpv_action_wpv_register_dialog_group', $group_id, $group_data );
	
	/**
	 * Views
	 */
	$views_objects = get_transient( 'wpv_transient_published_views' );
	
	$current_id = 0;
	if ( 
		in_array( $pagenow, array( 'post.php' ) ) 
		&& isset( $_GET["post"] ) 
	) {
		$current_id = (int) $_GET["post"];
	} else if ( in_array( $pagenow, array( 'post-new.php' ) ) ) {
		global $post;
		if ( isset( $post->ID ) ) {
			$current_id = $post->ID;
		}
	}
	
	$values_to_exclude = array();
	if ( 
		isset( $_GET["page"] ) 
		&& 'views-editor' == $_GET["page"]
		&& isset( $_GET["view_id"] )
		&& is_numeric( $_GET["view_id"] )
	) {
		$values_to_exclude[] = (int) $_GET["view_id"];
	}
	if ( 
		isset( $_POST["action"] ) 
		&& (
			'wpv_loop_wizard_add_field' == $_POST["action"]
			|| 'wpv_loop_wizard_load_saved_fields' == $_POST["action"]
		)
		&& isset( $_POST["view_id"] )
		&& is_numeric( $_POST["view_id"] )
	) {
		$values_to_exclude[] = (int) $_POST["view_id"];
	}
	
	$view_groups = array(
		'posts-view'	=> array(
			'name'		=> __( 'Post View', 'wpv-views' ),
			'fields'	=> array()
		),
		'taxonomy-view'	=> array(
			'name'		=> __( 'Taxonomy View', 'wpv-views' ),
			'fields'	=> array()
		),
		'users-view'	=> array(
			'name'		=> __( 'User View', 'wpv-views' ),
			'fields'	=> array()
		)
	);
	
	if ( $views_objects === false ) {
		$view_available = $wpdb->get_results(
			"SELECT ID, post_title, post_name FROM {$wpdb->posts}
			WHERE post_type='view'
			AND post_status in ('publish')"
		);
		$views_objects_transient_to_update = array(
			'archive'	=> array(),
			'posts'		=> array(),
			'taxonomy'	=> array(),
			'users'		=> array()
		);
		$wpv_filter_wpv_get_view_settings_args = array(
			'override_view_settings'	=> false, 
			'extend_view_settings'		=> false, 
			'public_view_settings'		=> false
		);
		foreach ( $view_available as $view ) {
			if ( WPV_View_Base::is_archive_view( $view->ID ) ) {
				// Archive Views - add only to cache
				$views_objects_transient_to_update['archive'][] = $view;
			} else {
				$view_settings = apply_filters( 'wpv_filter_wpv_get_view_settings', array(), $view->ID, $wpv_filter_wpv_get_view_settings_args );
				$current_view_type = 'posts';
				if ( isset( $view_settings['query_type'][0] ) ) {
					$current_view_type = $view_settings['query_type'][0];
				}
				if ( ! in_array( $view->ID, $values_to_exclude ) ) {
					$view_groups[ $current_view_type . '-view' ]['fields'][ $view->post_name ] = array(
						'name'		=> $view->post_title,
						'shortcode'	=> 'wpv-view name="' . esc_html( $view->post_name ) . '"',
						'callback'	=> 'WPViews.shortcodes_gui.wpv_insert_view_shortcode_dialog_open({view_id:\'' . esc_js( $view->ID ) . '\', view_title: \'' . esc_js( $view->post_title ) . '\', view_name:\'' . esc_js( $view->post_name ) . '\'})'
					);
				}
				$views_objects_transient_to_update[$current_view_type][] = $view;
			}
		}
		set_transient( 'wpv_transient_published_views', $views_objects_transient_to_update, WEEK_IN_SECONDS );
	} else {
		$view_query_types = array( 'posts', 'taxonomy', 'users' );
		foreach ( $view_query_types as $view_type ) {
			if ( 
				isset( $views_objects[ $view_type ] )
				&& is_array( $views_objects[ $view_type ] )
			) {
				foreach ( $views_objects[ $view_type ] as $view ) {
					if ( ! in_array( $view->ID, $values_to_exclude ) ) {
						$view_groups[ $view_type . '-view' ]['fields'][ $view->post_name ] = array(
							'name'		=> $view->post_title,
							'shortcode'	=> 'wpv-view name="' . esc_html( $view->post_name ) . '"',
							'callback'	=> 'WPViews.shortcodes_gui.wpv_insert_view_shortcode_dialog_open({view_id:\'' . esc_js( $view->ID ) . '\', view_title: \'' . esc_js( $view->post_title ) . '\', view_name:\'' . esc_js( $view->post_name ) . '\'})'
						);
					}
				}
			}
		}
	}
	
	foreach ( $view_groups as $view_group_candidate_id => $view_group_candidate_data ) {
		if ( count( $view_group_candidate_data['fields'] ) > 0 ) {
			do_action( 'wpv_action_wpv_register_dialog_group', $view_group_candidate_id, $view_group_candidate_data );
		}
	}
	
}

// DEPRECATED, only used by the Loop Wiard now :-/

function add_short_codes_to_js( $types, $editor ) {

	global $wpv_shortcodes, $wpdb, $WP_Views, $sitepress;
	$views_shortcodes_with_api_obj = apply_filters('wpv_filter_wpv_shortcodes_gui_data', array());
	$views_shortcodes_with_api = array_keys( $views_shortcodes_with_api_obj );

	$index = 0;
	$nonce = wp_create_nonce('wpv_editor_callback');
	foreach( $wpv_shortcodes as $shortcode ) {

		if ( in_array( $shortcode[0], $views_shortcodes_with_api ) ) {
			$shortcode[3] = "WPViews.shortcodes_gui.wpv_insert_popup('" . esc_js( $shortcode[0] ) . "', '" . esc_js( $shortcode[1] ) . "', {}, '" . $nonce . "', this )";
		}

		if (
			in_array( 'post', $types ) // Add the wpv-post shortcodes plus non-Types custom fields
			&& strpos( $shortcode[0], 'wpv-post-' ) === 0
			&& $shortcode[0] != 'wpv-post-field'
			&& function_exists( $shortcode[2] )
		) {
			// All wpv-post-*** shortcodes but wpv-post-field
			if ( isset( $shortcode[3] ) ) {
				$editor->add_insert_shortcode_menu($shortcode[1], $shortcode[0], __('Basic', 'wpv-views'), $shortcode[3]);
			} else {
				$editor->add_insert_shortcode_menu($shortcode[1], $shortcode[0], __('Basic', 'wpv-views'));
			}
			$index += 1;
		}
	}
	
	if ( 
		in_array( 'post', $types ) 
		&& defined( 'CRED_FE_VERSION' )
	) {
		// Add the toolset-edit-post-link item, only when CRED is available
		// @since 2.4.0
		$editor->add_insert_shortcode_menu(
			__( 'CRED edit-post link', 'wpv-views' ),
			'toolset-edit-post-link',
			__( 'CRED Editing', 'wpv-views' ),
			"WPViews.shortcodes_gui.wpv_insert_popup('toolset-edit-post-link', '" . esc_js( __( 'CRED edit-post link', 'wpv-views' ) ) . "', {}, '" . $nonce . "', this )"
		);
		$index += 1;
	}
		
	if ( in_array( 'post-fields-placeholder', $types ) ) {
		$menu = __( 'Post field', 'wpv-views' );
		$editor->add_insert_shortcode_menu(
			'<i class="icon-plus-sign fa fa-plus-square"></i> ' . __( 'Load non-Types custom fields', 'wpv-views' ),
			'',
			$menu,
			"WPViews.shortcodes_gui.load_post_field_section_on_demand( event, this )"
		);
		$index += 1;
	}
	
	if ( in_array( 'post-fields-grouped', $types ) ) {
		$cf_keys = $WP_Views->get_meta_keys();
		foreach ( $cf_keys as $cf_key ) {
			if ( ! wpv_is_types_custom_field( $cf_key ) ) {
				// add to the javascript array (text, function, sub-menu)
				$function_name = 'wpv_field_' . $index;
				$menu = __( 'Post field', 'wpv-views' );
				$editor->add_insert_shortcode_menu(
					$cf_key,
					'wpv-post-field name="' . $cf_key . '"',
					$menu
				);
				$index += 1;
			}
		}
	}

	if ( in_array( 'post-extended', $types ) ) {
		// Add the wpv-post-field just in case
		$editor->add_insert_shortcode_menu(
			__('Post field', 'wpv-views'),
			'wpv-post-field',
			__('Basic', 'wpv-views'),
			"WPViews.shortcodes_gui.wpv_insert_popup('wpv-post-field', '" . esc_js( __( 'Post field', 'wpv-views' ) ) . "', {}, '" . $nonce . "', this )"
		);
		$index += 1;
		// Add the wpv-for-each iterator
		$editor->add_insert_shortcode_menu(
			__('Post field iterator', 'wpv-views'),
			'wpv-for-each',
			__('Basic', 'wpv-views'),
			"WPViews.shortcodes_gui.wpv_insert_popup('wpv-for-each', '" . esc_js( __( 'Post field iterator', 'wpv-views' ) ) . "', {}, '" . $nonce . "', this )"
		);
		$index += 1;
	}
	
	/*
	* Note that the following two actions only have callbacks from Types on post.php and post-new.php
	* On Views and WPA edit screens, postmeta and usermeta items are added automatically by Types without needing to call them
	*/
	if ( in_array( 'types-post', $types ) ) {
		do_action( 'wpv_action_wpv_add_types_postmeta_to_editor', $editor );
	}
	if ( in_array( 'types-post-usermeta', $types ) ) {
		do_action( 'wpv_action_wpv_add_types_post_usermeta_to_editor', $editor );
	}
	
	if ( in_array( 'user', $types ) ) {
		$user_shortcodes = array(
			'ID'			=> array(
				'label'	=> __('User ID', 'wpv-views'),
				'code'	=> 'wpv-user field="ID"'
			),
			'user_email'		=> array(
				'label'	=> __('User Email', 'wpv-views'),
				'code'	=> 'wpv-user field="user_email"'
			),
			'user_login'		=> array(
				'label'	=> __('User Login', 'wpv-views'),
				'code'	=> 'wpv-user field="user_login"'
			),
			'user_firstname'	=> array(
				'label'	=> __('First Name', 'wpv-views'),
				'code'	=> 'wpv-user field="user_firstname"'
			),
			'user_lastname'		=> array(
				'label'	=> __('Last Name', 'wpv-views'),
				'code'	=> 'wpv-user field="user_lastname"'
			),
			'nickname'			=> array(
				'label'	=> __('Nickname', 'wpv-views'),
				'code'	=> 'wpv-user field="nickname"'
			),
			'display_name'		=> array(
				'label'	=> __('Display Name', 'wpv-views'),
				'code'	=> 'wpv-user field="display_name"'
			),
            'profile_picture'	=> array(
                'label'	=> __( 'Profile picture', 'wpv-views' ),
                'code'	=> 'wpv-user field="profile_picture"'
            ),
			'user_nicename'			=> array(
				'label'	=> __('Nicename', 'wpv-views'),
				'code'	=> 'wpv-user field="user_nicename"'
			),
			'description'		=> array(
				'label'	=> __('Description', 'wpv-views'),
				'code'	=> 'wpv-user field="description"'
			),
			'yim'				=> array(
				'label'	=> __('Yahoo IM', 'wpv-views'),
				'code'	=> 'wpv-user field="yim"'
			),
			'jabber'			=> array(
				'label'	=> __('Jabber', 'wpv-views'),
				'code'	=> 'wpv-user field="jabber"'
			),
			'aim'				=> array(
				'label'	=> __('AIM', 'wpv-views'),
				'code'	=> 'wpv-user field="aim"'
			),
			'user_url'			=> array(
				'label'	=> __('User URL', 'wpv-views'),
				'code'	=> 'wpv-user field="user_url"'
			),
			'user_registered'	=> array(
				'label'	=> __('Registration Date', 'wpv-views'),
				'code'	=> 'wpv-user field="user_registered"'
			),
			'user_status'		=> array(
				'label'	=> __('User Status', 'wpv-views'),
				'code'	=> 'wpv-user field="user_status"'
			),
			'spam'				=> array(
				'label'	=> __('User Spam Status', 'wpv-views'),
				'code'	=> 'wpv-user field="spam"'
			),
		);
		foreach ( $user_shortcodes as $u_shortcode_slug => $u_shortcode_data ) {
			$editor->add_insert_shortcode_menu(
				$u_shortcode_data['label'],
				$u_shortcode_data['code'],
				__( 'User basic data', 'wpv-views' ),
				"WPViews.shortcodes_gui.wpv_insert_popup('wpv-user', '" . esc_js( $u_shortcode_data['label'] ) . "', {attributes:{field:'" . esc_js( $u_shortcode_slug ) . "'}}, '" . $nonce . "', this )"
			);
			$index += 1;
		}
		
		// Add the toolset-edit-user-link item, only when CRED is available
		// @since 2.4.0
		if ( defined( 'CRED_FE_VERSION' ) ) {
			$editor->add_insert_shortcode_menu(
				__( 'CRED edit-user link', 'wpv-views' ),
				'toolset-edit-user-link',
				__( 'CRED Editing', 'wpv-views' ),
				"WPViews.shortcodes_gui.wpv_insert_popup('toolset-edit-user-link', '" . esc_js( __( 'CRED edit-user link', 'wpv-views' ) ) . "', {}, '" . $nonce . "', this )"
			);
			$index += 1;
		}
		
	}

	// Content Templates
	if ( in_array( 'body-view-templates', $types ) ) {
		global $pagenow;
		$ct_objects = get_transient( 'wpv_transient_published_cts' );
		$values_to_exclude = array();
		if (
			in_array( $pagenow, array( 'post.php' ) )
			&& isset( $_GET["post"] )
			&& is_numeric( $_GET["post"] )
		) {
			$values_to_exclude[] = (int) $_GET["post"];
		}
		if ( 
			isset( $_GET["page"] ) 
			&& 'ct-editor' == $_GET["page"]
			&& isset( $_GET["ct_id"] )
			&& is_numeric( $_GET["ct_id"] )
		) {
			$values_to_exclude[] = (int) $_GET["ct_id"];
		}
		$exclude_loop_templates_ids = wpv_get_loop_content_template_ids();
		if ( count( $exclude_loop_templates_ids ) > 0 ) {
			$exclude_loop_templates_ids_sanitized = array_map( 'esc_attr', $exclude_loop_templates_ids );
			$exclude_loop_templates_ids_sanitized = array_map( 'trim', $exclude_loop_templates_ids_sanitized );
			// is_numeric + intval does sanitization
			$exclude_loop_templates_ids_sanitized = array_filter( $exclude_loop_templates_ids_sanitized, 'is_numeric' );
			$exclude_loop_templates_ids_sanitized = array_map( 'intval', $exclude_loop_templates_ids_sanitized );
			if ( count( $exclude_loop_templates_ids_sanitized ) > 0 ) {
				$values_to_exclude = array_merge( $values_to_exclude, $exclude_loop_templates_ids_sanitized );
			}
		}
		if ( $ct_objects === false ) {
			$values_to_prepare = array();
			$values_to_prepare[] = 'view-template';
			$view_template_available = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT ID, post_title, post_name FROM {$wpdb->posts}
					WHERE post_type = %s
					AND post_status in ('publish')",
					$values_to_prepare
				)
			);
			set_transient( 'wpv_transient_published_cts', $view_template_available, WEEK_IN_SECONDS );
		} else {
			$view_template_available = $ct_objects;
		}
		if ( is_array( $view_template_available ) ) {
			foreach ( $view_template_available as $view_template ) {
				if ( ! in_array( $view_template->ID, $values_to_exclude ) ) {
					$editor->add_insert_shortcode_menu( esc_html( $view_template->post_title ), 'wpv-post-body view_template="' . esc_js( $view_template->post_name ) . '"', __('Content Template', 'wpv-views'));
					$index += 1;
				}
			}
		}
	}

	if (
		in_array( 'view', $types )
		|| in_array( 'archives', $types )
		|| in_array( 'user-view', $types )
		|| in_array( 'taxonomy-view', $types )
		|| in_array( 'post-view', $types )
	) {
		$views_objects = get_transient( 'wpv_transient_published_views' );
		$views_objects_transient_to_update = array(
			'archive' => array(),
			'posts' => array(),
			'taxonomy' => array(),
			'users' => array()
		);
		$values_to_exclude = array();
		if ( 
			isset( $_GET["page"] ) 
			&& 'views-editor' == $_GET["page"]
			&& isset( $_GET["view_id"] )
			&& is_numeric( $_GET["view_id"] )
		) {
			$values_to_exclude[] = (int) $_GET["view_id"];
		}
		if ( 
			isset( $_POST["action"] ) 
			&& (
				'wpv_loop_wizard_add_field' == $_POST["action"]
				|| 'wpv_loop_wizard_load_saved_fields' == $_POST["action"]
			)
			&& isset( $_POST["view_id"] )
			&& is_numeric( $_POST["view_id"] )
		) {
			$values_to_exclude[] = (int) $_POST["view_id"];
		}
		if ( $views_objects === false ) {
			$view_available = $wpdb->get_results(
				"SELECT ID, post_title, post_name FROM {$wpdb->posts}
				WHERE post_type='view'
				AND post_status in ('publish')"
			);
			foreach ( $view_available as $view ) {
				if ( $WP_Views->is_archive_view( $view->ID ) ) {
					// Archive Views - add only if in_array( 'archives', $types )
					if ( 
						in_array( 'archives', $types ) 
						&& ! in_array( $view->ID, $values_to_exclude )
					) {
						$editor->add_insert_shortcode_menu( esc_html( $view->post_title ), 'wpv-view name="' . esc_js( $view->post_name ) . '"', __( 'Archive', 'wpv-views' ) );
						$index += 1;
					}
					$views_objects_transient_to_update['archive'][] = $view;
				} else {
					$view_settings = get_post_meta( $view->ID, '_wpv_settings', true );
					$view_type = 'posts';
					if ( isset( $view_settings['query_type'][0] ) ) {
						$view_type = $view_settings['query_type'][0];
					}
					if ( 
						in_array( 'user-view', $types ) 
						&& $view_type == 'users' 
						&& ! in_array( $view->ID, $values_to_exclude )
					) {
						// Add Views listing users
						$editor->add_insert_shortcode_menu(
							esc_html( $view->post_title ),
							'wpv-view name="' . esc_html( $view->post_title ) . '"',
							__( 'User View', 'wpv-views' ),
							'WPViews.shortcodes_gui.wpv_insert_view_shortcode_dialog_open({view_id:\'' . esc_js( $view->ID ) . '\', view_title: \'' . esc_js( $view->post_title ) . '\', view_name:\'' . esc_js( $view->post_name ) . '\'})'
						);
						$index += 1;
					}
					if ( 
						in_array( 'taxonomy-view', $types ) 
						&& $view_type == 'taxonomy' 
						&& ! in_array( $view->ID, $values_to_exclude )
					) {
						// Add Views listing taxonomies
						$editor->add_insert_shortcode_menu(
							esc_html( $view->post_title ),
							'wpv-view name="' . esc_html( $view->post_title ) . '"',
							__( 'Taxonomy View', 'wpv-views' ),
							'WPViews.shortcodes_gui.wpv_insert_view_shortcode_dialog_open({view_id:\'' . esc_js( $view->ID ) . '\', view_title: \'' . esc_js( $view->post_title ) . '\', view_name:\'' . esc_js( $view->post_name ) . '\'})'
						);
						$index += 1;
					}
					if ( 
						in_array( 'post-view', $types ) 
						&& $view_type == 'posts' 
						&& ! in_array( $view->ID, $values_to_exclude )
					) {
						// Add Views listing posts
						$editor->add_insert_shortcode_menu(
							esc_html( $view->post_title ),
							'wpv-view name="' . esc_html( $view->post_title ) . '"',
							__( 'Post View', 'wpv-views' ),
							'WPViews.shortcodes_gui.wpv_insert_view_shortcode_dialog_open({view_id:\'' . esc_js( $view->ID ) . '\', view_title: \'' . esc_js( $view->post_title ) . '\', view_name:\'' . esc_js( $view->post_name ) . '\'})'
						);
					}
					$views_objects_transient_to_update[$view_type][] = $view;
				}
			}
			set_transient( 'wpv_transient_published_views', $views_objects_transient_to_update, WEEK_IN_SECONDS );
		} else {
			if ( 
				in_array( 'archives', $types ) 
				&& isset( $views_objects['archive'] )
				&& is_array( $views_objects['archive'] )
			) {
				foreach ( $views_objects['archive'] as $view ) {
					if ( ! in_array( $view->ID, $values_to_exclude ) ) {
						$editor->add_insert_shortcode_menu( esc_html( $view->post_title ), 'wpv-view name="' . esc_js( $view->post_name ) . '"', __( 'Archive', 'wpv-views' ) );
						$index += 1;
					}
				}
			}
			if ( 
				in_array( 'post-view', $types ) 
				&& isset( $views_objects['posts'] )
				&& is_array( $views_objects['posts'] )
			) {
				foreach ( $views_objects['posts'] as $view ) {
					if ( ! in_array( $view->ID, $values_to_exclude ) ) {
						$editor->add_insert_shortcode_menu(
							esc_html( $view->post_title ),
							'wpv-view name="' . esc_html( $view->post_title ) . '"',
							__( 'Post View', 'wpv-views' ),
							'WPViews.shortcodes_gui.wpv_insert_view_shortcode_dialog_open({view_id:\'' . esc_js( $view->ID ) . '\', view_title: \'' . esc_js( $view->post_title ) . '\', view_name:\'' . esc_js( $view->post_name ) . '\'})'
						);
						$index += 1;
					}
				}
			}
			if ( 
				in_array( 'taxonomy-view', $types ) 
				&& isset( $views_objects['taxonomy'] )
				&& is_array( $views_objects['taxonomy'] )
			) {
				foreach ( $views_objects['taxonomy'] as $view ) {
					if ( ! in_array( $view->ID, $values_to_exclude ) ) {
						$editor->add_insert_shortcode_menu(
							esc_html( $view->post_title ),
							'wpv-view name="' . esc_html( $view->post_title ) . '"',
							__( 'Taxonomy View', 'wpv-views' ),
							'WPViews.shortcodes_gui.wpv_insert_view_shortcode_dialog_open({view_id:\'' . esc_js( $view->ID ) . '\', view_title: \'' . esc_js( $view->post_title ) . '\', view_name:\'' . esc_js( $view->post_name ) . '\'})'
						);
						$index += 1;
					}
				}
			}
			if ( 
				in_array( 'user-view', $types ) 
				&& isset( $views_objects['users'] )
				&& is_array( $views_objects['users'] )
			) {
				foreach ( $views_objects['users'] as $view ) {
					if ( ! in_array( $view->ID, $values_to_exclude ) ) {
						$editor->add_insert_shortcode_menu(
							esc_html( $view->post_title ),
							'wpv-view name="' . esc_html( $view->post_title ) . '"',
							__( 'User View', 'wpv-views' ),
							'WPViews.shortcodes_gui.wpv_insert_view_shortcode_dialog_open({view_id:\'' . esc_js( $view->ID ) . '\', view_title: \'' . esc_js( $view->post_title ) . '\', view_name:\'' . esc_js( $view->post_name ) . '\'})'
						);
						$index += 1;
					}
				}
			}
		}
    }

	// @todo move this to the WPML file with dependency-free hooks
	if ( in_array( 'wpml', $types ) ) {
		do_action( 'wpv_action_wpv_add_wpml_shortcodes_to_editor', $editor, $nonce );
	}

	if ( defined( 'WPSEO_VERSION' ) ) {
		$editor->add_insert_shortcode_menu(
			__( 'Yoast SEO breadcrumbs', 'wpv-views' ),
			'yoast-breadcrumbs',
			'Yoast SEO'
		);
		$index += 1;
	}
	
	if ( in_array( 'loop-wizard-for-posts', $types ) ) {
		do_action( 'wpv_action_wpv_add_field_on_loop_wizard_for_posts', $editor, $nonce );
	}
	
	if ( in_array( 'loop-wizard-for-taxonomy', $types ) ) {
		do_action( 'wpv_action_wpv_add_field_on_loop_wizard_for_taxonomy', $editor, $nonce );
	}
	
	if ( in_array( 'loop-wizard-for-users', $types ) ) {
		do_action( 'wpv_action_wpv_add_field_on_loop_wizard_for_users', $editor, $nonce );
	}

    return $index;
}

function wpv_post_taxonomies_shortcode() {
	add_shortcode('wpv-post-taxonomy', 'wpv_post_taxonomies_shortcode_render');
	add_filter('editor_addon_menus_wpv-views', 'wpv_post_taxonomies_editor_addon_menus_wpv_views_filter', 11);
}

/**
 * Views-Shortcode: wpv-post-taxonomy
 *
 * Description: Display the taxonomy for the current post.
 *
 * Parameters:
 * 'type' => The name of the taxonomy to be displayed
 * 'separator' => Separator to use when there are multiple taxonomy terms for the post. The default is a comma.
 * 'format' => 'link'|'url'|'name'|'description'|'slug'|'count'. Defaults to 'link'
 *     DEPRECATED 'text' defaults to show="name"
 * 'show' => 'name'|'description'|'slug'|'count'. Defaults to 'name'
 *     USED ONLY when format="link" to set the anchor
 *     DEPRECATED when used in combination with format="text"
 * 'order' => 'asc', 'desc'. Defaults to 'asc'
 *
 * Example usage:
 * Filed under [wpv-post-taxonomy type="category" separator=", " format="link" show="name" order="asc"]
 *
 * Link:
 *
 * Note:
 *
 */


function wpv_post_taxonomies_shortcode_render($atts) {
	$post_id_atts = new WPV_wpcf_switch_post_from_attr_id($atts);

	extract(
		shortcode_atts(
			array(
				'separator' => ', ',
				'format' => 'link',
				'show' => 'name',
				'order' => 'asc'
			),
			$atts
		)
	);

	$out = '';
	if ( empty( $atts['type'] ) ) {
		return $out;
	}
	$types = explode( ',', $atts['type'] );
	if ( empty( $types ) ) {
		return $out;
	} else {
		$types = array_map( 'trim', $types );
		$types = array_map( 'sanitize_text_field', $types );
	}
	global $post;

	if ( !isset( $post ) ) {
		return $out;
	}

	$out_terms = array();
	foreach ( $types as $taxonomy_slug ) {
		$terms = get_the_terms( $post->ID, $taxonomy_slug );
		if ( 
			$terms 
			&& ! is_wp_error( $terms )
		) {
			foreach ( $terms as $term ) {
				switch ( $format ) {
					case 'text':// DEPRECATED at 1.9, keep for backwards compatibility
						$text = $term->name;
						switch ( $show ) {
							case 'description':
								$text = $term->description;
								break;
							case 'count':
								$text = $term->count;
								break;
							case 'slug':
								$text = $term->slug;
								break;
						}
						$out_terms[$term->name] = $text;
						break;
					case 'name':
						$out_terms[$term->name] = $term->name;
						break;
					case 'description':
						$out_terms[$term->name] = $term->description;
						break;
					case 'count':
						$out_terms[$term->name] = $term->count;
						break;
					case 'slug':
						$out_terms[$term->name] = urldecode( $term->slug );
						break;
					case 'url':
						$term_link = get_term_link( $term, $taxonomy_slug );
						$out_terms[$term->name] = $term_link;
						break;
					default:
						$term_link = get_term_link( $term, $taxonomy_slug );
						$text = $term->name;
						switch ( $show ) {
							case 'description':
								$text = $term->description;
								break;
							case 'count':
								$text = $term->count;
								break;
							case 'slug':
								$text = $term->slug;
								break;
						}
						$out_terms[$term->name] = '<a href="' . $term_link . '">' . $text . '</a>';
						break;
				}
			}
		}
	}
	if ( ! empty( $out_terms ) ) {
		if ( $order == 'asc' ) {
			ksort( $out_terms );
		} elseif ( $order == 'desc' ) {
			ksort( $out_terms );
			$out_terms = array_reverse( $out_terms );
		}
		$out = implode( $separator, $out_terms );
	}
	apply_filters('wpv_shortcode_debug','wpv-post-taxonomy', json_encode($atts), '', 'Data received from cache.', $out);
	return $out;
}

// Deprecated, keep for Loop Wizard only :-/
function wpv_post_taxonomies_editor_addon_menus_wpv_views_filter($items) {
	$taxonomies = get_taxonomies('', 'objects');
	$exclude_tax_slugs = array();
	$exclude_tax_slugs = apply_filters( 'wpv_admin_exclude_tax_slugs', $exclude_tax_slugs );
	$add = array();
	$nonce = wp_create_nonce('wpv_editor_callback');
	foreach ($taxonomies as $taxonomy_slug => $taxonomy) {
		if ( in_array($taxonomy_slug, $exclude_tax_slugs ) ) {
			continue;
		}
		if ( !$taxonomy->show_ui ) {
			continue; // Only show taxonomies with show_ui set to TRUE
		}
		$add[__('Taxonomy', 'wpv-views')][$taxonomy->label] = array(
			$taxonomy->label,
			'wpv-post-taxonomy type="' . $taxonomy_slug . '" separator=", " format="link" show="name" order="asc"',
			__('Category', 'wpv-views'),
			"WPViews.shortcodes_gui.wpv_insert_popup('wpv-post-taxonomy', '" . esc_js( $taxonomy->label ) . "', {attributes:{type:'" . esc_js( $taxonomy_slug ) . "'}}, '" . $nonce . "', this )"
		);
	}

	$part_one = array_slice($items, 0, 1);
	$part_two = array_slice($items, 1);
	$items = $part_one + $add + $part_two;
	return $items;
}

/**
* wpv_shortcodes_register_wpv_post_taxonomy_data
*
* Register the wpv-post-taxonomy shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_post_taxonomy_data' );

function wpv_shortcodes_register_wpv_post_taxonomy_data( $views_shortcodes ) {
	$views_shortcodes['wpv-post-taxonomy'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_post_taxonomy_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_post_taxonomy_data( $parameters = array(), $overrides = array() ) {
    $data = array(
        'post-selection' => true,
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'format' => array(
                        'label' => __( 'Display format', 'wpv-views'),
                        'type' => 'radio',
                        'options' => array(//'link'|'url'|'name'|'description'|'slug'|'count'
                            'link' => __('Link to term archive page', 'wpv-views'),
                            'url' => __('URL of term archive page', 'wpv-views'),
							'name' => __( 'Term name', 'wpv-views' ),
							'description' => __( 'Term description', 'wpv-views' ),
							'slug' => __( 'Term slug', 'wpv-views' ),
							'count' => __( 'Term post count', 'wpv-views' ),
                            //'text' => __('Term related text', 'wpv-views'),
                        ),
                        'default' => 'link',
                    ),
					'show' => array(
                        'label' => __( 'Anchor text when linking to the term archive page ', 'wpv-views'),
                        'type' => 'select',
                        'options' => array(
                            'name' => __('Term name', 'wpv-views'),
                            'description' => __('Term description', 'wpv-views'),
                            'slug' => __('Term slug', 'wpv-views'),
                            'count' => __('Number of terms', 'wpv-views' ),
                        ),
                        'default' => 'name',
                    ),
                    'separator' => array(
                        'label' => __( 'Separator between terms', 'wpv-views'),
                        'type' => 'text',
                        'default' => ', ',
                    ),
                    'order' => array(
                        'label' => __( 'Order ', 'wpv-views'),
                        'type' => 'radio',
                        'options' => array(
                            'asc' => __('Ascending', 'wpv-views'),
                            'desc' => __('Descending', 'wpv-views'),
                        ),
                        'default' => 'asc',
                    ),
                ),
            ),
        ),
    );
	
	$dialog_label = __( 'Post taxonomy', 'wpv-views' );
	$dialog_target = false;
	
	if ( isset( $parameters['attributes']['type'] ) ) {
		$dialog_target = $parameters['attributes']['type'];
	}
	if ( isset( $overrides['attributes']['type'] ) ) {
		$dialog_target = $overrides['attributes']['type'];
	}
	
	if ( $dialog_target ) {
		$dialog_label = wpv_shortcodes_get_wpv_post_taxonomy_data_title( $dialog_target );
	}
	
	$data['name']	= $dialog_label;
	$data['label']	= $dialog_label;

    return $data;
}

function wpv_shortcodes_get_wpv_post_taxonomy_data_title( $taxonomy_slug ) {
	
	$title = __( 'Post taxonomy', 'wpv-views' );
	
	$taxonomy_object = get_taxonomy( $taxonomy_slug );
	if ( $taxonomy_object ) {
		$title = $taxonomy_object->label;
	}
	
	return $title;
	
}

function wpv_do_shortcode($content) {

  $content = apply_filters('wpv-pre-do-shortcode', $content);

  // HACK HACK HACK
  // fix up a problem where shortcodes are not handled
  // correctly by WP when there a next to each other

  $content = str_replace('][', ']###SPACE###[', $content);
  $content = str_replace(']###SPACE###[/', '][/', $content);
  $content = do_shortcode($content);
  $content = str_replace('###SPACE###', '', $content);

  return $content;
}

add_shortcode('wpv-filter-order', 'wpv_filter_shortcode_order');
function wpv_filter_shortcode_order($atts){
	extract(
		shortcode_atts( array(), $atts )
	);

	global $WP_Views;
	$view_settings = $WP_Views->get_view_settings();

	$view_settings = apply_filters( 'wpv_filter_wpv_apply_post_view_sorting', $view_settings, $view_settings, null );
	$order_selected = $view_settings['order'];

	$orders = array('DESC', 'ASC');
	return wpv_filter_show_user_interface('wpv_order', $orders, $order_selected, $atts['style']);
}

add_shortcode('wpv-filter-types-select', 'wpv_filter_shortcode_types');
function wpv_filter_shortcode_types($atts){
	extract(
		shortcode_atts( array(), $atts )
	);

	global $WP_Views;
	$view_settings = $WP_Views->get_view_settings();

	$view_settings = wpv_filter_get_post_types_arg($view_settings, $view_settings);
	$post_types_selected = $view_settings['post_type'];

	$post_types = get_post_types(array('public'=>true));
	return wpv_filter_show_user_interface('wpv_post_type', $post_types, $post_types_selected, $atts['style']);
}

/**
 * Add a shortcode for the search input from the user
 *
 */

add_shortcode('wpv-filter-search-box', 'wpv_filter_search_box');
function wpv_filter_search_box($atts){
	extract(
		shortcode_atts( array(
            'style'		=> '',
            'class'		=> '',
			'output'	=> 'legacy',
			'placeholder' => ''
            ), $atts )
	);

	$view_settings = apply_filters( 'wpv_filter_wpv_get_object_settings', array() );
	
	$return = '';

    if ( ! empty( $style ) ) {
        $style = ' style="'. esc_attr( $style ) .'"';
    }
	
	if ( ! empty( $class ) ) {
		$class = ' ' . esc_attr( $class ) . '';
	}
	if ( 'bootstrap' == $output ) {
		$class .= ' form-control';
	}

	if ( ! empty( $placeholder ) ) {
		$aux_array = apply_filters( 'wpv_filter_wpv_get_rendered_views_ids', array() );
		$view_name = get_post_field( 'post_name', end( $aux_array ) );
		$item_value = wpv_translate( 'search_input_placeholder', $atts['placeholder'], false, 'View ' . $view_name );

    	$placeholder = ' placeholder="' . esc_attr( $item_value ) . '"';
	}

	$query_mode = 'posts';
	
	if ( 
		! isset( $view_settings['view-query-mode'] )
		|| 'normal' == $view_settings['view-query-mode'] 
	) {
		$query_mode = $view_settings['query_type'][0];
	}
	
	switch ( $query_mode ) {
		case 'posts':
			if (
				isset( $view_settings['post_search_value'] ) 
				&& isset( $view_settings['search_mode'] ) 
				&& $view_settings['search_mode'] == 'specific'
			) {
				$value = 'value="' . $view_settings['post_search_value'] . '"';
			} else {
				$value = '';
			}
			if ( isset( $_GET['wpv_post_search'] ) ) {
				$value = 'value="' . esc_attr( wp_unslash( $_GET['wpv_post_search'] ) ) . '"';
			}
			$return = '<input type="text" name="wpv_post_search" ' . $value . ' class="js-wpv-filter-trigger-delayed'.  $class . '"'. $style . $placeholder .' />';
			break;
		case 'taxonomy':
			if (
				isset( $view_settings['taxonomy_search_value'] ) 
				&& isset( $view_settings['taxonomy_search_mode'] ) 
				&& $view_settings['taxonomy_search_mode'] == 'specific'
			) {
				$value = 'value="' . $view_settings['taxonomy_search_value'] . '"';
			} else {
				$value = '';
			}
			if ( isset( $_GET['wpv_taxonomy_search'] ) ) {
				$value = 'value="' . esc_attr( $_GET['wpv_taxonomy_search'] )  . '"';
			}
			$return = '<input type="text" name="wpv_taxonomy_search" ' . $value . ''.  $class . $style . $placeholder .'/>';
			break;
	}

	return $return;
}

/**
 * Add the wpv-filter-search-box shortcode to the shortcodes GUI API.
 *
 * @since 2.4.0
 */

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_filter_search_box_shortcode_register_gui_data' );

function wpv_filter_search_box_shortcode_register_gui_data( $views_shortcodes ) {
	$views_shortcodes['wpv-filter-search-box'] = array(
		'callback' => 'wpv_filter_search_box_shortcode_get_gui_data'
	);
	return $views_shortcodes;
}

function wpv_filter_search_box_shortcode_get_gui_data( $parameters = array(), $overrides = array() ) {
	$data = array(
		'attributes' => array(
			'target-options' => array(
				'label' => __( 'Filter options', 'wpv-views' ),
				'header' => __( 'Filter options', 'wpv-views' ),
				'fields' => array(
					'value_where' => array(
						'label'		=> __( 'Where to search', 'wpv-views'),
						'type'		=> 'radio',
						'default'	=> 'full_content',
						'options'	=> array(
							'full_content'	=> __( 'Post content and title' ),
							'just_title'	=> __( 'Just post title', 'wpv-views' )
						),
						'description' => __( 'Adjust whether you want to search only in post titles or also in posts content.', 'wpv-views' ),
					),
					'value_label' => array(
						'label'		=> __( 'Label for the search box', 'wpv-views' ),
						'type'		=> 'text',
						'placeholder'	=> __( 'Search', 'wpv-views' ),
					),
					'placeholder' => array(
						'label'			=> __( 'Placeholder', 'wpv-views'),
						'type'			=> 'text',
						'default'	    => '',
						'required'		=> false
					),
				),
			),
			'style-options' => array(
				'label' => __( 'Style options', 'wpv-views' ),
				'header' => __( 'Style options', 'wpv-views' ),
				'fields' => array(
					'output' => array(
						'label'		=> __( 'Output style', 'wpv-views' ),
						'type'		=> 'radio',
						'options'	=> array(
							'legacy'	=> __( 'Raw search input', 'wpv-views' ),
							'bootstrap'	=> __( 'Fully styled search input', 'wpv-views' )
						),
						'default_force'	=> 'bootstrap'
					),
					'class_style_combo' => array(
						'label'		=> __( 'Element styling', 'wpv-views' ),
						'type'		=> 'grouped',
						'fields'	=> array(
							'class' => array(
								'pseudolabel'	=> __( 'Input classnames', 'wpv-views'),
								'type'			=> 'text',
								'description'	=> __( 'Use this to add your own classnames to the text input.', 'wpv-views' )
							),
							'style' => array(
								'pseudolabel'	=> __( 'Input style', 'wpv-views'),
								'type'			=> 'text',
								'description'	=> __( 'Use this to add your own styling to the text input.', 'wpv-views' )
							),
						),
					),
				),
			),
		),
	);
	
	$gui_action = isset( $_GET['gui_action'] ) ? sanitize_text_field( $_GET['gui_action'] ) : '';
	
	if ( 'insert' === $gui_action ) {
		if ( 'true' === toolset_getget( 'has_shortcode' ) ) {
			// If we are inserting (meaning, coming from the toolbar button), but a shortcode already exists
			// then we need not to offer styling attributes, nor label inputs.
			unset( $data['attributes']['style-options'] );
			unset( $data['attributes']['target-options']['fields']['value_label'] );
		}
	} else if ( 'edit' === $gui_action ) {
		// We need not to offer label inputs
		unset( $data['attributes']['target-options']['fields']['value_label'] );
	}
	
	
	
	$dialog_label = __( 'Text search filter', 'wpv-views' );
	
	$data['name']	= $dialog_label;
	$data['label']	= $dialog_label;
	
	return $data;
};


/**
 * Views-Shortcode: wpv-for-each
 *
 * Description: Iterate through multple items in a post meta field and output the enclosed text for each item
 *
 * Parameters:
 * 'field' => The name of post meta field.
 *
 * Example usage:
 * Output the field values as an ordered list
 * <ol>[wpv-for-each field="my-field"]<li>[wpv-post-field name="my-field"]</li>[/wpv-for-each]<ol>
 *
 * Link:
 *
 * Note:
 * <a href="#wpv-if">wpv-if</a> shortcode won't work inside a wpv-for-each shortcode
 */

function wpv_for_each_shortcode( $atts, $value ) {
	extract(
		shortcode_atts(
			array(
				'field' => '',
				'start' => 1,
				'end' => null
			),
			$atts
		)
	);
	
	if ( strpos( $value, 'wpv-b64-' ) === 0) {
		$value = substr( $value, 7 );
		$value = base64_decode( $value );
	}

	if ( $field == '' ) {
		return wpv_do_shortcode( $value );
	}

	$out = '';

	global $post;

	if ( !empty( $post ) ) {
		$meta = get_post_meta( $post->ID, $field );

		if ( !$meta ) {
			// return $value; // old behaviour
			// This happens when there is no meta with that key asociated with that post, so return nothing
			// From 1.4
			return '';
		}

		// When the metavalue for this key is empty, $meta is an array with just an empty first element
		// In that case, return nothing either
		// From 1.4
		if ( is_array( $meta ) && ( count( $meta ) == 1 ) && ( empty( $meta[0] ) ) ) {
			return '';
		}

		$start = (int) $start;
		$start = $start - 1;
		if ( is_null( $end ) ) {
			$end = count( $meta );
		}
		$end = (int) $end;
		if ( $start < 0 ) {
			$start = 0;
		}
		if ( $end > count( $meta ) ) {
			$end = count( $meta );
		}
		
		$inner_loopers = "/\\[(wpv-post-field|types).*?\\]/i";
		$counts = preg_match_all($inner_loopers, $value, $matches);
		$value_arr = array();
		for ( $i = $start; $i < $end; $i++ ) {
			// Set indexes in the wpv-post-field shortcode
			if ( $counts > 0 ) {
				$new_value = $value;
				foreach( $matches[0] as $index => $match ) {
					// execute shortcode content and replace
					$shortcode = $matches[ 1 ][ $index ];
					$apply_index = wpv_should_apply_index_for_each_field( $shortcode, $match, $field );
					
					if ( $apply_index) {
						$resolved_match = str_replace( '[' . $shortcode . ' ', '[' . $shortcode . ' index="' . $i . '" ', $match );
						$new_value = str_replace( $match, $resolved_match, $new_value );
					}
				}
				$value_arr[] = $new_value;

			} else {
				$value_arr[] = $value;
			}
		}
		$out .= implode( '', $value_arr );

	}
	apply_filters( 'wpv_shortcode_debug', 'wpv-for-each', json_encode( $atts ), '', 'Data received from cache.', $out );
	return $out;

}

function wpv_should_apply_index_for_each_field( $shortcode_type, $shortcode, $field ) {
	$apply_index = false;
	
	if ( strpos( $shortcode, " index=" ) === false ) {
		$apply_index = true;
	}
	
	return $apply_index;
	
}

/**
* wpv_shortcodes_register_wpv_for_each_data
*
* Register the wpv-for-each shortcode in the GUI API.
*
* @since 1.9
*/

add_filter( 'wpv_filter_wpv_shortcodes_gui_data', 'wpv_shortcodes_register_wpv_for_each_data' );

function wpv_shortcodes_register_wpv_for_each_data( $views_shortcodes ) {
	$views_shortcodes['wpv-for-each'] = array(
		'callback' => 'wpv_shortcodes_get_wpv_for_each_data'
	);
	return $views_shortcodes;
}

function wpv_shortcodes_get_wpv_for_each_data() {
    $data = array(
        'name' => __( 'Post field iterator', 'wpv-views' ),
        'label' => __( 'Post field iterator', 'wpv-views' ),
        //'post-selection' => true,
        'attributes' => array(
            'display-options' => array(
                'label' => __('Display options', 'wpv-views'),
                'header' => __('Display options', 'wpv-views'),
                'fields' => array(
                    'field' => array(
                        'label' => __( 'Custom field', 'wpv-views'),
                        'type' => 'suggest',
						'action' => 'wpv_suggest_wpv_post_field_name',
                        'description' => __('The name of the custom field to display', 'wpv-views'),
                        'required' => true,
                    ),
					'iteration_boundaries'	=> array(
						'label'		=> __( 'Iterator boundaries', 'wpv-views' ),
						'type'		=> 'grouped',
						'fields'	=> array(
							'start'	=> array(
								'pseudolabel'	=> __( 'Index to start', 'wpv-views'),
								'type'			=> 'number',
								'default'		=> '1',
								'description'	=> __( 'Defaults to 1.', 'wpv-views' ),
							),
							'end'	=> array(
								'pseudolabel'	=> __( 'Index to end', 'wpv-views'),
								'type'			=> 'number',
								'default'		=> '',
								'description'	=> __( 'No value means all the way until the last index.', 'wpv-views' ),
							),
						)
					),
					'parse_shortcodes' => array(
						'label'		=> __( 'Parse inner shortcodes', 'wpv-views' ),
                        'type'		=> 'radio',
                        'options'	=> array(
                            'true'	=> __( 'Parse shortcodes inside the field values', 'wpv-views' ),
                            ''		=> __( 'Do not parse shortcodes inside the field values', 'wpv-views' ),
                        ),
                        'default'	=> '',
                    ),
                ),
				'content' => array(
					'hidden' => true,
					'label' => __( 'Content of each iteration', 'wpv-views' ),
					'description' => __( 'This will be displayed on each iteration. The usual content is <code>[wpv-post-field name="field-name"]</code> where field-name is the custom field selected above.', 'wpv-views' )
				)
            ),
        ),
    );
    return $data;
}

/*
add_shortcode('wpml-breadcrumbs', 'wpv_wpml_breadcrumbs');
function wpv_wpml_breadcrumbs($atts, $value){
	ob_start();

	global $iclCMSNavigation;
	if (isset($iclCMSNavigation)) {
		$iclCMSNavigation->cms_navigation_breadcrumb('');
	}

	$result = ob_get_clean();

	return $result;
}
*/

add_shortcode('yoast-breadcrumbs', 'wpv_yoast_breadcrumbs');
function wpv_yoast_breadcrumbs($atts, $value){

	if ( function_exists('yoast_breadcrumb') ) {
		return yoast_breadcrumb("","",false);
	}

	return '';
}


/** Output value of current View's attribute.
 *
 * @param array $atts {
 *	 Shortcode attributes.
 *
 *	 @string $name Name of the attribute of current View.
 * }
 *
 * @return Attribute value or an empty string if no such attribute is set.
 *
 * @since 1.7
 */
add_shortcode( 'wpv-attribute', 'wpv_attribute' );
function wpv_attribute( $atts, $value ) {
	global $WP_Views;
	extract( shortcode_atts(
			array( 'name' => '' ),
			$atts ) );

	$view_atts = $WP_Views->get_view_shortcodes_attributes();

	if( '' == $name || !array_key_exists( $name, $view_atts ) ) {
		return '';
	}

	return $view_atts[ $name ];
}
