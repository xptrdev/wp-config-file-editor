=== WP Config File Editor ===
Contributors: xpointer
Donate link: http://wp-cfe.xptrdev.com
Tags: wp-config.php, database, secure keys, secure, constants, localization, debugging, cache, memory, debug, Multi sites, mu
Requires at least: 4.0
Tested up to: 4.3
Stable tag: 1.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Modify Wordpress wp-config.php file values using a Simple User Interface Form.

== Description ==

Modify Wordpress database, secure keys, security, ssl, updates, cron, loalization, debugging. memory, multi sites and cache constants values allocated in wp-config.php file using a friendly parameterized form. In additional to update Wordpress
config file it also creates a web form field for every wp-config.php file value, make it very simple to modify values. The plugins is creating wp-config file
identical to the wp-config.php file comes with Wordpress.

The Plugin also provide a method for previewing the newly generated wp-config file content before writing to wp-config.php file. Using this method is enabling two other features,
first is to check the generated wp-config file before updating, second is to provide a custom modification to wp-config.php file.

In additional of direct config file manipulation WCFE Plugin is supporting of creating Profiles/Templates. Profile is a single record, that has name and description, 
where admins can store/save custom config file fields and retrieve them later to be saved to Config File. This is great when you at least to have two basic Profiles 
'Development' and 'Production' where you always need to set value for each of them every time you need to switch between 'Production' and 'Development'.

= Features =
* Modify wp-config.php file parameters/fields using input form
* Raw wp-config.php file editing with syntax hightlights and error detections
* Validating the entered Database parameters by making a connection to the database
* Filtering and validating input fields to avoid breaking wp-config.php file PHP syntax.
* Generate Secure keys by single click
* Update Database parameters
* Change Memory Limits
* Enable / Disable Cache
* Enable / Disable Debugging
* Enable / Disable Multi sites
* Enable / Disable Wordpress Updates including core updates
* Enable / Disable Plugins and Themes Updates
* Enable / Disable Plugins and Themes Files Editor
* Updates Wordpress either through FTP or SSH or Direct
* Enable / Disable Posts revisions with the ability to specify max number of revisions
* Disable / Enable Post Trash with the ability to specify how many days before trash posts will deleted
* Enable / Disable Cron
* Alternate Cron
* Specify Cron Lock Time out to be set between multiple two crons requests
* Automatic Database tables repair
* Force Admin SSL
* Force Login SSL
* Disallow Plugins/Themes from contacting External Urls using Block External with the ability to allow just specified hosts
* Create Emergency Backup just before saving wp-config.php file
* Provide Emergency Restore link from which wp-config.php can be retored in case the site comes down as for invalid inputs
* Only admins can use it when installed in normal installation while only Network Admins can use it under Multi Sites installations
* Name and Describe Config File fields and save them to database to be retrived later to the form
* Unlimited number of Profiles
* Create, Edit, Delete, Load, Unload and Save Profile vars from config file form window.

The following wp-config.php file fields is being supported:

= Maintenance =
* Wordpress Cache (WP_CACHE)
* Memory Limit (WP_MEMORY_LIMIT)
* Max Memory Limit (WP_MAX_MEMORY_LIMIT)

= Security =
* Disable Plugins and Themes Editors (DISALLOW_FILE_EDIT)
* Force SSL Admin (FORCE_SSL_ADMIN)
* Force SSL Login (FORCE_SSL_LOGIN)
* Block External Url (WP_HTTP_BLOCK_EXTERNAL)
* Manage Accessible Hosts (WP_ACCESSIBLE_HOSTS)

= Upgrade =
* Disable Automatic Updates (AUTOMATIC_UPDATER_DISABLED)
* Disable Core Updates (WP_AUTO_UPDATE_CORE)
* Disable Plugins and Themes Install and Updates (DISALLOW_FILE_MODS)
* Updates FS Method (FS_METHOD)
* Updates FTP BASE PATH (FTP_BASE)
* Updates FTP Content Path (FTP_CONTENT_DIR)
* Updates FTP Plugins Path (FTP_PLUGIN_DIR)
* Updates FTP Public Key (FTP_PUBKEY)
* Updates FTP Private Key (FTP_PRIKEY)
* Updates FTP User (FTP_USER)
* Updates FTP Password (FTP_PASS)
* Updates FTP Host (FTP_HOST)
* Updates FTP Force SSL (FTP_SSL)

= Post =
* Post Auto save interval (AUTOSAVE_INTERVAL)
* Empty Trash Days (EMPTY_TRASH_DAYS)
* Disable Post Revisions and Revisions Max Count (WP_POST_REVISIONS)

= Localization =
* Wordpress Language (WPLANG)
* Wordpress Language Directory (WPLANG_DIR)

= Cron =
* Disable Cron (DISABLE_WP_CRON)
* Alternate Cron (ALTERNATE_WP_CRON)
* Cron Lock Timeout (WP_CRON_LOCK_TIMEOUT)

= Multi Sites =
* Confiure Multi Site (WP_ALLOW_MULTISITE)
* Enable Multi Site (MULTISITE)
* Sub Domain / Folder installs (SUBDOMAIN_INSTALL)
* Domain Current Site (DOMAIN_CURRENT_SITE)
* Path (PATH_CURRENT_SITE)
* Blog Id (SITE_ID_CURRENT_SITE)

= Database =
* Database Name (DB_NAME)
* Database Host (DB_HOST)
* Database User (DB_USER)
* Database Password (DB_PASSWORD)
* Database Tables Prefix ($table_prefix)
* Database Charset (DB_CHARSET)
* Database Collation (DB_COLLATE)
* Database Tables Auto Repair (WP_ALLOW_REPAIR)
* Database Don't upgrade Global Tables (DO_NOT_UPGRADE_GLOBAL_TABLES)

= Secure Keys =
* Auth key (AUTH_KEY)
* Secure Auth key (SECURE_AUTH_KEY)
* Logged In Key (LOGGED_IN_KEY)
* Nonce Key (NONCE_KEY)
* Auth Salt (AUTH_SALT)
* Secure Auth Salt (SECURE_AUTH_SALT)
* Logged In Salt (LOGGED_IN_SALT)
* Nonce Salt (NONCE_SALT)

= Debugging =
* Debug Wordpress (WP_DEBUG)
* Debug Display (WP_DEBUG_DISPLAY)
* Debug Log (WP_DEBUG_LOG)
* Script Debugging (SCRIPT_DEBUG)
* Save Database Queries (SAVEQUERIES)
* Concatenate JavaScript (CONCATENATE_SCRIPTS)

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

1. Maintenance Tab
2. Security Tab
3. Upgrade Tab
4. Post Tab
5. Localization Tab
9. Cron Tab
6. Multi Site Tab
7. Database Tab
8. Secure Keys Tab
10. Developer Tab
11. Active profile and Active Profile Menu
12. Profiles List
13. Create Profile
14. Active Tab Fields Help
15. Active Tab Constants list
16. Raw Syntax Highlights and Error detection Editor
17. Update Config File Wanring Dialog
18. Restore Backup Page 

== Upgrade notice ==
* Don't use this Plugin for Wordpress versions before Wordpress version 4.0
* If you've awstats-report-viewer installed please upgrade to version 0.7.1 before updating/installing WCFE 1.1

== Other Notes ==
I really did hard work to create secure restoring Emergency backup feature. I'm recommending to always close Warning Dialog by pressing
Done button as it will delete the Emergency Backup when closing the Dialog. I don't recomend closing it from Top X button until you know what you're doing.

If you cannot fix wp-config.php through FTP so please try to open another window for testing the site while leaving wanring message opened.

== Changelog ==
= 1.2.1 =
* Major security enhancments

= 1.2 =
* Add profiles
* Add Progress and Error messages status bar
* Add Config Form Dashboard Main Menu
* Fix: Secure Key Generator is not working

= 1.1 =
* Add Upgrade Tab
* Add Security Tab
* Add Post Tab
* Add Cron Tab
* Add Developer Concatenate JavaScript Field
* Add Database Automatic Repair and Stop Upgrading Global Tables fields

= 1.0 =
* Use Tabs UI Control for categorizing fields
* Create new fields categorization
* Adding new fields for Multi Sites, Memory Limits, Wordpress cache, Language and more fields for debugging
* Apply new UI colors
* Show warning message when saving wp-config.php
* Create Emergency Backup every time Save Warning message dialog is opened
* Ability to restore wp-config.php file to the state just before saving the file
* Raw wp-config.php Editor with Syntax Highlighters and Syntax Error detections
* Only admins can use it under normal installations while only Network admins can use it under Multi Sites installation
* Complains when submitted Raw EMPTY config file or if it's not start with PHP Tag

= 0.5 =
First release