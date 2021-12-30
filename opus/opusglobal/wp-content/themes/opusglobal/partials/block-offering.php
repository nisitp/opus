<?php
	$o_bg = '';
	if (get_sub_field('offering_bg')):
		$o_bg = 'style="background-image: url(' . get_sub_field('offering_bg') .
		')"';
	endif;

	$o_bg_style = get_sub_field('offering_bg_style');
	$icon_style = '';

	if($o_bg_style == 'light') {
		$icon_style = 'solutions-solution-content-bullet-icon--dark';
	}

	$img_style = get_sub_field('o_feat_image_style');
?>

<section class="solutions-solution" <?php echo $o_bg; ?>>
	<div class="solutions-solution-angle">
		<div class="">
			<?php

				if ($img_style === "right") {
					$img_classes = 'solution-right-image';
				} elseif ($img_style === "overflow") {
					$img_classes = 'solution-overflow-image';
				} else {
					$img_classes = 'solution-center-image';
				}

				$o_img = get_sub_field('offering_feature_image');
				$o_img_attr = [
					'class' => $img_classes
				];

				if ($o_img):
					echo wp_get_attachment_image($o_img, 'full-width', false, $o_img_attr);
				endif;
			?>
		</div>
		<div class="l-content">
			<div class="solutions-solution-content">
				<?php if ($o_title = get_sub_field('offering_title')): ?>
					<h2><?php echo $o_title; ?></h2>
				<?php endif; ?>
				<?php
					if ($o_intro = get_sub_field('offering_intro'))
						echo $o_intro;
				?>
				<?php if (get_sub_field('offering_link_label') &&
						  get_sub_field('offering_link')): ?>
					<a href="<?php echo get_sub_field('offering_link'); ?>"
						class="solutions-solution-content-learn-more"><?php
						echo get_sub_field('offering_link_label');
					?> <i class="icon-icon-arrow-right"></i></a>
				<?php endif; ?>

				<?php
					// Check if we've got content blocks
					if( have_rows('product') ):
						while ( have_rows('product') ) : the_row();
				?>
					<div class="solutions-solution-content-bullet">
						<div class="solutions-solution-content-bullet-icon <?php echo $icon_style; ?>">
							<img src="<?php echo get_sub_field('product_icon'); ?>">
						</div>
						<h5 class="solutions-solution-content__title"><?php echo get_sub_field('product_title'); ?></h5>
						<div class="solutions-solution-content__description">
							<?php
							if (get_sub_field('product_description')):
								echo get_sub_field('product_description');
							endif;
							?>
							<?php if (get_sub_field('product_link_label') &&  get_sub_field('product_link')): ?>
								<p>
									<a href="<?php echo get_sub_field('product_link'); ?>" class="solutions-solution-content-learn-more"><?php
									echo get_sub_field('product_link_label');
									?> <i class="icon-icon-arrow-right"></i></a>
								</p>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile;
					endif;
				?>
			</div>
		</div>
	</div>
</section>
