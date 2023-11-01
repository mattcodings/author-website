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
define( 'DB_NAME', 'mzwerlein' );

/** Database username */
define( 'DB_USER', 'mzwerlein' );

/** Database password */
define( 'DB_PASSWORD', '000375891' );

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
define( 'AUTH_KEY',         '_z6iWH#@U}y^zYIUO9EI9E&ui}#N/B3Zt_q|0@cRUg&Kyjbf5_%DjK!.x#o]e=:A' );
define( 'SECURE_AUTH_KEY',  'ux?hs-sm`(P QT:~SrRN9bN-^1w_?BQwb]QeVb#1RBtej0N3Dz/hfQSNoSkbGn.]' );
define( 'LOGGED_IN_KEY',    'f%~dK so,J?FM|*X3j[S3GN&#J,R8`//H9!?R%?G^P0Ay8[F %JLuY&0k7iH%Z*C' );
define( 'NONCE_KEY',        'XA}3p4o(1$-P]5=/>F`.d.TQ4DEYf@ aA_p&;sex$5{/gk (t5}YyOI>/$|sxR7[' );
define( 'AUTH_SALT',        'L=6{MRX9%$S&4~*^dc-#B$W3g4q:%O[;1Zu6UpZ&+qN_PU:9#BPXtUDUd2TW$2L_' );
define( 'SECURE_AUTH_SALT', 'N[ZL5S5A4h*4O|PUkt2yC)DBOq.?`76zH.S:z=H+6(]m<GAaRKi$>P&Sr_bJ]iu9' );
define( 'LOGGED_IN_SALT',   'DXaO)7L_)Cy1DMa8hqTZ^4U):1_rZ,/)ik_BG_PX5}~LRHO)^x|3N*Vd[+}%8zqK' );
define( 'NONCE_SALT',       'q,lQ.wd$e%=9tJN@YS4^!_=m[vUYyvn2PJ7Lce1lp6G}?/TtN9!UMnhJ?k[MV/ca' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpd_final_mzwerlein__';

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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'FORCE_SSL_ADMIN', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
