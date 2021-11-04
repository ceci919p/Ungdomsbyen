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
define( 'DB_NAME', 'ceciliejasmin_dk' );

/** MySQL database username */
define( 'DB_USER', 'ceciliejasmin_dk' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Cocasille2102' );

/** MySQL hostname */
define( 'DB_HOST', 'ceciliejasmin.dk.mysql' );

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
define( 'AUTH_KEY',         'aC$nd pK- :5WD^Uy<{#^lAW$%37A9sc~RwS#hvv8ZQ/cTR>(Ld$Ze,M&f3?Uc^J' );
define( 'SECURE_AUTH_KEY',  'YZ1peP}O&7l(?%iE<imRPWfi[cPsQYZbY*3 ~wA&ON5D!5wW#^:XsG1YUGz[rcL6' );
define( 'LOGGED_IN_KEY',    '}VoX$i_{T{o3@V#81D?z^Zlkrnu1F;:@xdon[u.l]V<Ry<MQ,gInBazjT<6OtlAs' );
define( 'NONCE_KEY',        'NTE .|!m_CKLWK@DKek8<i/g98PyE!!LqG.H;0K|YBo_RSX/rjc!L~2CU4^B47>U' );
define( 'AUTH_SALT',        'u,U@7UfSANHJc>ojq@Y.r*UG__ppR]$lQ^VEA$q2g%pgB/^{Nn {rgSfnN^Te948' );
define( 'SECURE_AUTH_SALT', 'fJCTU(`d~&{d<DaJLQ6Mx|(s QcroY=luv:lk=HE5hW}^U)Ity{VID_X}kqk[B=r' );
define( 'LOGGED_IN_SALT',   '_Q?nRj7(#Py`Qvy^2MNiK~nGn3PjZxCrHY^BFt;lgZ^U =Q;>YKA~D-50o;O<^Hv' );
define( 'NONCE_SALT',       'bgW6 @<r]SeSnT/WK!E$-$zZN iv{V2w^wFa-%~gEnG8i)/j^3}Lig-p+Sbueqrb' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ungdomsbyen_wp_';

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
