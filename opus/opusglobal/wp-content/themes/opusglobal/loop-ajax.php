<?php
if(have_posts()) {
	?><ul class="listing--blocks listing--blocks--tight l-gutter-2x"><?php
	while(have_posts()) {
		the_post();
		// Skip first post, since one was excluded in the call
		if (0 == $wp_query->current_post) {
			continue;
		}

		?><li class="listing__item"><?php
			get_template_part( 'partials/card', $post->post_type );
		?></li><?php
	}
	?></ul><?php
}
