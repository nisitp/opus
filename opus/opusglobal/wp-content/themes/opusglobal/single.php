<?php get_header(); ?>
<?php
    $microsite = wp_get_post_terms($post->ID, 'microsites');
    if ($microsite) {
        get_template_part( 'page-templates/page', 'resource-microsite' );
    } else {
        get_template_part( 'page-templates/page', 'post-default' );
    }
?>
<?php get_footer(); ?>
