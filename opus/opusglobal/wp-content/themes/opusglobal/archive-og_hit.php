<?php
/* Archive page for Press Releases */
	function wp_body_classes( $classes ) {
	    $classes[] = 'l-listing-page';

	    return $classes;
	}
	add_filter( 'body_class','wp_body_classes' );
?>

<?php
	// Get the content type for the listing
	$post_type = 'og_hit';
    $first_post_id = null;
?>

<?php get_header(); ?>
	<div class="l-container l-main">
        <main>
			<section class="l-layout-wrap l-content">
				<nav class="l-nav-sidebar bg-pattern">
					<ul class="nav nav--sidebar">
						<li><a href="/about/press_coverage" class="is-active">Press Coverage</a></li>
						<li><a href="/about/press_releases">Press Releases</a></li>
						<li><a href="/about/events">Events</a></li>
					</ul>
				</nav>
				<div class="l-primary">
					<header>
						<h1 class="heading--page">Press Coverage</h1>
					</header>
					<?php
					$paged = get_query_var('paged') ? get_query_var('paged') : 1;
						$list_args = array(
							'post_type' => $post_type,
							'post_status' => 'publish',
							'meta_key' => 'og_date',
							'orderby' => 'meta_value_num',
							'order' => 'DESC',
							'posts_per_page' => 12,
							'paged' => $paged,
						);

						$list_query = new WP_Query( $list_args );

						if ( $list_query->have_posts() ) :
							$list_query->the_post();
							$first_post_id = $post->ID;
					?>
					<div class="card__feature">
						<?php
							get_template_part(
								'partials/card', $post_type
							);
						?>
					</div>
					<div class="js-ajax-pager">
						<ul class="listing--blocks listing--blocks--press l-gutter-2x">
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
                                    <a href="#" data-page="<?php echo $paged + 1; ?>" data-exclude_id="<?php echo $first_post_id; ?>" data-post_type="<?php echo $post_type; ?>" class="nav-next">
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