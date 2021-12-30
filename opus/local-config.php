<?php

//define( 'S3_UPLOADS_BUCKET', 'prd-opg-wp-static' );
//define( 'S3_UPLOADS_KEY', 'AKIAJUSSKFKFQPGQBXIQ' );
//define( 'S3_UPLOADS_SECRET', '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' );
//define( 'S3_UPLOADS_REGION', 'us-east-1' );
//define( 'S3_UPLOADS_BUCKET_URL', 'http://d2vo5wp34bl1tg.cloudfront.net' );

//$_SERVER['HTTPS'] = 'on';

// Declare if we're developing locally
define( 'WP_LOCAL_DEV', true );

define( 'DISALLOW_FILE_MODS', true );

// Database constants
define( 'DB_NAME', 'opuswww');
define( 'DB_USER', 'opus' );
define( 'DB_PASSWORD', 'opus');
//define( 'DB_HOST', 'opg-wp-stage-rand.ccywwrw0iji8.us-east-1.rds.amazonaws.com' ); // Probably 'localhost'
define('DB_HOST', 'localhost');
// Custom table prefix
# $table_prefix  = 'wp_';

// Loopback connections can suck, disable if you don't need cron
# define( 'DISABLE_WP_CRON', true );

// You'll probably want Automatic Updates disabled during development
# define( 'AUTOMATIC_UPDATER_DISABLED', true );

// You'll probably want debug logging during development
# define( 'WP_DEBUG_LOG', true );
