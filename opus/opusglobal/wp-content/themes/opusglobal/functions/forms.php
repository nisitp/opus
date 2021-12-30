<?php

add_filter( 'gform_confirmation_2', 'gform_pardot_postpixel', 10, 4 );
function gform_pardot_postpixel( $confirmation, $form, $entry, $ajax ) {
    // Get the originating post
    global $post;
	// Get ACF fields from page
	$form_handler = 'https://go.pardot.com/l/12092/2017-01-30/3jb47l';
	if( $form_handler ){
	    $new_confirmation = "";
	    // Make sure its not an array. Used when its set to redirect
	    if( is_string( $confirmation ) ){
	    	$new_confirmation .= $confirmation;
	    }

		$pardot_payload = array(
			'first_name' => rgar( $entry, '10' ),
			'last_name' => rgar( $entry, '11' ),
			'job_title' => rgar( $entry, '2' ),
			'company_name' => rgar( $entry, '3' ),
			'email' => rgar( $entry, '4' ),
			'phone' => rgar( $entry, '5' ),
			'country' => rgar( $entry, '6' ),
			'inquiry_type' => rgar( $entry, '7' ),
			'how_you_heard' => rgar( $entry, '8' ),
			'comment' => rgar( $entry, '9' ),
		);

		$pardot_payload["is_post_pixel"] = "true";

	    // Append Pardot iFrame
		$new_confirmation .= '<iframe src="'.$form_handler.'?'.http_build_query( $pardot_payload ).'" width="1" height="1"></iframe>';

	    return $new_confirmation;
	}
	return $confirmation;
}

add_action( 'init', 'gform_pardot_postpixel_check' );
function gform_pardot_postpixel_check() {
	if( isset( $_POST['is_post_pixel'] ) ) {
		exit();
	}
}

//add_action( 'gform_after_submission_2', 'post_contact_to_pardot', 10, 2 );
function post_contact_to_pardot( $entry, $form ) {
	$post_url = 'https://go.pardot.com/l/12092/2017-01-30/3jb47l';

	$inquiry_type = rgar( $entry, '7' );

	$body = array(
			'first_name' => rgar( $entry, '10' ),
			'last_name' => rgar( $entry, '11' ),
			'job_title' => rgar( $entry, '2' ),
			'company_name' => rgar( $entry, '3' ),
			'email' => rgar( $entry, '4' ),
			'phone' => rgar( $entry, '5' ),
			'country' => rgar( $entry, '6' ),
			'inquiry_type' => rgar( $entry, '7' ),
			'how_you_heard' => rgar( $entry, '8' ),
			'comment' => rgar( $entry, '9' ),
		);

	// If a support request, do not submit to Pardot.
	if(
		$inquiry_type !== 'Hiperos Support' &&
		$inquiry_type !== 'Alacra Support'
	) {
		$request = new WP_Http();
		$response = $request->post( $post_url, array( 'body' => $body ) );
	}
}

//add_action( 'gform_after_submission_3', 'post_demo_to_pardot', 10, 2 );
function post_demo_to_pardot( $entry, $form ) {
	$post_url = 'http://promotions.opus.com/l/12092/2017-02-16/3m1w4b';

	$body = array(
			'first_name' => rgar( $entry, '1' ),
			'last_name' => rgar( $entry, '2' ),
			'email' => rgar( $entry, '3' ),
			'company_name' => rgar( $entry, '4' ),
			'interested_in' => rgar( $entry, '5' ),
			'comment' => rgar( $entry, '6' ),
      'phone' => rgar( $entry, '7' ),
		);

	$request = new WP_Http();
	$response = $request->post( $post_url, array( 'body' => $body ) );
}

add_filter( 'gform_confirmation_3', 'gform_pardot_postpixel_demo', 10, 4 );
function gform_pardot_postpixel_demo( $confirmation, $form, $entry, $ajax ) {
    // Get the originating post
    global $post;
	// Get ACF fields from page
	$form_handler = 'https://go.pardot.com/l/12092/2017-02-16/3m1w4b';
	if( $form_handler ){
	    $new_confirmation = "";
	    // Make sure its not an array. Used when its set to redirect
	    if( is_string( $confirmation ) ){
	    	$new_confirmation .= $confirmation;
	    }

		$pardot_payload = array(
				'first_name' => rgar( $entry, '1' ),
				'last_name' => rgar( $entry, '2' ),
				'email' => rgar( $entry, '3' ),
				'company_name' => rgar( $entry, '4' ),
				'interested_in' => rgar( $entry, '5' ),
				'comment' => rgar( $entry, '6' ),
        'phone' => rgar( $entry, '7' ),				
			);

		$pardot_payload["is_post_pixel"] = "true";
	    // Append Pardot iFrame
		$new_confirmation .= '<iframe src="'.$form_handler.'?'.http_build_query( $pardot_payload ).'" width="1" height="1"></iframe>';
		// Build Google Event Info
		/*$category = ModuleResources::get_item_category( $post->ID );
		$title = get_field("title", $post->ID );
		$title = $title ? $title : get_the_title( $post->ID );
		if( $category && $title ){
			// Append GA event
			//$new_confirmation .= "<script>ga('send', 'event', 'Resources', '".$category."s', '".$title."')</script>";
		}*/
	    return $new_confirmation;
	}
	return $confirmation;
}
