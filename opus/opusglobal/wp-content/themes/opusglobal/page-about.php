<?php get_header(); ?>
    <div class="l-container l-main">
        <main>
			<article class="">
				<header class="l-flex-col banner banner--tall">
					<?php get_template_part( 'partials/breadcrumbs' ); ?>
					<?php get_template_part( 'partials/hero', 'global' ); ?>
					<?php get_template_part( 'partials/hero', 'image' ); ?>
					<?php get_template_part( 'partials/hero', 'wave' ); ?>
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
					// Check if we've got content blocks
					if( have_rows('content_blocks') ):
						while ( have_rows('content_blocks') ) : the_row();
							// Pull in block layout
							get_template_part( 'partials/block', get_row_layout() );
						endwhile;
					endif;
				?>
			</article>
        </main>
    </div>
<?php get_footer(); ?>
