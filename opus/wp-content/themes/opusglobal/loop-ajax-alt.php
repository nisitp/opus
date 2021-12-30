<?php
if(have_posts()) {
	?><ul class="listing--blocks listing--blocks--tight l-gutter-2x"><?php
	while(have_posts()) {
		the_post();

		?><li class="listing__item"><?php
			get_template_part( 'partials/card-alt', $post->post_type );
		?></li><?php
	}
	?></ul><?php
}
