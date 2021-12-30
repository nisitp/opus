<?php
/* Archive Template for Resources */
    function wp_body_classes( $classes ) {
        $classes[] = 'l-listing-page';

        return $classes;
    }
    add_filter( 'body_class','wp_body_classes' );
?>

<?php
    // Get the content type for the listing
    $post_type = 'og_resource';
    $first_post_id = null;
    $tax_id = get_queried_object_id();
?>

<?php get_header(); ?>
    <div class="l-container l-main">
        <main>
            <section class="l-layout-wrap l-content">
                <nav class="l-nav-sidebar bg-pattern">
                    <ul class="nav nav--sidebar">
                        <li><a href="/resources/">All Resources</a></li>
                        <?php
                            // your taxonomy name
                            $tax = 'type';

                            // get the terms of taxonomy
                            $terms = get_terms( $tax, $args = array(
                                'hide_empty' => true, // do not hide empty terms
                            ));

                            wp_nav_menu(
                                array(
                                    'theme_location' => 'resource_navigation',
                                    'container' => false,
                                    'items_wrap' => '%3$s'
                                )
                            );

                            // loop through all terms
                            foreach( $terms as $term ) {
                                // Get the term link
                                $term_link = get_term_link( $term );
                                echo '<li><a href="' . esc_url( $term_link ) . '">' . Pluralize::pluralize($term->name, 2) .'</a></li>';
                            }
                        ?>
                    </ul>
                </nav>
                <div class="l-primary">
                    <header>
                        <h1 class="heading--page"><?php echo Pluralize::pluralize(single_term_title('', false), 2); ?></h1>
                    </header>
                    <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                        $list_args = array(
                            'paged' => $paged,
                            'post_status'=>'publish',
                            'post_type' => $post_type,
                            'posts_per_page' => 12,
                            'meta_key' => 'date',
                            'order' => 'DESC',
                            'orderby' => 'meta_value_num',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'type',
                                    'field' => 'term_id',
                                    'terms' => $tax_id
                                )
                            )
                        );

                        $list_query = new WP_Query( $list_args );

                        if ( $list_query->have_posts() ) :
                    ?>
                    <div class="js-ajax-pager">
                        <ul class="listing--blocks listing--blocks--press l-gutter-2x">
                            <?php
                            wp_reset_postdata();
                            while ( $list_query->have_posts() ) : $list_query->the_post();
                            ?>
                                <li class="listing__item">
                                    <?php
                                    get_template_part(
                                        'partials/card-alt', $post_type
                                    );
                                    ?>
                                </li>
                                <?php wp_reset_postdata(); ?>
                            <?php endwhile; ?>
                        </ul>

                        <?php if($list_query->max_num_pages>1):?>
                            <p class="paged js-ajax-nav">
                                <?php if( $paged < $list_query->max_num_pages) { ?>
                                    <a href="#" data-page="<?php echo $paged + 1; ?>" data-taxtypeid="<?php echo $tax_id; ?>" data-exclude_id="<?php echo $first_post_id; ?>" data-post_type="<?php echo $post_type; ?>" class="nav-next">
                                        View More +
                                    </a>
                                <?php } ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>
<?php get_footer(); ?>
