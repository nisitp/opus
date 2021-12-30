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
					$exec_args = array(
						'post_type' => 'people',
						'orderby' => 'meta_value_num',
						'order'=>'ASC',
                        'posts_per_page' => -1,
						'meta_key' => 'exec_team_order',
						'meta_query' => array(
							array(
								'key' => 'person_on_exec',
								'value'   => '1',
								'compare' => '=',
							),
						),
					);
					$exec_query = new WP_Query( $exec_args );

					if ( $exec_query->have_posts() ) :
				?>
				<section class="panel panel--listing bg-primary">
					<header class="l-content">
						<h2 class="text-center"><?php the_field('executive_team_header'); ?></h2>
					</header>
					<div class="l-content">
						<ul class="listing--blocks listing--blocks--tight">
						<?php while ( $exec_query->have_posts() ) :
								$exec_query->the_post();
						?>
							<li class="listing__item">
								<a href="javascript:void(0);" class="link--static js-modal-open" data-modal="modal-<?php the_ID(); ?>">
								<div class="card card--linked">
									<div class="card--linked__overlay">
									<?php if ($profile_image = get_field('person_photo')): ?>
										<?php
										echo wp_get_attachment_image(
											$profile_image,
											'card-graphic',
											false,
											$attr = [
												'class' => ' card__img',
												'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 50vw, 680px'
											]
										) ?>
									<?php else: ?>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/defaults/resource-default-bg.png" class="card__img">
									<?php endif; ?>
									</div>
									<div class="card__body card__body--pad">
										<h3 class="h5 card__title">
											<?php the_title(); ?>
										</h3>
										<p class="text-unheading">
											<?php echo get_field('person_title') ?>
										</p>
									</div>
								</div>
								</a>
							</li>
							<?php wp_reset_postdata(); ?>
						<?php endwhile; ?>
						</ul>
					</div>
				</section>
				<?php endif; ?>

				<?php
					$board_args = array(
						'post_type' => 'people',
                        'posts_per_page' => -1,
						'orderby' => 'meta_value_num',
						'order'=>'ASC',
						'meta_key' => 'board_order',
						'meta_query' => array(
							array(
								'key' => 'person_on_board',
								'value'   => '1',
								'compare' => '=',
							),
						),

					);
					$board_query = new WP_Query( $board_args );

					if ( $board_query->have_posts() ) :
				?>
				<section class="panel panel--listing">
					<header class="l-content">
						<h2 class="text-center"><?php the_field('board_header'); ?></h2>
					</header>
					<div class="l-content">
						<ul class="listing--blocks listing--blocks--tight">
						<?php while ( $board_query->have_posts() ) :
								$board_query->the_post();
						?>
							<li class="listing__item">
								<a href="javascript:void(0);" class="link--static js-modal-open" data-modal="modal-<?php the_ID(); ?>">
								<div class="card card--linked">
									<div class="card--linked__overlay">
									<?php if ($profile_image = get_field('person_photo')): ?>
										<?php
										echo wp_get_attachment_image(
											$profile_image,
											'card-graphic',
											false,
											$attr = [
												'class' => ' card__img',
												'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 50vw, 680px'
											]
										) ?>
									<?php else: ?>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/defaults/resource-default-bg.png" class="card__img">
									<?php endif; ?>
									</div>
									<div class="card__body card__body--pad">
										<h3 class="text-body card__title"><?php the_title(); ?></h3>
										<p class="text-unheading">
											<?php echo get_field('person_title') ?>
										</p>
									</div>
								</div>
								</a>
							</li>
							<?php wp_reset_postdata(); ?>
						<?php endwhile; ?>
						</ul>
					</div>
				</section>
				<?php endif; ?>
				<section class="panel__wrapper">
					<div class="panel panel--center l-content u-relative">
						<h2 class="panel__heading"><?php the_field('careers_title'); ?></h2>
						<?php if ($intro = get_field('careers_text')): ?>
							<div class="h5 text-unheading">
								<?php echo $intro; ?>
							</div>
						<?php endif; ?>
						<p>
							<a class="button" href="<?php echo get_field('careers_link') ?>">View Job Openings</a>
						</p>
					</div>
				</section>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/defaults/bg-waves.svg" aria-hidden="true" class="panel__bg--bottom">
			</article>
			<?php
				$modals_args = array(
					'post_type' => 'people',
					'post_status' => 'publish',
                    'posts_per_page' => -1,
				);
				$modals_query = new WP_Query( $modals_args );

				if ( $modals_query->have_posts() ) :
				while ( $modals_query->have_posts() ) :
					$modals_query->the_post();
			?>
				<?php
                    $linkedIn = get_field('person_linkedin');
                    $twitter = get_field('person_twitter');

                    if(get_the_content() || $linkedIn || $twitter):
                ?>
					<div class="modal-backdrop" id="modal-<?php the_ID(); ?>">
						<div class="modal-container">
							<div class="modal modal--profile" role="dialog">
								<button class="modal__close js-modal-close button--hide"></button>
								<div class="profile">
									<div class="">
										<h3><?php the_title(); ?></h3>
										<p><?php echo get_field('person_title') ?></p>
									</div>
									<div class="profile__aside">
										<p>
											<?php if ($profile_image = get_field('person_photo')):
												echo wp_get_attachment_image(
													$profile_image,
													'card-graphic',
													false,
													$attr = [
														'class' => ' card__img',
														'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 50vw, 680px'
													]
												);
											endif; ?>
										</p>
										<?php if($linkedIn || $twitter): ?>
										<ul class="icon-group">
											<?php if($twitter): ?>
											<li>
												<a href="<?php echo $twitter; ?>" class="icon-link icon-footer-icon-social-twitter" aria-label="Twitter"></a>
											</li>
											<?php endif; ?>
											<?php if($linkedIn): ?>
											<li>
												<a href="<?php echo $linkedIn; ?>" class="icon-link icon-footer-icon-social-linked-in" aria-label="LinkedIn"></a>
											</li>
											<?php endif; ?>
										</ul>
										<?php endif; ?>
									</div>
									<div class="profile__main">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			<?php
				endwhile;
				endif;
			?>
		</main>
	</div>
<?php get_footer(); ?>
