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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '>!+v+I|;Etb2;HO4T|][B]!Gjowl+2dI=[9)!0tf%|!Af-F5?sY+4Anyzb,D`F}x');
define('SECURE_AUTH_KEY',  'b(|.FCO4{E;}!KNRZF-$m-|+4qcZUO--MRnI`6:1bbr&0[Qp,bqt9,i`4`@}HpeD');
define('LOGGED_IN_KEY',    'uFN(2%Cjmmf6|`-6]T#+VAL$}8>9)$Dv}{BT7w?s;K9PH|nsQi7[F%sA kXz-T}F');
define('NONCE_KEY',        '$gy6gd5+>XE+eusCp{m,W{|,|h7L+~ #7TMIGluhJH7`^E=h8>RUf{f<ZXTlw(^v');
define('AUTH_SALT',        '7a-3>S?#9X_iDW|93)yF`9-R.xswm1[QhfQ|:-Yr/24+1|q7AU`Wi+g~#n)P`LNB');
define('SECURE_AUTH_SALT', '[*_cm|y1:4yQ7^Ys=rko9N*%NlAI6@@Su0N(lcJ0so+d30o|Q[&sro&rWxEw4^UO');
define('LOGGED_IN_SALT',   'c[+Aqu#*qW#:e{j}k$e:7v|`b|BV-o+t=Q-c%jV[{m1wd@DhtyGGXRz|JnGXTLtB');
define('NONCE_SALT',       'fP+S2kqIoLU4t-}G/}f39Jc6x))n|a%VJ|0,$*);=F=<E<ag^iCUB:}&9y8~S]79');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_koalakin_';

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
