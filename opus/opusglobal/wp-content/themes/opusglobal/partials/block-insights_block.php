<?php
	$link = get_sub_field('insight_link');
	$title = get_sub_field('insight_title');
	$icon = get_sub_field('insight_icon');
	$type = get_sub_field('insight_category');
	$date = get_sub_field('insight_date');
	$style = get_sub_field('insight_style');
	$header_text = get_sub_field('insight_header_text');
	$image = get_sub_field('insight_header_image');
?>
<div class="insights-block">
	<div class="insights-block-box">
		<?php if ($style == 'image_card'): ?>
			<div class="insights-block-box-upper" style="background-image: url('<?php echo $image; ?>');">
				<a href="<?php echo $link ?>" class="insights-block-box-link">
					<div class="insights-block-box-upper-text"></div>
				</a>
			</div>
		<?php else: ?>
			<div class="insights-block-box-upper">
				<a href="<?php echo $link ?>" class="insights-block-box-link">
					<div class="insights-block-box-upper-text">
						<p><?php echo $header_text; ?></p>
						<span href="#"><?php echo $type; ?> <i class="icon-icon-arrow-right"></i></span>
					</div>
				</a>
			</div>
		<?php endif; ?>
		<div class="insights-block-box-meta">
			<div class="insights-icon">
				<img src="<?php echo $icon; ?> ">
			</div>
			<p>
				<a href="<?php echo $link; ?>"><?php echo $title; ?></a>
			</p>
			<?php if ($type && $date): ?>
				<span><?php echo $date . ' | ' . $type ?></span>
			<?php elseif($type): ?>
				<span><?php echo $type ?></span>
			<?php elseif ($date): ?>
				<span><?php echo $date ?></span>
			<?php endif; ?>
		</div>
	</div>
</div>
