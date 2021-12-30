<header class="hero banner__overlay">
	<div class="l-content">
		<?php
			if (get_field("hero_title_override", get_option('page_for_posts'))) {
				$hero_title = strip_tags(get_field("hero_title_override", get_option('page_for_posts')), "<strong><em><b><i><br><span><div>");
			} else {
				$hero_title = 'Opus Blog';
			}

			$hero_class = '';

			if(get_field('override_title', get_option('page_for_posts')))
				$hero_class = 'text-normal';
		?>

		<h1 class="hero__title <?php echo $hero_class; ?>">
			<?php echo $hero_title; ?>
		</h1>
	</div>
</header>
