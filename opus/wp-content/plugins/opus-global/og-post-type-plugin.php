<?php
  /*
  Plugin Name: Opus Global Post Types
  Description: Custom post types for opusglobal.com
  */
  /* Start plugin code */

  function custom_post_types() {
    // Set UI labels for Custom Post Type
    $job_labels = array(
      'name' => _x( 'Careers', 'Post Type General Name' ),
      'singular_name' => _x( 'Career', 'Post Type Singular Name' ),
      'menu_name' => __( 'Careers' ),
      'parent_item_colon' => __( 'Parent Career' ),
      'all_items' => __( 'All Careers' ),
      'view_item' => __( 'View Career' ),
      'add_new_item' => __( 'Add New Career' ),
      'add_new' => __( 'Add New' ),
      'edit_item' => __( 'Edit Career' ),
      'update_item' => __( 'Update Career' ),
      'search_items' => __( 'Search Career' ),
      'not_found' => __( 'Not Found' ),
      'not_found_in_trash' => __( 'Not found in Trash' ),
    );

    // Set other options for Custom Post Type
    $job_args = array(
      'label' => __( 'og_careers' ),
      'description' => __( 'Careers with Opus Global' ),
      'labels' => $job_labels,
      // Features this CPT supports in Post Editor
      'supports' => array(
        'title',
        'author',
        'revisions',
        'page-attributes'
      ),
      /* A hierarchical CPT is like Pages and can have
      * Parent and child items. A non-hierarchical CPT
      * is like Posts.
      */
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-clipboard',
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type( 'careers', $job_args );

    // Set UI labels for Custom Post Type
    $charity_labels = array(
      'name' => _x( 'Charities', 'Post Type General Name' ),
      'singular_name' => _x( 'Charity', 'Post Type Singular Name' ),
      'menu_name' => __( 'Charities' ),
      'parent_item_colon' => __( 'Parent Charity' ),
      'all_items' => __( 'All Charities' ),
      'view_item' => __( 'View Charity' ),
      'add_new_item' => __( 'Add New Charity' ),
      'add_new' => __( 'Add New' ),
      'edit_item' => __( 'Edit Charity' ),
      'update_item' => __( 'Update Charity' ),
      'search_items' => __( 'Search Charity' ),
      'not_found' => __( 'Not Found' ),
      'not_found_in_trash' => __( 'Not found in Trash' ),
    );

    // Set other options for Custom Post Type
    $charity_args = array(
      'label' => __( 'og_charities' ),
      'description' => __( 'Opus Global Charities' ),
      'labels' => $charity_labels,
      // Features this CPT supports in Post Editor
      'supports' => array(
        'title',
        'author',
        'revisions',
        'page-attributes'
      ),
      /* A hierarchical CPT is like Pages and can have
      * Parent and child items. A non-hierarchical CPT
      * is like Posts.
      */
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-groups',
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'page',
    );

    // Registering your Custom Post Type
    register_post_type( 'charities', $charity_args );

    // Set UI labels for Custom Post Type
    $person_labels = array(
      'name' => _x( 'People', 'Post Type General Name' ),
      'singular_name' => _x( 'Person', 'Post Type Singular Name' ),
      'menu_name' => __( 'People' ),
      'parent_item_colon' => __( 'Parent Person' ),
      'all_items' => __( 'All People' ),
      'view_item' => __( 'View Person' ),
      'add_new_item' => __( 'Add New Person' ),
      'add_new' => __( 'Add New' ),
      'edit_item' => __( 'Edit Person' ),
      'update_item' => __( 'Update Person' ),
      'search_items' => __( 'Search Person' ),
      'not_found' => __( 'Not Found' ),
      'not_found_in_trash' => __( 'Not found in Trash' ),
    );

    // Set other options for Custom Post Type
    $person_args = array(
      'label' => __( 'og_people' ),
      'description' => __( 'People' ),
      'labels' => $person_labels,
      // Features this CPT supports in Post Editor
      'supports' => array(
        'title',
        'editor',
        'author',
        'revisions',
        'page-attributes'
      ),
      /* A hierarchical CPT is like Pages and can have
      * Parent and child items. A non-hierarchical CPT
      * is like Posts.
      */
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-businessman',
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'post',
    );

    // Registering your Custom Post Type
    register_post_type( 'people', $person_args );

    // Set UI labels for Custom Post Type
    $customer_labels = array(
      'name' => _x( 'Customer', 'Post Type General Name' ),
      'singular_name' => _x( 'Customers', 'Post Type Singular Name' ),
      'menu_name' => __( 'Customers' ),
      'parent_item_colon' => __( 'Parent Customer' ),
      'all_items' => __( 'All Customers' ),
      'view_item' => __( 'View Customer' ),
      'add_new_item' => __( 'Add New Customer' ),
      'add_new' => __( 'Add New' ),
      'edit_item' => __( 'Edit Customer' ),
      'update_item' => __( 'Update Customer`' ),
      'search_items' => __( 'Search Customer' ),
      'not_found' => __( 'Not Found' ),
      'not_found_in_trash' => __( 'Not found in Trash' ),
    );

    // Set other options for Custom Post Type
    $customer_args = array(
      'label' => __( 'og_customer' ),
      'description' => __( 'Customer' ),
      'labels' => $customer_labels,
      // Features this CPT supports in Post Editor
      'supports' => array(
        'title',
        'editor',
        'author',
        'revisions',
        'page-attributes'
      ),
      /* A hierarchical CPT is like Pages and can have
      * Parent and child items. A non-hierarchical CPT
      * is like Posts.
      */
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-businessman',
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'post',
    );

    // Registering your Custom Post Type
    register_post_type( 'customer', $customer_args );

    // Set UI labels for Custom Post Type
    $og_hit_labels = array(
      'name' => _x( 'Press Hits', 'Post Type General Name' ),
      'singular_name' => _x( 'Press Hit', 'Post Type Singular Name' ),
      'menu_name' => __( 'Press Hits' ),
      'parent_item_colon' => __( 'Parent Press Hit' ),
      'all_items' => __( 'All Press Hits' ),
      'view_item' => __( 'View Press Hit' ),
      'add_new_item' => __( 'Add New Press Hit' ),
      'add_new' => __( 'Add New' ),
      'edit_item' => __( 'Edit Press Hit' ),
      'update_item' => __( 'Update Press Hit' ),
      'search_items' => __( 'Search Press Hit' ),
      'not_found' => __( 'Not Found' ),
      'not_found_in_trash' => __( 'Not found in Trash' ),
    );

    // Set other options for Custom Post Type
    $og_hit_args = array(
      'label' => __( 'og_hit' ),
      'description' => __( 'Press Hits' ),
      'labels' => $og_hit_labels,
      // Features this CPT supports in Post Editor
      'supports' => array(
        'title',
        'author',
        'revisions',
      ),
      /* A hierarchical CPT is like Pages and can have
      * Parent and child items. A non-hierarchical CPT
      * is like Posts.
      */
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => 'press_menu',
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 6,
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'post',
      'rewrite' => array(
        'slug' => 'about/press_coverage',
        'with_front' => false,
      ),
    );

    // Registering your Custom Post Type
    register_post_type( 'og_hit', $og_hit_args );

    // Set UI labels for Custom Post Type
    $og_news_labels = array(
      'name' => _x( 'Press Releases', 'Post Type General Name' ),
      'singular_name' => _x( 'Press Release', 'Post Type Singular Name' ),
      'menu_name' => __( 'Press Releases' ),
      'parent_item_colon' => __( 'Parent Press Release' ),
      'all_items' => __( 'All Press Releases' ),
      'view_item' => __( 'View Press Release' ),
      'add_new_item' => __( 'Add New Press Release' ),
      'add_new' => __( 'Add New' ),
      'edit_item' => __( 'Edit Press Release' ),
      'update_item' => __( 'Update Press Release' ),
      'search_items' => __( 'Search Press Releases' ),
      'not_found' => __( 'Not Found' ),
      'not_found_in_trash' => __( 'Not found in Trash' ),
    );

    // Set other options for Custom Post Type
    $og_news_args = array(
      'label' => __( 'og_news' ),
      'description' => __( 'Press Releases' ),
      'labels' => $og_news_labels,
      // Features this CPT supports in Post Editor
      'supports' => array(
        'title',
        'author',
        'revisions',
        'editor',
      ),
      /* A hierarchical CPT is like Pages and can have
      * Parent and child items. A non-hierarchical CPT
      * is like Posts.
      */
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => 'press_menu',
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 7,
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'post',
      'rewrite' => array(
        'slug' => 'about/press_releases',
        'with_front' => false,
      ),
    );

    // Registering your Custom Post Type
    register_post_type( 'og_news', $og_news_args );

    // Set UI labels for Custom Post Type
    $og_event_labels = array(
      'name' => _x( 'Events', 'Post Type General Name' ),
      'singular_name' => _x( 'Event', 'Post Type Singular Name' ),
      'menu_name' => __( 'Events' ),
      'parent_item_colon' => __( 'Parent Event' ),
      'all_items' => __( 'All Events' ),
      'view_item' => __( 'View Event' ),
      'add_new_item' => __( 'Add New Event' ),
      'add_new' => __( 'Add New' ),
      'edit_item' => __( 'Edit Event' ),
      'update_item' => __( 'Update Event' ),
      'search_items' => __( 'Search Event' ),
      'not_found' => __( 'Not Found' ),
      'not_found_in_trash' => __( 'Not found in Trash' ),
    );

    // Set other options for Custom Post Type
    $og_event_args = array(
      'label' => __( 'og_event' ),
      'description' => __( 'Events' ),
      'labels' => $og_event_labels,
      // Features this CPT supports in Post Editor
      'supports' => array(
        'title',
        'author',
        'revisions',
        'editor',
      ),
      /* A hierarchical CPT is like Pages and can have
      * Parent and child items. A non-hierarchical CPT
      * is like Posts.
      */
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => 'press_menu',
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 8,
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'post',
      'rewrite' => array(
        'slug' => 'about/events',
        'with_front' => false,
      ),
    );

    // Registering your Custom Post Type
    register_post_type( 'og_event', $og_event_args );

    // Set UI labels for Custom Post Type
    $og_resource_labels = array(
      'name' => _x( 'Resources', 'Post Type General Name' ),
      'singular_name' => _x( 'Resource', 'Post Type Singular Name' ),
      'menu_name' => __( 'Resources' ),
      'parent_item_colon' => __( 'Parent Resource' ),
      'all_items' => __( 'All Resources' ),
      'view_item' => __( 'View Resource' ),
      'add_new_item' => __( 'Add New Resource' ),
      'add_new' => __( 'Add New' ),
      'edit_item' => __( 'Edit Resource' ),
      'update_item' => __( 'Update Resource' ),
      'search_items' => __( 'Search Resource' ),
      'not_found' => __( 'Not Found' ),
      'not_found_in_trash' => __( 'Not found in Trash' ),
    );

    // Set other options for Custom Post Type
    $og_resource_args = array(
      'label' => __( 'og_resource' ),
      'description' => __( 'Resources' ),
      'labels' => $og_resource_labels,
      // Features this CPT supports in Post Editor
      'supports' => array(
        'title',
        'author',
        'revisions',
        'editor',
      ),
      /* A hierarchical CPT is like Pages and can have
      * Parent and child items. A non-hierarchical CPT
      * is like Posts.
      */
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 8,
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'taxonomies' => array('post_tag'),
      'capability_type' => 'post',
      'rewrite' => array(
        'slug' => 'resource',
        'with_front' => false,
      ),
    );

    // Registering your Custom Post Type
    register_post_type( 'og_resource', $og_resource_args );

    add_action( 'init', 'create_book_tax' );

    function create_book_tax() {
      register_taxonomy(
        'type',
        array('post', 'og_resource'),
        array(
          'label' => __( 'Type' ),
          'rewrite' => array( 'slug' => 'resources/type' ),
          'hierarchical' => true,
        )
      );

      register_taxonomy(
        'topic',
        array('post', 'og_resource'),
        array(
          'label' => __( 'Topic' ),
          //'rewrite' => array( 'slug' => 'resources/type' ),
          'hierarchical' => true,
        )
      );

      register_taxonomy(
        'microsites',
        array('post', 'og_resource'),
        array(
          'label' => __( 'Microsites' ),
          //'rewrite' => array( 'slug' => 'resources/type' ),
          'hierarchical' => true,
        )
      );
    }

  }

  /* Hook into the 'init' action so that the function
  * Containing our post type registration is not
  * unnecessarily executed.
  */

  add_action( 'init', 'custom_post_types', 0 );

  /* Stop plugin code */

  add_action( 'admin_menu', 'add_press_section' );
  function add_press_section() {
    add_menu_page(
      'Press',
      'Press',
      'edit_others_posts',
      'press_menu',
      function() {
        echo 'press page';
      },
      'dashicons-media-text',
      6
    );
  }



  // Redirect hits to Press Page URLs
  function opus_redirect_presshit() {
    if ( is_singular() && get_post_type() == "og_hit" ) {

      // Get target URL
      $external_url = get_field("og_link");

      if( $external_url ){
        wp_redirect( $external_url );
      } else {
        wp_redirect( home_url( '/about/press_coverage/' ) );
      }

      exit();
    }
  }
  add_action( 'template_redirect', 'opus_redirect_presshit' );

