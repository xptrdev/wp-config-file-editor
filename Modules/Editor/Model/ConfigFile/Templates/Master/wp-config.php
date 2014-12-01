<?php echo "<?php\n"; ?>
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
<?php echo $this->getDatabaseSection()->name(); ?>


/** MySQL database username */
<?php echo $this->getDatabaseSection()->user(); ?>


/** MySQL database password */
<?php echo $this->getDatabaseSection()->password(); ?>


/** MySQL hostname */
<?php echo $this->getDatabaseSection()->host(); ?>


/** Database Charset to use in creating database tables. */
<?php echo $this->getDatabaseSection()->charset(); ?>


/** The Database Collate type. Don't change this if in doubt. */
<?php echo $this->getDatabaseSection()->collate(); ?>


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
<?php echo $this->getSecureKeysSection()->authKey(); ?>

<?php echo $this->getSecureKeysSection()->secureAuthKey(); ?>

<?php echo $this->getSecureKeysSection()->loggedInKey(); ?>

<?php echo $this->getSecureKeysSection()->nonceKey(); ?>

<?php echo $this->getSecureKeysSection()->authSalt(); ?>

<?php echo $this->getSecureKeysSection()->secureAuthSalt(); ?>

<?php echo $this->getSecureKeysSection()->loggedInSalt(); ?>

<?php echo $this->getSecureKeysSection()->nonceSalt(); ?>


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
<?php echo $this->getDatabaseSection()->tablesPrefix(); ?>


/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
<?php echo $this->getExtraSection()->lang(); ?>


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
<?php echo $this->getExtraSection()->debug(); ?>


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
