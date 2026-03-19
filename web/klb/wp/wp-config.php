<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'jost_wp136');

/** MySQL database username */
define('DB_USER', 'jost_wp136');

/** MySQL database password */
define('DB_PASSWORD', 'j808thfP5S');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '6gmgstj7phkfbkhiuqnxn5ksxda7gi4g225oacc996gdqenz05cy08joklcccibg');
define('SECURE_AUTH_KEY',  'htd8gifaljl6r0k5mnktzrz9y2cvkbpkrudahstdqsfkypchczk4k1b0j3cusuiq');
define('LOGGED_IN_KEY',    '0icacnz7getnt5jqqsmcyoc0hy8sxlrwhtfaxl4jdcaj9p129i43pyt94jei8ftt');
define('NONCE_KEY',        'qtwaejar9tolcect7uoyclp0wldgtdmlj9ydsj7f65dsrcuueed2xg4ctds79krr');
define('AUTH_SALT',        'm2tsuqe5ra1wyxoo0fl67mhmkezyzbx7uczpfbgo3ardg94rfs0poyfkhu71paum');
define('SECURE_AUTH_SALT', 'tozawyjlduzoqq0vyafcii5rvvfs64wpqajp5hmvbycgjj0mecxtvfkg5uqlmidg');
define('LOGGED_IN_SALT',   'fhbxgohbd9b0bhi0amyjjw8dtq45qtp4hpl7vucog8ipitzwrk48ept7vjey3x41');
define('NONCE_SALT',       'vu2nhw5qimlgvelhf8v97i5xjygikkgbsjfzcvyruosym5zwthlhd9wtwz8vmada');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
