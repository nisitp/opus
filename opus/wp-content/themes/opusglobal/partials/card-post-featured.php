<?php

	global $blog_page_id;
	$featured_post = get_field( "featured_post", $blog_page_id );

	if ( $featured_post ):
		setup_postdata( $featured_post );
?>

<div class="card__feature">
	<div class="card card--press">
		<div class="card__top card__top--icon card__is-featured">
			<a href="<?php the_permalink(); ?>">
				<?php
					$thumbnail = get_post_thumbnail_id( $featured_post->ID );
					if ( $thumbnail ):

					echo wp_get_attachment_image(
						$thumbnail,
						'card-graphic-large',
						false,
						$attr = [
							'class' => ' card__img',
							'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 50vw, 680px'
						]
					);
					else: ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog-default-large.jpg" class="card__img">
				<?php endif; ?>
			</a>
		</div>
		<div class="card__body">
			<p class="card__is-featured">
				<?php
					$category = get_the_category( $featured_post->ID );
					if( $category ):
				?>
				<span class="text--pill">
					<a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>"><?php echo esc_html( $category[0]->name ); ?></a>
				</span>
				<?php endif; ?>
			</p>
			<a href="<?php echo get_permalink( $featured_post ); ?>">
				<h3 class="text-unheading card__title"><?php echo $featured_post->post_title; ?></h3>
			</a>
			<div class="post-excerpt">
				<?php echo apply_filters('trim_excerpt', $featured_post->post_content ); ?>
			</div>
			<span class="text-subtle">
				<ul>
	                <li><?php echo get_the_time( 'F j, Y', $featured_post ); ?></li>
	                <?php if (!get_field('hide_author')): ?>
	                	<li><?php the_author(); ?></li>
	            	<?php endif; ?>
	            </ul>
			</span>
		</div>
	</div>
</div>
<?php
	wp_reset_postdata();
	endif;
?>
