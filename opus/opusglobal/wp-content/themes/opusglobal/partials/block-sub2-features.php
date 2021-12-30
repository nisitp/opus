<section class="sub2-features<?php print sub2Modifiers('sub2-features'); ?>">
    <div class="sub2-features__inner">
        <h3 class="sub2-features__heading"><?php print get_sub_field('sub2_features_headline'); ?></h3>
        <?php foreach(get_sub_field('sub2_features') as $feature): ?>
            <div class="sub2-features__feature">
                <img src="<?php print $feature['image']; ?>" alt="<?php print esc_attr($feature['title']); ?>" class="sub2-features__feature-img">
                <h4 class="sub2-features__feature-title"><?php print $feature['title']; ?></h4>
                <p class="sub2-features__feature-desc"><?php print $feature['content']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
