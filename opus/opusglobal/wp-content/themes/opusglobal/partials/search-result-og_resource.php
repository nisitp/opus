<div class="search-result search-result-<?php echo get_post_type(); ?>">
	<h3 class="text-unheading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

	<div class="result-excerpt">
		<?php echo apply_filters('trim_excerpt', get_field('excerpt')); ?>
	</div>

	<span class="result-details text-subtle">
		<span class="result-type">Resources</span>
		<span class="result-date"><?php the_time('F j, Y'); ?></span>
		<span class="result-author"><?php the_field('author'); ?></span>
	</span>
</div>