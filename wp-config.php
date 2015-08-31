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
define('DB_NAME', 'ceramic');

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
define('AUTH_KEY',         'j7by/<.6==}B|r0`yl4pU~4oFDyg<qmJUy(#!uI~|qkP[}p?`aUPe$LUy#`AaL2R');
define('SECURE_AUTH_KEY',  '](IjSgK{Jo#|tZ_zD4O#!_+Ejap3uLt_c(H|@XIg;&W2JG<#SANF;CR)rcXq/i%]');
define('LOGGED_IN_KEY',    'L>M>mtNbDz~,Xs7zaFL^9@P=.Z2u;D{Tl<ggwVS#03ew-&RL=wPb>+|CSFU>F31j');
define('NONCE_KEY',        'gt=gOkhV}9~y?Z0c|Whe1{R}(w1rNH{dSZ|_-b;pi*fM/?I:H7|G|J@D$ZhHIh[*');
define('AUTH_SALT',        '-&0gbPIa%-8*OBNde`J2Ig$&N+jeR3kd0a`*0d-zgG(q1vF&3#XrH=|up3rx4ZpE');
define('SECURE_AUTH_SALT', 'u$+0`Y:>k??W+9DM^]>3str)`#?{2K&D_e1rmU+w&ix3f(;36tqM.+K|3^G`V%p?');
define('LOGGED_IN_SALT',   '-@I]#n^*-aQpFNBI5Z1$7AiF/Kwoe8]H1;j8L!m=n*W!6dnB|)B<)L2E8S2XuMl2');
define('NONCE_SALT',       ' >#&+_c*ub.%~ h(vG)A/)QyF)wei?BF_p5.2!_jhp!z$1qtS>U1jl+>+h<Rqdx1');

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
