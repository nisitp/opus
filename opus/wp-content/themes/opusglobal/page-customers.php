<?php
/* Template Name: Customers Page */
?>

<?php get_header(); ?>
    <div class="l-container l-main">
        <main>
        <article>
            <header class="l-flex-col banner banner--tall">
                <?php get_template_part( 'partials/breadcrumbs' ); ?>
                <?php get_template_part( 'partials/hero', 'global' ); ?>
                <?php
                $hero_bg = get_field('hero_bg', false, false);
                if ( $hero_bg )
                    echo wp_get_attachment_image(
                        $hero_bg,
                        'full',
                        false,
                        $attr = [
                            'class' => 'banner__bg',
                            'sizes' => '(max-width: 39.125em) 100vw,(max-width: 53.1875em) 100vw, (max-width: 100em) 100vw, 3200px',
                            'aria-hidden' => 'true'
                        ]
                    );
                ?>
                <?php get_template_part( 'partials/hero', 'wave' ); ?>
            </header>

            <div class="js-section-nav-spacer"></div>

            <div class="all-customers">
                <div class="customer-section">
                    <a class="inpage-anchor" name="<?php echo $slugName; ?>"></a>
                    <div class="l-content">
                        <h3><?php the_field('page_title'); ?></h3>
                        <div class="all-customers-logos">
                            <?php
                                $args = array(
                                    'post_type'  => 'customer',
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC',
                                    'posts_per_page' => -1,
                                );
                                $customer_query = new WP_Query( $args ); 
                            ?>
                                <?php if ( $customer_query->have_posts() ) : ?>
                                    <?php while ( $customer_query->have_posts() ) : $customer_query->the_post(); ?>
                                        <div class="customer-logos">
                                            <div class="customer-logo">
                                                <div class="inner-customer-logo">
                                                    <?php if( get_field('category') ): ?><a href="<?php the_permalink(); ?>"><?php endif; ?>
                                                        <img src="<?php the_field('logo'); ?>" alt="<?php the_title(); ?>">
                                                    <?php if( get_field('category') ): ?></a><?php endif; ?>
                                                    <div class="customer-icons">
                                                        <?php

                                                        // vars 
                                                        $categories = get_field('category');


                                                        // check
                                                        if( $categories ): ?>
                                                        <ul>
                                                            <?php foreach( $categories as $category ): ?>
                                                                <li><img src="<?php bloginfo('template_directory');?>/assets/img/icon-<?php echo $category; ?>.png"></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        </main>
    </div>
    <div id="panel-2" class="panel__wrapper customers-bottom">
        <section class="panel panel--equal-cols">
            <div class="">
                <div class="l-equal-columns">
                    <div class="l-col panel__col--image bg-gray">
                        <div class="panel__body">
                            <div class="solutions-solution-content-bullet-icon ">
                                <img src="<?php the_field('left_icon'); ?>">
                            </div>
                            <h3 class="h2"><?php the_field('left_title'); ?></h3>
                        </div>
                         <div class="panel__body h5 text-unheading">
                            <?php the_field('left_content'); ?>
                            <a href="<?php the_field('left_button_url'); ?>" class="button"><?php the_field('left_button_text'); ?></a>
                        </div>
                    </div>
                 <div class="l-col panel__col--text bg-primary">
                        <div class="panel__body">
                            <div class="solutions-solution-content-bullet-icon ">
                                <img src="<?php the_field('right_icon'); ?>">
                            </div>
                            <h3 class="h2"><?php the_field('right_title'); ?></h3>
                        </div>
                         <div class="panel__body h5 text-unheading">
                            <?php the_field('right_content'); ?>
                            <a href="<?php the_field('right_button_url'); ?>" class="button"><?php the_field('right_button_text'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php get_footer(); ?>
