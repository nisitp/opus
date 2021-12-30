    <div class="l-container l-main" id="section-top">
        <main>
            <article class="">
                <?php
                    $hero_resource = get_field('hero_resource');
                    $banner_image = get_stylesheet_directory_uri() . '/assets/img/microsite/hero-background.png';
                    if (get_field('microsite_image', $hero_resource->ID)) {
                        $banner_image = get_field('microsite_image', $hero_resource->ID);
                    }
                ?>
                <header class="l-flex-col banner" style="background-image: url('<?php echo $banner_image; ?>');">
                    <?php get_template_part( 'partials/hero', 'microsite' ); ?>
                </header>

                <nav class="nav nav--sections expander--tablet js-section-nav is-hidden will-fix-top">
                    <a href="javascript:void(0)" class="link--null expander-trigger expander-hidden" aria-label="Expand navigation" role="button">
                        <span class="expander__label js-section-nav-label">Overview</span>
                    </a>
                    <div class="l-content nav__wrapper expander-content">
                        <ul class="nav__list">
                            <li class="nav__item"><a href="#section-resources" class="nav__link">Resources</a></li>
                            <li class="nav__item"><a href="#section-news" class="nav__link">News</a></li>
                            <li class="nav__item"><a href="#section-events" class="nav__link">Events</a></li>
                            <li class="nav__item"><a href="#section-experts" class="nav__link">Experts</a></li>
                        </ul>
                        <div class="microsite-title"><a href="#section-top" class="js-top nav__link"><?php the_title(); ?></a></div>
                    </div>
                </nav>

                <?php if( have_rows('featured_resources') ): ?>
                    <section class="microsite-featured-resources">
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

                <section class="l-container microsite-resources" id="section-resources">
                    <div class="l-content">
                        <div class="microsite-resources-primary">
                            <h2 class="microsite-resources-title">Resources</h2>
                            <div class="microsite-resources-filters">
                                <?php $types = get_field('filter_types'); if ($types && (count($types) > 1)): ?>
                                    <select name="filter-type" id="filter-type" class="ms-filter">
                                        <option value="">All types</option>
                                        <?php foreach( $types as $type ): ?>
                                            <option value="<?php echo $type->slug; ?>"><?php echo $type->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
                                <?php $topics = get_field('filter_topics'); if ($topics && (count($topics) > 1)): ?>
                                    <select name="filter-topic" id="filter-topic" class="ms-filter">
                                        <option value="">All topics</option>
                                        <?php foreach( $topics as $topic ): ?>
                                            <option value="<?php echo $topic->slug; ?>"><?php echo $topic->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                            <div class="microsite-resources-container" id="resources-box" data-microsite="<?php the_field('microsite_tag'); ?>">
                                <?php
                                    $microsite_tag = get_field('microsite_tag');
                                    $args = array(
                                        'post_type' => array('post', 'og_resource'),
                                        'post_status' => 'publish',
                                        'posts_per_page' => 6,
                                    );
                                    if ($microsite_tag) {
                                        $args['tax_query'][] = array(
                                            'taxonomy' => 'microsites',
                                            'field' => 'slug',
                                            'terms' => $microsite_tag
                                        );
                                    }
                                    $the_query = new WP_Query( $args );
                                ?>

                                <?php if ( $the_query->have_posts() ) : ?>
                                    <?php while ( $the_query->have_posts() ) : $the_query->the_post() ?>
                                        <?php
                                            $post_type = get_post_type();
                                            get_template_part( 'partials/card', 'microsite_' . $post_type );
                                        ?>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="microsite-resources-loading">
                                <div class="loader">Loading...</div>
                            </div>
                            <div class="microsite-resources-view-more">
                                <a href="#" id="load-more-resources" data-page="2" data-max="<?php echo $the_query->max_num_pages; ?>" data-microsite="<?php the_field('microsite_tag'); ?>" class="button">View More Resources</a>
                            </div>
                        </div>
                        <div class="microsite-resources-sidebar">
                            <div class="microsite-most-popular">
                                <h4 class="microsite-sidebar-title"><?php the_field('most_popular_title'); ?></h4>
                                <?php while( have_rows('most_popular_resources') ): the_row(); ?>
                                    <?php $mp_resource = get_sub_field('resource'); ?>
                                    <div class="microsite-sidebar-resource">
                                        <a href="<?php echo get_the_permalink($mp_resource->ID); ?>">
                                            <div class="microsite-sidebar-resource__image">
                                                <?php
                                                    $image = get_field('og_image', $mp_resource->ID);
                                                    $image = wp_get_attachment_image_src($image, 'card-logo')[0];
                                                ?>
                                                <img src="<?php echo $image; ?>">
                                            </div>
                                            <div class="microsite-sidebar-resource__title"><?php echo get_the_title($mp_resource->ID); ?></div>
                                            <div class="microsite-resources-card__meta">
                                                <?php
                                                    $terms = get_the_terms( $mp_resource->ID , 'type' );
                                                    foreach ( $terms as $term ) {
                                                        echo $term->name;
                                                    }
                                                ?>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            </div>

                            <div class="microsite-news" id="section-news">
                                <h4 class="microsite-sidebar-title"><?php the_field('news_title'); ?></h4>
                                <?php while( have_rows('news') ): the_row(); ?>
                                    <a href="<?php the_sub_field('url'); ?>">
                                        <?php the_sub_field('title'); ?>
                                        <span><?php the_sub_field('date'); ?></span>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </section>

                <?php if( have_rows('events') ): ?>
                    <section class="microsite-events" id="section-events">
                        <div class="microsite-events-slides">
                        <?php while( have_rows('events') ): the_row(); ?>
                            <div class="microsite-events-event" style="background-image: url('<?php the_sub_field('image'); ?>');">
                                <h2 class="panel__heading"><span><?php the_field('events_title'); ?></span></h2>
                                <div class="l-content">
                                    <h1 class="hero__title"><a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('title'); ?></a></h1>
                                    <hr>
                                    <div class="microsite-events-event__meta"><?php the_sub_field('location'); ?> • <?php the_sub_field('date'); ?></div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div>
                    </section>
                <?php endif; ?>

                    <section class="panel microsite-ask-experts bg-primary" id="section-experts">
                        <h2 class="panel__heading"><?php the_field('ask_title'); ?></h2>
                        <div class="l-content">
                            <div class="microsite-ask-experts--videos">
                                <?php $q = 0; while( have_rows('ask_questions') ): the_row(); ?>
                                    <div class="microsite-ask-experts--video <?php echo (($q == 0) ? 'video-active' : ''); ?>" data-question="<?php echo $q; ?>">
                                        <div class="microsite-ask-experts--video__container"><?php the_sub_field('video_embed_code'); ?></div>
                                        <?php if (get_sub_field('description')) : ?>
                                            <div class="microsite-ask-experts--video__description"><?php the_sub_field('description'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                <?php $q++; endwhile; ?>
                            </div>
                            <div class="microsite-ask-experts--right">
                                <div class="microsite-ask-experts-right__subtitle"><?php the_field('ask_subtitle'); ?></div>
                                <div class="microsite-ask-experts-right__title"><?php the_field('ask_right_title'); ?></div>
                                <div class="microsite-ask-experts-right__questions">
                                <?php $q = 0; while( have_rows('ask_questions') ): the_row(); ?>
                                    <div class="microsite-ask-experts-right__question <?php echo (($q == 0) ? 'question-active' : ''); ?>" data-question="<?php echo $q; ?>"><?php the_sub_field('question'); ?></div>
                                <?php $q++; endwhile; ?>
                                </div>
                            </div>
                            <div class="microsite-ask-experts--mobile">
                                <div class="microsite-ask-experts-right__subtitle"><?php the_field('ask_subtitle'); ?></div>
                                <div class="microsite-ask-experts-right__title"><?php the_field('ask_right_title'); ?></div>
                                <div class="microsite-ask-experts-right__questions">
                                <?php $q = 0; while( have_rows('ask_questions') ): the_row(); ?>
                                    <a href="<?php the_sub_field('video_url'); ?>" data-fancybox><div class="microsite-ask-experts-right__question <?php echo (($q == 0) ? 'question-active' : ''); ?>" data-question="<?php echo $q; ?>"><?php the_sub_field('question'); ?></div></a>
                                <?php $q++; endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="panel microsite-meet-experts bg-primary">
                        <h2 class="panel__heading"><?php the_field('meet_title'); ?></h2>
                        <div class="l-content">
                            <?php $e = 0; while( have_rows('meet_experts') ): the_row(); ?>
                                <div class="microsite-meets-experts--expert">
                                <?php if (get_sub_field('bio')) : ?>
                                    <a href="#" class="js-modal-open" data-modal="modal-expert-<?php echo $e; ?>">
                                <?php endif; ?>
                                        <div class="microsite-meets-experts--expert__image"><img src="<?php the_sub_field('image'); ?>"></div>
                                        <div class="microsite-meets-experts--expert__name"><?php the_sub_field('name'); ?></div>
                                        <div class="microsite-meets-experts--expert__title"><?php the_sub_field('title'); ?></div>
                                        <?php if (get_sub_field('twitter')) : ?>
                                            <a href="<?php the_sub_field('twitter'); ?>" class="icon-link icon-footer-icon-social-twitter" aria-label="Twitter"></a>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('linkedin')) : ?>
                                            <a href="<?php the_sub_field('linkedin'); ?>" class="icon-link icon-footer-icon-social-linked-in" aria-label="LinkedIn"></a>
                                        <?php endif; ?>
                                <?php if (get_sub_field('bio')) : ?>
                                    </a>
                                <?php endif; ?>
                                </div>
                            <?php $e++; endwhile; ?>
                        </div>
                    </section>

                    <section class="panel microsite-cta">
                        <div class="l-content panel__body">
                            <h2 class="panel__heading"><?php the_field('cta_title'); ?></h2>
                            <div class="microsite-cta-subtitle"><?php the_field('cta_subtitle'); ?></div>
                            <a href="<?php the_field('cta_link'); ?>" class="button"><?php the_field('cta_label'); ?></a>
                        </div>
                    </section>
                </div>
        </article>
        </main>
    </div>

    <?php $e = 0; while( have_rows('meet_experts') ): the_row(); ?>
        <div class="modal-backdrop" id="modal-expert-<?php echo $e; ?>">
            <div class="modal-container">
                <div class="modal modal--profile" role="dialog">
                    <button class="modal__close js-modal-close button--hide"></button>
                    <div class="profile">
                        <div class="">
                            <h3><?php the_sub_field('name'); ?></h3>
                            <p><?php the_sub_field('title'); ?></p>
                        </div>
                        <div class="profile__aside">
                            <p>
                                <img src="<?php the_sub_field('image'); ?>">
                            </p>
                            <?php if(get_sub_field('twitter') || get_sub_field('linkedin')): ?>
                            <ul class="icon-group">
                                <?php if(get_sub_field('twitter')): ?>
                                <li>
                                    <a href="<?php the_sub_field('twitter'); ?>" class="icon-link icon-footer-icon-social-twitter" aria-label="Twitter"></a>
                                </li>
                                <?php endif; ?>
                                <?php if(get_sub_field('linkedin')): ?>
                                <li>
                                    <a href="<?php the_sub_field('linkedin'); ?>" class="icon-link icon-footer-icon-social-linked-in" aria-label="LinkedIn"></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                        <div class="profile__main">
                            <?php the_sub_field('bio'); ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    <?php $e++; endwhile; ?>
<?php get_footer(); ?>
