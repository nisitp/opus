<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();
echo '<h1 class="search-title">'.__('Oops! That page can&rsquo;t be found.', 'opus').'</h1>'."\n";
echo '<p>'.__('It looks like nothing was found at this location. Maybe try a search?', 'opus').'</p>'."\n";
get_search_form();
get_footer();
