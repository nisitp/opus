<?php if( have_rows('hero_variants') ): ?>
<header class="hero banner__overlay">
	<div class="l-content">
		<div class="l-content-left">
			<h1 class="hero__title">
				<?php the_field('hero_variants_title'); ?>
			</h1>
			<select name="hero_variants_dropdown" id="hero_variants_dropdown" autocomplete="off">
			<?php $v = 0; while( have_rows('hero_variants') ): the_row(); ?>
				<option value="<?php echo $v; ?>"><?php the_sub_field('variant_dropdown_name'); ?></option>
			<?php $v++; endwhile; ?>
			</select>
			<?php $v = 0; while( have_rows('hero_variants') ): the_row(); ?>
				<?php if($v == 0) : ?>
					<div id="hero-variants-subtext"><?php the_sub_field('variant_subtext'); ?></div>
					<a id="hero-variants-cta" href="<?php the_sub_field('variant_cta_link'); ?>" class="btn-transparent"><?php the_sub_field('variant_cta_label'); ?></a>
				<?php endif; ?>
				<div class="variant-data u-invisible" data-variant="<?php echo $v; ?>" data-background="<?php the_sub_field('variant_background_image'); ?>" data-ctalink="<?php the_sub_field('variant_cta_link'); ?>" data-ctalabel="<?php the_sub_field('variant_cta_label'); ?>" data-subtext="<?php the_sub_field('variant_subtext'); ?>"></div>
			<?php $v++; endwhile; ?>
		</div>
	</div>
</header>
<?php endif; ?>
<?php if( have_rows('featured_resources') ): ?>
<div class="hero-featured-resources">
	<div class="hero-featured-resources-top">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/wave-top.png">
	</div>
	<div class="hero-featured-resources-bottom">
		<div class="l-content">
			<div class="hero-featured-resources-title"><?php the_field('featured_title'); ?></div>
			<div class="hero-featured-resources-resources">
			<?php while( have_rows('featured_resources') ): the_row(); ?>
				<div class="hero-featured-resources-resource">
				<?php
					if (get_sub_field('subtext')) {
						$parent_subtext = get_sub_field('subtext');
					}
					global $post;
					$post = get_sub_field('resource');
					$parent_subtext = false;
					setup_postdata($post);
					$url = get_permalink();
					if (get_sub_field('url')) {
						$url = get_sub_field('url');
					}
					$title = get_the_title();
					if (get_sub_field('title')) {
						$title = get_sub_field('title');
					}
					$subtext = get_the_author();
					if (get_post_type() == 'og_resource') {
						$terms = get_the_terms( $post->ID , 'type' );
						foreach ( $terms as $term ) {
							$subtext = get_field('author');
						}
					}
					$excerpt = get_the_excerpt();
					if (get_sub_field('subtext')) {
						$subtext = get_sub_field('subtext');
					}
					$icon = get_stylesheet_directory_uri() . '/assets/img/insights-icon-video.svg';
					if (get_sub_field('icon')) {
						$icon = get_sub_field('icon');
					}
	                $default = get_stylesheet_directory_uri() . '/assets/img/defaults/resource-default-bg.png';
	                $image = get_field('og_image');
	                $image = wp_get_attachment_image_src($image, 'card-logo')[0];
	                if (!$image) {
	                    $image = $default;
	                }
					$meta = get_the_author();
					if (get_post_type() == 'og_resource') {
						$terms = get_the_terms( $post->ID , 'type' );
						$date = get_field('date');
						$date = new DateTime($date);
						foreach ( $terms as $term ) {
							$meta = $term->name;
						}
					}
					if ($parent_subtext) {
						$subtext = $parent_subtext;
					}
				?>
					<img src="<?php echo $image; ?>">
					<div class="resource-overlay">
						<div class="resource-meta"><div><?php echo $meta; ?></div></div>
						<div class="resource-title"><span><?php echo $title; ?></span></div>
						<div class="resource-overlay-bottom">
							<div class="resource-overlay-bottom-inner">
								<div class="resource-subtext"><span><?php echo $subtext; ?></span></div>
								<a href="<?php echo $url; ?>">Read More &rarr;</a>
							</div>
						</div>
					</div>
				</div>
			<?php wp_reset_postdata(); endwhile; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
