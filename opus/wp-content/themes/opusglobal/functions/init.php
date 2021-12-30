<?php
/**
 * Initial setup and constants
 */
function theme_setup() {
    // Make theme available for translation
    load_theme_textdomain('uttheme', get_template_directory() . '/lang');

    // Enable plugins to manage the document title
    // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support('title-tag');

    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus(array(
            'primary_navigation' => __('Primary Navigation', 'opusglobal'),
            'resource_navigation' => __('Resource Navigation', 'opusglobal')
    ));

    // Add post thumbnails
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');
	add_image_size( 'card-logo', 600, 295, true );
	add_image_size( 'card-graphic', 668, 328, true );
	add_image_size( 'card-graphic-large', 855, 600, true );
	add_image_size( 'full-content', 1170 );
	add_image_size( 'full-width', 1600 );

    // Add post formats
    // http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

    // Add HTML5 markup for captions
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));

    // Tell the TinyMCE editor to use a custom stylesheet
    add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'theme_setup');

/**
* filter function to force wordpress to add our custom srcset values
* @param array  $sources {
* 	One or more arrays of source data to include in the 'srcset'.
*
*	@type type array $width {
*		@type type 	string 	$url        The URL of an image source.
*       @type type 	string 	$descriptor The descriptor type used in the image
*			candidate string, either 'w' or 'x'.
*       @type type	int		$value      The source width, if paired with a 'w' *			descriptor or a pixel density value if paired with an 'x'
* 			descriptor.
* 	}
* }
* @param array  $size_array    Array of width and height values in pixels (in
* 	that order).
* @param string $image_src     The 'src' of the image.
* @param array  $image_meta    The image meta data as returned by
* 	'wp_get_attachment_metadata()'.
* @param int    $attachment_id Image attachment ID.

* @author: Aakash Dodiya
* @website: https://www.developersq.com/add-custom-srcset-values-for-responsive-images-wordpress/
*/
add_filter( 'wp_calculate_image_srcset', 'ut_add_custom_image_srcset', 10, 5 );
function ut_add_custom_image_srcset( $sources, $size_array, $image_src, $image_meta, $attachment_id ){

	// image base name
	$image_basename = wp_basename( $image_meta['file'] );
	// upload directory info array
	$upload_dir_info_arr = wp_get_upload_dir();
	// base url of upload directory
	$baseurl = $upload_dir_info_arr['baseurl'];

	// Uploads are (or have been) in year/month sub-directories.
	if ( $image_basename !== $image_meta['file'] ) {
		$dirname = dirname( $image_meta['file'] );

		if ( $dirname !== '.' ) {
			$image_baseurl = trailingslashit( $baseurl ) . $dirname;
		}
	}

	$image_baseurl = trailingslashit( $image_baseurl );
	// check whether our custom image size exists in image meta
	if( array_key_exists('full-content', $image_meta['sizes'] ) ){

		// add source value to create srcset
		$sources[ $image_meta['sizes']['full-content']['width'] ] = array(
				 'url'        => $image_baseurl .  $image_meta['sizes']['full-content']['file'],
				 'descriptor' => 'w',
				 'value'      => $image_meta['sizes']['full-content']['width'],
		);
	}

	if( array_key_exists('full-width', $image_meta['sizes'] ) ){

		// add source value to create srcset
		$sources[ $image_meta['sizes']['full-width']['width'] ] = array(
				 'url'        => $image_baseurl .  $image_meta['sizes']['full-width']['file'],
				 'descriptor' => 'w',
				 'value'      => $image_meta['sizes']['full-width']['width'],
		);
	}

	//return sources with new srcset value
	return $sources;
}


/**
 * Register sidebars
 */
function theme_widgets_init() {
    register_sidebar(array(
            'name'          => __('Primary', 'uttheme'),
            'id'            => 'sidebar-primary',
            'before_widget' => '<section class="widget %1$s %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'theme_widgets_init');

/**
 * Enable sitemap shortcode
 */
add_shortcode('sitemap', 'wp_sitemap_page_list');

function wp_sitemap_page_list(){
    return "<ul>".wp_list_pages('title_li=&echo=0')."</ul>";
}
