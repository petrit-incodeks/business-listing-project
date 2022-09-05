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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'npikdb' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'ojm}n<A$kNIc,{VO*wV:HV ^~H@AefQ&x^?G:QSX85HH!fSD}Iu>U8;l%!&8W ?_' );
define( 'SECURE_AUTH_KEY',  '_pZ(sQ/`Y^nLnT3X2Ye]i9By9}I%8lVs}:8#^weUpV4X?$_N5ik/ m!n?f*%o |l' );
define( 'LOGGED_IN_KEY',    'ZEmYz5L:N97++B[bTn$s/p(vgU|d8Yg.aPqV&UOAxH.eV$CW{Q*Vc;g`d56GJAAZ' );
define( 'NONCE_KEY',        'Hs3/3C47Q~h+lu?](2;I_eI~?`>i(73ghz[W`[NVkAr<.=#QaF:!FYG&.>/1+LHa' );
define( 'AUTH_SALT',        'Q~ WB<B#YZ>vKIhI739II7JW0{METe@tsMG3k$}Ok~x7]H>YBpF+k#7lqA|B~EyP' );
define( 'SECURE_AUTH_SALT', 'sewvUk&j+s~%ZY7bB1-)cAo:YALQRE;mvxdIq7gApd.M%pdPD,,qQGK7+$1Q):?w' );
define( 'LOGGED_IN_SALT',   'cvP]jkFlSQlOZ@W.Z^O<${!mZqSynt+w9nI[-uTGaA,Ts.|+e3zv46p|^(<2`4%L' );
define( 'NONCE_SALT',       'n$7L,)L?c-}&#@W%f8s%S2F7tT;hwL+a/{6yim-i@o<H7u>UgNoLiePvD03=U&eM' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
