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
define('DB_NAME', 'lisawordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'nOb~_.]bbK:[`=(`rTgmp:WZEE5f|@ZrvQa/H8Sm^}gZ( _D5?f}to8K7;kRuh?.');
define('SECURE_AUTH_KEY',  '%V;8vv=UD7uZ2tM]*BDYqo&?~7e^l/&<z]d@v:QCiNZ,80hMx:=_ElbC)?%+$ITE');
define('LOGGED_IN_KEY',    'dQK>Oy(2:XZKlg0tehSm4Q<M0j.%Bl_*3f91|[~Ia5rd~S6.nU/#,0mU?%9U_=o?');
define('NONCE_KEY',        'q&s )}sAqs}F^h1oN;.P:y*9ql50=QU<AEAHO/k`hWq4#64iYu-i?7`w7?@-Hz:i');
define('AUTH_SALT',        'TZ-|#f*vZys,1fwrF7nG#84Ww9kP5& ^S,8^O<dqYOfv9Tb2NuRaiW(L|7 J~Z`$');
define('SECURE_AUTH_SALT', 'q@6o* +;BA<0+54b#)+*NP9asxfrg/s::+;${+Xb 5Qx%Sz1>K]H/{y~Qo6JjXRi');
define('LOGGED_IN_SALT',   '[(|%:Flv-~!(=@PGaOQf/?vx+JQ=!8D`^G!6L!VCX$V-Ge9@C7rUjH8)x8Pg8.#}');
define('NONCE_SALT',       'i#dhIkKa@0P8;^N2av6~RdpK|~vt8^0<b!y?pZ1P`>GUDJj1r$ %C3v,t8O0XZ5)');

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
define('WP_DEBUG', false);
define('WP_ENV', 'development');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
