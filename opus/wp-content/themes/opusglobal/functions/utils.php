<?php
/**
 * Utility functions
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

/**
 * Add page slug to body_class() classes if it doesn't exist
 */
function theme_body_class($classes) {
  // Add post/page slug
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }
  return $classes;
}
add_filter('body_class', 'theme_body_class');

/**
 * Allow uploading SVGs
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Send vars for AJAX infinite scroll
 */
function og_wp_infinitepaginate(){

	global $wp_query;
	$paged           = esc_html($_POST['paged']);
	$post_type		= esc_html($_POST['post_type']);
	$exclude_post_id = esc_html($_POST['exclude_id']);
  $tax_type_id = esc_html($_POST['tax_type_id']);

  $args = array(
      'paged' => $paged,
      'post_status'=>'publish',
      'post_type' => $post_type,
      'posts_per_page' => 12,
      //'meta_key' => 'date',
      'order' => 'DESC',
      //'orderby' => 'meta_value_num'
  );

  if ($post_type == 'og_resource') {
    $args['meta_key'] = 'date';
    $args['orderby'] = 'meta_value_num';
    $args['order'] = 'DESC';
  }

  if ($post_type == 'post') {
    $args['orderby'] = 'date';
    $args['order'] = 'DESC';
  }

  if ($tax_type_id) {
      $args['tax_query'][] = array(
          'taxonomy' => 'type',
          'field' => 'term_id',
          'terms' => $tax_type_id
      );
  }

  if($post_type == 'og_event') {
    $args['meta_key'] = 'og_date';
    $args['orderby'] = 'meta_value_num';
    $args['order'] = 'ASC';
  }

  if($post_type == 'og_hit' || $post_type == 'og_news') {
    $args['meta_key'] = 'og_date';
    $args['orderby'] = 'meta_value_num';
    $args['order'] = 'DESC';
  }

  header("Content-Type: text/html");
  $loop = new WP_Query($args);
  //echo $loop->query_vars;
  //echo json_encode($loop->query_vars);
  //exit;
  ?>
  <ul class="listing--blocks listing--blocks--tight l-gutter-2x">
  <?php
  while ($loop->have_posts()) { $loop->the_post();
    if (get_the_ID() == $exclude_post_id) { continue; }
    $post_type = get_post_type();
    if ($post_type == 'og_event' || $post_type == 'og_hit' || $post_type == 'og_news') {
      $card = 'card';
    } else {
      $card = 'card-alt';
    }
    ?>
        <li class="listing__item"><?php get_template_part( 'partials/'.$card, $post_type ); ?></li>
    <?php
  }
  ?>
  </ul>
  <?php

  if( $loop->max_num_pages > $paged) {
    ?>
        <div class="microsite-resources-view-more">
          <a href="#" data-page="<?php echo $paged + 1; ?>" data-taxtypeid="<?php echo $tax_type_id; ?>" data-exclude_id="<?php echo $exclude_post_id; ?>" data-post_type="<?php echo $post_type; ?>" class="nav-next">View More +</a>
        </div>
    <?php
  }
  exit;
}

//Send vars for AJAX infinite scroll
add_action('wp_ajax_infinite_scroll', 'og_wp_infinitepaginate', 2);
add_action('wp_ajax_nopriv_infinite_scroll', 'og_wp_infinitepaginate', 2);

add_filter("gform_confirmation_anchor", create_function("","return true;"));


function limit_excerpt($count = 155){
  $excerpt = get_field('excerpt');
  if (!$excerpt) {
    $excerpt = get_the_excerpt();
  }
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.' ...';
  return $excerpt;
}

/**
 * Send vars for AJAX infinite scroll
 */
function og_wp_microsite_load_more(){

    global $wp_query;
    $paged = esc_html($_POST['paged']);
    $microsite = esc_html($_POST['microsite']);
    $type = esc_html($_POST['type']);
    $topic = esc_html($_POST['topic']);

    $args = array(
        'paged' => $paged,
        'post_type' => array('post', 'og_resource'),
        'post_status' => 'publish',
        'posts_per_page' => 6
    );

    if ($microsite) {
        $args['tax_query'][] = array(
            'taxonomy' => 'microsites',
            'field' => 'slug',
            'terms' => $microsite
        );
    }
    if ($type) {
        $args['tax_query'][] = array(
            'taxonomy' => 'type',
            'field' => 'slug',
            'terms' => $type
        );
    }
    if ($topic) {
        $args['tax_query'][] = array(
            'taxonomy' => 'topic',
            'field' => 'slug',
            'terms' => $topic
        );
    }

    //query_posts($args);

    header("Content-Type: text/html");
    $loop = new WP_Query($args);
    while ($loop->have_posts()) { $loop->the_post();
      $post_type = get_post_type();
    ?>
        <?php get_template_part( 'partials/card', 'microsite_' . $post_type ); ?>
    <?php
    }
    if( $loop->max_num_pages > $paged) {
      ?>
          <div class="microsite-resources-view-more">
              <a href="#" id="load-more-resources" data-page="<?php echo $paged; ?>" data-max="<?php echo $loop->max_num_pages; ?>" data-microsite="<?php echo $microsite; ?>" class="button">View More Resources</a>
          </div>
      <?php
    }
    exit;
}

//Send vars for AJAX infinite scroll
add_action('wp_ajax_microsite_load_more', 'og_wp_microsite_load_more', 2);
add_action('wp_ajax_nopriv_microsite_load_more', 'og_wp_microsite_load_more', 2);
