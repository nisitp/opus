<?php
    $microsite = wp_get_post_terms($post->ID, 'microsites');
    $microsite = $microsite[0]->slug;

    $args = array(
        'post_type' => 'page',
        'meta_key' => 'microsite_tag',
        'meta_value' => $microsite
    );
    $the_query = new WP_Query( $args );
    if( $the_query->have_posts() ) {
        while( $the_query->have_posts() ) {
            $the_query->the_post();

            $microsite_post = $post;
            $microsite_id = get_the_ID();
        }
    }
    wp_reset_query();
?>

    <div class="l-container l-main single-resource-microsite">
        <main>
            <article class="">
                <?php
                    $banner_image = get_stylesheet_directory_uri() . '/assets/img/microsite/hero-background.png';
                    if (get_field('microsite_image')) {
                        $banner_image = get_field('microsite_image');
                    }
                    if (get_post_type() == 'post') {
                        if (get_post_thumbnail_id()) {
                            $banner_image = wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' );
                        }
                    }
                ?>
                <header class="l-flex-col banner microsite-details-banner" style="background-image: url('<?php echo $banner_image; ?>');">
                    <div class="breadcrumbs l-content">
                        <a class="breadcrumbs__linkhref" href="<?php echo get_the_permalink($microsite_id); ?>"><?php echo get_the_title($microsite_id); ?></a>
                        /
                        <?php
                            $terms = get_the_terms( $post->ID , 'type' );
                            if ($terms) {
                                foreach ( $terms as $term ) {
                                    echo $term->name . ' /';
                                }
                            }
                        ?>
                    </div>
                    <?php get_template_part( 'partials/hero', 'microsite-detail' ); ?>
                </header>

                <section class="l-container microsite-resources microsite-details">
                    <div class="l-content">
                        <div class="microsite-resources-primary">
                        <?php
                            $post_type = get_post_type();
                            if ($post_type == 'og_resource') {
                                get_template_part( 'partials/microsite', 'detail-og_resource' );
                            } else {
                                get_template_part( 'partials/microsite', 'detail-post' );
                            }
                        ?>
                        </div>
                        <div class="microsite-resources-sidebar microsite-details">
                            <?php if (get_field('is_gated')) : ?>
                                <div class="resource-header">
                                    <div class="resource-header-icon">
                                        <i class="icon-icon-opus-gray"></i>
                                    </div>

                                    <div class="resource-header-inner">
                                        <div class="header-inner-text">
                                        <?php
                                            $subtitle = 'Get The Complete';
                                            $terms = get_the_terms( $post->ID , 'type' );
                                            foreach ( $terms as $term ) {
                                                $title = $term->name;
                                            }
                                            if (get_field('gated_banner_subtitle')) {
                                                $subtitle = get_field('gated_banner_subtitle');
                                            }
                                            if (get_field('gated_banner_title')) {
                                                $subtitle = get_field('gated_banner_title');
                                            }
                                        ?>
                                            <span><?php echo $subtitle; ?></span>
                                            <?php echo $title; ?>
                                        </div>
                                        <img class="resource-logo-icon" src="<?php bloginfo('template_directory');?>/assets/img/defaults/icon-bullet-default.svg">
                                    </div>
                                </div>
                                <div class="microsite-form"><?php the_field('form_area'); ?></div>
                            <?php else: ?>
                              <?php
                                $tags = get_the_tags();
                                if ($tags) {
                                  $tagsArr = array();
                                  foreach ($tags as $tag) {
                                    $tagsArr[] = $tag->slug;
                                  }
                                  $tagsList = implode(',', $tagsArr);
                                  $args = array(
                                    'tag' => $tagsList,
                                    'post__not_in' => array($post->ID),
                                    'posts_per_page' => 3,
                                    'orderby' => 'rand'
                                  );
                                  $related_query = new WP_Query($args);
                                  if( $related_query->have_posts() ) { ?>
                                    <div class="microsite-most-popular">
                                        <h4 class="microsite-sidebar-title">Related Resources</h4>
                                        <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                                        <div class="microsite-sidebar-resource">
                                            <a href="<?php the_permalink(); ?>?detail=<?php echo get_the_ID(); ?>">
                                                <div class="microsite-sidebar-resource__image">
                                                    <?php
                                                        $image = get_field('og_image', get_the_ID());
                                                        $image = wp_get_attachment_image_src($image, 'card-logo')[0];
                                                        if (!$image) {
                                                            $image = get_stylesheet_directory_uri().'/assets/img/defaults/resource-default-bg.png';
                                                        }
                                                    ?>
                                                    <img src="<?php echo $image; ?>">
                                                </div>
                                                <div class="microsite-sidebar-resource__title"><?php echo get_the_title(get_the_ID()); ?></div>
                                                <div class="microsite-resources-card__meta">
                                                    <?php
                                                        $terms = get_the_terms( get_the_ID() , 'type' );
                                                        if ($terms) {
                                                            foreach ( $terms as $term ) {
                                                                echo $term->name;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </a>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                                  <?php
                                  }
                                  wp_reset_query();
                                }
                              ?>
                                <?php
                                    $post = $microsite_post;
                                    setup_postdata( $post );
                                ?>
                                <div class="microsite-news">
                                    <h4 class="microsite-sidebar-title"><?php the_field('news_title'); ?></h4>
                                    <?php while( have_rows('news') ): the_row(); ?>
                                        <a href="<?php the_sub_field('url'); ?>">
                                            <?php the_sub_field('title'); ?>
                                            <span><?php the_sub_field('date'); ?></span>
                                        </a>
                                    <?php endwhile; ?>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
                <?php
                    $post = $microsite_post;
                    setup_postdata( $post );
                ?>
                <?php if( have_rows('featured_resources') ): ?>
                    <section class="microsite-featured-resources">
                    <h2 class="panel__heading microsite-heading">Featured Resources</h2>
                    <?php
                        while( have_rows('featured_resources') ): the_row();
                        $resource = get_sub_field('resource');
                        $resource_image = get_field('og_image', $resource->ID);
                        $resource_image = wp_get_attachment_image_src($resource_image)[0];
                        if (get_field('microsite_image', $resource->ID)) {
                            $resource_image = get_field('microsite_image', $resource->ID);
                        }
                        $resource_title = $resource->post_title;
                        $resource_date = get_the_date('M j, Y', $resource->ID);
                        $resource_desc = get_sub_field('description');
                        $resource_label = get_sub_field('button_label');
                        $resource_author = get_the_author_meta('display_name', $resource->post_author);
                    ?>
                    <a href="<?php echo get_the_permalink($resource->ID); ?>" class="microsite-featured-resource" style="background-image: url('<?php echo $resource_image; ?>');">
                        <div class="featured-resource-content">
                            <div class="featured-resource-title"><?php echo $resource_title; ?></div>
                            <div class="featured-resource-description"><?php echo $resource_desc; ?></div>
                            <div href="<?php echo get_the_permalink($resource->ID); ?>" class="btn-transparent"><?php echo $resource_label; ?></div>
                        </div>
                    </a>
                    <?php endwhile; ?>
                    </section>
                <?php endif; ?>

                    <section class="panel microsite-cta">
                        <div class="l-content panel__body">
                            <h2 class="panel__heading"><?php the_field('cta_title'); ?></h2>
                            <div class="microsite-cta-subtitle"><?php the_field('cta_subtitle'); ?></div>
                            <a href="<?php the_field('cta_link'); ?>" class="button"><?php the_field('cta_label'); ?></a>
                        </div>
                    </section>

                <?php wp_reset_postdata(); ?>
            </article>
        </main>
    </div>
