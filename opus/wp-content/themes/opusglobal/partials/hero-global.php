<header class="hero banner__overlay">
	<div class="l-content">
		<?php
			if (get_field("hero_title_override")) {
				$hero_title = strip_tags(get_field("hero_title_override"), "<strong><em><b><i><br><span><div>");
			} else {
				$hero_title = get_the_title();
			}

			$hero_class = '';

			if(get_field('override_title'))
				$hero_class = 'text-normal';
		?>

		<h1 class="hero__title <?php echo $hero_class; ?>">
			<?php echo $hero_title; ?>
		</h1>
	</div>
</header>
