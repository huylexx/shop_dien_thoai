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
define( 'DB_NAME', 'Shop_Dien_Thoai' );

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
define( 'AUTH_KEY',         '[u!HdfW]:/StNjJHLKkGAD*I]/>nO6gcgT;7#!pV:*sQL7SJEn.O~m mCSHP!Ny%' );
define( 'SECURE_AUTH_KEY',  '+<6kpw^@`}-a~s~Ej[IOf(0bO>ZtR9E(I)H(o;QXs#NBDi3;#D9`V+)rYNU8dYL<' );
define( 'LOGGED_IN_KEY',    '~z[<pZNyo_hp-U?6p*6NuMj+#L{Z@;9pb/yp|Rx?9:`&vx;2CHqYkxkjG;fg-6Yb' );
define( 'NONCE_KEY',        'yAILFbThcE?ypNo=*SmW>Itm:+r#AYKB[s$5ULR2+i1l+a3Q%*eZ2o52?Jzj%U0[' );
define( 'AUTH_SALT',        '`QBoF[Hazd@/wy}1@fJxE}$-]1fhm=>OD+pt+O$iDI/d./x_Zhb ah11v,d_`:wr' );
define( 'SECURE_AUTH_SALT', '-JzBZ@TQ;k _MDITpG?.z@ga$+)v>~Wt}<VOT]uwa(Y1P9]9J>.Ob@t#>H.QsRg5' );
define( 'LOGGED_IN_SALT',   '(Wv(!Y)~,{SAfl%^G/Yrc4~WDiYSu}Ov8X)9qAV~G4tUX]Vc)(>Z$<BG;2WbiVn8' );
define( 'NONCE_SALT',       '1krYi&p4Ti/VEcC)(kf(hzsMfwanz]6hfmTSc+~}1|{mX[iTw1YI-91fM4FCf$ye' );

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
