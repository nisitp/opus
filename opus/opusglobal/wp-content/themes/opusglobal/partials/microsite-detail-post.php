<h2 class="microsite-subtitle"><?php the_field('sub_title'); ?></h2>
<span class="text-subtle">
    <ul>
        <li><?php the_date(); ?></li>
        <?php if (!get_field('hide_author')): ?>
            <li><?php the_author(); ?></li>
        <?php endif; ?>
    </ul>
</span>
<div class="microsite-detail-container">
    <div class="microsite-detail-share">
        <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59416eb65d6c340012d5df57&product=inline-share-buttons"></script>
        <div class="sharethis-inline-share-buttons"></div>
    </div>
    <div class="microsite-detail-content">
        <?php the_content(); ?>

        <div class="blog-tags">
            <?php
                if(get_the_tag_list()) {
                    echo get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
                }
            ?>
        </div>
    </div>
    <?php if (!get_field('hide_author')): ?>
        <div class="blog-author">
            <?php
                $author_id = get_the_author_meta( 'ID' );
                $author_idString = 'user_'.$author_id;
                $author_twitter = get_field('twitter_handle', $author_idString);
                $author_title = get_field('title', $author_idString);
                $author_firstname = get_the_author_meta( 'first_name' );
                $author_image = get_avatar( $author_id );
            ?>

            <?php if( $author_image ): ?>
                <div class="blog-author-image">
                    <?php echo $author_image; ?>
                </div>
            <?php endif; ?>
            <div class="blog-author-info">
                <div class="blog-author-name">
                    <?php the_author(); ?>
                </div>

                <div class="blog-author-title">
                    <?php echo $author_title; ?>
                </div>

                <?php if( $author_twitter ): ?>
                    <div class="blog-author-twitter">   
                        Follow <?php echo $author_firstname ? $author_firstname : "me"; ?> on Twitter, <a href="https://twitter.com/<?php echo $author_twitter; ?>" target="_blank">@<?php echo $author_twitter; ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
