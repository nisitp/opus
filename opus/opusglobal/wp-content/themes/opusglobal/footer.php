<footer class="footer">
    <div class="l-content">
        <div class="footer-menus">
			<?php if( have_rows('footer_primary_links', 'options') ): ?>
            <nav class="footer-nav">
				<ul>
					<?php while ( have_rows('footer_primary_links', 'options') ) : the_row(); ?>
					<li><a href="<?php the_sub_field('link_location'); ?>"><?php the_sub_field('link_label'); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</nav>
            <?php endif; ?>
            <nav class="footer-social">
                <ul>
                  <?php
                    if( have_rows('social_links', 'options') ):
                    while ( have_rows('social_links', 'options') ) : the_row();
                  ?>
                    <li>
          						<a href="<?php the_sub_field('url'); ?>" class="footer-social-link"><i class="fa fa-<?php the_sub_field('type'); ?>" aria-hidden="true"></i></a>
          					</li>
                  <?php
                    endwhile;
                    else :
                    endif;
                  ?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="l-content">
        <div class="footer-legal">
            <div class="footer-logo">
                <a href="/" class="hide-text">Opus</a>
            </div>
			<?php if( have_rows('footer_legal_links', 'options') ): ?>
            <nav class="footer-nav-legal">
				<ul>
					<?php while ( have_rows('footer_legal_links', 'options') ) : the_row(); ?>
					<li><a href="<?php the_sub_field('link_location'); ?>"><?php the_sub_field('link_label'); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</nav>
            <?php endif; ?>

            <div class="footer-copyright">
                &copy; <?php echo date("Y"); ?> <?php the_field('footer_copyright_notice', 'options'); ?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

<div class="modal-backdrop">
  <div class="modal-container modal-container--compressed">
    <div class="modal modal--account" id="opus-modal-login" role="dialog">
      <div class="opus-modal-close js-account-modal-close"></div>
      <h3 class="text-center"><?php the_field('login_title', 'options'); ?></h3>
      <p class="text-center">
		  <?php the_field('login_instructions', 'options'); ?>
	  </p>
      <ul class="modal__link-blocks">
		<?php while ( have_rows('login_links', 'options') ) : the_row(); ?>
        <li>
			<a href="<?php the_sub_field('link'); ?>"><img src="<?php the_sub_field('logo'); ?>"></a>
		</li>
        <?php endwhile; ?>
      </ul>
	  <!-- <p class="text-center">
	  	<a href="#">New to Opus? Register for a solution.</a>
	  </p> -->
    </div>
  </div>
</div>
<div class="modal-backdrop">
  <div class="modal-container modal-container--compressed">
    <div class="modal modal--account" id="demo-modal" role="dialog">
      <div class="opus-modal-close js-account-modal-close"></div>
      <h3 class="text-center">Request a Demo</h3>
      <div class="js-demo-form">

      </div>
      <?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true" tabindex="-1"]'); ?>
</div>
</div>
</div>
<!-- SERVER IP: <?php print $_SERVER['SERVER_ADDR']; ?> -->
</body>
</html>
