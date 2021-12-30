<?php
	$page_id = get_the_ID();
	$pages = get_ancestors( $page_id, 'page', 'post_type' );
	$pages = array_reverse($pages);

	if ($pages) { ?>

	<div class="breadcrumbs l-content">
		<?php
			$output = '';

			for($i = 0; $i < count($pages); $i++) {
				$output.= '<a href="' . get_permalink($pages[$i])
					. '" class="breadcrumbs__link">'
					. get_the_title($pages[$i])
					. '</a>';

				$output.= " / ";
			}

			echo $output;
		?>
	</div>

<?php } ?>
