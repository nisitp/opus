<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Opus-Blog
 */
?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('brand-material brand-material--'.(is_single()?'single':'list')); ?>>
					<?php
						if(!is_single() && get_the_post_thumbnail() !== '') {
					?>
<div class="brand-material__featured-image"><?php the_post_thumbnail('featured-image'); ?></div>
					<?php
						}
						the_title('<h1 class="brand-material__title">', '</h1>');
					?>

					<div class="brand-material__excerpt">
						<?php !is_single() || $post->post_content == '' ? the_excerpt() : the_content(); ?>

					</div>
					<?php
						if(!is_single() && $post->post_content != '') {
?>
<a class="brand-material__read-more" href="<?php echo get_permalink(); ?>">Read more +</a>
					<?php
						} else if(function_exists('get_field')) {
							if($download = get_field('download')) { ?>
								<ul>
									<li>
										<a class="brand-material__download" href="<?php echo htmlentities($download['url']); ?>">
											<?php if(isset($download['title']) && !empty($download['title'])){echo "Download the ". $download['title'];} 
												  else{ echo "Download";}
											?>
										</a>
									</li>
							
					<?php   } if($download_2 = get_field('download_2')) {?>
									<li>
										<a class="brand-material__download" href="<?php echo htmlentities($download_2['url']); ?>">
											<?php if(isset($download_2['title']) && !empty($download_2['title'])){echo "Download the ". $download_2['title'];} 
												  else{ echo "Download";}
											?>
										</a>
									</li>
						<?php } ?>
								</ul>
					<?php
						}
					?>
				</article>
