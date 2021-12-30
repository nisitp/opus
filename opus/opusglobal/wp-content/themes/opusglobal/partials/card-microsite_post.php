<div class="microsite-resources-card">
    <a href="<?php the_permalink(); ?>">
        <div class="microsite-resources-card__image">
            <?php
                $default = get_stylesheet_directory_uri() . '/assets/img/defaults/resource-default-bg.png';
                $image = get_field('og_image');
                $image = wp_get_attachment_image_src($image, 'card-logo')[0];
                if (!$image) {
                    $image = get_the_post_thumbnail_url();
                }
                if (!$image) {
                    $image = $default;
                }
            ?>
            <img src="<?php echo $image; ?>">
        </div>
        <div class="microsite-resources-card__title"><?php the_title(); ?></div>
        <div class="microsite-resources-card__description"><?php echo limit_excerpt(); ?></div>
        <div class="microsite-resources-card__meta">
            <?php the_date(); ?>
            <?php if (!get_field('hide_author')): ?>
            •
            <?php echo get_the_author_meta('display_name'); ?>
            <?php endif; ?>
        </div>
    </a>
</div>
