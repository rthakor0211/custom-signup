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
define( 'DB_NAME', 'wp-multisite' );

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
define( 'AUTH_KEY',         '|iOZSe3uQ{K^:?lHW@{QQB&s#]/yh>g;FMHg*WB~!s7Mu9AfII}m1X(lBL-5pe3a' );
define( 'SECURE_AUTH_KEY',  '9BHGq0:t@]gju,p$P}#]-w`NS+>1,;~:u@!W5_D9=bNQ4uPB)/mAj.tmSyw=S;[,' );
define( 'LOGGED_IN_KEY',    '-?O{E]<XQsj9tEOc=?@IYq2(mmIT(IgW/R6H(L[t@Fpw(M9-XJkP9ZE=4uu?%<2r' );
define( 'NONCE_KEY',        '}Hf+Ucu1pN-xmZ.ksTHLO1]ndjwt&urbH]~-vXu(|Q@`]dUy[R8Fl[CAXcq*/^DU' );
define( 'AUTH_SALT',        '8h-2M+(kcoJ@O5E$._o{EFnH?P?&Ob?ZJ8!Fol@(]{j=z)FzOF%:QXHe!2G9bHd9' );
define( 'SECURE_AUTH_SALT', 'd}iy.<}16#Vck$ )GR;3@p(QuNwZ~utj@=wR5`L-BS]oG=GZV.JB0+I^O9>Q5em5' );
define( 'LOGGED_IN_SALT',   '0p^Fh:`8ISn/SuiCwgMnt{J/i jNW ;]=62Nagvt>kHyg18Qk/><@[,$;;VCp>Fu' );
define( 'NONCE_SALT',       'xbe^j=c7X<n9S!mt/^OH6IG#uht#~(F pb8#<]}a|#&^,~2d?/S;bc?SWynILRcG' );

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


define('FS_METHOD', 'direct');