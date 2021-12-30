<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Opus-Blog
 */
 if(get_the_post_thumbnail() !== '') { $hasThumb = 1; } else { $hasThumb = 0; }
// check for term
if (has_term('no-banner','admin-tag')) $hasThumb = 0;
?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('article article--'.(is_single()?'single':'list') . ' ' . ($hasThumb===1?'has-thumbnail':'no-thumbnail')); ?>>
				
				<?php if (is_sticky()) {?>
				  <div class="article__sticky_label"><h4>Featured Post</h4></div>
				<?php } ?>
					<?php if (!is_page() && 0) {?>
					<div class="article__date"><?php the_time('M'); ?><br><?php the_time('j'); ?></div>
					<?php } ?>
					<div class="article__share"></div>
					<?php
						if($hasThumb) {
							if(!is_single()) {
					?>
<div class="article__featured-image"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('featured-image-small'); ?></a></div>
					<?php
							}
						}
						if(is_single()) {
							if(get_the_post_thumbnail() !== '') {							
					?>
<div class="article__featured-image"><?php the_post_thumbnail('full'); ?></div>
					<?php
							}
							
							the_title('<h1 class="article__title">', '</h1>');
							the_subtitle('<h2 class="article__subtitle">', '</h2>');
						} else {
							the_title('<h2 class="article__title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a></h2>');
							the_subtitle('<h3 class="article__subtitle">', '</h3>');
						}
					?>
					<?php 
						if (!is_page()) {?>
							
					<p class="article__meta">
						<?php the_time('F j, Y'); ?>
						&nbsp;•&nbsp;
						<?php the_author(); ?>
						&nbsp;•&nbsp;
						<?php the_category('&nbsp;|&nbsp;') ?>
					</p>
					<?php } ?>
					
					<div class="article__content">
						<?php the_content(__( 'Read more +', 'opus' )); ?>
						<?php if($elems = get_field('elements')): ?>
							<div>
								<ul class="wpv-loop js-wpv-loop page-grid">
									<?php foreach ($elems as $elem): $elem = $elem['element']; ?>
										<li>
											<a href="<?php echo get_permalink($elem); ?>">
												<h3><?php echo get_the_title($elem); ?></h3>
												<?php echo get_the_post_thumbnail($elem); ?>
												<p><?php echo $elem->post_excerpt ? get_the_excerpt($elem) : get_extended($elem->post_content)['main']; ?></p>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</article>
