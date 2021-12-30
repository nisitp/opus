<?php get_header(); ?>
<div class="l-container l-main">
	<main>
		<article class="">
			<?php
				$variants = get_field('hero_variants');
				$variant_image = $variants[0]['variant_background_image'];
			?>
			<header class="l-flex-col banner banner--new-home" style="background-image: url('<?php echo $variant_image; ?>');">
				<?php get_template_part( 'partials/hero', 'home' ); ?>
			</header>
			<a name="content"></a>
			<section class="panel panel--center panel--intro l-content">
				<?php if ($icon = get_field('intro_icon')): ?>
					<img class="icon--intro" src="<?php echo $icon; ?>">
				<?php endif; ?>

				<?php if ($intro = get_field('intro_text')): ?>
					<div class="h5 text-unheading"><?php echo $intro; ?></div>
				<?php endif; ?>
			</section>
			<?php
				// Check if we've got content blocks
				if( have_rows('content_blocks') ):
					while ( have_rows('content_blocks') ) : the_row();
						// Pull in block layout
						get_template_part( 'partials/block', get_row_layout() );
					endwhile;
				endif;
			?>
			<?php
				$offerings_bg = '';

				if (get_field('offerings_intro_background'))
					$offerings_bg = 'style="background-image: url(' . get_field('offerings_intro_background') .
					');"';
			?>
			<section class="panel section--solutions bg-primary" <?php echo $offerings_bg; ?>>
			    <header class="solutions-header">
			        <div class="l-content">
			            <h2><?php echo get_field('offerings_heading'); ?></h2>
						<?php
							if(get_field('offerings_intro'))
								echo get_field('offerings_intro');
						?>
			            <hr>
			        </div>
			    </header>
				<?php
					// Check if we've got content blocks
					if( have_rows('offerings') ):
						while ( have_rows('offerings') ) : the_row();
							// Pull in block layout
							get_template_part( 'partials/block', 'offering' );
						endwhile;
					endif;
				?>
			</section>
			<?php if (get_field('insight_enabled')) : ?>
			<section class="section--insights bg-pattern">
			    <header class="insights-header">
			        <div class="l-content">
			            <h2>Insights</h2>
			        </div>
			    </header>
			    <div class="l-content">
			        <div class="insights-blocks-width"></div>
			        <div class="insights-blocks">
				        <div class="insights-block-inner">
							<?php
								if( have_rows('insight_blocks') ):
									while ( have_rows('insight_blocks') ) : the_row();
										get_template_part( 'partials/block', 'insights_block' );
									endwhile;
								endif;
							?>
						</div>
			        </div>
			    </div>
			    <!-- <div class="insights-view-all"><a href="#" class="insights-view-all">View All</a></div> -->
			</section>
			<?php endif; ?>
		</article>
	</main>
</div>
<?php get_footer(); ?>
