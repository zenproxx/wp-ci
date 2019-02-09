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
define('DB_NAME', '');

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
define('AUTH_KEY',         'gJCX>ElfZ#wPVbpR_AF1Q$;,=Qx_{Dc7~+{JtEH~OgeO&FyE(P!i*8FresMH[uA)');
define('SECURE_AUTH_KEY',  'dmtYE]{v;Rcj5g2t;T 3,Hp[Aw3ye:DOA.Zeqk)+1[o1{) 7jdkUT,c**M},r{V?');
define('LOGGED_IN_KEY',    '0,F,qpde.~(DL)y1QV6@3>rycn})M{@b0S7KY-, Gw4nWGKU?st<I8RG=IP|JJYA');
define('NONCE_KEY',        '<%^9`i+9uQ:h19jw,Y#Ol9Pu$xVL4E5L70HTO7Pt~&NEs~@jmcqSXbE<;rS2FCgp');
define('AUTH_SALT',        'XAiJRG#P7t9YC,nM{EsX 9m:rI[POU]T_03nnAev0dNg1dY{7;#3~a4OXY~g.U`%');
define('SECURE_AUTH_SALT', 'bezuGec ?QYW~?AqKzPgx6@rNH.RzApkw8kacWy.!Y%y7d]pJaOI)~7{&+OjS!@l');
define('LOGGED_IN_SALT',   'ZxJEMB~`V] a+8/hu.nco}?$^T-6Cs&  u<{c}L#%dmFsp[Fs2p|ayJ+HU;T5@[<');
define('NONCE_SALT',       'zs@O);1m}-NDZ+LY7:>~Pbj@q*s#3V1@Vl(f[,*[v2Teh0V(N.zd/XX:d`mr@#X[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
