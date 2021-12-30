<?php
/* Template Name: Basic Page */
?>

<?php get_header(); ?>
    <div class="l-container l-main">
        <main>
			<article class="">
				<div class="l-content">
					<header class="banner banner--plain">
						<div class="text-center">
							<h1 class="l-marginless"><?php the_title(); ?></h1>
						</div>
					</header>
				</div>
				<div class="l-content">
					<div class="l-single-col l-gutter-2x">
						<?php the_content() ?>
					</div>
				</div>
			</article>
        </main>
    </div>
<?php get_footer(); ?>
