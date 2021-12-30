<?php

$hero_bg = '';

if (get_field('hero_bg', false, false)) {
	$hero_bg = get_field('hero_bg', false, false);
} else if (get_field('hero_bg', $post->post_parent )) {
	$hero_bg = get_field('hero_bg', $post->post_parent );
}

if ( $hero_bg )
	echo wp_get_attachment_image(
		$hero_bg,
		'full',
		false,
		$attr = [
			'class' => 'banner__bg',
			'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 100vw, (max-width: 100em) 100vw, 1600px',
			'aria-hidden' => 'true'
		]
	);
?>
