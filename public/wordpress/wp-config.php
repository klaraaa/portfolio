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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'BB]dSkG_#@@^fcN55C9*kLn<gqA[<uHMl9)w =_[p0J0zkeyMmM-%vJsbDR1-pu@');
define('SECURE_AUTH_KEY',  'qNc0l# ,hbWxVz@,l@]F3g,7 |-3D&fhpr~6_|]$aYh (Wk&Qzz&)b/olxEV@u~-');
define('LOGGED_IN_KEY',    '#.8?Iq~H`W:GQ.<<[u$m#s2Ygl:e4yL-&6hD7xU!s<ee k#{I-a!F95yaM/{>Y6&');
define('NONCE_KEY',        'x8=K1(!(e-Gj3_GeBYi>Ke=0wjkH4];Gr3tf/s=jK{:vIMxT-P`OP{76<y5H5IK|');
define('AUTH_SALT',        'W$LzT#cv@ 6OvqtX-#QnxeAN1M0s+_2N}-e9(0xSqaYT3OG nmm w).=S5jT;8Uz');
define('SECURE_AUTH_SALT', '3~Px:0tbj0~lwtOjdaI,-tq.$f>1x#[Dz|CbZ@c(yB{T:.sf_VL,>7LR]K!M6qE`');
define('LOGGED_IN_SALT',   'P8|;FFY^G-fhRt|?<^/mb<_.z^/2]*cri=NzO)29/SA;a=p((X}tFH+TR!S#BTc6');
define('NONCE_SALT',       'XH:biVpRb*$n/sYuk<(XJ9fvDqP0x`~zzF%-?I~@Lxd[`kO_2*:IW|mH!n;m,g|K');

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
