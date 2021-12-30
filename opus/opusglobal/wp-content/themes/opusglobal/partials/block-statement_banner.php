<section class="panel panel--banner--img">
	<?php
	if ( $bg_img = get_sub_field('statement_bg', false, false))
		echo wp_get_attachment_image(
			$bg_img,
			'full',
			false,
			$attr = [
				'class' => 'panel__bg',
				'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 100vw, (max-width: 100em) 100vw, 3200px'
			]
		);
	?>

	<div class="l-content panel__body">
		<h2 class="h1 text-uppercase panel__heading">
			<?php echo get_sub_field('statement_lede'); ?>
		</h2>
		<?php if ($continued = get_sub_field('statement_continuation')): ?>
			<p class="h4 text-unheading u-border-split-top u-inline-block"><?php echo $continued; ?></p>
		<?php endif; ?>
	</div>
</section>
