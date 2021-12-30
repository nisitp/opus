<div class="infographic-background"><img src="<?php the_field('background_image'); ?>"></div>

<div class="infographic-dots">
    <div class="infographic-dot active" data-target="header-infographic"></div>
    <?php $section_id = 1; ?>
    <?php if( have_rows('sections') ): ?>
        <?php while( have_rows('sections') ): the_row(); ?>
            <div class="infographic-dot" data-target="section-<?php echo $section_id; ?>-intro"></div>
            <?php $slide_id = 1; ?>
            <?php if( have_rows('section_slides') ): ?>
                <?php while( have_rows('section_slides') ): the_row(); ?>
                    <div class="infographic-dot" data-target="section-<?php echo $section_id; ?>-slide-<?php echo $slide_id; ?>" data-slide="<?php echo $slide_id; ?>"></div>
                    <?php $slide_id++; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php $section_id++; ?>
        <?php endwhile; ?>
    <?php endif; ?>
    <div class="infographic-dot" data-target="infographic-form"></div>
</div>

<section class="infographic-hero" id="infographic-hero">
    <div class="l-container">
        <div class="l-content">
            <div class="hero-number">
                <div class="hero-number-big slideInLeft" data-wow-offset="100"><?php the_field('hero_number_text'); ?></div>
                <div class="hero-number-text slideInLeft" data-wow-offset="100"><?php the_field('hero_number_subtext'); ?></div>
            </div>
            <div class="hero-title animated slideInRight">
                <?php the_field('hero_title'); ?>
            </div>
            <div class="infographic-arrow"></div>
        </div>
    </div>
    <div class="hero-flyout-toggle"><?php the_field('hero_flyout_toggle_text'); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/infographic/icon-question.svg"></div>
    <div class="hero-flyout">
        <div class="hero-flyout-toggle"><?php the_field('hero_flyout_toggle_text'); ?> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/infographic/icon-close.svg"></div>
        <p><?php the_field('hero_flyout_text') ?></p>
    </div>
</section>

<?php
    $section_id = 1;
    $display_id = 1;
?>
<?php if( have_rows('sections') ): ?>
    <?php while( have_rows('sections') ): the_row(); ?>
        <?php
            $section_title  = get_sub_field('section_title');
            $section_style  = get_sub_field('section_style');
            $section_oval   = get_sub_field('section_oval_position');
            $skip_numbering = get_sub_field('skip_numbering');
        ?>
        <section class="infographic-section infographic-<?php echo $section_style; ?>" id="section-<?php echo $section_id; ?>">
            <div class="infographic-intro parallax" data-position="section-<?php echo $section_id; ?>-intro">
                <div class="l-container">
                    <div class="l-content">
                        <?php if (!$skip_numbering) : ?>
                            <div class="intro-number wow fadeInLeft" data-wow-offset="100"><?php echo $display_id; ?></div>
                        <?php endif; ?>
                        <div class="intro-title title-right wow slideInUp" data-wow-offset="100">
                            <?php echo $section_title; ?>
                        </div>
                        <div class="infographic-arrow"></div>
                    </div>
                </div>
                <div class="infographic-oval oval-<?php echo $section_oval; ?> oval-thin"></div>
            </div>
            <?php $slide_id = 1; ?>
            <?php if( have_rows('section_slides') ): ?>
                <?php while( have_rows('section_slides') ): the_row(); ?>
                    <?php
                        $slide_layout = get_sub_field('slide_layout');
                    ?>
                    <div class="infographic-slide parallax <?php echo (get_sub_field('slide_transparent') ? 'slide-transparent' : ''); ?>" data-position="section-<?php echo $section_id; ?>-slide-<?php echo $slide_id; ?>">
                        <div class="l-container">
                            <div class="l-content">
                                <div class="slide-header">
                                <?php if (!$skip_numbering) : ?>
                                    <div class="slide-header-number wow fadeInDown" data-wow-offset="0">
                                    <?php echo $display_id; ?>
                                    </div>
                                <?php endif; ?>
                                    <div class="slide-header-title wow fadeInDown" data-wow-offset="0"><?php echo $section_title; ?></div>
                                </div>
                                <?php if ($slide_layout == 'text-left') : ?>
                                    <div class="slide-content">
                                        <?php if (get_sub_field('slide_top_text')) : ?>
                                            <h3 class="wow <?php the_sub_field('slide_top_text_animation'); ?>" data-wow-offset="100"><?php the_sub_field('slide_top_text'); ?></h3>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('slide_large_text')) : ?>
                                            <h2 class="<?php echo (get_sub_field('slide_large_text_smaller') ? 'text' : ''); ?> wow <?php the_sub_field('slide_large_text_animation'); ?>" data-wow-offset="100"><?php the_sub_field('slide_large_text'); ?></h2>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('slide_under_text')) : ?>
                                            <h3 class="wow <?php the_sub_field('slide_under_text_animation'); ?>" data-wow-offset="100"><?php the_sub_field('slide_under_text'); ?></h3>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('slide_small_text')) : ?>
                                            <p class="wow <?php the_sub_field('slide_small_text_animation'); ?>" data-wow-offset="100"><?php the_sub_field('slide_small_text'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="slide-graphic graphic-right wow fadeInRight" data-wow-offset="100">
                                        <img src="<?php the_sub_field('slide_graphic'); ?>" style="margin-bottom: <?php the_sub_field('slide_graphic_offset'); ?>px;">
                                    </div>
                                <?php elseif ($slide_layout == 'text-right') : ?>
                                    <div class="slide-content slide-content-right">
                                        <?php if (get_sub_field('slide_top_text')) : ?>
                                            <h3 class="wow <?php the_sub_field('slide_top_text_animation'); ?>" data-wow-offset="100"><?php the_sub_field('slide_top_text'); ?></h3>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('slide_large_text')) : ?>
                                            <h2 class="<?php echo (get_sub_field('slide_large_text_smaller') ? 'text' : ''); ?> wow <?php the_sub_field('slide_large_text_animation'); ?>" data-wow-offset="100"><?php the_sub_field('slide_large_text'); ?></h2>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('slide_under_text')) : ?>
                                            <h3 class="wow <?php the_sub_field('slide_under_text_animation'); ?>" data-wow-offset="100"><?php the_sub_field('slide_under_text'); ?></h3>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('slide_small_text')) : ?>
                                            <p class="wow <?php the_sub_field('slide_small_text_animation'); ?>" data-wow-offset="100"><?php the_sub_field('slide_small_text'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="slide-graphic graphic-left wow fadeInRight" data-wow-offset="100">
                                        <img src="<?php the_sub_field('slide_graphic'); ?>" style="margin-bottom: <?php the_sub_field('slide_graphic_offset'); ?>px;">
                                    </div>
                                <?php elseif ($slide_layout == 'centered') : ?>
                                    <div class="slide-content-centered">
                                        <p class="wow <?php the_sub_field('slide_upper_centered_text_animation'); ?>" data-wow-offset="100"><?php the_sub_field('slide_upper_centered_text'); ?></p>
                                        <h2 class="wow <?php the_sub_field('slide_large_centered_text_animation'); ?>" data-wow-offset="100"><?php the_sub_field('slide_large_centered_text'); ?></h2>
                                        <p class="wow <?php the_sub_field('slide_lower_centered_text_animation'); ?>" data-wow-offset="100"><?php the_sub_field('slide_lower_centered_text'); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($slide_layout == 'text-left') : ?>
                            <div class="slide-graphic-box wow slideInRight" data-wow-offset="100"></div>
                        <?php elseif ($slide_layout == 'text-right') : ?>
                            <div class="slide-graphic-box slide-graphic-box-left wow slideInLeft" data-wow-offset="100"></div>
                        <?php endif; ?>
                    </div>
                    <?php $slide_id++; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>
        <?php
            $section_id++;
            if (!$skip_numbering) {
                $display_id++;
            }
        ?>
    <?php endwhile; ?>
<?php endif; ?>

<section class="infographic-form" id="infographic-form" data-position="infographic-form">
    <div>
        <div class="l-container">
            <div class="l-content">
                <div class="form-container">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/infographic/logo-opus-icon.svg">
                    <h4><?php the_field('form_title'); ?></h4>
                    <p><?php the_field('form_subtitle'); ?></p>
                    <?php
                        if (get_field('form_embed_code')) {
                            the_field('form_embed_code');
                        } else {
                            $form_id = get_field('form_form');
                            echo do_shortcode('[gravityform id="'.$form_id.'" title="false" description="false" ajax="true" tabindex="-1"]');
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="infographic-arrow"></div>
    </div>
</section>

<section class="infographic-resources">
    <div>
        <div class="l-container">
            <div class="l-content">
                <h2>Related Resources</h2>
                <?php if( have_rows('resources') ): ?>
                    <?php while( have_rows('resources') ): the_row(); ?>
                        <?php
                            $resource = get_sub_field('resource');
                            $post = $resource;
                            setup_postdata( $post );
                            $post_type = get_post_type();
                            //echo $post_type;
                            //the_title();
                            get_template_part('partials/card-alt', 'og_resource');
                        ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
