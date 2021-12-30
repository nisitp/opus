<?php
	$block_style = get_sub_field('block_style');

	$block_style_class = '';
	$default_blocks = '';

	if ($block_style == 'blocks') {
		$block_style_class = 'bg-pattern';
		$default_blocks = 'listing--blocks--default';
	}
?>

<section class="panel panel--listing <?php echo $block_style_class; ?>">
	<div class="l-content">
		<?php if ($title = get_sub_field('block_title')): ?>
			<h2 class="panel__heading"><?php echo $title; ?></h2>
		<?php endif; ?>
		<?php if ($intro = get_sub_field('block_intro')): ?>
			<div class="h5 text-unheading text-center">
				<p>
					<?php echo $intro; ?>
				</p>
			</div>
		<?php endif; ?>

		<ul class="listing--<?php echo $block_style ?> <?php echo $default_blocks; ?>">
			<?php
				// Loop through the links
				while ( have_rows('block_links') ) : the_row();

					// Grab the correct kind of link
					switch ( get_sub_field('link_type') ) {
						case 'page':
							$link_target = get_sub_field('link_target');
						break;

						case 'url':
							$link_target = get_sub_field('link_url');
						break;

						case 'other':
							$link_target = get_sub_field('link_freeform');
						break;
					}
			?>
				<li class="listing__item">
					<?php if ( $block_style == "grid" ): ?>
						<a href="<?php echo $link_target; ?>" class="listing__link">
							<span class="l-fill-width"><?php the_sub_field('link_title'); ?></span>
						</a>
					<?php elseif ( $block_style == "blocks" ): ?>
						<div class="card card--link-<?php echo $block_style ?>">
							<a href="<?php echo $link_target; ?>" class="link--static">
							<?php if ($link_image = get_sub_field('link_image')): ?>
								<?php
								echo wp_get_attachment_image(
									$link_image,
									'card-graphic',
									false,
									$attr = [
										'class' => ' card__img',
										'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 50vw, 680px'
									]
								) ?>
							<?php else: ?>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/defaults/resource-default-bg.png" class="card__img">
							<?php endif; ?>
							</a>
							<div class="card__body card__body--icon">
								<?php
									$link_icon = get_sub_field('link_icon') . '.svg';
									if ($link_icon): ?>
									<span class="card__icon">
										<?php
										get_template_part(
											'icon_partials/icon',
											$link_icon
										);  ?>
									</span>
								<?php endif; ?>
									<a href="<?php echo $link_target; ?>" class="card__link">
									<?php the_sub_field('link_title'); ?>
								</a>
							</div>
						</div>

					<?php endif; ?>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>
</section>
