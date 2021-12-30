<?php get_header(); ?>
    <?php
        // ID of the page that serves as the Posts page
        global $blog_page_id;
        $blog_page_id = get_option( 'page_for_posts' );

        // Get the content type for the listing
        $post_type = 'post';
        $first_post_id = null;
    ?>
    <div class="l-main">
        <main class="content">
            <header class="l-flex-col banner">
                <?php get_template_part( 'partials/breadcrumbs' ); ?>
                <?php get_template_part( 'partials/hero', 'global-blog' ); ?>
                <?php get_template_part( 'partials/hero', 'image-blog' ); ?>
            </header>
            <div class="l-content">
                <div class="category-choose">
                    <?php
                      $categories = get_categories('taxonomy=category');
                      
                      $select = "<select name='cat' id='cat' class='postform'>n";
                      $select.= "<option value='-1'>Select Category</option>n";
                      $select.= "<option value='/blog/'>All Categories</option>n";
                      
                      foreach($categories as $category){
                        if($category->count > 0){
                            $select.= "<option value='/category/".$category->slug."'>".$category->name."</option>";
                        }
                      }
                      
                      $select.= "</select>";
                      
                      echo $select;
                    ?>
                      
                    <script type="text/javascript"><!--
                        var dropdown = document.getElementById("cat");
                        function onCatChange() {
                            if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
                                location.href = "<?php echo home_url();?>"+dropdown.options[dropdown.selectedIndex].value+"/";
                            }
                        }
                        dropdown.onchange = onCatChange;
                    --></script>
                </div>


                <div class="all-blog-posts">

                    <div class="subscribe-area">
                        <button data-modal="opus-modal-subscribe" class="button btn-outline js-account-modal">Subscribe to our blog</button>
                    </div>

                    <?php if ( have_posts() ) : ?>
                        <div class="js-ajax-pager">
                            <ul class="listing--blocks listing--blocks--press l-gutter-2x">
                                <?php while ( have_posts() ) : the_post();  ?>
                                    <li class="listing__item">
                                        <?php get_template_part( 'partials/card', $post_type ); ?>
                                    </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </ul>

                            <p class="pagination">
                                <?php posts_nav_link(); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

<div class="modal-backdrop">
  <div class="modal-container modal-container--compressed">
    <div class="modal modal--account" id="opus-modal-subscribe" role="dialog">
      <div class="opus-modal-close js-account-modal-close"></div>
        <h3 class="text-center">Don't Miss a Post</h3>
        <?php the_field( "subscription_form", $blog_page_id ); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
