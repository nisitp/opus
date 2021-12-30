<header class="hero banner__overlay">
	<div class="l-content">
		<?php
			if (get_field("hero_title")) {
				$hero_title = strip_tags(get_field("hero_title"), "<strong><em><b><i><br><span><div>");
			} else {
				$hero_title = get_the_title();
			}

			$hero_class = '';

			if(get_field('override_title'))
				$hero_class = 'text-normal';

			$hero_resource = get_field('hero_resource');
		?>

		<h1 class="hero__title <?php echo $hero_class; ?>">
			<?php echo $hero_title; ?>
		</h1>
		<div class="hero__description h5 ">
			<?php the_field('hero_description'); ?>
		</div>

		<a href="?detail=<?php echo $hero_resource->ID; ?>" class="btn-transparent"><?php the_field('hero_button_label'); ?></a>
	</div>
</header>
