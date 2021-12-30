<?php
/* Template Name: Infographic */

if (get_field('use_main_nav')) {
    get_header();
} else {
    get_header('infographic');
}
get_template_part( 'page-templates/page', 'infographic' );
get_footer();
?>
