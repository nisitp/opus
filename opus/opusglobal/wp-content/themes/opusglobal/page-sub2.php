<?php
/* Template Name: Sub2 */
get_header();

$breadcrumb = array_reverse(get_ancestors(get_the_ID(), 'page', 'post_type'));
$breadcrumb = $breadcrumb
    ? array_merge([''], array_map(function($p) {
        return "<a href=\"".get_permalink($p)."\">".get_the_title($p)."</a>";
      }, $breadcrumb))
    : [];
$breadcrumb = implode(" / ", $breadcrumb);

if (get_field("hero_title_override")) {
        $hero_title = strip_tags(get_field("hero_title_override"), "<strong><em><b><i><br><span><div>");
} else {
        $hero_title = get_the_title();
}

?>

<div class="l-container l-main">
    <main>
        <article class="sub2">
            <section class="sub2-hero">
                <div class="sub2-hero__inner">
                    <div class="sub2-hero__breadcrum">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><?php echo $breadcrumb; ?> / <a class="active" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                    <h2 class="sub2-hero__heading">
                        <?php print $hero_title; ?>
                    </h2>
                </div>
            </section>

            <?php
                // Check if we've got content blocks
                if( have_rows('content_blocks') ):
                    while ( have_rows('content_blocks') ) : the_row();
                        // Pull in block layout
                        get_template_part( 'partials/block', get_row_layout() );
                    endwhile;
                endif;
            ?>
        </article>
    </main>
</div>

<?php
get_footer();