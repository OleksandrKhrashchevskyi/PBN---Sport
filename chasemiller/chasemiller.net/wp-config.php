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
define( 'DB_NAME', 'v58319_db' );

/** MySQL database username */
define( 'DB_USER', 'v58319_dbuser' );

/** MySQL database password */
define( 'DB_PASSWORD', '%kxZc;QbnJjU' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']71B,{6hf~D {-#=H1/)=y6g}a`>g/-w7NDg#*UWz<r]Oz9ui#t5;cF|J[P83upA' );
define( 'SECURE_AUTH_KEY',  '+@uAe}cW`z]2>0!L;#V?q{i^O+.lPa=2 No+dO+C*:8|jQJb`,|<1cMJ)oPQUD-^' );
define( 'LOGGED_IN_KEY',    'cg{2<1 ~{tyb*)9`u/K9RV:sT3  v{;6?nJY/dv5{I@Zz_$3 *r{Aq!<N[TjK:EP' );
define( 'NONCE_KEY',        '6<Qy2YyDM{}3W]@ot+NhL3M+/EJfPzo}+{(I^,$-M,_I81|W.}#4L;nzM},6d)~;' );
define( 'AUTH_SALT',        'iRTOe+%c|?%y34e;/XVRu<5*w2+(;[x,|Zlj<1t@I5)p;tG+dwZHw/1=|SN:kj88' );
define( 'SECURE_AUTH_SALT', '7 t87g/_17BAAWyki0de_WmrH+f72,8yHg3+YH~a9AtmMt~fC-B ^iEiS,KV4(<*' );
define( 'LOGGED_IN_SALT',   'yZ6G3PL9`9MTO;PH#c{21,N@s1pyR0yMum:@8;#)f-TPpAq38(3`aQ#bZJ Wd!I8' );
define( 'NONCE_SALT',       '6($^e_N,:U4PXW<WQ69Xw>PM_?@$AUJNdZo t:y?p[=3QONPk?~g!}]IVuUV7D|0' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
