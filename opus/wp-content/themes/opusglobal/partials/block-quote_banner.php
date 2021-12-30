<section class="panel panel--banner--gradient">
	<div class="l-content panel__body panel__body--quote">
		<h2 class="h1 text--quote panel__heading">
			<?php echo get_sub_field('quote'); ?>
		</h2>
		<?php if ($author = get_sub_field('quote_attribution')): ?>
			<p class="text-uppercase"><?php echo $author; ?></p>
		<?php endif; ?>
	</div>
</section>
