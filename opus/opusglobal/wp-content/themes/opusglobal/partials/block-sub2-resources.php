<section class="sub2-resources<?php print sub2Modifiers('sub2-resources'); ?>">
    <h3 class="sub2-resources__heading"><?php print get_sub_field('sub2_resources_headline'); ?></h3>
    <div class="sub2-resources__wrapper">
        <?php foreach (get_sub_field('sub2_resources') as $resource): ?>
            <?php
                if($resource['resource']) {
                    if(!$resource['image']) {
                        $resource['image'] = get_sub_field('og_image', $resource['resource']->ID);
                        if (!$resource['image']) {
                          // try to get the featured image instead
                          $resource['image'] = get_post_thumbnail_id($resource['resource']->ID);
                        }
                        if($resource['image']) $resource['image'] = wp_get_attachment_url($resource['image']);
                    }
                    if(!$resource['category']) {
                        $resource['category'] = wp_get_post_terms($resource['resource']->ID, 'topic');
                        if($resource['category']) $resource['category'] = $resource['category'][0]->name;
                    }
                    if(!$resource['title']) {
                        $resource['title'] = $resource['resource']->post_title;
                    }
                    if(!$resource['excerpt']) {
                        if(!$resource['excerpt']) $resource['excerpt'] = strip_tags(get_sub_field('excerpt', $resource['resource']->ID));
                        if(!$resource['excerpt']) $resource['excerpt'] = strip_tags(get_the_excerpt($resource['resource']));
                    }

                    if(!$resource['author']) {
                        $author = get_user_by('id', $resource['resource']->post_author);
                        $title = get_sub_field('title', 'user_'.$resource['resource']->post_author);
                        $resource['author'] = $author->display_name.($title ? ', '.$title : '');
                    }
                    if(!$resource['link']) {
                        $resource['link'] = get_permalink($resource['resource']);
                    }
                }
            ?>
            <a href="<?php print esc_attr($resource['link']); ?>" class="sub2-resources__resource">
                <div class="sub2-resources__img sub2-resources__img--img1" style="background-image: url('<?php print esc_attr($resource['image']); ?>');"></div>
                <p class="sub2-resources__category"><i class="fa <?php print esc_attr($resource['category_icon']); ?>" aria-hidden="true"></i> <?php print ($resource['category']); ?></p>
                <h4 class="sub2-resources__title"><?php print ($resource['title']); ?></h4>
                <p class="sub2-resources__excerpt"><?php print ($resource['excerpt']); ?></p>
                <?php /* hide for now
                <p class="home2-resources__author"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php print ($resource['author']); ?></p>
                */ ?>
            </a>
        <?php endforeach; ?>
    </div>
</section>
