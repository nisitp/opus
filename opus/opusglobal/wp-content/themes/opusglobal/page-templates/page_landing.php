<?php
/* Template Name: Landing Page (Top Level) */
?>

<?php get_header(); ?>
	<div class="l-container l-main">
        <main>
			<?php
			$hero_bg = get_field('hero_bg', false, false);
			if ( $hero_bg )
				$banner_bg = wp_get_attachment_url($hero_bg);
			?>
			<section class="l-flex-col banner banner--tall" style="background-image: url('<?php print $banner_bg; ?>')">
				<header class="hero banner__overlay">
					<div class="l-content hero__content">
						<h1 class="hero__title"><?php the_field('hero_title'); ?></h1>
					</div>
				</header>
				<?php get_template_part( 'partials/hero', 'wave-landing' ); ?>
			</section>
			<div class="landing-description hero__description h5 ">
			<div class="l-content"><?php the_field('hero_description'); ?></div>
			</div>
			<nav class="landing-nav">
				<?php
					if( have_rows('sub_sections') ):
						while ( have_rows('sub_sections') ) : the_row();
							if( get_row_layout() == 'section_category_title' ):
				?>
					<h2 class="text-uppercase page-nav__category"><?php the_sub_field('title'); ?></h2>
					<?php elseif( get_row_layout() == 'child_page' ): ?>
						<div class="page-nav__item">
							<div class="page-nav__item__body">
								<?php
									$icon = get_stylesheet_directory_uri() . "/assets/img/defaults/icon-bullet-default.svg";
									if (get_field('feature_icon', get_sub_field('page'))) {
										$icon = get_field('feature_icon', get_sub_field('page'));
									}
								?>
								<div class="page-nav__icon">
									<img class="icon--bullet" src="<?php echo $icon; ?>" aria-hidden="true">
								</div>
								<h3 class="page-nav__heading">
									<a href="<?php the_permalink(get_sub_field('page')); ?>" class="color-inherit"><?php echo get_the_title(get_sub_field('page')); ?></a>
								</h3>
								<p class="page-nav__description">
									<?php the_field('feature_subtitle', get_sub_field('page')); ?>
								</p>
								<a href="<?php the_permalink(get_sub_field('page')); ?>" class="icon-link icon-chevron-right page-nav__arrow"></a>
							</div>
							<?php
								$subpages = get_pages( array(
									'child_of' => get_sub_field('page'),
									'sort_column' => 'menu_order'
								));

								if (get_sub_field('hide_grandchildren'))
									$subpages = '';

								if ($subpages):
							?>
								<ul class="page-nav__subnav">
								<?php
									$subpages_total = 0;

									foreach ($subpages as $subpage):
										$subpages_total++;
								?>
									<li class="page-nav__sub-item">
										<a href="<?php echo get_page_link($subpage->ID); ?>" class="button button-sm button--primary page-nav__link"><?php echo $subpage->post_title; ?></a>
									</li>
								<?php
										if ($subpages_total > 7):
											break;
										endif;
									endforeach
								?>
								</ul>
								<?php if(get_sub_field('add_view_all')): ?>
									<p class="page-nav__more l-content">
										<a href="<?php the_permalink(get_sub_field('page')); ?>#child-grid" class="link--null">VIEW ALL</a>
									</p>
								<?php endif; ?>
							<?php
								endif;
							?>
						</div>
				<?php
							endif;
						endwhile;
					endif;
				?>
			</nav>

			<?php if ( the_field('lower_description')): ?>
			<section class="">
				<div class="panel__wrapper l-footer-flush">
					<div class="panel panel--center l-content">
						<h2 class="h3 panel__heading"><?php the_field('lower_title'); ?></h2>
						<div class="panel__description">
							<?php the_field('lower_description'); ?>
						</div>
						<?php
							$screenshot_class = '';

							if ( get_field('is_screenshot') )
								$screenshot_class = 'screenshot';
						?>
						<div class="panel__img <?php print $screenshot_class; ?>">
							<img src="<?php the_field('lower_large_image'); ?>" alt="" class="">
						</div>
						<button class="panel__btn js-account-modal" data-modal="demo-modal">Request a Demo</button>
					</div>
					<!-- @TODO Replace following image with conditional
					loading an uploaded file. -->
					<?php if ($bottomBanner = get_field('lower_banner')): ?>
						<img src="<?php echo $bottomBanner ?>" aria-hidden="true" class="panel__bg--bottom">
					<?php endif; ?>
				</div>
			</section>
			<?php endif; ?>

            <?php
                // Check if we've got content blocks
                if( have_rows('content_blocks') ):
                    while ( have_rows('content_blocks') ) : the_row();
                        // Pull in block layout
                        get_template_part( 'partials/block', get_row_layout() );
                    endwhile;
                endif;
            ?>

        </main>
    </div>
<?php get_footer(); ?>
