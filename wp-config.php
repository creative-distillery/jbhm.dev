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
define('DB_NAME', 'jbhm');

/** MySQL database username */
define('DB_USER', 'willfalcon');

/** MySQL database password */
define('DB_PASSWORD', '1Bankplus$ux');

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
define('AUTH_KEY',         'Pb_t~7 y6R]ZIM Fern2[B}8C/x7,2t]spcgW%d$h9qsZP_5 h1Ga*<vB.8~BpLj');
define('SECURE_AUTH_KEY',  '2nn|5GO^e7nX-v:JlF0H0_g7s**=`=~7f(E+Gx/yY!W6ws~vM3YulfQEf`&wmm&*');
define('LOGGED_IN_KEY',    'J8)S]02X8?85FqI-@[uL>o90/hb9&VcO#YcAK#2b-mj;;FkZonS)jKJb)-u+R{RA');
define('NONCE_KEY',        'p?yd,4jstLi02Iqh(8+`n<N5h,/J 45Mlnm8::g:hDcEdz=4}H`$Y:Eowd,z]fiS');
define('AUTH_SALT',        'l}S$R4H=v?|4{RcSM[`]9`6EuQz?V0=$M8w7UbW ^N=Ob?G|ENO,F:/+a{$)uRc]');
define('SECURE_AUTH_SALT', 'p>bN5u0B<_NFA$IQpo.1M#PX.G-IxC(.ip>JtO5]$TnOu3z 8&Uub;_5.w)nuK!A');
define('LOGGED_IN_SALT',   'eQc)_a}x+HECqN:aY;58A2?D_UnT),r#wroen&`I)ABC*5E=Kyd<R;w*VL0`U<iX');
define('NONCE_SALT',       'f*ps}-t^m]q|CPXv[H=%23?c[bu#n4@fljKW=*1FA$IDFWad;I*wVQz;hU&%#~DI');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
