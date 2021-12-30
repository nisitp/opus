<?php
/**
 * @package PermalinksCustomizer\Main
 */

// Make sure we don't expose any info if called directly
if ( ! defined( 'ABSPATH' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

if ( ! function_exists( "add_action" ) || ! function_exists( "add_filter" ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

define( 'PERMALINKS_CUSTOMIZER_PLUGIN_VERSION', '1.3.6' );

if ( ! defined( 'PERMALINKS_CUSTOMIZER_PATH' ) ) {
	define( 'PERMALINKS_CUSTOMIZER_PATH', plugin_dir_path( __FILE__ ) );
}

require_once( PERMALINKS_CUSTOMIZER_PATH . 'frontend/class-permalinks-customizer-frontend.php' );

$permalinks_customizer_frontend = new Permalinks_Customizer_Frontend();
$permalinks_customizer_frontend->init();

require_once( PERMALINKS_CUSTOMIZER_PATH . 'frontend/class-permalinks-customizer-form.php' );

$permalinks_customizer_form = new Permalinks_Customizer_Form();
$permalinks_customizer_form->init();

if ( is_admin() ) {
	require_once( PERMALINKS_CUSTOMIZER_PATH . 'admin/class-permalinks-customizer-admin.php' );
	new Permalinks_Customizer_Admin();

	$plugin = plugin_basename( PERMALINKS_CUSTOMIZER_FILE );
  add_filter( "plugin_action_links_$plugin", 'permalinks_customizer_settings_link' );
}

/**
 * Plugin Settings Page Link on the Plugin Page under the Plugin Name
 */
function permalinks_customizer_settings_link( $links ) {
	$settings_link = '<a href="admin.php?page=permalinks-customizer-posts-settings">Settings</a>';
	array_unshift( $links, $settings_link );
	return $links;
}

/**
 * Check Version if the version is not defined or less than to the current
 * plugin function then update the permalinks_customizer_table
 *
 * Add textdomain hook for translation
 */
function permalinks_customizer_check_plugin_version() {
	$current_version = get_option( 'permalinks_customizer_plugin_version', -1 );
	if ( $current_version === -1 || PERMALINKS_CUSTOMIZER_PLUGIN_VERSION < $current_version ) {
		require_once( PERMALINKS_CUSTOMIZER_PATH . 'admin/class-permalinks-customizer-update-taxonomy-table.php' );
		new Permalinks_Customizer_Update_Taxonomy();
	}
	load_plugin_textdomain( 'permalinks-customizer', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'permalinks_customizer_check_plugin_version' );