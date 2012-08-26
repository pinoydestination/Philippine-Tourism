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
define('DB_NAME', 'cutsandp_destination');

/** MySQL database username */
define('DB_USER', 'cutsandp_dest');

/** MySQL database password */
define('DB_PASSWORD', 'Chamba2012!!!');

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
define('AUTH_KEY',         'D93{DsFq[Y?s/UN*JDyWP,rjG}Ze@hd*X>84CT)1;AZ~.|S(w|ijXa>v[=`E|2Hz');
define('SECURE_AUTH_KEY',  '0T6sIyl}5*c;]kdJ3pbKZ9VpY5/n=RP!?6^(a[KBR]s?c`J$!`P]j0HMh&Bw>y1O');
define('LOGGED_IN_KEY',    'SAH +YI==4}>lUM5D|-z|]%LA Dd#.hWXCCkaZ=9}Y#A7x6pWqalPM$0@RB.:mUT');
define('NONCE_KEY',        ']04,{qX SBvc[_@D<uqF#mw-$]@i4Q+BMS{MBEKk~7@zkAhI>F[}>a+BrR[c7Qt(');
define('AUTH_SALT',        'gYRGoc&5A*N6-[;_4]DvZTRa&XveL)MK01D0%F1U@]2,BEqfQ3IGYi8sY{{ZgV[z');
define('SECURE_AUTH_SALT', '5xEmFnrvW`z%TcY5WTfKDH+te]pO.SquTT_2B#xX$p8Po<I}-aA~BzA;oGtS7>_t');
define('LOGGED_IN_SALT',   '0X:Cj%cb6}Dt7dhR*kH99w&4,jU-cA{i<eLNg+?E_:H?3L5>QV1<^j-[Gtm@+7]+');
define('NONCE_SALT',       'oa+Ao!H1y5qO?UPRfx.Hb~C#HzR8l7Iw:L/X@>,M)zM|NQt(d?n.J$Aq^Gi4~}x>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_destination_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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


$sql = "SELECT option_name, option_value FROM ".$table_prefix."options WHERE option_name='category_base'";
$category_base = $wpdb->get_row($sql);
$category_base = $category_base->option_value;


global $currentIsland;
	
$currentIsland  = "Philippines";

$arrCatCountry = array("Philippines");
$arrCatIsland  = array("Luzon", "Visayas", "Mindanao");
$arrCatType    = array("Hotel", "Beach", "Resort", "Restaurant", "Destination");

$arrCatAll     = array_merge($arrCatCountry, $arrCatIsland, $arrCatType);

