<?php
/* Template Name: Feature Page */
?>

<?php get_header(); ?>
    <div class="l-container l-main">
        <main>
		<article>
            <header class="l-flex-col banner banner--feature">
				<?php get_template_part( 'partials/breadcrumbs' ); ?>
				<?php get_template_part( 'partials/hero', 'global' ); ?>
				<?php
				$hero_bg = get_field('hero_bg', false, false);
				if ( $hero_bg )
					echo wp_get_attachment_image(
						$hero_bg,
						'full',
						false,
						$attr = [
							'class' => 'banner__bg',
							'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 100vw, (max-width: 100em) 100vw, 3200px',
							'aria-hidden' => 'true'
						]
					);
				?>
			</header>
			<?php if(get_field('include_nav')): ?>
				<nav class="nav nav--sections expander--tablet js-section-nav is-hidden will-fix-top" data-gumshoe-header>
					<a href="javascript:void(0)" class="link--null expander-trigger expander-hidden" aria-label="Expand navigation" role="button">
						<span class="expander__label js-section-nav-label">Overview</span>
					</a>
					<div class="l-content nav__wrapper expander-content">
						<ul class="nav__list" data-gumshoe>

						</ul>
						<button class="nav__button is-visible-on-fixed js-account-modal" data-modal="demo-modal">Request a Demo</button>
					</div>
				</nav>
			<?php endif; ?>
			<div class="js-section-nav-spacer"></div>
			<div class="js-panels">
				<?php
					$panel_class = 'panel--sidebar';

					if ( $feature_img = get_field('feature_image') )
						$panel_class= 'l-equal-columns panel--equal-cols';
				?>

				<a data-nav-label="Overview" class="nav__anchor" name="panel-1"></a>
				<section class="panel <?php print $panel_class; ?> l-content" id="panel-1">
					<div class="l-col l-col-primary panel__body">
						<h2><?php the_field('feature_subtitle') ?></h2>
						<?php the_field('feature_description') ?>
					</div>
					<aside class="l-col l-col-secondary">
						<section class="callout">
						<?php if ($feature_img): ?>
							<?php
								$img_size = get_field('image_style');

								// @NOTE Oversized image style not fully built for this template.
								if($img_size != 'oversized'):
							 ?>
								<div class="panel__body">
							<?php endif; ?>
							<?php if($img_size == 'screenshot'): ?>
								<div class="screenshot">
							<?php endif; ?>
							<?php

								$img_classes = 'l-vert-gutter panel__img panel__img--' . $img_size;
								$col_img = get_field('feature_image');
								$col_img_attr = [
									'sizes' => '(max-width: 30em) 100vw, (max-width: 53.125em) 50vw, 1400px',
									'class' => $img_classes
								];

								echo wp_get_attachment_image($col_img, 'full-width', false, $col_img_attr);
							?>
							<?php if(get_field('image_style') == 'screenshot'): ?>
								</div>
							<?php endif; ?>
							<?php if($img_size != 'oversized'): ?>
								</div>
							<?php endif; ?>
						<?php elseif( $feature_icon = get_field('feature_icon') ): ?>
							<img src="<?php echo $feature_icon; ?>" aria-hidden="true" class="icon--bullet u-hidden-tablet-down">
						<?php else: ?>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/defaults/icon-bullet-default.svg" aria-hidden="true" class="icon--bullet u-hidden-tablet-down">
						<?php endif; ?>
						</section>
					</aside>
				</section>
				<?php
					// Check if we've got content blocks
					if( have_rows('content_blocks') ):
						// Index starts at 2 since the first is always above.
						$i = 2;
						while ( have_rows('content_blocks') ) : the_row();
							// Pull in block layout
							if (get_sub_field('navigation_label'))
								echo '<a data-nav-label="' .
									get_sub_field('navigation_label') .
									'" class="nav__anchor" name="panel-' .
									$i .
									'"></a><div id="panel-' .
									$i .
									'" class="panel__wrapper">';
							get_template_part( 'partials/block', get_row_layout() );

							if (get_sub_field('navigation_label'))
								echo "</div>";

							$i++;
						endwhile;
					endif;
				?>
				<?php
					$subpages = get_pages( array(
						'parent' => get_the_ID(),
						'sort_column' => 'menu_order'
					));

					if (get_field('enable_child_grid') && $subpages):
						echo '<a data-nav-label="' .
							get_field('link_grid_nav_label') .
							'" class="nav__anchor" name="child-grid"></a>';
						echo '<div id="child-grid" class="panel__wrapper">';
						get_template_part(
							'partials/block', 'feature_child_grid'
						);
						echo '</div>';
					endif;
				?>

                <?php
					if (get_field('feat_resource_title') &&
						get_field('feat_link_cards')):

						echo '<a data-nav-label="' .
							get_field('resources_nav_label') .
							'" class="nav__anchor" name="feature-resources"></a>';
						echo '<div id="feature-resources" class="panel__wrapper">';
						get_template_part( 'partials/block', 'link_cards' );
						echo '</div>';
					endif;
				?>
			</div>
		</article>
        </main>
    </div>
<?php get_footer(); ?>
