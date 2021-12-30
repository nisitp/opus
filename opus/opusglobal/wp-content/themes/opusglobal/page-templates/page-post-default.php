    <div class="main-area blog-area">
        <div class="container">
            <div class="l-content">
                <div class="single-blog-title">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="single-blog-meta">
                    <?php if (!get_field('hide_sub_title')): ?>
                        <h3><?php the_field('sub_title'); ?></h3>
                    <?php endif; ?>
                    <ul>
                        <li><?php the_time('F j, Y'); ?></li>
                        <?php if (!get_field('hide_author')): ?>
                            <li><?php the_author(); ?></li>
                        <?php endif; ?>
                        <li><?php the_category( ' | ' ); ?></li>
                    </ul>
                </div>
                <div class="blog-post-inner">
                    <?php the_content(); ?>
                    <div class="blog-tags">
                        <?php
                            if(get_the_tag_list()) {
                                echo get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
                            }
                        ?>
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
                    <div class="blog-comments">

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php if( get_field('related_posts') ): ?>
        <section class="section--posts bg-pattern">
            <header class="post-header">
                <div class="l-content">
                    <h2>Related Posts</h2>
                </div>
            </header>
            <div class="l-content">
                <div class="post-blocks-width"></div>
                <div class="post-blocks">
                    <div class="post-block-inner">
                        <?php
                            $related = get_field('related_posts');

                            if( $related ):
                                foreach( $related as $post ):
                                    setup_postdata( $post );
                                    get_template_part( 'partials/block', 'post' );
                                endforeach;
                            endif;
                        ?>
                    </div>
                </div>
            </div>
            <!-- <div class="post-view-all"><a href="#" class="post-view-all">View All</a></div> -->
        </section>
    <?php endif; ?>
