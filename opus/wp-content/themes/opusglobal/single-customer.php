<?php get_header(); ?>
    <div class="main-area customer-area">
        <div class="container">
            <div class="single-customer-title">
                <h1><?php the_field('title'); ?></h1>
            </div>
            <div class="single-customer-meta">
                <h3><?php the_field('sub_title'); ?></h3>
                <?php
                // vars 
                $field = get_field_object('category');
                $categories = $field['value'];


                // check
                if( $categories ): ?>
                <ul>
                    <li>Customers</li>
                    <?php foreach( $categories as $category ): ?>
                        <li><?php echo $field['choices'][ $category ]; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <div class="single-customer-left">
                <?php

                // vars 
                $bannerType = get_field('category');


                // check
                if( $bannerType && in_array('video', $bannerType) ) { ?>
                    <div class="videoWrapper">
                        <?php the_field('video'); ?>
                    </div>
                <?php } elseif( $bannerType && in_array('case-study', $bannerType) ) { ?>
                    <div class="customer-header">
                        <div class="customer-header-icon">
                            <i class="icon-icon-opus-gray"></i>
                        </div>

                        <div class="customer-header-inner">
                            <div class="header-inner-text">
                                <span>Get The Complete</span>
                                <?php

                                // vars 
                                $field = get_field_object('category');
                                $categories = $field['value'];


                                // check
                                if( $categories ): ?>
                                <ul>
                                    <li>Case Study</li>
                                </ul>
                                <?php endif; ?>
                            </div>
                            <img class="customer-logo-icon" src="<?php bloginfo('template_directory');?>/assets/img/defaults/icon-bullet-default.svg">
                        </div>
                    </div>
                <?php } else { ?>
                <?php } ?>
                <?php the_field('content'); ?>
            </div>
            <div class="single-customer-right">
                <?php
                    if( have_rows('features') ):
                    while ( have_rows('features') ) : the_row();
                ?>
                    <div class="customer-block">
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
