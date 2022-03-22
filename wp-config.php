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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vr-expert-consumer' );

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
define( 'AUTH_KEY',         'x.$;w596~a&;)M8>|NPY(?7Av><[HSlM_DV&3A)SKkwrSLZLK1(ElY/`|T|q)aK;' );
define( 'SECURE_AUTH_KEY',  '}hFX:@ 40l%2h^9[H0VlS2/LPNS@5t,Bq200~Bw0FZ;hW}+,UY5k9sJ2raAI73}Q' );
define( 'LOGGED_IN_KEY',    ']Vo]R9>~0Lm2tDMiWC~T!b2}wAV#Ti(wJw!P))Q}Gfd#kEA_W)N]A/oisJhs]}0B' );
define( 'NONCE_KEY',        'yYcyC40$l}f9^h!B/?^i3lJ*Ltn#LzbOje-JC/8L{J8s?7+zVlCX,c8s$?yAr)d|' );
define( 'AUTH_SALT',        '85o!wOH+HSF$Q.XRJJdZ(l`A%Fm;Xl64)~ :|^gf;y(zHu7Nm%.:@R7%RZcWIL+C' );
define( 'SECURE_AUTH_SALT', 'BxK-)]t<I!uF)OW{yiD@dQl?KJ:nBbx%{TU=al@PdL-+)Y~1Y[s{Qx4M=I4_u~bZ' );
define( 'LOGGED_IN_SALT',   'K8k?6VcJRlrS7k3;V/@zox}{Lon,?q-jz+<O,!i7H{|};?wn=Ute?Y jViTA*0kC' );
define( 'NONCE_SALT',       'WrWlW5O/~Xe~8u3(x.SsPxX+u6<Uptt,ICv.-v.tA.pZ7c@.t@oCLB nLuY^iftA' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
