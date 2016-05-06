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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'grandpriDBacick');

/** MySQL database username */
define('DB_USER', 'grandpriDBacick');

/** MySQL database password */
define('DB_PASSWORD', 'hFNkqw0NWc');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3M3fqIQ^ukF@N[vkz3>7n^zF}c0vNS9:GsWOlZ#~1haxp9WO_w:kd-sC4O!-:|Zsk');
define('SECURE_AUTH_KEY',  'uPia;#A2me+tKha:#D5ph-tG9WO+t#aSpi5;LDxp#+3{IAun.$Mjb<E6fYunB3QI');
define('LOGGED_IN_KEY',    'jE3j*uIAT$u<bQn7IAu<^bPm6;LAum*TLeX.6ibumATL*u{,@4}cUnB4RFz},NF');
define('NONCE_KEY',        'OuEbP.+2iXtm2MEym.+PIb;<A2tm_SLia]_92i~tA2PH+;#aTme2]HB3QJ$r>^Unf');
define('AUTH_SALT',        '~Z[!5:ZSl5:KDs[~SKh+u{.TLib{HAum*xE6T.$2{bTqi2PI.+;#aSp92PHxp#*He');
define('SECURE_AUTH_SALT', 'zUpd-sGZS_-1[ZHwp_-Kha[_9wo|-NGZ:!80k@w81OGw:!VOh4:G86;H+q<WPme;#');
define('LOGGED_IN_SALT',   'X$Q7fA<qyA.b2uP>k7vN|kF>rM,c^}YnMl~tCW#-:Zwl:K9p_OGW_5w|-G8-O[o1');
define('NONCE_SALT',       'Y4kcznIBU>$3{fyrE3QIv>^UMfY},7rj^y:|C4o!-NGZR|80dVsh5:K-s[!RKhZ4}');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
