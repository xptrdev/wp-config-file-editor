=== WP Config File Editor ===
Contributors: xpointer
Donate link: http://www.cbspoint.com/plugins/wp-config-file-editor/
Tags: system, admin, administration, ajax, authentication, dashboard, edit, wordpress, plugin, wp-config.php, configuration, config, settings, constants, parameters, defines, memory, database, security, upgrade, update, ftp, post, localization, lanaguage, cron, multi sites, ms, mu, database, authentication, salts, debugging, development, proxy, cookies, http requests
Requires at least: 4.0
Tested up to: 4.8.2
Stable tag: 1.6.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Modify Wordpress wp-config.php file values using a Simple Form. Additionally, it now support modifying wide System parameters

== Description ==

Modify Wordpress Memory, Cache, Upgrade, Post, Localization, Cron, Multi Sites, Database, Secure Keys, Debugging, Proxy and Cookies constants values allocated in wp-config.php file using web form or even through Raw Editor.
Preview generated wp-config file into Syntax Hightlights and Error detection PHP Code Editor, before writing to wp-config.php. 
In additional to modifying Config File parameters using web form, its also possible to preview generated wp-config file before saving, review and makes updates before saving.
WCFE Plugin start to include few helpers tools related to wp-config.php file editing like Setup Multi Sites. Setup Multi Site Wizard feature
is newly added to make setup Multi Sites more fun by passing only 2 steps without any tecnhiqual works.

Additionally its possible to modify wide system parameters, Image Quality, Upload allowed mime types, Query Vars, HTTP Client, Post Editor and Kses module. More parameters will be added later!!!

For features updates, suggest features and detected bugs please [follow on twitter](https://twitter.com/wpcfe)

This Plugin is prepared for localization through translate.wordpress.org

if you've any issue, please always use Wordpress Support Forum as I always checking it

= wp-config.php Editor Features =
* Modify wp-config.php file using web form
* Raw wp-config.php file editor with syntax hightlights and error detections
* Emergency wp-config.php backup restore.
* Send Restore Link to User Email
* Multi Sites Setup Wizard
* Increase Memory size limits
* Configure Multi sites
* Configure Post
* Configure localization/lanaguage
* Configure Wordpress security
* Configure Wordpress proxy 
* Configure Wordpress Database access parameters
* Configure Wordpress Database repair
* Configure Wordpress updates
* Configure Cron
* Configure debugging
* Configure Secure keys
* Only super admins (Multi Sites Network admin OR Normal installation admins) can interact with all WCFE Plugin actions/pages
* Validating the entered Database parameters by making database connection test
* Filtering and validating input fields to avoid breaking wp-config.php file
* View System Paths and Urls while changing config form values
* Path look up for all Path fields
* View constants list associated for each field
* View help list for each field
* Save config fields into Profile, delegate it when needed so it can be saved into wp-config.php
* Renew all secure keys by single click
* Renew cookie names constants by single click
* Check system requirements
* Turn ON/OFF write permissions for wp-config.php and .htaccess files
* Delete emergency backup

In additional to edit wp-config.php file WCF Plugin start to allow of changing Wordpress/System parameters.

= System Parameters features =
* Configure Wordpress HTTP client used to contact external servers (Plugins updates, Feeds, etc...)
* Configure Kses module (Define HTML Tags and entities list for posts and comments)
* Configure TinyMCE Editor (Change Size, Style, Enable/Disable Plugins, Hide/Show buttons)

wp-config.php suported fields:

= Maintenance =
* Wordpress Cache (WP_CACHE)
* Memory Limit (WP_MEMORY_LIMIT)
* Max Memory Limit (WP_MAX_MEMORY_LIMIT)

= Security =
* Disable Plugins and Themes Editors (DISALLOW_FILE_EDIT)
* Force SSL Admin (FORCE_SSL_ADMIN)
* Force SSL Login (FORCE_SSL_LOGIN)
* Disallow Unfiltered HTML (DISALLOW_UNFILTERED_HTML)
* Allow Unfiltered uploads (ALLOW_UNFILTERED_UPLOADS)
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
* Primary Network Id (PRIMARY_NETWORK_ID)

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

= Proxy =
* Host (WP_PROXY_HOST)
* Port (WP_PROXY_PORT)
* User (WP_PROXY_USERNAME)
* Password (WP_PROXY_PASSWORD)
* Bypass list (WP_PROXY_BYPASS_HOSTS)

= Cookies =
* Hash (COOKIEHASH)
* User (USER_COOKIE)
* Password (PASS_COOKIE)
* Authentication (AUTH_COOKIE)
* Secure Authentication (SECURE_AUTH_COOKIE)
* Logged In (LOGGED_IN_COOKIE)
* Test (TEST_COOKIE)
* Path (COOKIEPATH)
* Site Path (SITECOOKIEPATH)
* Admin Path (ADMIN_COOKIE_PATH)
* Plugins Path (PLUGINS_COOKIE_PATH)
* Domain (COOKIE_DOMAIN)

System Parameters supported fields

= Misc =
* Enable/Disable single query var
* Persistly Cache Themes
* Manage Upload Allowed Mime Types with associated extensions
* Image Quality
* Image Manipulation memory limit

= HTTP Request =
* Request Time Out
* Redirect Count
* Header HTTP Version
* User Agent
* Reject Unsafe URLs
* Stream
* Blocking
* Compress
* Decompress
* Response Size Limit
* Allow Local host
* Proxy Block Local Requests
* Local SSL Verify
* SSL Verify
* Steam Transport
* Curl Transport

= Editor =
* Enable / Disable Auto Paragraph
* Change Height
* Show / Hide Media Button
* HTML Textarea rows count
* Editor Tab Index
* Editor CSS style
* Edit CSS class
* Enable / Disable Teeny
* Enable / Disable TinyMCE
* Enable / Disable Quick Tags + Managing quick tags buttons
* Enable / Disable Built=in Plugins
* Show / Hide Second Row buttons

= Kses =
* Enable / Disabled allowed protocols
* Manage Post Allowed HTML tags and attributes
* Manage Comment Allowed HTML tags and attributes
* Manage Allowed HTML Entities

= Free Plugins =
* Turns Wordpress Shortcode into clickable element: [Visual Shortcode Plugin](https://wordpress.org/plugins/cb-visual-shortcode/)

== Installation ==

1. Upload `wp-config-file-editor.zip` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Requirements ==
* PHP >= 5.3

== Frequently Asked Questions ==

= What this Plugin is used for? =

Use this Plugin to modify Wordpress constants values. Those are reached only via FTP. It also allow controlling Wordpress
behavior by changing System Parameters

= Is updating wp-config file might break down my site? =

Yes, if any invalid value added to the wp-config.php file. You will then need to connect to your server via FTP and revert back those changes.

== Screenshots ==

1. Config File Maintenance parameters
2. Config File Security parameters
3. Config File Upgrade parameters
4. Config File Post parameters
5. Config File Localization parameters
6. Config File Cron parameters
7. Config File Multi Sites parameters
8. Config File Database parameters
9. Config File Secure Key parameters
10. Config File Developer parameters
11. Config File Proxy parameters
12. Config File Cookies parameters
13. Config File Syntax Highlights and error detection raw editor
14. Fields help text
15. Fields constants map
16. System paths and Urls info
17. Create new profile
18. Profiles list
19. System Check Tools ( BETA )
20. Multi Sites Setup Wizard ( BETA )
21. Multi Sites Setup Wizard config helper screen
22. Save Config File warning dialog
23. Restore backup page
24. Path lookup
25. System Parameters: Misc Tab
26. System Parameters: HTTP Request Tab
27. System Parameters: Editor Tab
28. System Parameters: Kses Tab

== Upgrade notice ==
* Don't use this Plugin for Wordpress < 4.0

== Other Notes ==
I really did hard work to create secure restoring Emergency backup feature. I'm recommending to always close Warning Dialog by pressing
Done button as it will delete the Emergency Backup when closing the Dialog. I don't recomend closing it from Top X button until you know what you're doing.

If you cannot fix wp-config.php through FTP so please try to open another window for testing the site while leaving wanring message opened.

== Changelog ==

= 1.6.7 =
* Maintain Wordpress compatibility
* Set Help Menu website links to cbspoint.com
* Fix: Could not install Plugin from Wordpress repository

= 1.6.6 =
* Enhancement: Work in wide range of Server and PHP configurations
* Enhancement: Allow Emrgency Backup to be alive for 3 days

= 1.6.5 =
* Fix: PHP Strict Errors (PHP 7 Compatibility)

= 1.6.4 =
* Enhance: Don't automatically delete emergency backup
* Add: Send Emergency Backup Restore Link to User Email

= 1.6.3 =
* Fix: BLOG_ID_CURRENT_SITE break wp-config when its not set
* Fix: SITE_ID_CURRENT_SITE break wp-config when its not set
* Fix: PHP warnings in Network Multisite setup page as text domain localization extension is not loaded

= 1.6.2 =
* Enhance: Prepare Plugin to be localized over translate.wordpress.org

= 1.6.1 =
* Wordpress 4.6 compatibility check

= 1.6 =
* Fix: Multisite Wordpress 4.0 - 4.3 incomatibility
* Fix: Missing Database Collations
* Fix: Missing Database Character Sets
* Add: Raw Editor
* Add: Localization support only English Pack Bundled

= 1.5.2 =
* Fix: Forcing HTTP Requests System Parameters brokes Wordpress Plugins Upgrade
* Disable all System Parameters By default until enabled by site admin

= 1.5.1 =
* Fix: System Parameters Form save "Access Denied" error
* Fix: System Parameters Post and Comment Tags attributes disallowed while its added to the form

= 1.5 =
* Fix: Multi Sites Wizard .htaccess code escaped by Magic Quote
* Add: System Parameters Misc Tab
* Add: System Parameters Editor Tab
* Add: System Parameters Kses Tab
* Add: System Parameters HTTP Stream, Blocking, Compress, Decompress, Response Size Limit and Allow local host fields

= 1.4.1 =
* Fix: Could not connect to Database error when using Database port

= 1.4 =
* UI use Wordpress colors and feel
* Add System Parameters Page (HTTP Request Parameters)
* Rename Dashboard Menu title to WPCF Editor

= 1.3 =
* Use smaller fonts for Config Form Tabs
* Responsive User interface
* Add System Paths Info screen (Discover Wordpress instalations path, plugins path, etc...) while modifying config file
* System Check Tools Screen [ BETA ] (Turn ON/OFF write permissions wp-config.php and .htaccess file, delete emregency backup )
* Setup Multi site wizard screen [ BETA ] (Take you through two steps to setup multi site without any manual work)
* Add Cookies Tab ( Cookie Hash, Cookie Auth, Cookie Secure Auth, Cookie Admin, etc... )
* Add Proxy Tab (HOST, User, Password, Bypass list, port)
* Add Multi Site Primary Network field
* Fix wp-config file string values is not auto escaping backslash character
* Add Path Look up (Path look when typing into any path specific input field)
* Add Generate Cookies Hash (Generate Cookies names with single click)
* Add Generage all secure keys (Renew all secure fields by single click)
* Remove secure keys tab generate links and add one link to M<ain Menu
* Aggregate all help menu items under Help Menu
* Aggregate all tools items under Tools menu
* Add Security TAB ( Allow Unfiltered Uploads ) and ( Disallow Unfiltered HTML ) field

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