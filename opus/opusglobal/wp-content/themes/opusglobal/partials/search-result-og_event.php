<div class="search-result search-result-<?php echo get_post_type(); ?>">
	<h3 class="text-unheading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

	<div class="result-excerpt">
		<?php echo apply_filters('trim_excerpt', get_field('event_description')); ?>
	</div>

	<span class="result-details text-subtle">
		<span class="result-type">Events</span>
		<span class="result-date"><?php og_event_date(); ?></span>
        <?php if($og_event_time = og_event_time()) echo '<span class="result-time">'.$og_event_time."</span>"; ?>
	</span>
</div>