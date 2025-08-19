<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'HJVed+h/@<$ScHy(#iAdRz!^/SAgl-$v6LhQgza=<VS^8 la^U4dMQ&{S@i{M;]a' );
define( 'SECURE_AUTH_KEY',   '-F^$%Rf4Bdc1J:QkG=KVCei7pmT,o[:3F<k0(vFbG/%I$[q%cXpj6We1zZlEZD-i' );
define( 'LOGGED_IN_KEY',     '1N(;Fp0(A;,(xgQa~QN;Bkm,xMChlb DWW_}{mT{8(q<0.L)HOY$O4gesvp}&5CY' );
define( 'NONCE_KEY',         'gYR?3i}G#G~oDv.Zp.ZO^~Ya]o1Xiq1J=DU~b`n9(nl2Xmmc4j#FLh#3790F^9a&' );
define( 'AUTH_SALT',         'ki=_ECdzF[Mn0}?IZ@&v%ZDOm$ cqOT)[l[V4qKkNA.TB3EZ]!ThE.0/|RB,[8.w' );
define( 'SECURE_AUTH_SALT',  'H307q7.cx%f<C^aDp[9}l%FG27e|EG[W1x:~?{isj%Q8s7xAU:z#_NDlUA^c_2X%' );
define( 'LOGGED_IN_SALT',    '#]`}tG(??=wIMeWt0B!bbTatfnYS;On):oMc}kSW|l_0=E?%-m+pB7&FegPZH>gi' );
define( 'NONCE_SALT',        'Xpt.Q!lK@|6nniYJT&}T9KO,]q,]e1ZJNGqR6/JI9Au:>lbdOU.~nMOxPvBUyG1R' );
define( 'WP_CACHE_KEY_SALT', '}L+r7.vPB~_7u7n&3;CK65==W3.ov^W<>8&[$Y/ZxGyLjh +Z8}^+f,g*X-gC:;v' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
