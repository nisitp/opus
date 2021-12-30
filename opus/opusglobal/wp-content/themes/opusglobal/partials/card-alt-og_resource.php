<div class="card card--press card--resource">
	<a href="<?php the_permalink(); ?>" class="card__top card__top--bordered">

		<?php
			$thumbnail = get_field('og_image');
			if ( $thumbnail ):
			echo wp_get_attachment_image(
				$thumbnail,
				'card-logo',
				false,
				$attr = [
					'class' => ' card__img',
					'sizes' => '
						(max-width: 39.125em) 100vw,
						(max-width: 53.1875em) 50vw,
						680px'
				]
			);
			else: ?>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/defaults/resource-default-bg.png" class="card__img">
		<?php endif; ?>
	</a>
	<div class="card__body">
		<p class="card__is-featured">
			<span class="text--pill">
				<?php
					$terms = get_the_terms( $post->ID , 'type' );
					foreach ( $terms as $term ) {
						//echo $term->name;
						echo '<a href="'.get_tag_link($term->term_id).'">'.htmlspecialchars($term->name).'</a>';
					}
				?>
			</span>
		</p>
		<a href="<?php the_permalink() ?>">
			<h3 class="card__title text-unheading"><?php the_title(); ?></h3>
		</a>
		<div class="resource-excerpt">
			<?php the_field('excerpt'); ?>
		</div>
		<span class="text-subtle">
			<ul>
                <li><?php the_field('date'); ?></li>
                <?php if (!get_field('hide_author')): ?>
                	<li><?php the_field('author'); ?></li>
            	<?php endif; ?>
            </ul>
		</span>
	</div>
</div>
