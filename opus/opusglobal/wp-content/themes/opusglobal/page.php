<?php get_header(); ?>
    <div class="l-container l-main">
        <main>
			<article class="">
				<header class="l-flex-col banner banner--blur">
					<?php get_template_part( 'partials/breadcrumbs' ); ?>
					<?php get_template_part( 'partials/hero', 'global' ); ?>
					<?php get_template_part( 'partials/hero', 'image' ); ?>
				</header>
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
