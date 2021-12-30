<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Opus-Blog
 */

?>

<h1 class="search-title"><?php echo __('Nothing Found', 'opus'); ?></h1>
<p><?php echo __('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'opus'); ?></p>
<?php get_search_form(); ?>
