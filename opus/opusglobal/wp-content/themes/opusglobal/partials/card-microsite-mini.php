<div class="card card--press">
	<a href="<?php the_permalink(); ?>" class="card__top card__top--bordered">
		<?php if ($card_image = get_field('og_image')): ?>
			<?php
			echo wp_get_attachment_image(
				$card_image,
				'card-logo',
				false,
				$attr = [
					'class' => ' card__img',
					'sizes' => '
						(max-width: 39.125em) 100vw,
						(max-width: 53.1875em) 50vw,
						680px'
				]
			) ?>
		<?php endif; ?>
	</a>
	<div class="card__body">
		<p class="card__is-featured">
			<span class="text--pill">
				<?php
					$terms = get_the_terms( $post->ID , 'type' );
					foreach ( $terms as $term ) {
						echo $term->name;
					}
				?>
			</span>
		</p>
		<a href="<?php the_permalink() ?>">
			<h3 class="card__title text-unheading"><?php the_title(); ?></h3>
		</a>
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
