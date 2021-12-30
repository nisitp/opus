<div class="card card--press">
	<a href="<?php echo get_field('og_link') ?>" class="card__top card__top--bordered" target="_blank">
		<?php if ($card_image = get_field('og_image')): ?>
			<?php
			echo wp_get_attachment_image(
				$card_image,
				'card-logo',
				false,
				$attr = [
					'class' => ' card__img',
					'sizes' => '
						(max-width: 39.125em) 100vw,
						(max-width: 53.1875em) 50vw,
						680px'
				]
			) ?>
		<?php endif; ?>
	</a>
	<div class="card__body">
		<p class="card__is-featured">
			<span class="text--pill">Newest</span>
		</p>
		<a href="<?php echo get_field('og_link') ?>" target="_blank">
			<h3 class="card__title text-unheading"><?php the_title(); ?></h3>
		</a>
		<span class="text-subtle">
			<?php echo get_field('og_date') ?>
		</span>
	</div>
</div>
