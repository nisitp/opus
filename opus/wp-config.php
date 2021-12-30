<?php

// ===================================================
// You don't have to edit this!
// Copy local-config-sample.php to local-config.php
// ===================================================


// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	include( dirname( __FILE__ ) . '/local-config.php' );
}

// =======================================
// Check that we actually have a DB config
// =======================================
if ( ! defined( 'DB_HOST' ) || strpos( DB_HOST, '%%' ) !== false ) {
	header('X-WP-Error: dbconf', true, 500);
	echo '<h1>Database configuration is incomplete.</h1>';
	echo "<p>If you're developing locally, ensure you have a local-config.php.
	If this is in production, deployment is broken.</p>";
	die(1);
}

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY',         'AG_8C4Sf@/?a+#hf`q2OqGvQf5!;_4;xc9Syl+Xi~&[*P1}TWYGz!@#/Oz8A&t=d');
define('SECURE_AUTH_KEY',  'N|d-;V*|b<4E,1nKe&e|V;hqRXZ*Y_kXZy8%{*W|YB8k.(U`9o^O0nu!7I[M^o99');
define('LOGGED_IN_KEY',    'h?Iw)([v3Pz^}aSt-yJ+,pJlKc0|rK 2|l_:8fy+BMXQ,SxF[VCreh^;R3v:U<En');
define('NONCE_KEY',        '<I|W]F0R*!+1^D)N%ZuPblp$Ri=ew{f#>T<xhAU#&:V~u~-6]KY}f5>Gc;)sOr*t');
define('AUTH_SALT',        'O`m<vtN@$ieYYgY#?p:/Zd7-vCNPrf2gY8c8;-uSAZ/N+YZ% jY*jKsw|bGY$dsL');
define('SECURE_AUTH_SALT', 'H0)r.sY/.G~:+:+(W(b$(%b;+4PsD!0=`-_l +AL>V|{bB7viyStE&b|xw]_=aV@');
define('LOGGED_IN_SALT',   ']6Jk+JZ-K$|+|-Ko[KO;0Eol#%9c98`m|%jTD%LMsx7C/,>0K-1,*,H|3Z?$Pm[8');
define('NONCE_SALT',       'juN=vKptW(+/-p]12e3vT2zog>SX+s+.FdqTd[~WZ5(s}XgpZR=WhIE]-jhH%6U=');

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
if ( empty( $table_prefix ) )
	$table_prefix  = 'wp_';

// =====================================
// Errors
// Show/hide errors for local/production
// =====================================
if ( WP_LOCAL_DEV ) {
	defined( 'WP_DEBUG' ) or define( 'WP_DEBUG', true );
}
// Only override if not already set
elseif ( ! defined( 'WP_DEBUG_DISPLAY' ) ) {
	ini_set( 'display_errors', 0 );
	define( 'WP_DEBUG_DISPLAY', false );
}



// ===================
// Bootstrap WordPress
// ===================
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
