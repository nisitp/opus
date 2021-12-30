<?php
/* Template Name: Microsite */
if (get_field('hide_main_nav')) {
    get_header('microsite');
} else {
    get_header();
}

$detail = false;
if (isset($_GET['detail'])) {
    $detail = true;
}
?>
<?php
    if ($detail) {
        get_template_part( 'page-templates/page', 'microsite_details' );
    } else {
        get_template_part( 'page-templates/page', 'microsite_index' );
    }
?>
<?php get_footer(); ?>
