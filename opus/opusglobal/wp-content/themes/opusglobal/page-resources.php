<?php
/* Template Name: Resources */
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
?>

<?php get_header(); ?>
    <div class="l-container l-main">
        <main>
            <section class="l-layout-wrap l-content">
                <nav class="l-nav-sidebar bg-pattern">
                    <ul class="nav nav--sidebar">
                        <li><a href="/resources/" class="is-active">All Resources</a></li>
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
                        <h1 class="heading--page">Resources</h1>
                    </header>
                    <?php the_content(); ?>
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
                        );

                        if (get_field('featured_resource', 'option')) {
                            $featured_resource = get_field('featured_resource', 'option');
                            //$list_args['post__not_in'] = array($featured_resource->ID);
                        }

                        $list_query = new WP_Query( $list_args );

                        if ( $list_query->have_posts() ) :
                            if (!get_field('featured_resource', 'option')) {
                                $list_query->the_post();
                                $first_post_id = $post->ID;
                            }
                    ?>
                    <div class="card__feature">
                        <?php
                            if (get_field('featured_resource', 'option')) {
                                $post = get_field('featured_resource', 'option');
                                setup_postdata($post);
                                $first_post_id = $post->ID;
                            }
                            get_template_part(
                                'partials/card-alt', $post_type
                            );
                            if (get_field('featured_resource', 'option')) {
                                wp_reset_postdata();
                            }
                        ?>
                    </div>
                    <div class="js-ajax-pager">
                        <ul class="listing--blocks listing--blocks--press l-gutter-2x">
                            <?php
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
                                    <a href="#" data-page="<?php echo $paged + 1; ?>" data-exclude_id="<?php echo $first_post_id; ?>" data-post_type="<?php echo $post_type; ?>" class="nav-next">
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
