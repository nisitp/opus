<section class="sub2-product<?php print sub2Modifiers('sub2-product'); ?>">
    <div class="sub2-product__inner">
        <img class="sub2-product__icon" src="<?php print get_sub_field('sub2_product_icon'); ?>" alt="<?php print esc_attr(get_sub_field('sub2_product_headline')); ?>">
        <h3 class="sub2-product__heading"><?php print get_sub_field('sub2_product_headline'); ?></h3>
        <div class="sub2-product__content">
            <?php print get_sub_field('sub2_product_content'); ?>
        </div>
    </div>
</section>
