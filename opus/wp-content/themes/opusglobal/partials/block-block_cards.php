<?php
	$block_style = get_sub_field('block_style');

	$bg_img = get_sub_field('card_group_bg');
	$relative_class = ($bg_img ? 'u-relative' : '');
?>

<section class="panel panel--listing">
	<div class="l-content <?php print $relative_class; ?>">
		<?php if ($title = get_sub_field('block_title')): ?>
			<h2 class="panel__heading"><?php echo $title; ?></h2>
		<?php endif; ?>

		<ul class="listing--blocks listing--blocks--default">
			<?php
				// Loop through the cards
				while ( have_rows('block_cards') ) : the_row();
			?>
				<li class="listing__item">
					<div class="card card--<?php echo $block_style ?>">
					<?php if ( $block_style == "icon" ): ?>
						<?php if ($card_image = get_sub_field('card_icon')): ?>
							<div class="card__top">
								<?php
								echo wp_get_attachment_image(
									$card_image,
									'icon',
									false,
									$attr = [
										'class' => ' icon',
										'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 50vw, 680px'
									]
								) ?>
							</div>
						<?php endif; ?>
						<div class="card__body">
							<h3 class="h5"><?php the_sub_field('card_title'); ?></h3>
							<p class="l-marginless"><?php
								the_sub_field('card_description');
							?></p>

						</div>
					<?php elseif ( $block_style == "image" ): ?>
						<?php if ($card_image = get_sub_field('card_image')): ?>
							<?php
							echo wp_get_attachment_image(
								$card_image,
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
						<div class="card__body">
							<?php the_sub_field('card_title'); ?>
							<?php the_sub_field('card_description'); ?>
						</div>
					<?php endif; ?>
					</div>
				</li>
			<?php endwhile; ?>
		</ul>
		<?php
		echo wp_get_attachment_image(
			$bg_img,
			'full',
			false,
			$attr = [
				'class' => ' panel__bg--bottom u-hidden-mobile'
			]
		) ?>
	</div>
</section>
