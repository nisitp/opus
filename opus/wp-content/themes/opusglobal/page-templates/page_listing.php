<?php
	// @NOTE: Former Listing Page Template. Likely no longer needed.
?>

<?php
	// Get the content type for the listing
	$post_type = get_field('listing_type');
?>

<?php get_header(); ?>
	<div class="l-container l-main">
        <main>
			<section class="l-layout-wrap l-content">
				<nav class="l-nav-sidebar bg-pattern">
					<?php
						$parent = $post->post_parent;

						if($parent != 0) {
							$nav_args = array(
								'depth' => 1,
								'title_li' => '',
								'child_of' => $parent,
								'sort_order' => 'asc',
		 						'sort_column' => 'menu_order',
		 						'meta_key' => '_wp_page_template',
		 						'meta_value' => 'page-templates/page_listing.php',
								'post_status' => 'publish',
							);
						}
					?>
					<ul class="nav nav--sidebar">
						<?php wp_list_pages($nav_args); ?>
					</ul>
				</nav>
				<div class="l-primary">
					<header>
						<h1 class="heading--page"><?php the_title(); ?></h1>
					</header>
					<?php
					$paged = get_query_var('paged') ? get_query_var('paged') : 1;
						$list_args = array(
							'post_type' => $post_type,
							'meta_key' => 'og_date',
							'orderby' => 'meta_value',
							'order' => 'DESC',
							'posts_per_page' => 10,
							'paged' => $paged,
						);

						$list_query = new WP_Query( $list_args );

						if ( $list_query->have_posts() ) :
							$list_query->the_post();
					?>
					<div class="card__feature">
						<?php
							get_template_part(
								'partials/card', $post_type
							);
						?>
					</div>
					<div class="js-ajax-pager">
						<ul class="listing--blocks listing--blocks--tight l-gutter-2x">
							<?php
							while ( $list_query->have_posts() ) : $list_query->the_post();
							?>
								<li class="listing__item">
									<?php
									get_template_part(
										'partials/card', $post_type
									);
									?>
								</li>
								<?php wp_reset_postdata(); ?>
							<?php endwhile; ?>
						</ul>
						<?php if($list_query->max_num_pages>1):?>
							<p class="paged js-ajax-nav">
								<?php if( $paged < $list_query->max_num_pages) { ?>
									<a href="#" data-page="<?php echo $paged ++; ?>" date-post_type="<?php echo $post_type; ?>" class="nav-next">
										View More +
									</a>
								<?php } ?>
							</p>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</section>
        </main>
    </div>
<?php get_footer(); ?>
