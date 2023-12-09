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
define( 'DB_NAME', 'planB' );

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
define( 'AUTH_KEY',         ' K9xhYU@elu<%j7]qDP}$s:ib?emr?3A$?>[Ing-cM:Y#T3Mn8|6GUQh(B?}Q~F*' );
define( 'SECURE_AUTH_KEY',  '&H#MT0[lUiMrAw2AaZz::YC2Jn{hUne*(Bc_D0@P`*? 9Zt)Kl W1FzmVSN63}DN' );
define( 'LOGGED_IN_KEY',    'v ]eo8mU .Mhv.89yS5Z s`As(fL,ozSAz-VeMNdHr~6 foq[%arm#&+`)Pet?1b' );
define( 'NONCE_KEY',        'Dfe]Nn3fh2u8*gW#` `7ZpGHkX[UV3!%M?@DDBnW}D=ctQAvk-j_^HOv-s8L8^|+' );
define( 'AUTH_SALT',        'j7yO~H>U$TS%HCC%gJa{CMt(MfhrdQPy{&Ov^1:?QSsn5^?$LeQRL#D!&L;W*H^Q' );
define( 'SECURE_AUTH_SALT', '@>CaQT8qX2|W#ivu^P|~m$A^k8OT}4Lkt5bSg5dH|8c>S/=A<PGs`1.mG[*Uh=V<' );
define( 'LOGGED_IN_SALT',   'B]1wKZU@I5wcM aFH?zR.Eeh;?o_3Aw0!~L%Mq$iX+w,^e_nYvI]gZ(/5O@{U<,6' );
define( 'NONCE_SALT',       'kjUr#Ei;.pE.!PkL:y<&{,wz$D[`oPW+jjtF_*:7z3XI/T(y*ub+Xl:s%c>5][wy' );

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
