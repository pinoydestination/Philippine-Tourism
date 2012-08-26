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
define('DB_NAME', 'pinoydestination');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`!^7|<Jm!icM+D=]LAzd[LA.{-Rc?D{]ZAf__; y~)MmRHl+j_pHl,%RCfHskc:^');
define('SECURE_AUTH_KEY',  '=I[?9us0V  B+/DAmmEe>dvIMA#Of} q.(^Q^W1UH(P[_z1;2C=gJ@rS!9/JZ{UF');
define('LOGGED_IN_KEY',    '|p%P}4zGf?>z.#Lo1t=[8)yCXReYZ#sav`E]wPiPXGK7C^*Vb2w2u-K4/a%6K]9E');
define('NONCE_KEY',        'Ut]sk:2EO7 ~lip7 hP)3D4;iWXLaW<i$QPd@A7T:ZZ@h7kN<&8AG3F{|5P7>rm2');
define('AUTH_SALT',        '/9i,It8d5mY)zGFuS11HLui9Hn_)C:7#s_v~VHmfz)gP<s3MU_d0.Pa`&&fS}mmk');
define('SECURE_AUTH_SALT', 'tYLJ=?!?&rBR1B_gaRCRdmBnX-<Rw#(sGKZi%f7=kh&{4.qVN{{D)I^?^O]e/D*`');
define('LOGGED_IN_SALT',   'JfurAVMcs]?nEGcF[ 4ww,gG>.-KUo<ksn&Mz?-g1}}vzExjoChKyHO*67L _,@u');
define('NONCE_SALT',       '&]Gtih$@mA<a41z]JuP?NHjK%mIUDz9fblYtGKA,&_24C.VZF/{Sk ixoI;#5{*v');

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


$sql = "SELECT * FROM " . $table_prefix . "options WHERE option_name = 'category_base'";
$resCat = $wpdb->get_row($sql);
$category_base  = $resCat->option_value;
$sql = "SELECT * FROM " . $table_prefix . "options WHERE option_name = 'tag_base'";
$resTag = $wpdb->get_row($sql);
$tag_base  = $resTag->option_value;

DEFINE("CATEGORY_BASE",$category_base);
DEFINE("TAG_BASE", $tag_base);
