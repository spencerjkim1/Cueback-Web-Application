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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_CuebackWebApplication' );

/** MySQL database username */
define( 'DB_USER', 'wp_CuebackWebApplication' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wp_CuebackWebApplication' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`eQ,BJHfORr+@($W9cww;scbStwZZ@+.KI3aHu:GHqPS.TO3ZkPYBt.={y`}0d/r');
define('SECURE_AUTH_KEY',  'h<0+|=r^rt9[P=)wuR:Nz&|`pT5L_S<THiiz~F<4_mUT b!<Onh@6YBQ_cL_=g?§');
define('LOGGED_IN_KEY',    '@drB+m,xxpA|ou6/U)^SxVdQi}Yy:@N]Ma00Y6Q|ijqW0uU0I(98N:E C=@dbsIY');
define('NONCE_KEY',        '0ak{G!D=gJf6^^7tYZN@GYm?WgK]0=p=)3Ryv7tFBevsA32^-9U_TV?s17R5,E~§');
define('AUTH_SALT',        '(jjbicwNS+M.El§)`HTNHo@:${oT2O}]+kC)oB@9[C&cr5;~E>Sj9|/|<Pvm!ipR');
define('SECURE_AUTH_SALT', '/ut4;nug} cICgdd5N$?Kb>mLs§<H+js@!5<uEp-HTD;p)l~kt7V`%e67i7<G=D-');
define('LOGGED_IN_SALT',   '/fE{:P+n/>§P@EcRYBL;]EW_lV^h/NPV+o+.xY70Ie.R|Rgl!om!6N;s(eKQi6P@');
define('NONCE_SALT',       '<mcV=gx_D8@:_[OSwa: MRrfl$!O}Af]_Ze§Hp6L@}3Eoa@Jz-NU| SlaNm}QyN;');

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
