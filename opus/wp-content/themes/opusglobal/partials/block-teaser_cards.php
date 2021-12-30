<section class="panel panel--listing">
	<?php if ($title = get_sub_field('block_title')): ?>
		<h2 class="panel__heading"><?php echo $title; ?></h2>
	<?php endif; ?>

	<ul class="listing--blocks listing--blocks--default">
		<?php
			// Loop through the cards
			while ( have_rows('block_cards') ) : the_row();
		?>
			<li class="listing__item listing__item--fill">
				<div class="card card--teaser card--icon" onclick="void(0)">
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

						<div class="card__teaser">
							<div class="card__teaser__text">
								<p><?php
									echo get_sub_field('card_teaser');
								?></p>
							</div>
							<a href="<?php echo get_sub_field('card_link'); ?>" class="card__teaser__link"><?php
								echo get_sub_field('link_label');
							?></a>
						</div>
					</div>
				</div>
			</li>
		<?php endwhile; ?>
	</ul>
</section>
