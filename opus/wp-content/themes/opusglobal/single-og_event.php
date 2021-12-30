<?php
    $location = get_field('event_city');
	$date = get_field('og_date');
	$time_start = get_field('event_start_time');
	$time_end = get_field('event_end_time');
	$topics = get_field('event_topics');
	$link = get_field('event_link');
	$link_text = get_field('event_link_text')
?>
<?php get_header(); ?>
    <div class="l-container l-main">
        <main>
			<article class="">
				<div class="l-content">
					<header class="banner banner--plain">
						<div class="text-center">
							<h1 class="l-marginless"><?php the_title(); ?></h1>
						</div>
					</header>
				</div>
				<div class="l-content">
					<div class="l-single-col">
						<?php if($location): ?>
							<h2 class="h3 text-center text-normal">
								<?php echo $location ?>
							</h2>
						<?php endif; ?>
						<p class="text-center text-meta l-gutter-2x">
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

                                if (
                                    $multi_day &&
                                    $date_compare === 'share_month'
                                ) {
                                    // If the dates are in same month, display
                                    // as "Jan 1-2, 2017"
                                    echo $date->format('M j') .
                                    '-' . $end_date->format('j, Y');
                                } elseif (
                                    $multi_day &&
                                    $date_compare === 'share_year'
                                ) {
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

                            ?>&nbsp;&nbsp;•&nbsp;
							<?php
							if($time_start && !$multi_day):
								$start_obj = date_create($time_start);
								$start_mins = date_format($start_obj, 'i');

								if ($start_mins == '00') {
									echo date_format($start_obj, 'gA');
								} else {
									echo date_format($start_obj, 'g:iA');
								}

								if ($time_end) {
									$end_obj = date_create($time_end);
									$end_mins = date_format($end_obj, 'i');

									echo " - ";

									if ($end_mins == '00') {
										echo date_format($end_obj, 'gA');
									} else  {
										echo date_format($end_obj, 'g:iA');
									}
								}

								echo "&nbsp;&nbsp;•&nbsp;";
							endif;
							?>
							 <a href="/about/events" class="text-meta">Events</a>
						</p>

						<?php if ($event_image = get_field('og_image')): ?>
							<?php
							echo wp_get_attachment_image(
								$event_image,
								'large',
								false,
								$attr = [
									'class' => 'l-gutter-scale',
									'sizes' => '
										(max-width: 53.1875em) 100vw,
										900px'
								]
							) ?>
						<?php endif; ?>

						<?php echo get_field('event_description'); ?>

						<?php if($topics): ?>
							<hr>
							<h2 class="h6">Topics</h2>
							<?php echo $topics; ?>
						<?php endif; ?>

						<?php if($agenda = have_rows('agenda_items')): ?>
							<hr>
							<h2 class="h6">Agenda</h2>
							<table class="l-gutter-scale">
								<thead class="u-invisible">
									<tr>
										<td>Time</td>
										<td>Agenda Item</td>
									</tr>
								</thead>
								<tbody>
								<?php while(have_rows('agenda_items')) : the_row(); ?>
									<tr>
										<td class="l-gutter-right"><?php
											echo get_sub_field('agenda_time');
										?></td>
										<td><?php
											echo get_sub_field('agenda_title');
										?></td>
									</tr>
								<?php endwhile; ?>
								</tbody>
							</table>
						<?php endif; ?>

						<?php if ($link): ?>
							<a href="<?php echo $link ?>" class="button"><?php
								echo $link_text;
							?></a>
						<?php endif; ?>
					</div>
				</div>
			</article>
        </main>
    </div>
<?php get_footer(); ?>
