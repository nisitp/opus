<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Opus-Blog
 */
get_header();

if(have_posts()) {
	while(have_posts()) {
		the_post();
		get_template_part('template-parts/post/content');
	}

    if($next = get_next_posts_link('View more +')) {
?>
    <div class="pagination">
        <?php echo $next; ?>
    </div>
<?php
    }
} else {
	get_template_part('template-parts/post/content', 'none');
}

get_footer();