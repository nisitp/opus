<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Opus-Blog
 */

?>

			</main>

			<?php get_sidebar(); ?>
		</div>

		<footer class="footer">
			<div class="footer__legal">
				<div class="footer__logo">
					<a href="http://www.opus.com/">Opus</a>
				</div>
				<div class="footer__copyright">&copy; 2017 Opus Global, Inc. All Rights Reserved.</div>
			</div>
		</footer>

		<?php wp_footer(); ?>
	</body>
</html>
