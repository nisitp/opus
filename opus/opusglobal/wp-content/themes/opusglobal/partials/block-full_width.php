<section class="panel panel--sidebar bg-<?php the_sub_field('block_bg') ?>">
	<div class="l-content panel__body">
		<?php if ($title = get_sub_field('block_title')): ?>
			<h2 class="panel__heading"><?php echo $title; ?></h2>
		<?php endif; ?>
		<?php the_sub_field('content') ?>
	</div>
</section>
