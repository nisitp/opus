<section class="panel panel--sidebar l-content">
	<?php if ($title = get_sub_field('block_title')): ?>
		<h2 class="panel__heading"><?php echo $title; ?></h2>
	<?php endif; ?>
	<div class="l-col-primary panel__body">
		<?php the_sub_field('content') ?>
	</div>
	<?php
		// Check if we've got sidebar blocks
		if( have_rows('sidebar') ): ?>
		<aside class="l-col-secondary">
			<?php
			while ( have_rows('sidebar') ) : the_row();
				$sidebar_type = get_row_layout();

				if( $sidebar_type == 'text' ): ?>
					<section class="callout">
						<?php the_sub_field('content'); ?>
					</section>
				<?php endif;

				if( $sidebar_type == 'large_statistic' ): ?>
					<section class="callout callout--stat">
						<div class="callout--stat__number"><?php the_sub_field('stat_number'); ?></div>
						<div class="callout--stat__label"><?php the_sub_field('stat_label'); ?></div>
					</section>
				<?php endif;
			endwhile; ?>
			</aside>
		<?php
		endif;
	?>
</section>
