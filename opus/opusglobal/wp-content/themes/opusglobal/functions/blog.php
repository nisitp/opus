<?php

/**
 * Filter the excerpt length
 *
 * @param int $length excerpt length
 * @return int (Maybe) modified excerpt length
 */
function opus_custom_excerpt_length( $length ) {

	// Keep default for Blog Index
	if ( ( is_home() && is_main_query() ) || is_search() ) {
		return $length;
	}

	// Everything else (cards, etc)
	return 20;
}
add_filter( 'excerpt_length', 'opus_custom_excerpt_length', 999 );
