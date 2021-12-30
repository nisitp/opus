<section class="panel panel--listing bg-pattern">
	<div class="l-content">
		<?php if ($title = get_field('feat_resource_title')): ?>
			<h2 class="panel__heading"><?php echo $title; ?></h2>
		<?php endif; ?>
		<ul class="listing--blocks listing--blocks--default">
			<?php
				// Loop through the links
				while ( have_rows('feat_link_cards') ) : the_row();

					// Grab the correct kind of link
					switch ( get_sub_field('resource_link_type') ) {
						case 'page':
							$link_target = get_sub_field('resource_link_page');
						break;

						case 'url':
							$link_target = get_sub_field('resource_link_url');
						break;

						case 'other':
							$link_target = get_sub_field('resource_link_freeform');
						break;
					}
			?>
				<li class="listing__item">
					<div class="card card--link-blocks">
						<a href="<?php echo $link_target; ?>" class="link--static">
						<?php if ($link_image = get_sub_field('resource_image')): ?>
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
								$link_icon = get_sub_field('resource_icon') . '.svg';
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
								<?php the_sub_field('resource_title'); ?>
							</a>
						</div>
					</div>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>
</section>
