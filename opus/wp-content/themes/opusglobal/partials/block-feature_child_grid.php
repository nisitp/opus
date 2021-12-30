<!--
	NOTE: This template is built to show the children of feature template
	pages. Not for general use.
-->
<?php
	$subpages = get_pages( array(
		'parent' => get_the_ID(),
		'sort_column' => 'menu_order'
	));
?>
<section class="panel panel--listing">
	<div class="l-content">
		<?php if ($title = get_field('link_grid_block_title')): ?>
			<h2 class="panel__heading"><?php echo $title; ?></h2>
		<?php endif; ?>
		<?php if ($intro = get_field('link_grid_block_intro')): ?>
			<div class="h5 text-unheading text-center">
				<p>
					<?php echo $intro; ?>
				</p>
			</div>
		<?php endif; ?>
		<ul class="listing--grid">
			<?php foreach ($subpages as $subpage): ?>
				<li class="listing__item">
					<a href="<?php
						echo get_page_link($subpage->ID);
					?>" class="listing__link">
					<span class="l-fill-width"><?php echo $subpage->post_title;
					?></span>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
</section>
