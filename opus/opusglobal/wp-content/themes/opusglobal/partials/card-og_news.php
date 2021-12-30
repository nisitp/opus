<div class="card card--press">
	<div class="card__top card__top--icon u-hidden-mobile u-hidden-tablet card__is-featured">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-circle-orange.svg" alt="Opus Global logo">
	</div>
	<div class="card__body">
		<p class="card__is-featured">
			<span class="text--pill">Newest</span>
		</p>
		<a href="<?php echo get_post_permalink(); ?>">
			<h3 class="text-unheading card__title"><?php the_title(); ?></h3>
		</a>
		<span class="text-subtle">
			<?php echo get_field('og_date') ?>
		</span>
	</div>
</div>
