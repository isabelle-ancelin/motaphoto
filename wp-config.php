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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'motaphoto' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '~Y=Ow8m3m`Pc1KP<zI>9+/[X.0gtgk,a=gb/gD`E^`9f~,3rIh,N5(*=9j}`;m;[' );
define( 'SECURE_AUTH_KEY',  '{fkC0w/Y(XEGU=V/yq4Z,GdUlPe~}(Q&]uM`>/ OyfgN{LYC::7PK0ycZdc{)cdQ' );
define( 'LOGGED_IN_KEY',    '0!x@Hk!c,xbn3 1KMa>qaY^Ptli?C,,1Jqw/F<ayofvTQ-f!HuWUPCEr5/r{SwVj' );
define( 'NONCE_KEY',        'Z]MKBXIz(I>i~u*vmhpUzTV%j!fWAOhJvB+,x!S:Td7)UPU{}P^{{E:R=Zg2ba=E' );
define( 'AUTH_SALT',        '8 d:Avrt`D8k#$Q}3}Vg/l7jt@MPqM>gY&0%/${5dc(t=*ktjS=0w3/k-&eOIX=3' );
define( 'SECURE_AUTH_SALT', '`v~I~]!y(91:I?(E9kf-/A=im18T;g0)pK(wp]6[^)euv.T@I]@i%7p//t`NB&%_' );
define( 'LOGGED_IN_SALT',   '*=p}.C;:-g(/N+VgmmO5P^taj(2tX6_c>]g{0{7$U+:om`|+|H.`W]_8;Awmb b,' );
define( 'NONCE_SALT',       'nb&6b?*&`?slQk2T[|-cx$5~|4=&px+cKi{;?F[%3)=/6A8DQO?q)yg:,T!f&S89' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
