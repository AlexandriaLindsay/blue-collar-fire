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
define( 'DB_NAME', 'blue_collar_fire' );

/** Database username */
define( 'DB_USER', 'cal_blue_collar' );

/** Database password */
define( 'DB_PASSWORD', 'OqvhCrSDTDQ@zoe4' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '*/}]Qfa.oRe1K+bJ1=S|Gj>3J@YP~`rtxJXD}>f}18:oR>ykqB3c3#CDR,B`*+rZ');
define('SECURE_AUTH_KEY',  'uG*B2|5.cWM(QdBpj6-7|6(,Q#egU+VQR=@pQ072!-on2$09QfpBT%gBzxT?X>R1');
define('LOGGED_IN_KEY',    '-R$!1f)7W3pMc BPX}O|]U &I|bGS$F2~N)U:`Edkf=4)j1:~D1$DkY Wm8E%?Iv');
define('NONCE_KEY',        'w|a>M#kg)_-Dfzu*F,ulkwBG6Hi]7%DVdW0,:+7.I97fCAdCp|>osFIAIRvQ-bGs');
define('AUTH_SALT',        'j;!!+O0YZ8<#+jj@3D7|>kA*1W}UC1w`}=aY$UEE`gr{a>(-_[)IN$pi@41L4?VD');
define('SECURE_AUTH_SALT', 'CWDH--F,a@LYd/Y~i%NewVqJC8jX<k6o2d&nN25=oOD[]4(2KiWK%`paRJdyS2#x');
define('LOGGED_IN_SALT',   '1%#ec[H<k*z/s-|#5HoW~1%eJSN<#dT7i:];Xe|71B#9uBK2UtdH8Ml[]emeuo|$');
define('NONCE_SALT',       '+|0NN5q.|BR<gZ}mgZYJ6,re7s;jcU;3{ KfS5No%14gX ,&q}=&$^uuWn?#WCX)');

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
$table_prefix = 'blue_collar_';

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
