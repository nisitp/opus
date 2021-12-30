<?php get_header(); ?>
    <div class="main-area resource-area">
        <div class="container">
            <div class="single-resource-title">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="single-resource-meta">
                <h3><?php the_field('sub_title'); ?></h3>
                <ul>
                    <li><?php the_time('F j, Y'); ?></li>
                    <li><?php the_field('author'); ?></li>
                </ul>
            </div>
            <div class="single-resource-left">
                <?php if (get_field('is_gated')) : ?>
                    <div class="resource-header resource-banner">
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
                    <?php the_field('form_area'); ?>
                <?php endif; ?>
                <?php if (!get_field('is_gated')) : ?>
                    <?php the_field('ungated_content'); ?>
                <?php endif; ?>
            </div>
            <div class="single-resource-right">
                <?php
                    if( have_rows('features') ):
                    while ( have_rows('features') ) : the_row();
                ?>
                    <div class="resource-block">
                        <span><?php the_sub_field('title'); ?></span>
                        <?php the_sub_field('content'); ?>
                    </div>
                <?php
                    endwhile;
                    else :
                    endif;
                ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
