<?php
/**
 * Brand materials template file
 *
 * @package Opus-Blog
 */
get_header();
if(have_posts()) {
	?><h1>Brand Materials</h1><?php
	while(have_posts()) {
		the_post();
		get_template_part('template-parts/brand-material/content');
	}

    if($next = get_next_posts_link('View more +')) {
?>
    <div class="pagination">
        <?php echo $next; ?>
    </div>
<?php
    }
} else {
	get_template_part('template-parts/brand-material/content-none', 'none');
}

get_footer();
