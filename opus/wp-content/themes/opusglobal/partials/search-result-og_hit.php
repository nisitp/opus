<div class="search-result search-result-<?php echo get_post_type(); ?>">
	<?php if ($card_image = get_field('og_image')): ?>
		<?php
		echo wp_get_attachment_image(
			$card_image,
			'card-logo',
			false,
			$attr = [
				'class' => ' result-image',
				'sizes' => '
					(max-width: 39.125em) 100vw,
					(max-width: 53.1875em) 50vw,
					680px'
			]
		) ?>
	<?php endif; ?>

	<h3 class="text-unheading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

	<span class="result-details text-subtle">
		<span class="result-type">Press Coverage</span>
		<span class="result-date"><?php the_time('F j, Y'); ?></span>
	</span>
</div>