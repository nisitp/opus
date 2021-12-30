<?php
/* Template Name: Search Page */
?>

<?php get_header(); ?>
	<div class="l-main">
		<main class="content">
			<header class="l-flex-col banner">
				<?php // get_template_part( 'partials/breadcrumbs' ); ?>
				<?php get_template_part( 'partials/hero', 'search' ); ?>
			</header>
			<div class="l-content">
				<?php if ( is_search() ) : ?>
					<div class="search-results">
						<?php if ( have_posts() ): ?>
							<?php
								global $wp_query;
								$total_results = $wp_query->found_posts;
							?>

							<h2 class="search-title"><?php echo $total_results; ?> <?php echo ngettext('result', 'results', $total_results); ?> for "<?php the_search_query(); ?>"</h2>

							<div class="search-results-list">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'partials/search-result', get_post_type() ); ?>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							</div>

							<div class="pagination">
								<?php posts_nav_link(); ?>
							</div>

						<?php else: ?>
							<h2 class="search-title no-results">Nothing found for "<?php the_search_query(); ?>"</h2>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</main>
	</div>
<?php get_footer(); ?>
