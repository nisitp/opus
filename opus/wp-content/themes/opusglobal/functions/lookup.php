<?php
/********************
Opus Alacra Entity Lookup

Includes:

* Style registration for shortcode
* Shortcode for outputting form
* AJAX function for retrieving XML from Alacra website

********************/


//Register styles and scripts for lookup box
function opus_lookup_register_assets() {
	// YUI assets
	wp_register_style( 'yui-autocomplete', get_stylesheet_directory_uri() . '/assets/lookup360/yui2.8.0r4/build/autocomplete/assets/skins/sam/autocomplete.css', array(), '2.8.0r4', 'all' );
	wp_register_script( 'yui-dom-event', get_stylesheet_directory_uri() . '/assets/lookup360/yui2.8.0r4/build/yahoo-dom-event/yahoo-dom-event.js', array(), '2.8.0r4', true );
	wp_register_script( 'yui-animation', get_stylesheet_directory_uri() . '/assets/lookup360/yui2.8.0r4/build/animation/animation-min.js', array(), '2.8.0r4', true );
	wp_register_script( 'yui-connection', get_stylesheet_directory_uri() . '/assets/lookup360/yui2.8.0r4/build/connection/connection-min.js', array(), '2.8.0r4', true );
	wp_register_script( 'yui-datasource', get_stylesheet_directory_uri() . '/assets/lookup360/yui2.8.0r4/build/datasource/datasource-min.js', array(), '2.8.0r4', true );
	wp_register_script( 'yui-autocomplete', get_stylesheet_directory_uri() . '/assets/lookup360/yui2.8.0r4/build/autocomplete/autocomplete-min.js', array(), '2.8.0r4', true );

	// Lookup-specific assets
	wp_register_style( 'opus-lookup', get_stylesheet_directory_uri() . '/assets/lookup360/lookup360.css', array('yui-autocomplete'), '1.0.0', 'all' );
	wp_register_script( 'opus-lookup', get_stylesheet_directory_uri() . '/assets/lookup360/lookup360.js', array( 'yui-dom-event', 'yui-animation', 'yui-connection', 'yui-datasource', 'yui-autocomplete' ), '1.0.0', true );
	wp_localize_script( 'opus-lookup', 'lookup360_endpoint', array( 'ajaxurl' => admin_url( 'admin-ajax.php?action=entity_lookup&' ) ) );
}

add_action( 'wp_enqueue_scripts', 'opus_lookup_register_assets' );


// Shortcode for Lookup Form
function opus_lookup_shortcode() {
	// Enqueue scripts and styles
	wp_enqueue_style( 'opus-lookup' );
	wp_enqueue_script( 'opus-lookup' );

	// Return form markup
    return <<<MARKUP
<div class="entity-lookup">
	<form>
		<input id="entity-keyword" type="text" name="entity_keyword" placeholder="Enter an entity name or identifier (e.g. LEI, GIIN, CIK)" onclick="ClearKeywordSearch()" />
	</form>
	<div id="entity-results"></div>
</div>
MARKUP;
}
add_shortcode( 'lookup', 'opus_lookup_shortcode' );


// Retrieve XML from Alacra.com
add_action( 'wp_ajax_entity_lookup', 'opus_lookup_retrieve' );
add_action( 'wp_ajax_nopriv_entity_lookup', 'opus_lookup_retrieve' );

function opus_lookup_retrieve() {
	// Endpoint
	$endpoint = "https://www.alacra.com/asp/autocomplete/autocomplete.asp";

	// Assemble Parameters
	$params = array(
					'request' => $_GET['request'],
					'isoencoding' => $_GET['isoencoding'],
					'token' => $_GET['token']
				);

	// Check if we have a real query
	if( !empty( $params['token'] ) ){

		// Build Full URL
		$full_url = $endpoint . "?" . http_build_query( $params );

		// Get Response
		$response = wp_remote_get( $full_url );

		// Check response
		if ( is_wp_error( $response ) ) {
			// There was an error
			$error_message = $response->get_error_message();
		} else {
			// Output XML
			header("Content-type: text/xml");
			print_r( $response['body'] );
		}
	}

	// Exit
	wp_die();
}