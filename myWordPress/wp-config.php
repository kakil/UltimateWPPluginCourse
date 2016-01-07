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
define('DB_NAME', 'myWPPlugin');

/** MySQL database username */
define('DB_USER', 'pluginUser');

/** MySQL database password */
define('DB_PASSWORD', 'LEqzvuLPKvpnqspQ');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'q[TjTB6x#Q&|!5nOY)le,aOS7-|5 s6+A6X-#V7,Ul[ZTa%%v$1/k.b~dPrfbk8a');
define('SECURE_AUTH_KEY',  'J~*-CrCSjg.!c.Y:-oA+#DinOJ*W7#Ld5@-CN(<}&-)VOZ42{+tvS*Nsf&W.*42Z');
define('LOGGED_IN_KEY',    '>EQ<8jlF_E[bX^ZB8hDEIq^13#fP^}8iTb8+7fd?NT%)ID^WC(-y<*%!Vs(98iWA');
define('NONCE_KEY',        '1oS0.LQV>:n-ca&h(H3-/=nldujK_t!MnNq;yx|0zCeSa `&~aJusZ=<z*,2d#U-');
define('AUTH_SALT',        ':zlO;JW;69f1 ya^,-j&Ymb6zNecnO+[i-1PpbyH?ROmZ%4N-O;MjSau<-@C?DLR');
define('SECURE_AUTH_SALT', '[9B-&Hi4i2S PbI<x]o|I+1OQ&PL?ru|ZV&iCv)b}mg+v1m,1Ni1/_tc5ZSJp;(9');
define('LOGGED_IN_SALT',   '&du_Nr;`k{E3K3Ec6F-G!>ko9d`ZQxT]er!Q2dq$uR:Y|njo+t`6ZEc&)(Ci=J^|');
define('NONCE_SALT',       't,wf`jnlc(8SN2Xzi&V-6CGiS]}aU-5-+PA<VM|Rq^-K4^s)Q-Rre/V@r]C6LaU(');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'dbpi_';

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
