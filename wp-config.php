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
define('FS_METHOD', 'direct');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress-new');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'BmZGX.)gz[~3mkZ#6/)3}|#5UUs0fx`_jwxk~g_0J(VY.5yY!O3#SnR<vX.}Ga1*');
define('SECURE_AUTH_KEY',  ';<`rLTz7k#qn0=.Ist{dv2U@ECH){WP/bH6hh{;TSi#O:=4Va+.C;>wIz!. l0-3');
define('LOGGED_IN_KEY',    '.MzFdWk+Qkk`]:`3UmG{~Pd0jm<k3tI2Nuz,tw~?D6N3$(p[2$^eIh|a+sq9wmi$');
define('NONCE_KEY',        '!9xSC(Zs=XhL1?s+|lNJe2,.kf;4BCe]E55$h/oU%S]3+*5#un:yEWr9qQ9^UAZY');
define('AUTH_SALT',        'r_Q3f>hvm$YXbKd5$TvO6F=qu(C}QE)bA;oY ]Fc%B[0?[8C,KG2_-/>?Nkt;*57');
define('SECURE_AUTH_SALT', 'W1%<:vUl(vHdFHB-/4)&OWm=TFQ1- Hz4]PKwsYPBjsxxoo8_M+cz85vc:G6tC<t');
define('LOGGED_IN_SALT',   '/$SjV{DB=SB{ks2%?Cqgqv`6sIn~lA`/R#T4fq1MTn_&qsWQH$Q}oKRvShiC6|iA');
define('NONCE_SALT',       'j`yZ),zI,VG4,#=5sg[>OeeY)[aD&7U/!*#Oyb81.FjVSuhvPB-5xTSZy:e?|!{=');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
