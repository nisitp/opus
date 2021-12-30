<?php

add_action( 'gform_after_submission_2', 'post_contact_to_pardot', 10, 2 );
function post_contact_to_pardot( $entry, $form ) {
	$post_url = 'http://promotions.opus.com/l/12092/2017-01-30/3jb47l';

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

add_action( 'gform_after_submission_3', 'post_demo_to_pardot', 10, 2 );
function post_demo_to_pardot( $entry, $form ) {
	$post_url = 'http://promotions.opus.com/l/12092/2017-02-16/3m1w4b';

	$body = array(
			'first_name' => rgar( $entry, '1' ),
			'last_name' => rgar( $entry, '2' ),
			'email' => rgar( $entry, '3' ),
			'company_name' => rgar( $entry, '4' ),
			'interested_in' => rgar( $entry, '5' ),
			'comment' => rgar( $entry, '6' ),
		);

	$request = new WP_Http();
	$response = $request->post( $post_url, array( 'body' => $body ) );
}
