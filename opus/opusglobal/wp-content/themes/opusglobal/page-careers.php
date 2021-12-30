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
					<p>
						<a class="button" href="/about/careers/openings">View Current Openings</a>
					</p>
				</section>
				<?php
					if(
						get_field('benefits_image') &&
						get_field('benefits_text')
					):
				?>
				<section class="panel panel--equal-cols">
					<div class="">
						<?php if ($title = get_sub_field('block_title')): ?>
							<h2 class="panel__heading"><?php echo $title; ?></h2>
						<?php endif; ?>

						<div class="l-equal-columns">
							<div class="l-col l-col--img-bg" style="background-image: url('<?php the_field('benefits_image') ?>');">
							</div>
							<div class="l-col panel__col--text bg-gray">
								<div class="panel__body">
									<h3 class="h2">
										<?php echo get_field('benefits_title'); ?>
									</h3>
								</div>
								<div class="panel__body h5 text-unheading">
									<?php echo get_field('benefits_text'); ?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php endif; ?>
				<?php if (have_rows('value_statements')): ?>
				<section class="panel panel--listing">
					<div class="l-content">
						<h2 class="panel__heading">Our Values</h2>
						<?php
							// Loop through the cards
							while ( have_rows('value_statements') ) :
							the_row();
						?>
							<h3 class="panel__subheading"><?php the_sub_field('value_group_header'); ?></h3>
							<ul class="listing--blocks listing--blocks--text listing--blocks--m-b">
								<?php
									// Loop through the cards
									while ( have_rows('value_group') ) :
									the_row();
								?>
								<li class="listing__item">
									<div class="card card--simple">
										<div class="card__body text-center">
											<h3 class="h4 text-highlight">
												<?php the_sub_field('value_name'); ?>
											</h3>
											<p class="l-marginless">
												<?php the_sub_field('value_text');
											?></p>

										</div>
									</div>
								</li>
								<?php endwhile; ?>
							</ul>
						<?php endwhile; ?>
					</div>
				</section>
				<?php endif; ?>
				<?php if (0) { // disabled by Hot Sauce ?>
				<section>
					<a name="openings"></a>
					<header class="bg-primary panel panel--accordion-header">
						<div class="l-content l-filter-header">
							<h2>Open Positions</h2>
							<?php
							$location_key = "field_588a5c63f8aa3";
							$deptartment_key = "field_588a5d95f8aa4";
							$loc_field = get_field_object($location_key);
							$dept_field = get_field_object($deptartment_key);
							?>
							<div class="dropdown-row">
							<?php if( $loc_field ): ?>
								<div class="dropdown">
									<div class="dropdown-container">
										<button class="dropdown-button">
											Location
										</button>
										<?php
											echo '<ul class="dropdown-select dropdown-menu js-filter-group" data-filter-group="' . $loc_field['name'] . '">' .
											'<li><a class="dropdown__option js-filter" data-filter="*">All</a></li>';
											foreach( $loc_field['choices'] as $k => $v ) {
												echo '<li><a class="dropdown__option js-filter" data-filter=".loc-' .
												$k . '">' . $v . '</a></li>';
											}
											echo '</ul>';
										?>
									</div>
								</div>
							<?php endif; ?>
							<?php if( $dept_field ): ?>
								<div class="dropdown">
									<div class="dropdown-container">
										<button class="dropdown-button">
											Department
										</button>
										<?php
											echo '<ul class="dropdown-select dropdown-menu js-filter-group" data-filter-group="' . $dept_field['name'] . '">' .
											'<li><a class="dropdown__option js-filter" data-filter="*">All</a></li>';
											foreach( $dept_field['choices'] as $k => $v ) {
												echo '<li><a class="dropdown__option js-filter" data-filter=".dept-' .
												$k . '">' . $v . '</a></li>';
											}
											echo '</ul>';
										?>
									</div>
								</div>
							<?php endif; ?>
							</div>
						</div>
					</header>
					<div class="l-container">
					<?php
						$args = array(
                            'post_type' => 'careers',
                            'posts_per_page' => -1,
							'orderby' => 'menu_order',
							'order' => 'ASC'
                        );
						$the_query = new WP_Query( $args );
					?>
					<?php if ( $the_query->have_posts() ) : ?>
						<ul class="accordion-list">
						<div class="u-relative isotope-row">
						<?php
							while ( $the_query->have_posts() ) : $the_query->the_post();

							$locale = get_field('job_location');
							$dept = get_field('job_department');

							$locale_class = 'loc-' . $locale['value'];
							$dept_class = 'dept-' . $dept['value'];
						?>
						<li class="accordion info-block info-block--row <?php echo $locale_class . ' ' . $dept_class; ?>">
							<button type="button" class="accordion__toggle icon-chevron-down js-accordion-trigger"></button>
							<div class="accordion__header info-block__inner">
								<div class="info-block__text">
									<h3 class="h4">
										<a href="javascript:void(0)" class="js-accordion-trigger">
											<?php the_title(); ?>
										</a>
									</h3>
									<p class="info-block__description">
										<?php echo the_field('job_teaser') ?>
									</p>
								</div>
								<div class="info-block__aside">
									<div class="icon-map-pin icon-label info-block__meta info-block__meta--icon">
										<span class="u-invisible">Location:</span>
										<?php echo $locale['label']; ?>
									</div>
									<div class="icon-department icon-label info-block__meta info-block__meta--icon">
										<span class="u-invisible">Department:</span>
										<?php echo $dept['label']; ?>
									</div>
								</div>
							</div>
							<div class="accordion__body">
								<div class="info-block__text">
									<h4 class="text-body text-uppercase l-marginless">Overview:</h4>
									<div class="">
										<?php echo the_field('job_overview') ?>
									</div>
									<?php
									if( have_rows('job_responsibilities') ): ?>
                                        <h4 class="text-body text-uppercase l-marginless">Responsibilities:</h4>
										<ul class="list--highlight">
										<?php
										while( have_rows('job_responsibilities') ): the_row();
										?>
											<li class="">
												<span><?php the_sub_field('job_responsibility'); ?></span>
											</li>
										<?php endwhile; ?>
										</ul>
									<?php endif; ?>
                                    <?php
									if( have_rows('job_quals') ): ?>
                                        <h4 class="text-body text-uppercase l-marginless">General Qualifications:</h4>
										<ul class="list--highlight">
										<?php
										while( have_rows('job_quals') ): the_row();
										?>
											<li class="">
												<span><?php the_sub_field('job_qual'); ?></span>
											</li>
										<?php endwhile; ?>
										</ul>
									<?php endif; ?>
									<?php if(get_field('job_skills')): ?>
										<h4 class="text-body text-uppercase l-marginless">Desired Skills</h4>
										<?php echo the_field('job_skills') ?>
									<?php endif; ?>
									<div class="button-group">
										<a class="button button-sm" href="<?php
										echo the_field('job_link')
										?>">Apply Now</a>
										<button class="button--reverse button-sm js-accordion-trigger" >Close Job Description</button>
									</div>
								</div>
							</div>

						</li>
						<?php wp_reset_postdata(); ?>
						<?php endwhile; ?>
						</div>
						</ul>
					<?php else: ?>
						<ul class="accordion-list">
						<li class="accordion info-block info-block--row <?php echo $locale_class . ' ' . $dept_class; ?>">
							<div class="info-block__inner">
								<div class="info-block__text">
									<p>There are currently no positions open.</p>
								</div>
							</div>
						</li>
						</div>
						</ul>
					<?php endif; ?>
					</div>
				</section>
				<?php } ?>
				<section class="panel panel--center l-content">
				<p>
					<a class="button" href="/about/careers/openings">View Current Openings</a>
				</p>
				</section>

			</article>
		</main>
	</div>
<?php get_footer(); ?>
