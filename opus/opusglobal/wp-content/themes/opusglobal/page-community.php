<?php get_header(); ?>
	<div class="l-container l-main">
		<main>
			<article class="">
				<header class="l-flex-col banner banner--tall">
					<?php get_template_part( 'partials/hero', 'global' ); ?>
					<?php get_template_part( 'partials/hero', 'image' ); ?>
				</header>
				<section class="panel panel--center l-content">
					<h2 class="panel__heading"><?php the_field('subtitle'); ?></h2>
					<?php if ($intro = get_field('intro_text')): ?>
					<div class="h5 text-unheading">
						<?php echo $intro; ?>
					</div>
					<?php endif; ?>
				</section>

				<?php
					$args = array(
						'post_type' => 'charities',
						'orderby' => 'menu_order',
						'order' => 'ASC'
					);

					$the_query = new WP_Query( $args );

					if ( $the_query->have_posts() ) :
				?>
				<section>
					<header class="bg-primary panel">
						<div class="l-content">
							<h2>Opus Gives Back</h2>
						</div>
					</header>
					<div class="l-container">
						<ul class="accordion-list">
						<?php while ( $the_query->have_posts() ) :
								$the_query->the_post();
						?>
							<li class="accordion info-block info-block--row">
								<button type="button" class="accordion__toggle icon-chevron-down js-accordion-trigger"></button>
								<div class="accordion__header info-block__inner">
									<div class="info-block__text">
										<h3 class="h4">
											<a href="javascript:void(0)" class="js-accordion-trigger">
												<?php the_title(); ?>
											</a>
										</h3>
										<p class="info-block__description">
											<?php echo the_field('org_teaser') ?>
										</p>
									</div>
									<div class="info-block__aside">
										<?php if ($callout_logo = get_field('org_logo')): ?>
										<?php
										echo wp_get_attachment_image(
											$callout_logo,
											'card-graphic',
											false,
											$attr = [
												'class' => ' info-block__logo',
												'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 50vw, 680px'
											]
											) ?>
										<?php endif; ?>
									</div>
								</div>
								<div class="accordion__body">
									<div class="info-block__text">
										<?php
											$callout_image = get_field('org_image');
											$quote = get_field('org_quote');

											if($quote || $callout_image):
										?>
										<div class="testimonial--split">
											<?php if ($callout_image): ?>
												<div class="testimonial__section">
												<?php
												echo wp_get_attachment_image(
													$callout_image,
													'',
													false,
													$attr = [
														'class' => ' ',
														'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 50vw, 680px'
													]
												) ?>
												</div>
											<?php endif; ?>
											<blockquote class="testimonial__section">
												<?php echo $quote; ?>
												<span class="blockquote__attribution">
													<?php echo get_field('org_quote_attribution') ?>
												</span>
											</blockquote>
										</div>
										<hr>
									<?php endif; ?>
										<h4 class="text-body text-uppercase l-marginless">Overview:</h4>
										<div class="">
											<?php echo the_field('org_overview') ?>
										</div>
										<?php if( have_rows('org_highlights') ): ?>
										<h4 class="text-body text-uppercase l-marginless">Highlights:</h4>
										<ul class="list--highlight">
											<?php
											while( have_rows('org_highlights') ): the_row();
											?>
											<li class="">
												<span><?php the_sub_field('org_highlight'); ?></span>
											</li>
											<?php endwhile; ?>
										</ul>
										<?php endif; ?>
									</div>
								</div>

							</li>
							<?php wp_reset_postdata(); ?>
						<?php endwhile; ?>
						</ul>
					</div>
				</section>
			<?php endif; ?>
			</article>
		</main>
	</div>
<?php get_footer(); ?>
