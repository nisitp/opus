<h2 class="microsite-subtitle"><?php the_field('sub_title'); ?></h2>
<span class="text-subtle">
    <ul>
        <li><?php the_field('date'); ?></li>
        <li><?php the_field('author'); ?></li>
    </ul>
</span>
<div class="microsite-detail-container">
    <div class="microsite-detail-share">
        <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59416eb65d6c340012d5df57&product=inline-share-buttons"></script>
        <div class="sharethis-inline-share-buttons"></div>
    </div>
    <div class="microsite-detail-content">
        <?php if (!get_field('is_gated')) : ?>
            <?php the_field('ungated_content'); ?>
        <?php endif; ?>
        <?php the_content(); ?>
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
