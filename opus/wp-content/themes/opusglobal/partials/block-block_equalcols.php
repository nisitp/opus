<section class="panel panel--equal-cols">
	<div class="">
		<?php if ($title = get_sub_field('block_title')): ?>
			<h2 class="panel__heading"><?php echo $title; ?></h2>
		<?php endif; ?>

		<div class="l-equal-columns">
			<?php
				// Loop through the columns
				while ( have_rows('block_columns') ) : the_row();
					$col_type = get_sub_field('col_type');
			?>
				<div class="l-col panel__col--<?php echo $col_type ?> bg-<?php the_sub_field('block_bg') ?>">
					<?php
						if (
							($col_title = get_sub_field('col_title')) &&
							($col_type != 'bargraph')&&
							($col_type != 'image')
						):
					?>
						<div class="panel__body">
							<h3 class="h2"><?php echo $col_title; ?></h3>
						</div>
					<?php endif; ?>

					<?php if($col_type == 'text'): ?>
						<div class="panel__body h5 text-unheading">
							<?php the_sub_field('col_text') ?>
						</div>
					<?php endif; ?>

					<?php if($col_type == 'image'): ?>
						<div class="panel__body">
							<h3 class="h6 l-gutter-scale-sm text-normal"><?php echo $col_title; ?></h3>
						</div>
						<?php
							$img_size = get_sub_field('col_image_size');
							if($img_size != 'oversized'):
						 ?>
						 	<div class="panel__body">
						<?php endif; ?>
						<?php if($img_size == 'screenshot'): ?>
							<div class="screenshot">
						<?php endif; ?>
						<?php

							$img_classes = 'l-vert-gutter panel__img panel__img--' . $img_size;
							$col_img = get_sub_field('col_image');
							$col_img_attr = [
								'sizes' => '(max-width: 30em) 100vw, (max-width: 53.125em) 50vw, 1400px',
								'class' => $img_classes
							];

							echo wp_get_attachment_image($col_img, 'full-width', false, $col_img_attr);
						?>
						<?php if(get_sub_field('col_image_size') == 'screenshot'): ?>
							</div>
						<?php endif; ?>
						<?php if($img_size != 'oversized'): ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>

					<?php if($col_type == 'list'): ?>
						<div class="panel__body">
							<ul class="listing">
								<?php
									while ( have_rows('col_list') ) : the_row();
										$link_target = get_sub_field('list_item_link');
								?>
									<li class="listing__item">
										<?php if( $link_target ): ?>
											<a href="<?php echo $link_target ?>">
												<?php the_sub_field('list_item_text') ?>
											</a>
										<?php else: ?>
											<?php the_sub_field('list_item_text') ?>
										<?php endif; ?>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>

					<?php if($col_type == 'bargraph'): ?>
						<div class="panel__body">
							<h3 class="text-body text-normal text-uppercase"><?php echo $col_title; ?></h3>
							<script>
								var labels = [];
								var data = [];
								var colors = [];
							<?php
								while ( have_rows('bars') ) : the_row();
									?>
										labels.push('<?php the_sub_field('label'); ?>');
										data.push('<?php the_sub_field('value'); ?>');
										<?php if (get_sub_field('highlight')): ?>
										colors.push('#4fc6af');
										<?php else: ?>
										colors.push('#e8e8e8');
										<?php endif; ?>
									<?php
								endwhile;
							?>
							</script>
							<canvas id="bar-graph" width="600" height="400"></canvas>
							<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js" integrity="sha256-HptdWaetAoQSrTP9GZVVxKovdIq1C3MmKazLYQ7JnL4=" crossorigin="anonymous"></script>
							<script>
								var ctx = document.getElementById("bar-graph");
								Chart.defaults.global.defaultFontFamily = "Helvetica";

								var myChart = new Chart(ctx, {
								    type: 'horizontalBar',
								    data: {
								        labels: labels,
								        datasets: [{
								            label: '',
								            data: data,
								            backgroundColor: colors,
								            borderWidth: 0
								        }]
								    },
								    options: {
								    	legend: {
								    		display: false
								    	},
								        scales: {
								            xAxes: [{
										    	gridLines: {
										    		color: '#e8e8e8',
										    		display: true,
										    		zeroLineColor: '#e8e8e8'
										    	},
								            	ticks: {
								            		beginAtZero: true,
								            	}
								            }],
								            yAxes: [{
										    	gridLines: {
										    		display: false,
										    	},
								            }]
								        }
								    }
								});
							</script>
						</div>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
