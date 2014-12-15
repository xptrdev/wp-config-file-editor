=== WP Config File Editor ===
Contributors: xpointer
Donate link: http://wp-wcfe.xptrdev.com
Tags: wp-config.php, database, secure keys, secure, constants, language, debugging
Requires at least: 4.0
Tested up to: 4.1
Stable tag: 0.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Modify Wordpress wp-config.php file values using a Simple User Interface Form.

== Description ==

Modify Wordpress database, secure keys, loalization and debugging constants values allocated in wp-config.php file using a friendly parameterized form. In additional to update Wordpress
config file it also creates a web form field for every wp-config.php file value, make it very simple to modify values. The plugins is creating wp-config file
identical to the wp-config.php file comes with Wordpress.

The Plugin also provide a method for previewing the newaly generated wp-config file content before writing to wp-config.php file. Using this method is enabling two other features,
first is to check the generated wp-config file before updating, second is to provide a custom modification to wp-config.php file.

= Features =
* Modify wp-config.php file parameters/fields using input form
* Modify wp-config.php code manually
* Generate Secure keys by single click
* Update Database parameters
* Validating the entered Database parameters by making a connection to the database, don't save if unable to connect
* Filtering the input data to avoid breaking wp-config.php file PHP syntax.

The following wp-config.php file fields is being supported:

= Database =
* Database Name (DB_NAME)
* Database Host (DB_HOST)
* Database User (DB_USER)
* Database Password (DB_PASSWORD)
* Database Tables Prefix ($table_prefix)
* Database Charset (DB_CHARSET)
* Database Collation (DB_COLLATE)

= Secure Keys =
* Auth key (AUTH_KEY)
* Secure Auth key (SECURE_AUTH_KEY)
* Logged In Key (LOGGED_IN_KEY)
* Nonce Key (NONCE_KEY)
* Auth Salt (AUTH_SALT)
* Secure Auth Salt (SECURE_AUTH_SALT)
* Logged In Salt (LOGGED_IN_SALT)
* Nonce Salt (NONCE_SALT)

= Localization =
* Wordpress Language (WPLANG)

= Debugging =
* Debug Wordpress (WP_DEBUG)

== Installation ==

1. Upload `wp-config-file-editor.zip` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Requirements ==
* PHP >= 5.3

== Frequently Asked Questions ==

= What this Plugin is used for? =

Use this Plugin to modify Wordpress constants values. Those are reached only via FTP

= Is updating wp-config file might break down my site? =

Yes, if any invalid value added to the wp-config.php file. You will then need to connect to your server via FTP and revert back those changes.

== Screenshots ==

1. Edit Config File Form Fields part 1
2. Edit Config File Form Fields part 2
3. Config File Preview form

== Upgrade notice ==
* Don't use this Plugin for Wordpress versions before Wordpress version 4.0

== Changelog ==

= 0.5 =
First release