<?php

function opus_searchfilter($query) {
	if ($query->is_search && !is_admin() ) {
		$query->set('post_type',array('post','page', 'og_hit', 'og_news' ));
	}
	return $query;
}
add_filter('pre_get_posts','opus_searchfilter');

/**
 * Allows for excerpt generation outside the loop.
 * 
 * @param string $text  The text to be trimmed
 * @return string       The trimmed text
 */
function opus_trim_excerpt( $text='' )
{
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $excerpt_length = apply_filters('excerpt_length', 55);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    return wp_trim_words( $text, $excerpt_length, $excerpt_more );
}
add_filter('trim_excerpt', 'opus_trim_excerpt');