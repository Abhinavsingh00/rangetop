<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rangetop' );
define('FS_METHOD', 'direct');
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
define('AUTH_KEY',         '+&JxtOaw%iU/f~i9m2w8<-eC*5-.aGX|?-~4a>A&u, ;6Ed3<zXN}{{,Z$-3JH*z');
define('SECURE_AUTH_KEY',  '9I!T>^^g/6Rj.e4i876nHwOzUWT6MWRPqwdKjfC/pIZA@TdD|{RO$D]+U%-!V^~S');
define('LOGGED_IN_KEY',    'Z&+$uaa`Uf[!AL+x(eP y^%TGCHLIVL%0st}+b0B1H B@-e1zUn_Cv>%sKv4Q)A9');
define('NONCE_KEY',        '8,5MyzVm-=b;ykQL;N-P-HKTW?G=r.3>uFW_6;DMX$657{*:B-*13*g!B=!p>i,v');
define('AUTH_SALT',        'xoO%4Cv=+5  9vz^H+4vn;<Xqs4mrCM?]14#tbN~TY0#|H|(io:jCLs>#N%G{r4-');
define('SECURE_AUTH_SALT', 'g+Y2NhJ~8Zbd-}S^0)>`&(l[=iv|BVsRL[&(Od;Ba)1~3&Pr)[H_Gr j<`=:C;!U');
define('LOGGED_IN_SALT',   'v|M9W!C`<:WS2#~-xN6.Dcm1s?$1{y^iV=/L#mzK|&K6!n c|;w$E-.-X[3Uv+&>');
define('NONCE_SALT',       'Tf:|&_AkJ(AV5R;Fg?OL[X|!W&s5+nv<H!*o,?yO>_iNdVMj7RDf-a0mK-S~,>&=');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
