<section class="panel panel--timeline">
	<div class="l-content">
		<?php if ($title = get_sub_field('timeline_title')): ?>
			<h2 class="panel__heading"><?php echo $title; ?></h2>
		<?php endif; ?>

		<?php if( have_rows('timeline_events') ): ?>
			<div class="timeline">
				<?php
				// loop through rows (parent repeater)
				while( have_rows('timeline_events') ): the_row(); ?>
					<section class="timeline__section">
						<h3 class="timeline__year h1">
							<?php the_sub_field('timeline_year'); ?>
						</h3>
						<?php
						// check for rows (sub repeater)
						if( have_rows('events') ): ?>
							<ul class="timeline__event-list">
							<?php
							// loop through rows (sub repeater)
							while( have_rows('events') ): the_row();
								// display each item as a list ( if
								// events_event )
								?>
								<li class="timeline__event">
									<?php the_sub_field('events_event'); ?>
								</li>
							<?php endwhile; ?>
							</ul>
						<?php endif; //if( get_sub_field('events') ): ?>
					</section>
				<?php endwhile; // while( has_sub_field('timeline_events') ): ?>
			</div>
		<?php endif; // if( get_field('timeline_events') ): ?>
	</div>
</section>
