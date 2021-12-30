<?php
/* Template Name: Partners Page */
?>

<?php get_header(); ?>
    <div class="l-container l-main">
        <main>
        <article>
            <header class="l-flex-col banner banner--feature">
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
            </header>
        <?php
            if( have_rows('partner_categories') ):
        ?>
            <nav class="nav nav--sections expander--tablet js-section-nav is-hidden will-fix-top">
                <a href="javascript:void(0)" class="link--null expander-trigger expander-hidden" aria-label="Expand navigation" role="button">
                    <span class="expander__label js-section-nav-label">
                        <?php
                            $categories = get_field('partner_categories');
                            echo $categories[0]['button_label'];
                        ?>
                    </span>
                </a>
                <div class="l-content nav__wrapper expander-content">
                    <ul class="nav__list">
                        <?php
                            while ( have_rows('partner_categories') ) : the_row();
                                $buttonLabel = get_sub_field('button_label');
                                $slugName = "p-" . sanitize_title( $buttonLabel );
                        ?>
                            <li class="nav__item">
                                <a href="#<?php echo $slugName; ?>" class="nav__link">
                                    <?php the_sub_field('button_label'); ?>
                                </a>
                            </li>
                        <?php
                            endwhile;
                        ?>

                        <li class="nav__item">
                            <a href="#become-a-partner" class="nav__link">
                                Become a Partner
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="js-section-nav-spacer"></div>

            <div class="all-partners">
                <?php
                    $categoryIdx = 0;
                    while ( have_rows('partner_categories') ) : the_row();
                        $buttonLabel = get_sub_field('button_label');
                        $slugName = "p-" . sanitize_title( $buttonLabel );
                ?>
                <div class="partner-section <?php echo ( $categoryIdx % 2 ) ? "alt" : ""; ?>">
                    <a class="inpage-anchor" name="<?php echo $slugName; ?>"></a>
                    <div class="l-content">
                        <h3><?php the_sub_field('title'); ?></h3>
                        <div class="partner-intro">
                            <?php the_sub_field('intro'); ?>
                        </div>
                        <div class="all-partners-logos">
                            <?php
                                if( have_rows('partners') ):
                                    while ( have_rows('partners') ) : the_row();
                            ?>
                            <div class="partner-logos">
                                <div class="partner-logo">
                                    <?php if (get_sub_field('url')) : ?>
                                        <a href="<?php the_sub_field('url'); ?>" target="_blank">
                                    <?php endif; ?>
                                    <div class="inner-partner-logo">
                                        <img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('name'); ?>">
                                        <div class="tooltip">
                                            <?php the_sub_field('description'); ?>
                                        </div>
                                    </div>
                                    <?php if (get_sub_field('url')) : ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                                    endwhile;
                                endif; // If we have partner rows
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                        $categoryIdx++;
                    endwhile;
                ?>
            </div>
            <?php
                endif; // If we have partner rows
            ?>
        </article>
        </main>
    </div>
    <div class="partner-final-cta">
        <a class="inpage-anchor" name="become-a-partner"></a>
        <div class="panel panel--sidebar l-content">
            <div class="l-col l-col-primary-alt panel__body">
                <h2><?php the_field('cta_title'); ?></h2>
                <?php the_field('cta_intro'); ?>
            </div>
            <div class="l-col l-col-secondary-alt panel__body">
                <?php the_field('cta_form'); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
