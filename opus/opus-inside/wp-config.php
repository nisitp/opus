<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

switch ($_SERVER['SERVER_NAME']) {
    case 'opusinside.hotsauceatl.com':
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/Users/nisit/sites/opus-inside/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
        define('DB_NAME', 'opus');
        define('DB_USER', 'opusinside');
        define('DB_PASSWORD', 'G2ek4*k3');
        define('DB_HOST', 'localhost');
        define('DB_CHARSET', 'utf8mb4');
        define('DB_COLLATE', '');
        break;

    case 'opus':
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/Users/nisit/sites/opus-inside/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
        define('DB_NAME', 'opus');
        define('DB_USER', 'root');
        define('DB_PASSWORD', 'root');
        define('DB_HOST', 'localhost');
        define('DB_CHARSET', 'utf8mb4');
        define('DB_COLLATE', '');
        break;
    
    default:
        
        break;
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ykI,a/Nf.Uc#<WWYr!zPkbi<p7n%wxJZ[EUen[%J*p0[)S5L^mE|%jc%*4m3dDlR');
define('SECURE_AUTH_KEY',  'ed5TUfPZ8u5@Ri.-U[3HK3HSXI@`O>bWR[KdeFJ@NW&TuOHSaqKokr[}6icfZIve');
define('LOGGED_IN_KEY',    '*  VkI]VL/>&0{ kf|1X@g/c^PNI4,AmZ:!EdSC*AGj@! Qj(RrfBZ1(v,n?&hHq');
define('NONCE_KEY',        's1HZP#tyM]W@lDPBdBfBq[MKh07f4D(kLH/jo{!N|m_H/<3<WXi$M-O5]4BvR1DD');
define('AUTH_SALT',        ',IekM]]@)T:+jhY] ~JdlT^JY/=;Vjg!tI$fRQGw%>Frgh>K,RG=,,j|er<%P7Qa');
define('SECURE_AUTH_SALT', '`:~Bp69B;K0/^mkr`:(#_+aTH+.$bh.WaGm:r1zt%=1I:rU@?26Ak;auxPR[,@uI');
define('LOGGED_IN_SALT',   'mQK` gy9$`*kb]/*{sskBLR^J!runbSN`aw%1MPpi6r(V~cf ~5 7|AH]#H]7|e$');
define('NONCE_SALT',       'Y$Kj_(oGFJ w~3?J-&@qcrd,Dx2L1YN~x!*.N*QhQ$<n-q!}?!5iJ^;{q;]sOsa=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'opus_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
