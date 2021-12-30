<?php

if( function_exists('acf_add_options_page') ) {

    $option_page = acf_add_options_page(array(
        'page_title'    => 'Post Settings',
        'menu_title'    => 'Post Settings',
        'menu_slug'     => 'post-settings',
        'capability'    => 'edit_posts',
        'redirect'  => false
    ));

 	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
