<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();

if(have_posts()) {
	echo '<h1 class="search-title">'.__('Search Results for:', 'opus').' <span>'.get_search_query().'</span></h1>'."\n";
	while(have_posts()) {
		the_post();
		get_template_part('template-parts/post/content');
	}
} else {
	echo '<h1 class="search-title">'.__('Nothing Found', 'opus').'</h1>'."\n";
	echo '<p>'.__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'opus').'</p>'."\n";
	get_search_form();
}

get_footer();
