<div class="card card--event">
	<a href="<?php echo get_post_permalink(); ?>" class="card__top link--static">
		<?php if ($card_image = get_field('og_image')): ?>
			<?php
			echo wp_get_attachment_image(
				$card_image,
				'card-graphic',
				false,
				$attr = [
					'class' => ' card__img',
					'sizes' => '
						(max-width: 39.125em) 100vw,
						(max-width: 53.1875em) 50vw,
						680px'
				]
			) ?>
		<?php endif; ?>
	</a>
	<div class="card__body">
		<p class="card__is-featured">
			<span class="text--pill">
			<?php if (get_field('featured_event', 'option')) : ?>
				Featured
			<?php else : ?>
				Next
			<?php endif; ?>
			</span>
		</p>
		<a href="<?php echo get_post_permalink(); ?>">
			<h3 class="card__title"><?php the_title(); ?></h3>
		</a>
		<p class="l-gutter-half"><?php echo get_field('event_subtitle') ?></p>
		<span class="text-subtle">
			<?php

				$date = get_field('og_date', false, false);
				$date = new DateTime($date);

				$end_date = get_field('og_end_date', false, false);
				$end_date = new DateTime($end_date);

				$multi_day = get_field('is_multi_day') && $end_date;
				$date_compare = '';

				if (
					$multi_day &&
					($date->format('Y-m') === $end_date->format('Y-m'))
				) {
					$date_compare = 'share_month';
				} elseif (
					$multi_day &&
					($date->format('Y') === $end_date->format('Y'))
				) {
					$date_compare = 'share_year';
				}

				if ( $multi_day && $date_compare === 'share_month' ) {
					// If the dates are in same month, display
					// as "Jan 1-2, 2017"
					echo $date->format('M j') . '-' . $end_date->format('j, Y');
				} elseif ( $multi_day && $date_compare === 'share_year' ) {
					// If the dates are in same year, display
					// as "Jan 1-Feb 2, 2017"
					echo $date->format('M j') .
					'-' . $end_date->format('M j, Y');
				} elseif ( $multi_day ) {
					// If the dates are in different years,
					// display as "Jan 1, 2016-Feb 2, 2017"
					echo $date->format('M j, Y') .
					'-' . $end_date->format('M j, Y');
				} else {
					echo $date->format('M j, Y');
				}

			?><br />
			<?php echo get_field('event_city') ?>
		</span>
	</div>
</div>
