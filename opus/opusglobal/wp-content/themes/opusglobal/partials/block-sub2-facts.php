<section class="sub2-facts<?php print sub2Modifiers('sub2-facts'); ?>">
    <div class="sub2-facts__inner">
        <?php foreach(get_sub_field('sub2_facts') as $fact): ?>
            <div class="sub2-facts__fact" style="background-image: url('<?php print esc_attr($fact['icon']); ?>')">
                <?php print $fact['description']; ?>
            </div>
        <?php endforeach; ?>

        <?php if(get_sub_field('sub2_fact_sheet_download') && get_sub_field('sub2_fact_sheet_title')): ?>
            <div class="sub2-facts__download">
                <a href="<?php print esc_attr(get_sub_field('sub2_fact_sheet_download')['url']); ?>"><i class="fa fa-download"></i> <?php print get_sub_field('sub2_fact_sheet_title'); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>
