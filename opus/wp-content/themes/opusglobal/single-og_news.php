<?php
	$subtitle = get_field('news_subtitle');
	$date = get_field('og_date');
	$contacts = get_field('news_contact');
	$boilerplate = get_field('news_boilerplate');
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
						<?php if($subtitle): ?>
							<h2 class="h3 text-center text-normal"><?php echo $subtitle ?></h2>
						<?php endif; ?>
						<p class="text-center text-meta l-gutter-2x">
							<?php echo get_field('og_date') ?>&nbsp;&nbsp;•&nbsp; <a href="/about/news" class="text-meta">Press Releases</a>
						</p>

						<?php echo get_field('news_text'); ?>

						<?php if($contacts): ?>
							<hr>
							<h2 class="h4">Editorial Contacts</h2>
							<?php echo $contacts; ?>
						<?php endif; ?>
						<?php
						if( $boilerplate && !(get_field('hide_boilerplate'))):
						?>
							<hr>
							<h2 class="h4">About Opus</h2>
							<?php echo $boilerplate; ?>
						<?php endif; ?>
					</div>
				</div>
			</article>
        </main>
    </div>
<?php get_footer(); ?>
