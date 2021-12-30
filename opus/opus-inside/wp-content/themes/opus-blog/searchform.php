<?php
/**
 * Template for displaying search forms in Opus-Blog
 *
 * @package Opus-Blog
 */

?>

<form role="search" method="get" class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="search__input" placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'opus'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search__submit"><i class="fa fa-search"></i></button>
</form>
