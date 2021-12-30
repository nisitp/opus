<?php
	$link = get_permalink();
	$title = get_the_title();

	$header_image = get_the_post_thumbnail_url();

	if( $header_image ){
		$header_style = "background-image: url('". get_the_post_thumbnail_url() ."')";
	} else {
		$header_style = "";
	}
?>
<div class="post-block">
	<div class="post-block-box">
		<div class="post-block-box-upper" style="<?php echo $header_style; ?>">
			<a href="<?php echo $link ?>" class="post-block-box-link">
				<div class="post-block-box-upper-text"></div>
			</a>
		</div>

		<div class="post-block-box-meta">
			<span class="text--pill block__category"><?php
				$category = get_the_category();
				echo esc_html( $category[0]->name );
			?></span>

			<div class="block__content">
				<h5 class="block__title"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h5>

				<div class="block__excerpt">
					<?php the_excerpt(); ?>
				</div>
			</div>

			<span class="block__details text-subtle">
				<span class="block__date"><?php the_time('F j, Y'); ?></span>
				<span class="block__author"><?php the_author(); ?></span>
			</span>
		</div>
	</div>
</div>
