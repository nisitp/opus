<?php
    $location = get_field('event_city');
	$date = get_field('og_date');
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
							<?php og_event_date(); ?>&nbsp;&nbsp;•&nbsp;
							<?php if($og_event_time = og_event_time()) echo $og_event_time."&nbsp;&nbsp;•&nbsp;"; ?>
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
