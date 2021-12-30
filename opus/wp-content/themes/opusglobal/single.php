<?php get_header(); ?>
<?php
    $microsite = wp_get_post_terms($post->ID, 'microsites');
    if ($microsite) {
	// Hot Sauce addition to allow for multiple microsites
	$siteSlug = $microsite[0]->slug;
	if ($templ = locate_template("page-templates/page-resource-microsite-think-opus.php")) {
	  get_template_part( 'page-templates/page', 'resource-microsite-'.$siteSlug );
	} else {
	  get_template_part( 'page-templates/page', 'resource-microsite' );
	}
    } else {
        get_template_part( 'page-templates/page', 'post-default' );
    }
?>
<?php get_footer(); ?>
