<?php
/**
* 
*/

namespace WCFE\Modules\Editor\View\Editor;

use WCFE\Modules\Editor\Lib\FieldsFactoryBase;
use WCFE\Modules\Editor\View\Editor\Fields;
use WCFE\Modules\Editor\ConfigFileFieldsNameMap;
use WPPFW\Forms;

defined('ABSPATH') or die(-1);

/**
* 
*/
class RendererFieldsFactory
extends FieldsFactoryBase
{
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    private $fieldsData = array();

    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $form;
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    private $plugin;
    
    /**
    * put your comment there...
    * 
    * @param Forms\Form $this->form
    * @return {RendererFieldsFactory|Forms\Form}
    */
    public function __construct(Forms\Form & $form)
    {
        
        $this->form =& $form;
        
        $this->l10n =& \WCFE\Plugin::me()->getExtension('l10n');
        
        $this->_fieldsData();
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function _fieldsData()
    {
        // Secure keys
        $this->fieldsData[ConfigFileFieldsNameMap::AUTH_KEY] = array
        (
            'title' => $this->l10n->_( 'Authentication' ), 
            'tip' => $this->l10n->_( 'Wordpress Hash key for AUTH_KEY constant' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::SECURE_AUTH_KEY] = array
        (
            'title' => $this->l10n->_( 'Secure Authentication key' ), 
            'tip' => $this->l10n->_( 'Wordpress Hash key for SECURE_AUTH_KEY constant' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::LOGGED_IN_KEY] = array
        (
            'title' => $this->l10n->_( 'Logged In key' ), 
            'tip' => $this->l10n->_( 'Wordpress Hash key for LOGGED_IN_KEY constant' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::NONCE_SALT] = array
        (
            'title' => $this->l10n->_( 'Nonce salt' ), 
            'tip' => $this->l10n->_( 'Wordpress Hash key for NONCE_SALT constant' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::AUTH_SALT] = array
        (
            'title' => $this->l10n->_( 'Authentication Salt' ), 
            'tip' => $this->l10n->_( 'Wordpress Hash key for AUTH_SALT constant' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::SECURE_AUTH_SALT] = array
        (
            'title' => $this->l10n->_( 'Secure Authentication Salt' ), 
            'tip' => $this->l10n->_( 'Wordpress Hash key for SECURE_AUTH_SALT constant' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::LOGGED_IN_SALT] = array
        (
            'title' => $this->l10n->_( 'Logged In Salt' ), 
            'tip' => $this->l10n->_( 'Wordpress Hash key for LOGGED_IN_SALT constant' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::NONCE_KEY] = array
        (
            'title' => $this->l10n->_( 'Nonce key' ), 
            'tip' => $this->l10n->_( 'Wordpress Hash key for NONCE_KEY constant' ),
        );

        // cookies
        $this->fieldsData[ConfigFileFieldsNameMap::ADMIN_COOKIE_PATH] = array
        (
            'title' => $this->l10n->_( 'Admin path' ), 
            'tip' => $this->l10n->_( 'Admin path cookie name' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::AUTH_COOKIE] = array
        (
            'title' => $this->l10n->_( 'Auth' ), 
            'tip' => $this->l10n->_( 'Auth cookie name' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::COOKIE_DOMAIN] = array
        (
            'title' => $this->l10n->_( 'Domain' ), 
            'tip' => $this->l10n->_( 'Cookie domain' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::COOKIEHASH] = array
        (
            'title' => $this->l10n->_( 'Hash' ), 
            'tip' => $this->l10n->_( 'Hash Cookie' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::LOGGED_IN_COOKIE] = array
        (
            'title' => $this->l10n->_( 'Logged In' ), 
            'tip' => $this->l10n->_( 'Logged In Cookie' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::PASS_COOKIE] = array
        (
            'title' => $this->l10n->_( 'Pass' ), 
            'tip' => $this->l10n->_( 'Pass Cookie' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::COOKIEPATH] = array
        (
            'title' => $this->l10n->_( 'Path' ), 
            'tip' => $this->l10n->_( 'Path Cookie' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::PLUGINS_COOKIE_PATH] = array
        (
            'title' => $this->l10n->_( 'Plugins Path' ), 
            'tip' => $this->l10n->_( 'Plugins Path Cookie' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::SECURE_AUTH_COOKIE] = array
        (
            'title' => $this->l10n->_( 'Secure Auth' ), 
            'tip' => $this->l10n->_( 'Secure Auth cookie' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::SITECOOKIEPATH] = array
        (
            'title' => $this->l10n->_( 'Site Path' ), 
            'tip' => $this->l10n->_( 'Site path cookie' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::TEST_COOKIE] = array
        (
            'title' => $this->l10n->_( 'Test' ), 
            'tip' => $this->l10n->_( 'Test Cookie' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::USER_COOKIE] = array
        (
            'title' => $this->l10n->_( 'User' ),
            'tip' => $this->l10n->_( 'User Cookie' ),
        );
        
        // Cron
        $this->fieldsData[ConfigFileFieldsNameMap::DISABLE_WP_CRON] = array
        (
            'title' => $this->l10n->_( 'Disable Cron' ), 
            'tip' => $this->l10n->_( 'Disable the cron entirely' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::ALTERNATE_WP_CRON] = array
        (
            'title' => $this->l10n->_( 'Alternate Cron' ), 
            'tip' => $this->l10n->_( 'Use this, for example, if scheduled posts are not getting published. According to Otto\'s forum explanation, "this alternate method uses a redirection approach, which makes the users browser get a redirect when the cron needs to run, so that they come back to the site immediately while cron continues to run in the connection they just dropped. This method is a bit iffy sometimes, which is why it\'s not the default.' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT] = array
        (
            'title' => $this->l10n->_( 'Cron Lock Timeout' ), 
            'tip' => $this->l10n->_( 'Make sure a cron process cannot run more than once every XXXX seconds.' ),
        );
        
        // Database
        $this->fieldsData[ConfigFileFieldsNameMap::DB_HOST] = array
        (
            'title' => $this->l10n->_( 'Host' ), 
            'tip' => $this->l10n->_( 'The address in which the Database is located. This can either be an IP or Domain name. In most cases its \'localhost\'' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::DB_PORT] = array
        (
            'title' => $this->l10n->_( 'Port' ), 
            'tip' => $this->l10n->_( 'Alternate Database host port' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::DB_USER] = array
        (
            'title' => $this->l10n->_( 'User Name' ), 
            'tip' => $this->l10n->_( 'User name to be used for connecting to Database' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::DB_PASSWORD] = array
        (
            'title' => $this->l10n->_( 'Password' ), 
            'tip' => $this->l10n->_( 'Database user password for authenticating the connection between Wordpress and Database' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::DB_NAME] = array
        (
            'title' => $this->l10n->_( 'Database Name' ), 
            'tip' => $this->l10n->_( 'Database name to used for Wordpress installation, All posts/pages/categories and all the data will be stored there' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::DB_CHARSET] = array
        (
            'title' => $this->l10n->_( 'Database Characters Set' ), 
            'tip' => $this->l10n->_( 'Was made available to allow designation of the database character set (e.g. tis620 for TIS620 Thai) to be used when defining the MySQL database tables.' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::DB_COLLATE] = array
        (
            'title' => $this->l10n->_( 'Database Collation' ), 
            'tip' => $this->l10n->_( 'As of WordPress Version 2.2, DB_COLLATE was made available to allow designation of the database collation (i.e. the sort order of the character set). In most cases, this value should be left blank (null) so the database collation will be automatically assigned by MySQL based on the database character set specified by Character Set' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::DB_TABLE_PREFIX] = array
        (
            'title' => $this->l10n->_( 'Table Prefix' ), 
            'tip' => $this->l10n->_( 'The value placed in the front of your database tables. Change the value if you want to use something other than wp_ for your database prefix. Typically this is changed if you are installing multiple WordPress blogs in the same database.' ),
        );                        
        $this->fieldsData[ConfigFileFieldsNameMap::WP_ALLOW_REPAIR] = array
        (
            'title' => $this->l10n->_( 'Automatic Repair' ), 
            'tip' => $this->l10n->_( 'Added with Version 2.9, there is automatic database optimization support, which you can enable by adding the following define to your wp-config.php file only when the feature is required. Please Note: That this define enables the functionality, The user does not need to be logged in to access this functionality when this define is set. This is because its main intent is to repair a corrupted database, Users can often not login when the database is corrupt.' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES] = array
        (
            'title' => $this->l10n->_( 'Stop Upgrading Global Tables' ), 
            'tip' => $this->l10n->_( 'A DO_NOT_UPGRADE_GLOBAL_TABLES define prevents dbDelta() and the upgrade functions from doing expensive queries against global tables. Sites that have large global tables (particularly users and usermeta), as well as sites that share user tables with bbPress and other WordPress installs, can prevent the upgrade from changing those tables during upgrade by defining DO_NOT_UPGRADE_GLOBAL_TABLES. Since an ALTER, or an unbounded DELETE or UPDATE, can take a long time to complete, large sites usually want to avoid these being run as part of the upgrade so they can handle it themselves. Further, if installations are sharing user tables between multiple bbPress and WordPress installs it maybe necessary to want one site to be the upgrade master.' ),
        );

        // Debugging
        $this->fieldsData[ConfigFileFieldsNameMap::WP_DEBUG] = array
        (
            'title' => $this->l10n->_( 'Debug Mode' ), 
            'tip' => $this->l10n->_( 'Added in WordPress Version 2.3.1, controls the reporting of some errors and warnings' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY] = array
        (
            'title' => $this->l10n->_( 'Debug Display' ), 
            'tip' => $this->l10n->_( 'Another companion to Debug Mode field that controls whether debug messages are shown inside the HTML of pages or not. The default is ON which shows errors and warnings as they are generated. Setting this to false will hide all errors. This should be used in conjunction with Debug Log so that errors can be reviewed later.' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_DEBUG_LOG] = array
        (
            'title' => $this->l10n->_( 'Debug Log' ), 
            'tip' => $this->l10n->_( 'Companion to Debug Mode field that causes all errors to also be saved to a debug.log log file inside the /wp-content/ directory. This is useful if you want to review all notices later or need to view notices generated off-screen (e.g. during an AJAX request or wp-cron run). Note that this allows you to write to /wp-content/debug.log using PHP\'s built in error_log() function, which can be useful for instance when debugging AJAX events.' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::SCRIPT_DEBUG] = array
        (
            'title' => $this->l10n->_( 'Script Debugging' ), 
            'tip' => $this->l10n->_( 'Force WordPress to use the "dev" versions of core CSS and Javascript files rather than the minified versions that are normally loaded. This is useful when you are testing modifications to any built-in .js or .css files. Default is false.' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS] = array
        (
            'title' => $this->l10n->_( 'Concatenate JavaScript' ), 
            'tip' => $this->l10n->_( 'To result in a faster administration area, all Javascript files are concatenated into one URL. If Javascript is failing to work in your administration area, you can try disabling this feature:' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::SAVEQUERIES] = array
        (
            'title' => $this->l10n->_( 'Save Queries' ), 
            'tip' => $this->l10n->_( 'Saves the database queries to an array and that array can be displayed to help analyze those queries. When set to ON causes each query to be saved, how long that query took to execute, and what function called it.' ),
        );

        // Localization
        $this->fieldsData[ConfigFileFieldsNameMap::WPLANG] = array
        (
            'title' => $this->l10n->_( 'Language' ), 
            'tip' => $this->l10n->_( 'Defines the name of the language translation (.mo) file.' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WPLANG_DIR] = array
        (
            'title' => $this->l10n->_( 'Language Directory' ), 
            'tip' => $this->l10n->_( 'Defines what directory the Language .mo file resides. If Language Directory is not defined WordPress looks first to wp-content/languages and then wp-includes/languages for the .mo defined by Language file.' ),
        );
        
        // Maintenance
        $this->fieldsData[ConfigFileFieldsNameMap::WP_CACHE] = array
        (
            'title' => $this->l10n->_( 'Enable Cache' ), 
            'tip' => $this->l10n->_( 'If true, includes the wp-content/advanced-cache.php script, when executing wp-settings.php.' ),
        );        
        $this->fieldsData[ConfigFileFieldsNameMap::WP_MEMORY_LIMIT] = array
        (
            'title' => $this->l10n->_( 'Memory limit' ), 
            'tip' => $this->l10n->_( 'Allows you to specify the maximum amount of memory that can be consumed by PHP. This setting may be necessary in the event you receive a message such as "Allowed memory size of xxxxxx bytes exhausted".' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT] = array
        (
            'title' => $this->l10n->_( 'Max Memory limit' ), 
            'tip' => $this->l10n->_( 'When in the administration area, the memory can be increased or decreased from the Memory Limit by defining Max Memory Limit.' ),
        );

        // Multi site
        $this->fieldsData[ConfigFileFieldsNameMap::MULTISITE] = array
        (
            'title' => $this->l10n->_( 'Setup Multi Site installation' ), 
            'tip' => $this->l10n->_( 'is a feature introduced in WordPress Version 3.0 to enable multisite functionality previously achieved through WordPress MU. If this setting is absent from wp-config.php it defaults to false.' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE] = array
        (
            'title' => $this->l10n->_( 'Enable Multi Site' ), 
            'tip' => $this->l10n->_( 'Multi site feature is enabled on current Wordpress installation' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL] = array
        (
            'title' => $this->l10n->_( 'Enable Sub Domains' ), 
            'tip' => $this->l10n->_( 'Use sub domains for network sites' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE] = array
        (
            'title' => $this->l10n->_( 'Domain' ), 
            'tip' => $this->l10n->_( 'Root domain for multi site installations' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::PATH_CURRENT_SITE] = array
        (
            'title' => $this->l10n->_( 'Root path' ), 
            'tip' => $this->l10n->_( 'Root path for multi site installations' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE] = array
        (
            'title' => $this->l10n->_( 'Site Id' ), 
            'tip' => $this->l10n->_( 'Current Site Id' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE] = array
        (
            'title' => $this->l10n->_( 'Current Blog Id' ), 
            'tip' => $this->l10n->_( 'Current Blog Id' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID] = array
        (
            'title' => $this->l10n->_( 'Primary Network Id' ), 
            'tip' => $this->l10n->_( 'Primary Network Id' ),
        );

        // Post
        $this->fieldsData[ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL] = array
        (
            'title' => $this->l10n->_( 'Autosave Interval' ), 
            'tip' => $this->l10n->_( 'When editing a post, WordPress uses Ajax to auto-save revisions to the post as you edit. You may want to increase this setting for longer delays in between auto-saves, or decrease the setting to make sure you never lose changes. The default is 60 seconds' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS] = array
        (
            'title' => $this->l10n->_( 'Empty Trash (Days)' ), 
            'tip' => $this->l10n->_( 'Added with Version 2.9, this constant controls the number of days before WordPress permanently deletes posts, pages, attachments, and comments, from the trash bin. The default is 30 days.  disable trash set the number of days to zero. Note that WordPress will not ask for confirmation when someone clicks on "Delete Permanently' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS] = array
        (
            'title' => $this->l10n->_( 'Enable Revisions' ), 
            'tip' => $this->l10n->_( 'Enable / Disable post revisions' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_POST_REVISIONS] = array
        (
            'title' => $this->l10n->_( 'Max Revisions Count' ), 
            'tip' => $this->l10n->_( 'Maximum number of revisions per post or page can be specified.' ),
        );

        // Proxy
        $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_HOST] = array
        (
            'title' => $this->l10n->_( 'Host' ), 
            'tip' => $this->l10n->_( 'Enable proxy support and host for connecting' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_PORT] = array
        (
            'title' => $this->l10n->_( 'Port' ), 
            'tip' => $this->l10n->_( 'Proxy port for connection. No default, must be defined' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_USERNAME] = array
        (
            'title' => $this->l10n->_( 'User' ), 
            'tip' => $this->l10n->_( 'Proxy username, if it requires authentication' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_PASSWORD] = array
        (
            'title' => $this->l10n->_( 'Password' ), 
            'tip' => $this->l10n->_( 'Proxy password, if it requires authentication' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS] = array
        (
            'title' => $this->l10n->_( 'Bypass Hosts' ), 
            'tip' => $this->l10n->_( 'Will prevent the hosts in this list from going through the proxy' ),
        );

        // Security
        $this->fieldsData[ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT] = array
        (
            'title' => $this->l10n->_( 'Disable Plugin &amp; Theme Editor' ), 
            'tip' => $this->l10n->_( 'Occasionally you may wish to disable the plugin or theme editor to prevent overzealous users from being able to edit sensitive files and potentially crash the site. Disabling these also provides an additional layer of security if a hacker gains access to a well-privileged user account.<strong>Please note: the functionality of some plugins may be affected by the use of current_user_can(\'edit_plugins\') in their code. Plugin authors should avoid checking for this capability, or at least check if this constant is set and display an appropriate error message. Be aware that if a plugin is not working this may be the cause.<strong>' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::FORCE_SSL_ADMIN] = array
        (
            'title' => $this->l10n->_( 'Force SSL Admin' ), 
            'tip' => $this->l10n->_( 'when you want to secure logins and the admin area so that both passwords and cookies are never sent in the clear. This is the most secure option.' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::FORCE_SSL_LOGIN] = array
        (
            'title' => $this->l10n->_( 'Force SSL Login' ), 
            'tip' => $this->l10n->_( 'when you want to secure logins so that passwords are not sent in the clear, but you still want to allow non-SSL admin sessions (since SSL can be slow).' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML] = array
        (
            'title' => $this->l10n->_( 'Disallow Unfiltered HTML' ), 
            'tip' => $this->l10n->_( 'Disallow unfiltered HTML for everyone, including administrators and super administrators. To disallow unfiltered HTML for all users, you can add this to wp-config.php:' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS] = array
        (
            'title' => $this->l10n->_( 'Allow Unfiltered Uploads' ), 
            'tip' => $this->l10n->_( 'Allow unfilered Uploads' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL] = array
        (
            'title' => $this->l10n->_( 'Block External Url' ), 
            'tip' => $this->l10n->_( 'Block external URL requests by defining WP_HTTP_BLOCK_EXTERNAL as true and this will only allow localhost and your blog to make requests' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS] = array
        (
            'title' => $this->l10n->_( 'Accessible Hosts List' ), 
            'tip' => $this->l10n->_( 'Write host you would like to allow in the input field and preess Enter. The constant WP_ACCESSIBLE_HOSTS will allow additional hosts to go through for requests. The format of the WP_ACCESSIBLE_HOSTS constant is a comma separated list of hostnames to allow, wildcard domains are supported, eg *.wordpress.org will allow for all subdomains of wordpress.org to be contacted.' ),
        );

        // Upgrade
        $this->fieldsData[ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED] = array
        (
            'title' => $this->l10n->_( 'Disable Automatic Update' ), 
            'tip' => $this->l10n->_( 'Disable all automatic updates' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE] = array
        (
            'title' => $this->l10n->_( 'Core' ), 
            'tip' => $this->l10n->_( 'The easiest way to manipulate core updates is with the WP_AUTO_UPDATE_CORE constant' ),
        );

        $this->fieldsData[ConfigFileFieldsNameMap::DISALLOW_FILE_MODS] = array
        (
            'title' => $this->l10n->_( 'Disable Plugins and Themes' ), 
            'tip' => $this->l10n->_( 'This will block users being able to use the plugin and theme installation/update functionality from the WordPress admin area. Setting this constant also disables the Plugin and Theme editor (i.e. you don\'t need to set DISALLOW_FILE_MODS and DISALLOW_FILE_EDIT, as on its own DISALLOW_FILE_MODS will have the same effect).' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::FS_METHOD] = array
        (
            'title' => $this->l10n->_( 'File System Method' ), 
            'tip' => $this->l10n->_( 'forces the filesystem method. It should only be "direct", "ssh2", "ftpext", or "ftpsockets". Generally, you should only change this if you are experiencing update problems. If you change it and it doesn\'t help, change it back/remove it. Under most circumstances, setting it to \'ftpsockets\' will work if the automatically chosen method does not.<br><br>(Primary Preference) "direct" forces it to use Direct File I/O requests from within PHP, this is fraught with opening up security issues on poorly configured hosts, This is chosen automatically when appropriate
                        <br><br><strong>
                        (Secondary Preference) "ssh2" is to force the usage of the SSH PHP Extension if installed</strong>
                        <br><br><strong>
                        (3rd Preference) "ftpext" is to force the usage of the FTP PHP Extension for FTP Access, and finally</strong>
                        <br><br><strong>
                        (4th Preference) "ftpsockets" utilises the PHP Sockets Class for FTP Access.</strong>' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::FTP_BASE] = array
        (
            'title' => $this->l10n->_( 'FTP ABS Path' ), 
            'tip' => $this->l10n->_( 'The full path to the "base"(ABSPATH) folder of the WordPress installation' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::FTP_CONTENT_DIR] = array
        (
            'title' => $this->l10n->_( 'FTP Content Dir ABS Path' ), 
            'tip' => $this->l10n->_( 'The full path to the wp-content folder of the WordPress installation' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::FTP_PLUGIN_DIR] = array
        (
            'title' => $this->l10n->_( 'Plugins Dir ABS Path' ), 
            'tip' => $this->l10n->_( 'The full path to the plugins folder of the WordPress installation' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::FTP_PUBKEY] = array
        (
            'title' => $this->l10n->_( 'Public Key' ), 
            'tip' => $this->l10n->_( 'The full path to your SSH public key' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::FTP_PRIKEY] = array
        (
            'title' => $this->l10n->_( 'Private Key' ), 
            'tip' => $this->l10n->_( 'The full path to your SSH private key' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::FTP_USER] = array
        (
            'title' => $this->l10n->_( 'User' ), 
            'tip' => $this->l10n->_( 'either user FTP or SSH username. Most likely these are the same, but use the appropriate one for the type of update you wish to do.' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::FTP_PASS] = array
        (
            'title' => $this->l10n->_( 'Password' ), 
            'tip' => $this->l10n->_( 'The password for the username entered for FTP_USER. If you are using SSH public key authentication this can be omitted.' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::FTP_HOST] = array
        (
            'title' => $this->l10n->_( 'FTP Host' ), 
            'tip' => $this->l10n->_( 'the hostname:port combination for your SSH/FTP server. The default FTP port is 21 and the default SSH port is 22. These do not need to be mentioned.' ),
        );
        $this->fieldsData[ConfigFileFieldsNameMap::FTP_SSL] = array
        (
            'title' => $this->l10n->_( 'Secure Connection' ), 
            'tip' => $this->l10n->_( 'TRUE for SSL-connection if supported by the underlying transport (not available on all servers). This is for "Secure FTP" not for SSH SFTP.' ),
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieAdminPath()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::ADMIN_COOKIE_PATH), 
            $this->fieldsData[ConfigFileFieldsNameMap::ADMIN_COOKIE_PATH]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::ADMIN_COOKIE_PATH]['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieAuth()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::AUTH_COOKIE), 
            $this->fieldsData[ConfigFileFieldsNameMap::AUTH_COOKIE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::AUTH_COOKIE]['tip'],
            array( 'class' => 'long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieDomain()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::COOKIE_DOMAIN), 
            $this->fieldsData[ConfigFileFieldsNameMap::COOKIE_DOMAIN]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::COOKIE_DOMAIN]['tip']
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookieHash()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::COOKIEHASH), 
            $this->fieldsData[ConfigFileFieldsNameMap::COOKIEHASH]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::COOKIEHASH]['tip'],
            array( 'class' => 'long-input' )
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookieLoggedIn()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::LOGGED_IN_COOKIE), 
            $this->fieldsData[ConfigFileFieldsNameMap::LOGGED_IN_COOKIE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::LOGGED_IN_COOKIE]['tip'],
            array( 'class' => 'long-input' )
        );
    }
            
    /**
    * put your comment there...
    * 
    */
    public function createCookiePass()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::PASS_COOKIE), 
            $this->fieldsData[ConfigFileFieldsNameMap::PASS_COOKIE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::PASS_COOKIE]['tip'],
            array( 'class' => 'long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookiePath()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::COOKIEPATH), 
            $this->fieldsData[ConfigFileFieldsNameMap::COOKIEPATH]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::COOKIEPATH]['tip'],
            array( 'class' => 'path long-input' )
        ); 
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookiePluginsPath()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::PLUGINS_COOKIE_PATH), 
            $this->fieldsData[ConfigFileFieldsNameMap::PLUGINS_COOKIE_PATH]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::PLUGINS_COOKIE_PATH]['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieSecureAuth()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SECURE_AUTH_COOKIE), 
            $this->fieldsData[ConfigFileFieldsNameMap::SECURE_AUTH_COOKIE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::SECURE_AUTH_COOKIE]['tip'],
            array( 'class' => 'long-input' )
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookieSitePath()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SITECOOKIEPATH), 
            $this->fieldsData[ConfigFileFieldsNameMap::SITECOOKIEPATH]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::SITECOOKIEPATH]['tip'],
            array( 'class' => 'path long-input' )
        );
    }
        
    /**
    * put your comment there...
    * 
    */
    public function createCookieTest()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::TEST_COOKIE), 
            $this->fieldsData[ConfigFileFieldsNameMap::TEST_COOKIE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::TEST_COOKIE]['tip'],
            array( 'class' => 'long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieUser()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::USER_COOKIE), 
            $this->fieldsData[ConfigFileFieldsNameMap::USER_COOKIE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::USER_COOKIE]['tip'],
            array( 'class' => 'long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCronDisable()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DISABLE_WP_CRON), 
            $this->fieldsData[ConfigFileFieldsNameMap::DISABLE_WP_CRON]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DISABLE_WP_CRON]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCronAlternate()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::ALTERNATE_WP_CRON), 
            $this->fieldsData[ConfigFileFieldsNameMap::ALTERNATE_WP_CRON]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::ALTERNATE_WP_CRON]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCronLockTimeOut()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseAllowRepair()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_ALLOW_REPAIR), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_ALLOW_REPAIR]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_ALLOW_REPAIR]['tip'],
            1
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createDatabaseCharset()
    {
        return new Fields\DropDownField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_CHARSET), 
            $this->fieldsData[ConfigFileFieldsNameMap::DB_CHARSET]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DB_CHARSET]['tip'],
            array
            ( 
                'list' =>  array
                (
                    '' => '',
                    'armscii8' => 'armscii8',
                    'ascii' => 'ascii',
                    'big5' => 'big5',
                    'binary' => 'binary',
                    'cp1250' => 'cp1250',
                    'cp1251' => 'cp1251',
                    'cp1256' => 'cp1256',
                    'cp1257' => 'cp1257',
                    'cp850' => 'cp850',
                    'cp852' => 'cp852',
                    'cp866' => 'cp866',
                    'cp932' => 'cp932',
                    'dec8' => 'dec8',
                    'eucjpms' => 'eucjpms',
                    'euckr' => 'euckr',
                    'gb2312' => 'gb2312',
                    'gbk' => 'gbk',
                    'geostd8' => 'geostd8',
                    'greek' => 'greek',
                    'hebrew' => 'hebrew',
                    'hp8' => 'hp8',
                    'keybcs2' => 'keybcs2',
                    'koi8r' => 'koi8r',
                    'koi8u' => 'koi8u',
                    'latin1' => 'latin1',
                    'latin2' => 'latin2',
                    'latin5' => 'latin5',
                    'latin7' => 'latin7',
                    'macce' => 'macce',
                    'macroman' => 'macroman',
                    'sjis' => 'sjis',
                    'swe7' => 'swe7',
                    'tis620' => 'tis620',
                    'ucs2' => 'ucs2',
                    'ujis' => 'ujis',
                    'utf16' => 'utf16',
                    'utf16le' => 'utf16le',
                    'utf32' => 'utf32',
                    'utf8' => 'utf8',
                    'utf8mb4' => 'utf8mb4',
                )
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseCollate()
    {
        return new Fields\DropDownField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_COLLATE), 
            $this->fieldsData[ConfigFileFieldsNameMap::DB_COLLATE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DB_COLLATE]['tip'],
            array
            ( 
                'list' =>  array
                (
                    '' => '',
                    'armscii8_bin' => 'armscii8_bin',
                    'armscii8_general_ci' => 'armscii8_general_ci',
                    'ascii_bin' => 'ascii_bin',
                    'ascii_general_ci' => 'ascii_general_ci',
                    'big5_bin' => 'big5_bin',
                    'big5_chinese_ci' => 'big5_chinese_ci',
                    'binary' => 'binary',
                    'cp1250_bin' => 'cp1250_bin',
                    'cp1250_croatian_ci' => 'cp1250_croatian_ci',
                    'cp1250_czech_cs' => 'cp1250_czech_cs',
                    'cp1250_general_ci' => 'cp1250_general_ci',
                    'cp1250_polish_ci' => 'cp1250_polish_ci',
                    'cp1251_bin' => 'cp1251_bin',
                    'cp1251_bulgarian_ci' => 'cp1251_bulgarian_ci',
                    'cp1251_general_ci' => 'cp1251_general_ci',
                    'cp1251_general_cs' => 'cp1251_general_cs',
                    'cp1251_ukrainian_ci' => 'cp1251_ukrainian_ci',
                    'cp1256_bin' => 'cp1256_bin',
                    'cp1256_general_ci' => 'cp1256_general_ci',
                    'cp1257_bin' => 'cp1257_bin',
                    'cp1257_general_ci' => 'cp1257_general_ci',
                    'cp1257_lithuanian_ci' => 'cp1257_lithuanian_ci',
                    'cp850_bin' => 'cp850_bin',
                    'cp850_general_ci' => 'cp850_general_ci',
                    'cp852_bin' => 'cp852_bin',
                    'cp852_general_ci' => 'cp852_general_ci',
                    'cp866_bin' => 'cp866_bin',
                    'cp866_general_ci' => 'cp866_general_ci',
                    'cp932_bin' => 'cp932_bin',
                    'cp932_japanese_ci' => 'cp932_japanese_ci',
                    'dec8_bin' => 'dec8_bin',
                    'dec8_swedish_ci' => 'dec8_swedish_ci',
                    'eucjpms_bin' => 'eucjpms_bin',
                    'eucjpms_japanese_ci' => 'eucjpms_japanese_ci',
                    'euckr_bin' => 'euckr_bin',
                    'euckr_korean_ci' => 'euckr_korean_ci',
                    'gb2312_bin' => 'gb2312_bin',
                    'gb2312_chinese_ci' => 'gb2312_chinese_ci',
                    'gbk_bin' => 'gbk_bin',
                    'gbk_chinese_ci' => 'gbk_chinese_ci',
                    'geostd8_bin' => 'geostd8_bin',
                    'geostd8_general_ci' => 'geostd8_general_ci',
                    'greek_bin' => 'greek_bin',
                    'greek_general_ci' => 'greek_general_ci',
                    'hp8_bin' => 'hp8_bin',
                    'hp8_english_ci' => 'hp8_english_ci',
                    'keybcs2_bin' => 'keybcs2_bin',
                    'keybcs2_general_ci' => 'keybcs2_general_ci',
                    'koi8r_bin' => 'koi8r_bin',
                    'koi8r_general_ci' => 'koi8r_general_ci',
                    'koi8u_bin' => 'koi8u_bin',
                    'koi8u_general_ci' => 'koi8u_general_ci',
                    'latin1_bin' => 'latin1_bin',
                    'latin1_danish_ci' => 'latin1_danish_ci',
                    'latin1_general_ci' => 'latin1_general_ci',
                    'latin1_general_cs' => 'latin1_general_cs',
                    'latin1_german1_ci' => 'latin1_german1_ci',
                    'latin1_german2_ci' => 'latin1_german2_ci',
                    'latin1_spanish_ci' => 'latin1_spanish_ci',
                    'latin1_swedish_ci' => 'latin1_swedish_ci',
                    'latin2_bin' => 'latin2_bin',
                    'latin2_croatian_ci' => 'latin2_croatian_ci',
                    'latin2_czech_cs' => 'latin2_czech_cs',
                    'latin2_general_ci' => 'latin2_general_ci',
                    'latin2_hungarian_ci' => 'latin2_hungarian_ci',
                    'latin5_bin' => 'latin5_bin',
                    'latin5_turkish_ci' => 'latin5_turkish_ci',
                    'latin7_bin' => 'latin7_bin',
                    'latin7_estonian_cs' => 'latin7_estonian_cs',
                    'latin7_general_ci' => 'latin7_general_ci',
                    'latin7_general_cs' => 'latin7_general_cs',
                    'macce_bin' => 'macce_bin',
                    'macce_general_ci' => 'macce_general_ci',
                    'macroman_bin' => 'macroman_bin',
                    'macroman_general_ci' => 'macroman_general_ci',
                    'sjis_bin' => 'sjis_bin',
                    'sjis_japanese_ci' => 'sjis_japanese_ci',
                    'swe7_bin' => 'swe7_bin',
                    'swe7_swedish_ci' => 'swe7_swedish_ci',
                    'tis620_bin' => 'tis620_bin',
                    'tis620_thai_ci' => 'tis620_thai_ci',
                    'ucs2_bin' => 'ucs2_bin',
                    'ucs2_croatian_ci' => 'ucs2_croatian_ci',
                    'ucs2_czech_ci' => 'ucs2_czech_ci',
                    'ucs2_danish_ci' => 'ucs2_danish_ci',
                    'ucs2_esperanto_ci' => 'ucs2_esperanto_ci',
                    'ucs2_estonian_ci' => 'ucs2_estonian_ci',
                    'ucs2_general_ci' => 'ucs2_general_ci',
                    'ucs2_general_mysql500_ci' => 'ucs2_general_mysql500_ci',
                    'ucs2_german2_ci' => 'ucs2_german2_ci',
                    'ucs2_hungarian_ci' => 'ucs2_hungarian_ci',
                    'ucs2_icelandic_ci' => 'ucs2_icelandic_ci',
                    'ucs2_latvian_ci' => 'ucs2_latvian_ci',
                    'ucs2_lithuanian_ci' => 'ucs2_lithuanian_ci',
                    'ucs2_persian_ci' => 'ucs2_persian_ci',
                    'ucs2_polish_ci' => 'ucs2_polish_ci',
                    'ucs2_roman_ci' => 'ucs2_roman_ci',
                    'ucs2_romanian_ci' => 'ucs2_romanian_ci',
                    'ucs2_sinhala_ci' => 'ucs2_sinhala_ci',
                    'ucs2_slovak_ci' => 'ucs2_slovak_ci',
                    'ucs2_slovenian_ci' => 'ucs2_slovenian_ci',
                    'ucs2_spanish2_ci' => 'ucs2_spanish2_ci',
                    'ucs2_spanish_ci' => 'ucs2_spanish_ci',
                    'ucs2_swedish_ci' => 'ucs2_swedish_ci',
                    'ucs2_turkish_ci' => 'ucs2_turkish_ci',
                    'ucs2_unicode_520_ci' => 'ucs2_unicode_520_ci',
                    'ucs2_unicode_ci' => 'ucs2_unicode_ci',
                    'ucs2_vietnamese_ci' => 'ucs2_vietnamese_ci',
                    'ujis_bin' => 'ujis_bin',
                    'ujis_japanese_ci' => 'ujis_japanese_ci',
                    'utf16_bin' => 'utf16_bin',
                    'utf16_croatian_ci' => 'utf16_croatian_ci',
                    'utf16_czech_ci' => 'utf16_czech_ci',
                    'utf16_danish_ci' => 'utf16_danish_ci',
                    'utf16_esperanto_ci' => 'utf16_esperanto_ci',
                    'utf16_estonian_ci' => 'utf16_estonian_ci',
                    'utf16_general_ci' => 'utf16_general_ci',
                    'utf16_german2_ci' => 'utf16_german2_ci',
                    'utf16_hungarian_ci' => 'utf16_hungarian_ci',
                    'utf16_icelandic_ci' => 'utf16_icelandic_ci',
                    'utf16_latvian_ci' => 'utf16_latvian_ci',
                    'utf16_lithuanian_ci' => 'utf16_lithuanian_ci',
                    'utf16_persian_ci' => 'utf16_persian_ci',
                    'utf16_polish_ci' => 'utf16_polish_ci',
                    'utf16_roman_ci' => 'utf16_roman_ci',
                    'utf16_romanian_ci' => 'utf16_romanian_ci',
                    'utf16_sinhala_ci' => 'utf16_sinhala_ci',
                    'utf16_slovak_ci' => 'utf16_slovak_ci',
                    'utf16_slovenian_ci' => 'utf16_slovenian_ci',
                    'utf16_spanish2_ci' => 'utf16_spanish2_ci',
                    'utf16_spanish_ci' => 'utf16_spanish_ci',
                    'utf16_swedish_ci' => 'utf16_swedish_ci',
                    'utf16_turkish_ci' => 'utf16_turkish_ci',
                    'utf16_unicode_520_ci' => 'utf16_unicode_520_ci',
                    'utf16_unicode_ci' => 'utf16_unicode_ci',
                    'utf16_vietnamese_ci' => 'utf16_vietnamese_ci',
                    'utf16le_bin' => 'utf16le_bin',
                    'utf16le_general_ci' => 'utf16le_general_ci',
                    'utf32_bin' => 'utf32_bin',
                    'utf32_croatian_ci' => 'utf32_croatian_ci',
                    'utf32_czech_ci' => 'utf32_czech_ci',
                    'utf32_danish_ci' => 'utf32_danish_ci',
                    'utf32_esperanto_ci' => 'utf32_esperanto_ci',
                    'utf32_estonian_ci' => 'utf32_estonian_ci',
                    'utf32_general_ci' => 'utf32_general_ci',
                    'utf32_german2_ci' => 'utf32_german2_ci',
                    'utf32_hungarian_ci' => 'utf32_hungarian_ci',
                    'utf32_icelandic_ci' => 'utf32_icelandic_ci',
                    'utf32_latvian_ci' => 'utf32_latvian_ci',
                    'utf32_lithuanian_ci' => 'utf32_lithuanian_ci',
                    'utf32_persian_ci' => 'utf32_persian_ci',
                    'utf32_polish_ci' => 'utf32_polish_ci',
                    'utf32_roman_ci' => 'utf32_roman_ci',
                    'utf32_romanian_ci' => 'utf32_romanian_ci',
                    'utf32_sinhala_ci' => 'utf32_sinhala_ci',
                    'utf32_slovak_ci' => 'utf32_slovak_ci',
                    'utf32_slovenian_ci' => 'utf32_slovenian_ci',
                    'utf32_spanish2_ci' => 'utf32_spanish2_ci',
                    'utf32_spanish_ci' => 'utf32_spanish_ci',
                    'utf32_swedish_ci' => 'utf32_swedish_ci',
                    'utf32_turkish_ci' => 'utf32_turkish_ci',
                    'utf32_unicode_520_ci' => 'utf32_unicode_520_ci',
                    'utf32_unicode_ci' => 'utf32_unicode_ci',
                    'utf32_vietnamese_ci' => 'utf32_vietnamese_ci',
                    'utf8_bin' => 'utf8_bin',
                    'utf8_croatian_ci' => 'utf8_croatian_ci',
                    'utf8_czech_ci' => 'utf8_czech_ci',
                    'utf8_danish_ci' => 'utf8_danish_ci',
                    'utf8_esperanto_ci' => 'utf8_esperanto_ci',
                    'utf8_estonian_ci' => 'utf8_estonian_ci',
                    'utf8_general_ci' => 'utf8_general_ci',
                    'utf8_general_mysql500_ci' => 'utf8_general_mysql500_ci',
                    'utf8_german2_ci' => 'utf8_german2_ci',
                    'utf8_hungarian_ci' => 'utf8_hungarian_ci',
                    'utf8_icelandic_ci' => 'utf8_icelandic_ci',
                    'utf8_latvian_ci' => 'utf8_latvian_ci',
                    'utf8_lithuanian_ci' => 'utf8_lithuanian_ci',
                    'utf8_persian_ci' => 'utf8_persian_ci',
                    'utf8_polish_ci' => 'utf8_polish_ci',
                    'utf8_roman_ci' => 'utf8_roman_ci',
                    'utf8_romanian_ci' => 'utf8_romanian_ci',
                    'utf8_sinhala_ci' => 'utf8_sinhala_ci',
                    'utf8_slovak_ci' => 'utf8_slovak_ci',
                    'utf8_slovenian_ci' => 'utf8_slovenian_ci',
                    'utf8_spanish2_ci' => 'utf8_spanish2_ci',
                    'utf8_spanish_ci' => 'utf8_spanish_ci',
                    'utf8_swedish_ci' => 'utf8_swedish_ci',
                    'utf8_turkish_ci' => 'utf8_turkish_ci',
                    'utf8_unicode_520_ci' => 'utf8_unicode_520_ci',
                    'utf8_unicode_ci' => 'utf8_unicode_ci',
                    'utf8_vietnamese_ci' => 'utf8_vietnamese_ci',
                    'utf8mb4_bin' => 'utf8mb4_bin',
                    'utf8mb4_croatian_ci' => 'utf8mb4_croatian_ci',
                    'utf8mb4_czech_ci' => 'utf8mb4_czech_ci',
                    'utf8mb4_danish_ci' => 'utf8mb4_danish_ci',
                    'utf8mb4_esperanto_ci' => 'utf8mb4_esperanto_ci',
                    'utf8mb4_estonian_ci' => 'utf8mb4_estonian_ci',
                    'utf8mb4_general_ci' => 'utf8mb4_general_ci',
                    'utf8mb4_german2_ci' => 'utf8mb4_german2_ci',
                    'utf8mb4_hungarian_ci' => 'utf8mb4_hungarian_ci',
                    'utf8mb4_icelandic_ci' => 'utf8mb4_icelandic_ci',
                    'utf8mb4_latvian_ci' => 'utf8mb4_latvian_ci',
                    'utf8mb4_lithuanian_ci' => 'utf8mb4_lithuanian_ci',
                    'utf8mb4_persian_ci' => 'utf8mb4_persian_ci',
                    'utf8mb4_polish_ci' => 'utf8mb4_polish_ci',
                    'utf8mb4_roman_ci' => 'utf8mb4_roman_ci',
                    'utf8mb4_romanian_ci' => 'utf8mb4_romanian_ci',
                    'utf8mb4_sinhala_ci' => 'utf8mb4_sinhala_ci',
                    'utf8mb4_slovak_ci' => 'utf8mb4_slovak_ci',
                    'utf8mb4_slovenian_ci' => 'utf8mb4_slovenian_ci',
                    'utf8mb4_spanish2_ci' => 'utf8mb4_spanish2_ci',
                    'utf8mb4_spanish_ci' => 'utf8mb4_spanish_ci',
                    'utf8mb4_swedish_ci' => 'utf8mb4_swedish_ci',
                    'utf8mb4_turkish_ci' => 'utf8mb4_turkish_ci',
                    'utf8mb4_unicode_520_ci' => 'utf8mb4_unicode_520_ci',
                    'utf8mb4_unicode_ci' => 'utf8mb4_unicode_ci',
                    'utf8mb4_vietnamese_ci' => 'utf8mb4_vietnamese_ci',
                )
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseUpgradeGlobalTables()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES), 
            $this->fieldsData[ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseName()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_NAME), 
            $this->fieldsData[ConfigFileFieldsNameMap::DB_NAME]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DB_NAME]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseUser()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_USER), 
            $this->fieldsData[ConfigFileFieldsNameMap::DB_USER]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DB_USER]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabasePassword()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_PASSWORD), 
            $this->fieldsData[ConfigFileFieldsNameMap::DB_PASSWORD]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DB_PASSWORD]['tip'],
            array( 'type' => 'password' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseHost()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_HOST), 
            $this->fieldsData[ConfigFileFieldsNameMap::DB_HOST]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DB_HOST]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabasePort()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_PORT), 
            $this->fieldsData[ConfigFileFieldsNameMap::DB_PORT]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DB_PORT]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseTablePrefix()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DB_TABLE_PREFIX), 
            $this->fieldsData[ConfigFileFieldsNameMap::DB_TABLE_PREFIX]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DB_TABLE_PREFIX]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugConcatenateScripts()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS), 
            $this->fieldsData[ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugSaveQueries()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SAVEQUERIES), 
            $this->fieldsData[ConfigFileFieldsNameMap::SAVEQUERIES]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::SAVEQUERIES]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugScriptDebug()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SCRIPT_DEBUG), 
            $this->fieldsData[ConfigFileFieldsNameMap::SCRIPT_DEBUG]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::SCRIPT_DEBUG]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugWPDebug()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_DEBUG), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_DEBUG]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_DEBUG]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugDisplay()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugLog()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_DEBUG_LOG), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_DEBUG_LOG]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_DEBUG_LOG]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createLocalizeLang()
    {
        return new Fields\DropDownField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WPLANG), 
            $this->fieldsData[ConfigFileFieldsNameMap::WPLANG]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WPLANG]['tip'],
            array
            ( 
                'list' => array
                (
                    '' => '',
                    'af-ZA' => 'af-ZA',
                    'am-ET' => 'am-ET',
                    'ar-AE' => 'ar-AE',
                    'ar-BH' => 'ar-BH',
                    'ar-DZ' => 'ar-DZ',
                    'ar-EG' => 'ar-EG',
                    'ar-IQ' => 'ar-IQ',
                    'ar-JO' => 'ar-JO',
                    'ar-KW' => 'ar-KW',
                    'ar-LB' => 'ar-LB',
                    'ar-LY' => 'ar-LY',
                    'ar-MA' => 'ar-MA',
                    'ar-OM' => 'ar-OM',
                    'ar-QA' => 'ar-QA',
                    'ar-SA' => 'ar-SA',
                    'ar-SY' => 'ar-SY',
                    'ar-TN' => 'ar-TN',
                    'ar-YE' => 'ar-YE',
                    'arn-CL' => 'arn-CL',
                    'as-IN' => 'as-IN',
                    'az-Cyrl-AZ' => 'az-Cyrl-AZ',
                    'az-Latn-AZ' => 'az-Latn-AZ',
                    'ba-RU' => 'ba-RU',
                    'be-BY' => 'be-BY',
                    'bg-BG' => 'bg-BG',
                    'bn-BD' => 'bn-BD',
                    'bn-IN' => 'bn-IN',
                    'bo-CN' => 'bo-CN',
                    'br-FR' => 'br-FR',
                    'bs-Cyrl-BA' => 'bs-Cyrl-BA',
                    'bs-Latn-BA' => 'bs-Latn-BA',
                    'ca-ES' => 'ca-ES',
                    'co-FR' => 'co-FR',
                    'cs-CZ' => 'cs-CZ',
                    'cy-GB' => 'cy-GB',
                    'da-DK' => 'da-DK',
                    'de-AT' => 'de-AT',
                    'de-CH' => 'de-CH',
                    'de-DE' => 'de-DE',
                    'de-LI' => 'de-LI',
                    'de-LU' => 'de-LU',
                    'dsb-DE' => 'dsb-DE',
                    'dv-MV' => 'dv-MV',
                    'el-GR' => 'el-GR',
                    'en-029' => 'en-029',
                    'en-AU' => 'en-AU',
                    'en-BZ' => 'en-BZ',
                    'en-CA' => 'en-CA',
                    'en-GB' => 'en-GB',
                    'en-IE' => 'en-IE',
                    'en-IN' => 'en-IN',
                    'en-JM' => 'en-JM',
                    'en-MY' => 'en-MY',
                    'en-NZ' => 'en-NZ',
                    'en-PH' => 'en-PH',
                    'en-SG' => 'en-SG',
                    'en-TT' => 'en-TT',
                    'en-US' => 'en-US',
                    'en-ZA' => 'en-ZA',
                    'en-ZW' => 'en-ZW',
                    'es-AR' => 'es-AR',
                    'es-BO' => 'es-BO',
                    'es-CL' => 'es-CL',
                    'es-CO' => 'es-CO',
                    'es-CR' => 'es-CR',
                    'es-DO' => 'es-DO',
                    'es-EC' => 'es-EC',
                    'es-ES' => 'es-ES',
                    'es-GT' => 'es-GT',
                    'es-HN' => 'es-HN',
                    'es-MX' => 'es-MX',
                    'es-NI' => 'es-NI',
                    'es-PA' => 'es-PA',
                    'es-PE' => 'es-PE',
                    'es-PR' => 'es-PR',
                    'es-PY' => 'es-PY',
                    'es-SV' => 'es-SV',
                    'es-US' => 'es-US',
                    'es-UY' => 'es-UY',
                    'es-VE' => 'es-VE',
                    'et-EE' => 'et-EE',
                    'eu-ES' => 'eu-ES',
                    'fa-IR' => 'fa-IR',
                    'fi-FI' => 'fi-FI',
                    'fil-PH' => 'fil-PH',
                    'fo-FO' => 'fo-FO',
                    'fr-BE' => 'fr-BE',
                    'fr-CA' => 'fr-CA',
                    'fr-CH' => 'fr-CH',
                    'fr-FR' => 'fr-FR',
                    'fr-LU' => 'fr-LU',
                    'fr-MC' => 'fr-MC',
                    'fy-NL' => 'fy-NL',
                    'ga-IE' => 'ga-IE',
                    'gd-GB' => 'gd-GB',
                    'gl-ES' => 'gl-ES',
                    'gsw-FR' => 'gsw-FR',
                    'gu-IN' => 'gu-IN',
                    'ha-Latn-NG' => 'ha-Latn-NG',
                    'he-IL' => 'he-IL',
                    'hi-IN' => 'hi-IN',
                    'hsb-DE' => 'hsb-DE',
                    'hu-HU' => 'hu-HU',
                    'hy-AM' => 'hy-AM',
                    'id-ID' => 'id-ID',
                    'ig-NG' => 'ig-NG',
                    'ii-CN' => 'ii-CN',
                    'is-IS' => 'is-IS',
                    'it-CH' => 'it-CH',
                    'it-IT' => 'it-IT',
                    'iu-Cans-CA' => 'iu-Cans-CA',
                    'iu-Latn-CA' => 'iu-Latn-CA',
                    'ja-JP' => 'ja-JP',
                    'ka-GE' => 'ka-GE',
                    'kk-KZ' => 'kk-KZ',
                    'kl-GL' => 'kl-GL',
                    'km-KH' => 'km-KH',
                    'kn-IN' => 'kn-IN',
                    'ko-KR' => 'ko-KR',
                    'kok-IN' => 'kok-IN',
                    'ky-KG' => 'ky-KG',
                    'lb-LU' => 'lb-LU',
                    'lo-LA' => 'lo-LA',
                    'lt-LT' => 'lt-LT',
                    'lv-LV' => 'lv-LV',
                    'mi-NZ' => 'mi-NZ',
                    'mk-MK' => 'mk-MK',
                    'ml-IN' => 'ml-IN',
                    'mn-MN' => 'mn-MN',
                    'mn-Mong-CN' => 'mn-Mong-CN',
                    'moh-CA' => 'moh-CA',
                    'mr-IN' => 'mr-IN',
                    'ms-BN' => 'ms-BN',
                    'ms-MY' => 'ms-MY',
                    'mt-MT' => 'mt-MT',
                    'nb-NO' => 'nb-NO',
                    'ne-NP' => 'ne-NP',
                    'nl-BE' => 'nl-BE',
                    'nl-NL' => 'nl-NL',
                    'nn-NO' => 'nn-NO',
                    'nso-ZA' => 'nso-ZA',
                    'oc-FR' => 'oc-FR',
                    'or-IN' => 'or-IN',
                    'pa-IN' => 'pa-IN',
                    'pl-PL' => 'pl-PL',
                    'prs-AF' => 'prs-AF',
                    'ps-AF' => 'ps-AF',
                    'pt-BR' => 'pt-BR',
                    'pt-PT' => 'pt-PT',
                    'qut-GT' => 'qut-GT',
                    'quz-BO' => 'quz-BO',
                    'quz-EC' => 'quz-EC',
                    'quz-PE' => 'quz-PE',
                    'rm-CH' => 'rm-CH',
                    'ro-RO' => 'ro-RO',
                    'ru-RU' => 'ru-RU',
                    'rw-RW' => 'rw-RW',
                    'sa-IN' => 'sa-IN',
                    'sah-RU' => 'sah-RU',
                    'se-FI' => 'se-FI',
                    'se-NO' => 'se-NO',
                    'se-SE' => 'se-SE',
                    'si-LK' => 'si-LK',
                    'sk-SK' => 'sk-SK',
                    'sl-SI' => 'sl-SI',
                    'sma-NO' => 'sma-NO',
                    'sma-SE' => 'sma-SE',
                    'smj-NO' => 'smj-NO',
                    'smj-SE' => 'smj-SE',
                    'smn-FI' => 'smn-FI',
                    'sms-FI' => 'sms-FI',
                    'sq-AL' => 'sq-AL',
                    'sr-Cyrl-BA' => 'sr-Cyrl-BA',
                    'sr-Cyrl-CS' => 'sr-Cyrl-CS',
                    'sr-Cyrl-ME' => 'sr-Cyrl-ME',
                    'sr-Cyrl-RS' => 'sr-Cyrl-RS',
                    'sr-Latn-BA' => 'sr-Latn-BA',
                    'sr-Latn-CS' => 'sr-Latn-CS',
                    'sr-Latn-ME' => 'sr-Latn-ME',
                    'sr-Latn-RS' => 'sr-Latn-RS',
                    'sv-FI' => 'sv-FI',
                    'sv-SE' => 'sv-SE',
                    'sw-KE' => 'sw-KE',
                    'syr-SY' => 'syr-SY',
                    'ta-IN' => 'ta-IN',
                    'te-IN' => 'te-IN',
                    'tg-Cyrl-TJ' => 'tg-Cyrl-TJ',
                    'th-TH' => 'th-TH',
                    'tk-TM' => 'tk-TM',
                    'tn-ZA' => 'tn-ZA',
                    'tr-TR' => 'tr-TR',
                    'tt-RU' => 'tt-RU',
                    'tzm-Latn-DZ' => 'tzm-Latn-DZ',
                    'ug-CN' => 'ug-CN',
                    'uk-UA' => 'uk-UA',
                    'ur-PK' => 'ur-PK',
                    'uz-Cyrl-UZ' => 'uz-Cyrl-UZ',
                    'uz-Latn-UZ' => 'uz-Latn-UZ',
                    'vi-VN' => 'vi-VN',
                    'wo-SN' => 'wo-SN',
                    'xh-ZA' => 'xh-ZA',
                    'yo-NG' => 'yo-NG',
                    'zh-CN' => 'zh-CN',
                    'zh-HK' => 'zh-HK',
                    'zh-MO' => 'zh-MO',
                    'zh-SG' => 'zh-SG',
                    'zh-TW' => 'zh-TW',
                    'zu-ZA' => 'zu-ZA',
                )
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createLocalizeLangDir()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WPLANG_DIR), 
            $this->fieldsData[ConfigFileFieldsNameMap::WPLANG_DIR]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WPLANG_DIR]['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMaintenanceMaxMemoryLimit()
    {   
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT]['tip']
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createMaintenanceMemoryLimit()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_MEMORY_LIMIT), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_MEMORY_LIMIT]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_MEMORY_LIMIT]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMaintenanceCache()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_CACHE), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_CACHE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_CACHE]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisite()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::MULTISITE), 
            $this->fieldsData[ConfigFileFieldsNameMap::MULTISITE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::MULTISITE]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteAllow()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteBlogIdCurrentSite()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE), 
            $this->fieldsData[ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE]['tip']
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createMultisiteDomainCurrentSite()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE), 
            $this->fieldsData[ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisitePathCurrentSite()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::PATH_CURRENT_SITE), 
            $this->fieldsData[ConfigFileFieldsNameMap::PATH_CURRENT_SITE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::PATH_CURRENT_SITE]['tip'],
            array('class' => 'path long-input') 
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisitePrimaryNetworkId()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID), 
            $this->fieldsData[ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteSiteIdCurrentSite()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE), 
            $this->fieldsData[ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteSubDomainInstall()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL), 
            $this->fieldsData[ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL]['tip'],
            1
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createPostAutoSaveInterval()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL), 
            $this->fieldsData[ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createPostEmptyTrashDays()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS), 
            $this->fieldsData[ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createPostRevisionsStatus()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createPostRevisions()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_POST_REVISIONS), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_POST_REVISIONS]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_POST_REVISIONS]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyBypassHosts()
    {
        return new Fields\CheckboxListField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyHost()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_PROXY_HOST), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_HOST]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_HOST]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyPassword()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_PROXY_PASSWORD), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_PASSWORD]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_PASSWORD]['tip'],
            array( 'type' => 'password' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyPort()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_PROXY_PORT), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_PORT]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_PORT]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyUserName()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_PROXY_USERNAME), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_USERNAME]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_PROXY_USERNAME]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityAccessibleHosts()
    {
        return new Fields\CheckboxListField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityAllowUnfilteredUploads()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS), 
            $this->fieldsData[ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityHTTPBlockExternal()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityDisallowFileEdit()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT), 
            $this->fieldsData[ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityDisallowUnfilteredHTML()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML), 
            $this->fieldsData[ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityForceSSLAdmin()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FORCE_SSL_ADMIN), 
            $this->fieldsData[ConfigFileFieldsNameMap::FORCE_SSL_ADMIN]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::FORCE_SSL_ADMIN]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityForceSSLLogin()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FORCE_SSL_LOGIN), 
            $this->fieldsData[ConfigFileFieldsNameMap::FORCE_SSL_LOGIN]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::FORCE_SSL_LOGIN]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysAuth()
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::AUTH_KEY), 
            $this->fieldsData[ConfigFileFieldsNameMap::AUTH_KEY]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::AUTH_KEY]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysAuthSalt()
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::AUTH_SALT), 
            $this->fieldsData[ConfigFileFieldsNameMap::AUTH_SALT]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::AUTH_SALT]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysLoggedIn()
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::LOGGED_IN_KEY), 
            $this->fieldsData[ConfigFileFieldsNameMap::LOGGED_IN_KEY]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::LOGGED_IN_KEY]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysLoggedInSalt()
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::LOGGED_IN_SALT), 
            $this->fieldsData[ConfigFileFieldsNameMap::LOGGED_IN_SALT]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::LOGGED_IN_SALT]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysNonce()
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::NONCE_KEY), 
            $this->fieldsData[ConfigFileFieldsNameMap::NONCE_KEY]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::NONCE_KEY]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysNonceSalt()
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::NONCE_SALT), 
            $this->fieldsData[ConfigFileFieldsNameMap::NONCE_SALT]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::NONCE_SALT]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysSecureAuth()
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SECURE_AUTH_KEY), 
            $this->fieldsData[ConfigFileFieldsNameMap::SECURE_AUTH_KEY]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::SECURE_AUTH_KEY]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysSecureAuthSalt()
    {
        return new Fields\SecureKeyField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::SECURE_AUTH_SALT), 
            $this->fieldsData[ConfigFileFieldsNameMap::SECURE_AUTH_SALT]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::SECURE_AUTH_SALT]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeAutoUpdateCore()
    {
        return new Fields\DropDownField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE), 
            $this->fieldsData[ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE]['tip'],
            array
            ( 
                'list' => array
                (
                    'true' => $this->l10n->_( 'Enable' ),
                    'minor' => $this->l10n->_( 'Enable only Minor updates' ),
                    'false' => $this->l10n->_( 'Disable' ),                
                )
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeAutmaticUpdater()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED), 
            $this->fieldsData[ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeDisallowFileMods()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::DISALLOW_FILE_MODS), 
            $this->fieldsData[ConfigFileFieldsNameMap::DISALLOW_FILE_MODS]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::DISALLOW_FILE_MODS]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemMethod()
    {
        return new Fields\DropDownField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FS_METHOD), 
            $this->fieldsData[ConfigFileFieldsNameMap::FS_METHOD]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::FS_METHOD]['tip'],
            array
            ( 
                'list' => array
                (                
                    '' => '',
                    'direct' => $this->l10n->_( 'Direct (direct)' ),
                    'ssh2' => $this->l10n->_( 'SSH 2 (ssh2)' ),
                    'ftpext' => $this->l10n->_( 'FTP Extension (ftpext)' ),
                    'ftpsockets' => $this->l10n->_( 'FTP Sockets (ftpsockets)' ),
                )
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPBasePath()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_BASE), 
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_BASE]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_BASE]['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPContentDirPath()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_CONTENT_DIR), 
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_CONTENT_DIR]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_CONTENT_DIR]['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPHost()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_HOST), 
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_HOST]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_HOST]['tip']
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPassword()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_PASS), 
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_PASS]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_PASS]['tip'],
            array( 'type' => 'password' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPluginDirPath()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_PLUGIN_DIR), 
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_PLUGIN_DIR]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_PLUGIN_DIR]['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPrivateKeyPath()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_PRIKEY), 
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_PRIKEY]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_PRIKEY]['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPublicKeyPath()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_PUBKEY), 
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_PUBKEY]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_PUBKEY]['tip'],
            array( 'class' => 'path long-input' )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPSSL()
    {
        return new Fields\CheckboxField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_SSL), 
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_SSL]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_SSL]['tip'],
            1
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPUser()
    {
        return new Fields\InputField( 
            $this->form, 
            $this->form->get(ConfigFileFieldsNameMap::FTP_USER), 
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_USER]['title'],
            $this->fieldsData[ConfigFileFieldsNameMap::FTP_USER]['tip']
        );
    }
    
}