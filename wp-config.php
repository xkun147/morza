<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'morza');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define ('WPLANG', 'vi_VN');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'pj1Cl]Z_B*{TP.<~Dt+xF^{{)91v;HHE=1pqNp^0>9+1)&,d%z2L#n2fQ>Jr%m5|');
define('SECURE_AUTH_KEY',  'H7#pKiq$;p9QeJX-flrl-k>BVLHeGkN=:^:}tn~-(7EY&oYsp?)+!e2;jy))C~9#');
define('LOGGED_IN_KEY',    'f;n9huZi|-3G}9(+-Cp7+{Z_2OQtQu|Oi}mDUUNf~+?-z3K+NyDuU1@KI?N5Dbg]');
define('NONCE_KEY',        '4@|7=9hgbu5<$E[4,&*#iqJ1[mWTX`?kJQ2d|Z>UI#&^lXv[fInyrIV=hWg/m+c+');
define('AUTH_SALT',        'OQ2gT3Y7f22+s-G#S,37[bL}1JVZ(uOy--]bIu41<|v-dIYM^F4bXk%Y0}EY){]N');
define('SECURE_AUTH_SALT', 'Y-4pSTjmkVu[ )+(FpP%Akzl3w8ggDvdY_^N3w:@lnm9/kH:-k Dx<aN]G*R1_;#');
define('LOGGED_IN_SALT',   '(f+R~dBG|-l k(?b!=I+1+V&8:FseoQ1:9iNuz|--k;EO Be<A:.C&q,3Vw#[n06');
define('NONCE_SALT',       'HO`S0#PrZFy0u_!0eGw B!bgDr4io,*vhXAC&;;v%h@.#pLw/nsF.YV+lNw#7[77');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'morza_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
