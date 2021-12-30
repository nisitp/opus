<div class="card card--press">
	<div class="card__top card__top--icon card__is-featured">
		<div class="card-image-overflow">	
			<a href="<?php the_permalink(); ?>">
				<?php
					$thumbnail = get_post_thumbnail_id();
					if ( $thumbnail ):

					echo wp_get_attachment_image(
						$thumbnail,
						'card-graphic',
						false,
						$attr = [
							'class' => ' card__img',
							'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 50vw, 680px'
						]
					);
					else: ?>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/defaults/resource-default-bg.png" class="card__img">
				<?php endif; ?>
			</a>
		</div>
	</div>
	<div class="card__body">
		<p class="card__is-featured">
			<span class="text--pill">
					<?php 
						// SHOW YOAST PRIMARY CATEGORY, OR FIRST CATEGORY
						$category = get_the_category();
						$useCatLink = true;
						// If post has a category assigned.
						if ($category){
							$category_display = '';
							$category_link = '';
							if ( class_exists('WPSEO_Primary_Term') )
							{
								// Show the post's 'Primary' category, if this Yoast feature is available, & one is set
								$wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
								$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
								$term = get_term( $wpseo_primary_term );
								if (is_wp_error($term)) { 
									// Default to first category (not Yoast) if an error is returned
									$category_display = $category[0]->name;
									$category_link = get_category_link( $category[0]->term_id );
								} else { 
									// Yoast Primary category
									$category_display = $term->name;
									$category_link = get_category_link( $term->term_id );
								}
							} 
							else {
								// Default, display the first category in WP's list of assigned categories
								$category_display = $category[0]->name;
								$category_link = get_category_link( $category[0]->term_id );
							}
							// Display category
							if ( !empty($category_display) ){
							    if ( $useCatLink == true && !empty($category_link) ){
								echo '<a href="'.$category_link.'">'.htmlspecialchars($category_display).'</a>';
							    } else {
								echo htmlspecialchars($category_display);
							    }
							}
							
						}
					?>
				</span>
		</p>
		<a href="<?php the_permalink(); ?>">
			<h3 class="text-unheading card__title"><?php the_title(); ?></h3>
		</a>
		<div class="post-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<span class="text-subtle">
			<ul>
                <li><?php the_time('F j, Y'); ?></li>
                <?php if (!get_field('hide_author')): ?>
                	<li><?php the_author(); ?></li>
            	<?php endif; ?>
            </ul>
		</span>
	</div>
</div>
