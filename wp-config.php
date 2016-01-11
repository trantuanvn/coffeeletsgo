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
define('DB_NAME', 'coffeeletsgo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '7P+nuE+1gs=FE!2b15ojj-n/N,y]<PNF4Av!)]iS,;/_+_=E(&[@Ux=k|rB&{2vb');
define('SECURE_AUTH_KEY',  'V.a7XP95m(GDHhV_RFx3%AI,f|[|BXQ.aE+H<GxN5F=}la`ivhhI~kk MJD_r9:8');
define('LOGGED_IN_KEY',    ')oR3<3qx)g&[>9t8f%_?OK4?y!KE-%K<LZ^h#NO(G3.7cRvzH)Q+0 e%B0GvY^T[');
define('NONCE_KEY',        '{ hrL-58s>vu]fE.G)JH_p9|3SjbdJ._i-[cGUz[]M)@:KhL|@++/j,12.uEUeto');
define('AUTH_SALT',        'I#BK*[U-|Xn;M>mxmt1?-1r}C4Tj-Kk-.UB|73WS7?AfG1HADl>eWaZ=-(Cg:mpv');
define('SECURE_AUTH_SALT', 'hJdkJhRsefh+OOX|GtabbdM_<p745+7+-(F8>Y3)[<}|O#GtDw*>9T<e=Izgv+&t');
define('LOGGED_IN_SALT',   's-Y~I1v1u]BPnWd&~*Nz0QDv#ij}%A<i=|ZHn [cg!:o74A@Aes4Gx]o-++-$FpH');
define('NONCE_SALT',       '+e{5j>A/t?(S)+d}%87<o=Z{m3Mri>+z_G%j2$v|/Td> t-VOAGpiS^03nRA9Qhc');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'coffee_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
