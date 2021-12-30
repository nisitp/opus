<?php get_header(); ?>
    <div class="l-container l-main">
        <main>
			<article class="">
				<header class="l-flex-col banner banner--tall banner--contact">
					<?php get_template_part( 'partials/hero', 'global' ); ?>
					<?php get_template_part( 'partials/hero', 'image' ); ?>
				</header>
				<nav class="nav nav--sections expander--tablet js-section-nav is-hidden will-fix-top">
					<a href="javascript:void(0)" class="link--null expander-trigger expander-hidden" aria-label="Expand navigation" role="button">
						<span class="expander__label js-section-nav-label">Overview</span>
					</a>
					<div class="l-content nav__wrapper expander-content">
						<ul class="nav__list">
							<?php if( have_rows('contact_sales') ): ?>
							<li class="nav__item">
								<a href="#sales" class="nav__link">Opus Sales</a>
							</li>
							<?php endif; ?>
							<?php if( have_rows('contact_support') ): ?>
							<li class="nav__item">
								<a href="#support" class="nav__link">Support</a>
							</li>
							<?php endif; ?>
                            <?php if( get_field('form_embed') ): ?>
							<li class="nav__item">
								<a href="#contact-form" class="nav__link">Contact Us</a>
							</li>
                            <?php endif; ?>
                            <?php if( have_rows('contact_support') ): ?>
							<li class="nav__item">
								<a href="#offices" class="nav__link">Our Offices</a>
							</li>
                            <?php endif; ?>
						</ul>
					</div>
				</nav>
				<div class="js-section-nav-spacer"></div>
				<div class="js-panels">
					<?php if( have_rows('contact_sales') ): ?>
                    <section class="panel panel--listing l-content">
						<a name="sales" class="panel__anchor"></a>
						<h2 class="panel__heading">Opus Sales</h2>
						<ul class="listing--grid">
							<?php while ( have_rows('contact_sales') ) : the_row(); ?>
								<?php
									$support_phone = get_sub_field('sales_phone');
								?>
								<li class="listing__item listing__item--third">
									<div class="listing__content">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon-support-orange.svg" alt="Support headphones icon" class="listing__item__icon">
										<h3><?php echo get_sub_field('sales_name'); ?></h3>
										<span>
											<a href="tel:<?php echo $support_phone; ?>" class="text-body-color"><?php echo $support_phone; ?></a>
										</span>
									</div>
								</li>
							<?php endwhile; ?>
						</ul>
                    </section>
					<?php endif; ?>
					<?php if( have_rows('contact_support') ): ?>
                    <section class="panel panel--listing bg-gray">
						<div class=" l-content">
						<a name="support" class="panel__anchor"></a>
						<h2 class="panel__heading">Global Customer Care</h2>
						<ul class="listing--grid">
							<?php while ( have_rows('contact_support') ) : the_row(); ?>
								<?php
									$support_phone = get_sub_field('sales_phone');
								?>
								<li class="listing__item listing__item--pairs">
									<div class="listing__card card">
										<?php
											$s_logo = get_sub_field('support_logo');

											if($s_logo):
										?>
											<div class="card__top bg-primary">
												<?php
												echo wp_get_attachment_image(
													$s_logo,
													'full',
													false,
													$attr = [
														'class' => ' card__img',
														'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 50vw, 680px'
													]
												);
												?>
											</div>
										<?php else: ?>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/defaults/resource-default-bg.png" class="card__img">
										<?php endif; ?>
										<div class="card__body">
											<h3 class="h4 l-gutter-scale-sm"><?php echo get_sub_field('support_title'); ?></h3>
										<?php
											if( have_rows('support_region') ):
											while ( have_rows('support_region') ) : the_row();

											$region = get_sub_field('support_region_name');
											$portal_text = get_sub_field('support_portal_text');
											$portal_link = get_sub_field('support_portal_link');
											$phone = get_sub_field('support_phone');
											$phone2 = get_sub_field('support_phone2');
											$email = get_sub_field('support_email');
										?>
											<h4 class="h6 text-normal text-subtle l-gutter-top">
												<?php if($region) { echo $region; } ?>
											</h4>
											<table>
												<thead class="u-invisible">
													<tr>
														<td>Contact method</td>
														<td>Contact information</td>
													</tr>
												</thead>
												<tbody>
													<?php if($portal_text && $portal_link): ?>
														<tr>
															<td><b>Portal:</b></td>
															<td>
																<a href="<?php echo $portal_link; ?>">
																	<?php echo $portal_text; ?>
																</a>
															</td>
														</tr>
													<?php endif; ?>
													<?php if($phone): ?>
														<tr>
															<td><b>Phone:</b></td>
															<td>
																<?php
																	echo $phone;

																	if($phone2) {
																		echo '<br/>' . $phone2;
																	}
																?>
															</td>
														</tr>
													<?php endif; ?>
													<?php if($email): ?>
														<tr>
															<td><b>Email:</b></td>
															<td>
																<a href="mailto:<?php echo $email ?>">
																<?php echo $email; ?>
																</a>
															</td>
														</tr>
													<?php endif; ?>
												</tbody>
											</table>
										<?php
											endwhile;
											endif;
										?>
										</div>
									</div>
								</li>
							<?php endwhile; ?>
						</ul>
						</div>
                    </section>
					<?php endif; ?>
					<?php if( $form = get_field('form_embed') ): ?>
                    <section class="panel panel--listing l-content">
						<a name="contact-form" class="panel__anchor"></a>
						<h2 class="panel__heading">How Can We Help You?</h2>
						<?php echo $form; ?>
                    </section>
					<?php endif; ?>
                    <?php if( have_rows('office_regions') ): ?>
                    <section class="panel panel--listing bg-gray">
						<div class=" l-content">
						<a name="offices" class="panel__anchor"></a>
						<h2 class="panel__heading">Our Offices</h2>
							<?php while ( have_rows('office_regions') ) : the_row(); ?>
								<div class="l-seperate-lg">
                                <h3 class="h6 text-subtle text-normal text-center l-gutter-scale-sm">
									<?php echo get_sub_field('region_name'); ?>
								</h3>
                                <ul class="listing--grid">
                                <?php
                                    while ( have_rows('region_offices') ) : the_row();

                                    $name = get_sub_field('office_location');
                                    $addr = get_sub_field('office_address');
                                ?>
                                    <li class="listing__item listing__item--two-three">
									<div class="listing__content listing__content--location bg-img-cover--dark"
									style="background-image: url(<?php echo get_sub_field('office_background'); ?>);">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon-map-pin-orange.svg" alt="Map pin icon" class="listing__item__icon">
										<h4 class="l-gutter-scale-sm color-inherit">
											<?php echo $name; ?>
										</h4>
										<?php echo $addr; ?>
									</div>
								    </li>
                                <?php endwhile; ?>
                            	</ul>
								</div>
                            <?php endwhile; ?>
						</div>
                    </section>
					<?php endif; ?>
				</div>
			</article>
        </main>
    </div>
<?php get_footer(); ?>
