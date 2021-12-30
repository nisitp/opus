<?php get_header(); ?>
<div class="l-container l-main">
	<main>
		<article class="home2">
			<section class="home2-hero">
				<div class="home2-hero__inner">
					<div class="home2-hero__heading">
						<h2><?php print get_field('home2_headline'); ?></h2>
						<?php if($sub = get_field('home2_headline_sub')): ?><h3><?php print $sub; ?></h3><?php endif; ?>
					</div>
					<div class="home2-hero__video"><?php print get_field('home2_video'); ?></div>
				</div>
			</section>

			<section class="home2-3icons">
				<?php foreach (get_field('home2_teaser') as $teaser): ?>
					<a href="<?php print esc_attr($teaser['link']); ?>" class="home2-3icons__icon-link">
						<div class="home2-3icons__icon">
							<img src="<?php print esc_attr($teaser['icon']); ?>" alt="<?php print esc_attr($teaser['title']); ?>">
						</div>
						<h4 class="home2-3icons__title"><?php print htmlentities($teaser['title']); ?></h4>
						<p class="home2-3icons__p"><?php print htmlentities($teaser['description']); ?></p>
					</a>
				<?php endforeach; ?>
			</section>

			<section class="home2-cards">
				<h3 class="home2-cards__heading"><?php print get_field('home2_cards_headline'); ?></h3>
				<div class="home2-cards__wrapper">
					<?php foreach (get_field('home2_cards') as $card): ?>
						<a href="<?php print esc_attr($card['link']); ?>" class="home2-cards__card">
							<div class="home2-cards__icon">
								<img src="<?php print esc_attr($card['icon']); ?>" alt="<?php print esc_attr($card['title']); ?>">
							</div>
							<h4 class="home2-cards__title"><?php print htmlentities($card['title']); ?></h4>
							<p class="home2-cards__p"><?php print htmlentities($card['description']); ?></p>
							<div class="home2-cards__collapse">
								<ul class="home2-cards__features">
									<?php if($card['features']): foreach ($card['features'] as $feature): ?>
										<li><?php if($feature['icon']): ?><i class="fa <?php print esc_attr($feature['icon']); ?>" aria-hidden="true"></i> <?php endif; ?><?php print htmlentities($feature['name']); ?></li>
									<?php endforeach; endif; ?>
								</ul>
								<div class="home2-cards__button">
									<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								</div>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			</section>

			<section class="home2-customers">
				<h3 class="home2-customers__heading"><?php print get_field('home2_customers_headline'); ?></h3>
				<div class="home2-customers__wrapper">
					<div id="logo_slider" class="home2-customers__slider">
								<?php
	                            $customers = get_posts([
	                                'post_type'  => 'customer',
	                                'orderby' => 'menu_order',
	                                'order' => 'ASC',
	                                'posts_per_page' => -1,
	                            ]);
	                            foreach ($customers as $customer): ?>
									<div class="home2-customers__customer">
										<img src="<?php print esc_attr(get_field('logo', $customer->ID)); ?>" alt="<?php print esc_attr($customer->post_title); ?>">
									</div>
								<?php endforeach; ?>
					</div>
					<div id="logo_slider_prev" class="home2-customers__slider-nav home2-customers__slider-nav--left">
						<i class="fa fa-angle-left" aria-hidden="true"></i>
					</div>
					<div id="logo_slider_next" id="logo_slider" class="home2-customers__slider-nav home2-customers__slider-nav--right">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</div>
				</div>
				<div class="home2-customers__more">
					<a href="/customers/">Meet More Customers</a>
				</div>
			</section>

			<section class="home2-resources">
				<h3 class="home2-resources__heading">Featured News &amp; Events</h3>
				<div class="home2-resources__wrapper">
					<?php
						foreach (get_field('home2_resources') as $resource):
							if($resource['resource']) {
								if(!$resource['image']) {
									$resource['image'] = get_field('og_image', $resource['resource']->ID);
									if($resource['image']) $resource['image'] = wp_get_attachment_url($resource['image']);
								}
								if(!$resource['category']) {
									$resource['category'] = wp_get_post_terms($resource['resource']->ID, 'topic');
									if($resource['category']) $resource['category'] = $resource['category'][0]->name;
								}
								if(!$resource['title']) {
									$resource['title'] = $resource['resource']->post_title;
								}
								if(!$resource['excerpt']) {
									if(!$resource['excerpt']) $resource['excerpt'] = strip_tags(get_field('excerpt', $resource['resource']->ID));
									if(!$resource['excerpt']) $resource['excerpt'] = strip_tags(get_the_excerpt($resource['resource']));
								}
								if(!$resource['link']) {
									$resource['link'] = get_permalink($resource['resource']);
								}
							}
					?>
						<a href="<?php print htmlentities($resource['link']); ?>" class="home2-resources__resource">
							<div class="home2-resources__img home2-resources__img--img1" style="background-image: url('<?php print esc_attr($resource['image']); ?>');"></div>
							<p class="home2-resources__category"><i class="fa <?php print esc_attr($resource['category_icon']); ?>" aria-hidden="true"></i> <?php print htmlentities($resource['category']); ?></p>
							<h4 class="home2-resources__title"><?php print htmlentities($resource['title']); ?></h4>
							<p class="home2-resources__excerpt"><?php print htmlentities($resource['excerpt']); ?></p>
						</a>
					<?php endforeach; ?>
				</div>
			</section>

			<section class="home2-contact">
				<h3 class="home2-contact__heading">How Can We Help You?</h3>
				<div class="home2-contact__form-wrapper">
					<?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true" tabindex="-1"]'); ?>
				</div>
			</section>

			<section class="home2-social">
				<div class="home2-social__wrapper">
					<?php opus_twitter_feed(); ?>
				</div>
			</section>
		</article>
	</main>
</div>
<?php get_footer(); ?>
