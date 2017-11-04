<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Lib;

use WCFE\Modules\Editor\ConfigFileFieldsNameMap;

defined('ABSPATH') or die(-1);

/**
* 
*/
class FormFieldsDataAccess
{
    
    /**
    * put your comment there...
    * 
    * @var FormFieldsDataAccess
    */
    protected static $fieldsData;
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected static $instance;
    
    /**
    * put your comment there...
    * 
    */
    private function __construct()
    {
        self::initFieldsData();
    }
    
    /**
    * put your comment there...
    * 
    */
    public static function & instance()
    {
        
        if (!self::$instance)
        {
            self::$instance = new FormFieldsDataAccess();
        }
        
        return self::$instance;
    }
    
    /**
    * put your comment there...
    * 
    * @param mixed $name
    */
    public function getFieldData($name)
    {
        
        if (!self::$fieldsData[$name])
        {
            throw new \Exception("{$name} Field Data does not exists");
        }
        
        return self::$fieldsData[$name];
    }
    
    /**
    * put your comment there...
    * 
    */
    public function getFields()
    {
        return self::$fieldsData;
    }
    
    /**
    * put your comment there...
    * 
    */
    public static function initFieldsData()
    {
        
        if (isset(self::$fieldsData))
        {
            return;
        }
        
        self::$fieldsData = array();
        
        
        $l10n =& \WCFE\Plugin::me()
                        ->loadLocalizationExtension()
                        ->getExtension('l10n');
        
        // Secure keys
        self::$fieldsData[ConfigFileFieldsNameMap::AUTH_KEY] = array
        (
            'title' => $l10n->_( 'Authentication' ), 
            'tip' => $l10n->_( 'Wordpress Hash key for AUTH_KEY constant' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::SECURE_AUTH_KEY] = array
        (
            'title' => $l10n->_( 'Secure Authentication key' ), 
            'tip' => $l10n->_( 'Wordpress Hash key for SECURE_AUTH_KEY constant' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::LOGGED_IN_KEY] = array
        (
            'title' => $l10n->_( 'Logged In key' ), 
            'tip' => $l10n->_( 'Wordpress Hash key for LOGGED_IN_KEY constant' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::NONCE_SALT] = array
        (
            'title' => $l10n->_( 'Nonce salt' ), 
            'tip' => $l10n->_( 'Wordpress Hash key for NONCE_SALT constant' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::AUTH_SALT] = array
        (
            'title' => $l10n->_( 'Authentication Salt' ), 
            'tip' => $l10n->_( 'Wordpress Hash key for AUTH_SALT constant' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::SECURE_AUTH_SALT] = array
        (
            'title' => $l10n->_( 'Secure Authentication Salt' ), 
            'tip' => $l10n->_( 'Wordpress Hash key for SECURE_AUTH_SALT constant' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::LOGGED_IN_SALT] = array
        (
            'title' => $l10n->_( 'Logged In Salt' ), 
            'tip' => $l10n->_( 'Wordpress Hash key for LOGGED_IN_SALT constant' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::NONCE_KEY] = array
        (
            'title' => $l10n->_( 'Nonce key' ), 
            'tip' => $l10n->_( 'Wordpress Hash key for NONCE_KEY constant' ),
        );

        // cookies
        self::$fieldsData[ConfigFileFieldsNameMap::ADMIN_COOKIE_PATH] = array
        (
            'title' => $l10n->_( 'Admin path' ), 
            'tip' => $l10n->_( 'Admin path cookie name' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::AUTH_COOKIE] = array
        (
            'title' => $l10n->_( 'Auth' ), 
            'tip' => $l10n->_( 'Auth cookie name' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::COOKIE_DOMAIN] = array
        (
            'title' => $l10n->_( 'Domain' ), 
            'tip' => $l10n->_( 'Cookie domain' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::COOKIEHASH] = array
        (
            'title' => $l10n->_( 'Hash' ), 
            'tip' => $l10n->_( 'Hash Cookie' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::LOGGED_IN_COOKIE] = array
        (
            'title' => $l10n->_( 'Logged In' ), 
            'tip' => $l10n->_( 'Logged In Cookie' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::PASS_COOKIE] = array
        (
            'title' => $l10n->_( 'Pass' ), 
            'tip' => $l10n->_( 'Pass Cookie' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::COOKIEPATH] = array
        (
            'title' => $l10n->_( 'Path' ), 
            'tip' => $l10n->_( 'Path Cookie' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::PLUGINS_COOKIE_PATH] = array
        (
            'title' => $l10n->_( 'Plugins Path' ), 
            'tip' => $l10n->_( 'Plugins Path Cookie' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::SECURE_AUTH_COOKIE] = array
        (
            'title' => $l10n->_( 'Secure Auth' ), 
            'tip' => $l10n->_( 'Secure Auth cookie' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::SITECOOKIEPATH] = array
        (
            'title' => $l10n->_( 'Site Path' ), 
            'tip' => $l10n->_( 'Site path cookie' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::TEST_COOKIE] = array
        (
            'title' => $l10n->_( 'Test' ), 
            'tip' => $l10n->_( 'Test Cookie' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::USER_COOKIE] = array
        (
            'title' => $l10n->_( 'User' ),
            'tip' => $l10n->_( 'User Cookie' ),
        );
        
        // Cron
        self::$fieldsData[ConfigFileFieldsNameMap::DISABLE_WP_CRON] = array
        (
            'title' => $l10n->_( 'Disable Cron' ), 
            'tip' => $l10n->_( 'Disable the cron entirely' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::ALTERNATE_WP_CRON] = array
        (
            'title' => $l10n->_( 'Alternate Cron' ), 
            'tip' => $l10n->_( 'Use this, for example, if scheduled posts are not getting published. According to Otto\'s forum explanation, "this alternate method uses a redirection approach, which makes the users browser get a redirect when the cron needs to run, so that they come back to the site immediately while cron continues to run in the connection they just dropped. This method is a bit iffy sometimes, which is why it\'s not the default.' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT] = array
        (
            'title' => $l10n->_( 'Cron Lock Timeout' ), 
            'tip' => $l10n->_( 'Make sure a cron process cannot run more than once every XXXX seconds.' ),
        );
        
        // Database
        self::$fieldsData[ConfigFileFieldsNameMap::DB_HOST] = array
        (
            'title' => $l10n->_( 'Host' ), 
            'tip' => $l10n->_( 'The address in which the Database is located. This can either be an IP or Domain name. In most cases its \'localhost\'' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::DB_PORT] = array
        (
            'title' => $l10n->_( 'Port' ), 
            'tip' => $l10n->_( 'Alternate Database host port' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::DB_USER] = array
        (
            'title' => $l10n->_( 'User Name' ), 
            'tip' => $l10n->_( 'User name to be used for connecting to Database' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::DB_PASSWORD] = array
        (
            'title' => $l10n->_( 'Password' ), 
            'tip' => $l10n->_( 'Database user password for authenticating the connection between Wordpress and Database' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::DB_NAME] = array
        (
            'title' => $l10n->_( 'Database Name' ), 
            'tip' => $l10n->_( 'Database name to used for Wordpress installation, All posts/pages/categories and all the data will be stored there' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::DB_CHARSET] = array
        (
            'title' => $l10n->_( 'Database Characters Set' ), 
            'tip' => $l10n->_( 'Was made available to allow designation of the database character set (e.g. tis620 for TIS620 Thai) to be used when defining the MySQL database tables.' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::DB_COLLATE] = array
        (
            'title' => $l10n->_( 'Database Collation' ), 
            'tip' => $l10n->_( 'As of WordPress Version 2.2, DB_COLLATE was made available to allow designation of the database collation (i.e. the sort order of the character set). In most cases, this value should be left blank (null) so the database collation will be automatically assigned by MySQL based on the database character set specified by Character Set' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::DB_TABLE_PREFIX] = array
        (
            'title' => $l10n->_( 'Table Prefix' ), 
            'tip' => $l10n->_( 'The value placed in the front of your database tables. Change the value if you want to use something other than wp_ for your database prefix. Typically this is changed if you are installing multiple WordPress blogs in the same database.' ),
        );                        
        self::$fieldsData[ConfigFileFieldsNameMap::WP_ALLOW_REPAIR] = array
        (
            'title' => $l10n->_( 'Automatic Repair' ), 
            'tip' => $l10n->_( 'Added with Version 2.9, there is automatic database optimization support, which you can enable by adding the following define to your wp-config.php file only when the feature is required. Please Note: That this define enables the functionality, The user does not need to be logged in to access this functionality when this define is set. This is because its main intent is to repair a corrupted database, Users can often not login when the database is corrupt.' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES] = array
        (
            'title' => $l10n->_( 'Stop Upgrading Global Tables' ), 
            'tip' => $l10n->_( 'A DO_NOT_UPGRADE_GLOBAL_TABLES define prevents dbDelta() and the upgrade functions from doing expensive queries against global tables. Sites that have large global tables (particularly users and usermeta), as well as sites that share user tables with bbPress and other WordPress installs, can prevent the upgrade from changing those tables during upgrade by defining DO_NOT_UPGRADE_GLOBAL_TABLES. Since an ALTER, or an unbounded DELETE or UPDATE, can take a long time to complete, large sites usually want to avoid these being run as part of the upgrade so they can handle it themselves. Further, if installations are sharing user tables between multiple bbPress and WordPress installs it maybe necessary to want one site to be the upgrade master.' ),
        );

        // Debugging
        self::$fieldsData[ConfigFileFieldsNameMap::WP_DEBUG] = array
        (
            'title' => $l10n->_( 'Debug Mode' ), 
            'tip' => $l10n->_( 'Added in WordPress Version 2.3.1, controls the reporting of some errors and warnings' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY] = array
        (
            'title' => $l10n->_( 'Debug Display' ), 
            'tip' => $l10n->_( 'Another companion to Debug Mode field that controls whether debug messages are shown inside the HTML of pages or not. The default is ON which shows errors and warnings as they are generated. Setting this to false will hide all errors. This should be used in conjunction with Debug Log so that errors can be reviewed later.' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_DEBUG_LOG] = array
        (
            'title' => $l10n->_( 'Debug Log' ), 
            'tip' => $l10n->_( 'Companion to Debug Mode field that causes all errors to also be saved to a debug.log log file inside the /wp-content/ directory. This is useful if you want to review all notices later or need to view notices generated off-screen (e.g. during an AJAX request or wp-cron run). Note that this allows you to write to /wp-content/debug.log using PHP\'s built in error_log() function, which can be useful for instance when debugging AJAX events.' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::SCRIPT_DEBUG] = array
        (
            'title' => $l10n->_( 'Script Debugging' ), 
            'tip' => $l10n->_( 'Force WordPress to use the "dev" versions of core CSS and Javascript files rather than the minified versions that are normally loaded. This is useful when you are testing modifications to any built-in .js or .css files. Default is false.' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS] = array
        (
            'title' => $l10n->_( 'Concatenate JavaScript' ), 
            'tip' => $l10n->_( 'To result in a faster administration area, all Javascript files are concatenated into one URL. If Javascript is failing to work in your administration area, you can try disabling this feature:' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::SAVEQUERIES] = array
        (
            'title' => $l10n->_( 'Save Queries' ), 
            'tip' => $l10n->_( 'Saves the database queries to an array and that array can be displayed to help analyze those queries. When set to ON causes each query to be saved, how long that query took to execute, and what function called it.' ),
        );

        // Localization
        self::$fieldsData[ConfigFileFieldsNameMap::WPLANG] = array
        (
            'title' => $l10n->_( 'Language' ), 
            'tip' => $l10n->_( 'Defines the name of the language translation (.mo) file.' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WPLANG_DIR] = array
        (
            'title' => $l10n->_( 'Language Directory' ), 
            'tip' => $l10n->_( 'Defines what directory the Language .mo file resides. If Language Directory is not defined WordPress looks first to wp-content/languages and then wp-includes/languages for the .mo defined by Language file.' ),
        );
        
        // Maintenance
        self::$fieldsData[ConfigFileFieldsNameMap::WP_CACHE] = array
        (
            'title' => $l10n->_( 'Enable Cache' ), 
            'tip' => $l10n->_( 'If true, includes the wp-content/advanced-cache.php script, when executing wp-settings.php.' ),
        );        
        self::$fieldsData[ConfigFileFieldsNameMap::WP_MEMORY_LIMIT] = array
        (
            'title' => $l10n->_( 'Memory limit' ), 
            'tip' => $l10n->_( 'Allows you to specify the maximum amount of memory that can be consumed by PHP. This setting may be necessary in the event you receive a message such as "Allowed memory size of xxxxxx bytes exhausted".' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT] = array
        (
            'title' => $l10n->_( 'Max Memory limit' ), 
            'tip' => $l10n->_( 'When in the administration area, the memory can be increased or decreased from the Memory Limit by defining Max Memory Limit.' ),
        );

        // Multi site
        self::$fieldsData[ConfigFileFieldsNameMap::MULTISITE] = array
        (
            'title' => $l10n->_( 'Setup Multi Site installation' ), 
            'tip' => $l10n->_( 'is a feature introduced in WordPress Version 3.0 to enable multisite functionality previously achieved through WordPress MU. If this setting is absent from wp-config.php it defaults to false.' ),
            'dependencies' => array
            (
                ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL,
                ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE,
                ConfigFileFieldsNameMap::PATH_CURRENT_SITE,
                ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE,
                ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE,
                ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID,
            )
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE] = array
        (
            'title' => $l10n->_( 'Enable Multi Site' ), 
            'tip' => $l10n->_( 'Multi site feature is enabled on current Wordpress installation' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL] = array
        (
            'title' => $l10n->_( 'Enable Sub Domains' ), 
            'tip' => $l10n->_( 'Use sub domains for network sites' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE] = array
        (
            'title' => $l10n->_( 'Domain' ), 
            'tip' => $l10n->_( 'Root domain for multi site installations' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::PATH_CURRENT_SITE] = array
        (
            'title' => $l10n->_( 'Root path' ), 
            'tip' => $l10n->_( 'Root path for multi site installations' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE] = array
        (
            'title' => $l10n->_( 'Site Id' ), 
            'tip' => $l10n->_( 'Current Site Id' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE] = array
        (
            'title' => $l10n->_( 'Current Blog Id' ), 
            'tip' => $l10n->_( 'Current Blog Id' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID] = array
        (
            'title' => $l10n->_( 'Primary Network Id' ), 
            'tip' => $l10n->_( 'Primary Network Id' ),
        );

        // Post
        self::$fieldsData[ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL] = array
        (
            'title' => $l10n->_( 'Autosave Interval' ), 
            'tip' => $l10n->_( 'When editing a post, WordPress uses Ajax to auto-save revisions to the post as you edit. You may want to increase this setting for longer delays in between auto-saves, or decrease the setting to make sure you never lose changes. The default is 60 seconds' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS] = array
        (
            'title' => $l10n->_( 'Empty Trash (Days)' ), 
            'tip' => $l10n->_( 'Added with Version 2.9, this constant controls the number of days before WordPress permanently deletes posts, pages, attachments, and comments, from the trash bin. The default is 30 days.  disable trash set the number of days to zero. Note that WordPress will not ask for confirmation when someone clicks on "Delete Permanently' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS] = array
        (
            'title' => $l10n->_( 'Enable Revisions' ), 
            'tip' => $l10n->_( 'Enable / Disable post revisions' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_POST_REVISIONS] = array
        (
            'title' => $l10n->_( 'Max Revisions Count' ), 
            'tip' => $l10n->_( 'Maximum number of revisions per post or page can be specified.' ),
        );

        // Proxy
        self::$fieldsData[ConfigFileFieldsNameMap::WP_PROXY_HOST] = array
        (
            'title' => $l10n->_( 'Host' ), 
            'tip' => $l10n->_( 'Enable proxy support and host for connecting' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_PROXY_PORT] = array
        (
            'title' => $l10n->_( 'Port' ), 
            'tip' => $l10n->_( 'Proxy port for connection. No default, must be defined' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_PROXY_USERNAME] = array
        (
            'title' => $l10n->_( 'User' ), 
            'tip' => $l10n->_( 'Proxy username, if it requires authentication' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_PROXY_PASSWORD] = array
        (
            'title' => $l10n->_( 'Password' ), 
            'tip' => $l10n->_( 'Proxy password, if it requires authentication' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS] = array
        (
            'title' => $l10n->_( 'Bypass Hosts' ), 
            'tip' => $l10n->_( 'Will prevent the hosts in this list from going through the proxy' ),
        );

        // Security
        self::$fieldsData[ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT] = array
        (
            'title' => $l10n->_( 'Disable Plugin &amp; Theme Editor' ), 
            'tip' => $l10n->_( 'Occasionally you may wish to disable the plugin or theme editor to prevent overzealous users from being able to edit sensitive files and potentially crash the site. Disabling these also provides an additional layer of security if a hacker gains access to a well-privileged user account.<strong>Please note: the functionality of some plugins may be affected by the use of current_user_can(\'edit_plugins\') in their code. Plugin authors should avoid checking for this capability, or at least check if this constant is set and display an appropriate error message. Be aware that if a plugin is not working this may be the cause.<strong>' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::FORCE_SSL_ADMIN] = array
        (
            'title' => $l10n->_( 'Force SSL Admin' ), 
            'tip' => $l10n->_( 'when you want to secure logins and the admin area so that both passwords and cookies are never sent in the clear. This is the most secure option.' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::FORCE_SSL_LOGIN] = array
        (
            'title' => $l10n->_( 'Force SSL Login' ), 
            'tip' => $l10n->_( 'when you want to secure logins so that passwords are not sent in the clear, but you still want to allow non-SSL admin sessions (since SSL can be slow).' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML] = array
        (
            'title' => $l10n->_( 'Disallow Unfiltered HTML' ), 
            'tip' => $l10n->_( 'Disallow unfiltered HTML for everyone, including administrators and super administrators. To disallow unfiltered HTML for all users, you can add this to wp-config.php:' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS] = array
        (
            'title' => $l10n->_( 'Allow Unfiltered Uploads' ), 
            'tip' => $l10n->_( 'Allow unfilered Uploads' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL] = array
        (
            'title' => $l10n->_( 'Block External Url' ), 
            'tip' => $l10n->_( 'Block external URL requests by defining WP_HTTP_BLOCK_EXTERNAL as true and this will only allow localhost and your blog to make requests' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS] = array
        (
            'title' => $l10n->_( 'Accessible Hosts List' ), 
            'tip' => $l10n->_( 'Write host you would like to allow in the input field and preess Enter. The constant WP_ACCESSIBLE_HOSTS will allow additional hosts to go through for requests. The format of the WP_ACCESSIBLE_HOSTS constant is a comma separated list of hostnames to allow, wildcard domains are supported, eg *.wordpress.org will allow for all subdomains of wordpress.org to be contacted.' ),
        );

        // Upgrade
        self::$fieldsData[ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED] = array
        (
            'title' => $l10n->_( 'Disable Automatic Update' ), 
            'tip' => $l10n->_( 'Disable all automatic updates' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE] = array
        (
            'title' => $l10n->_( 'Core' ), 
            'tip' => $l10n->_( 'The easiest way to manipulate core updates is with the WP_AUTO_UPDATE_CORE constant' ),
            'choices' => array
            (
                'true' => $l10n->_( 'Enable' ),
                'minor' => $l10n->_( 'Enable only Minor updates' ),
                'false' => $l10n->_( 'Disable' ),                
            )
        );

        self::$fieldsData[ConfigFileFieldsNameMap::DISALLOW_FILE_MODS] = array
        (
            'title' => $l10n->_( 'Disable Plugins and Themes' ), 
            'tip' => $l10n->_( 'This will block users being able to use the plugin and theme installation/update functionality from the WordPress admin area. Setting this constant also disables the Plugin and Theme editor (i.e. you don\'t need to set DISALLOW_FILE_MODS and DISALLOW_FILE_EDIT, as on its own DISALLOW_FILE_MODS will have the same effect).' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::FS_METHOD] = array
        (
            'title' => $l10n->_( 'File System Method' ), 
            'tip' => $l10n->_( 'forces the filesystem method. It should only be "direct", "ssh2", "ftpext", or "ftpsockets". Generally, you should only change this if you are experiencing update problems. If you change it and it doesn\'t help, change it back/remove it. Under most circumstances, setting it to \'ftpsockets\' will work if the automatically chosen method does not.<br><br>(Primary Preference) "direct" forces it to use Direct File I/O requests from within PHP, this is fraught with opening up security issues on poorly configured hosts, This is chosen automatically when appropriate
                        <br><br><strong>
                        (Secondary Preference) "ssh2" is to force the usage of the SSH PHP Extension if installed</strong>
                        <br><br><strong>
                        (3rd Preference) "ftpext" is to force the usage of the FTP PHP Extension for FTP Access, and finally</strong>
                        <br><br><strong>
                        (4th Preference) "ftpsockets" utilises the PHP Sockets Class for FTP Access.</strong>' ),
                        
            'choices' => array
            (                
                '' => '',
                'direct' => $l10n->_( 'Direct (direct)' ),
                'ssh2' => $l10n->_( 'SSH 2 (ssh2)' ),
                'ftpext' => $l10n->_( 'FTP Extension (ftpext)' ),
                'ftpsockets' => $l10n->_( 'FTP Sockets (ftpsockets)' ),
            )
        );
        self::$fieldsData[ConfigFileFieldsNameMap::FTP_BASE] = array
        (
            'title' => $l10n->_( 'FTP ABS Path' ), 
            'tip' => $l10n->_( 'The full path to the "base"(ABSPATH) folder of the WordPress installation' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::FTP_CONTENT_DIR] = array
        (
            'title' => $l10n->_( 'FTP Content Dir ABS Path' ), 
            'tip' => $l10n->_( 'The full path to the wp-content folder of the WordPress installation' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::FTP_PLUGIN_DIR] = array
        (
            'title' => $l10n->_( 'Plugins Dir ABS Path' ), 
            'tip' => $l10n->_( 'The full path to the plugins folder of the WordPress installation' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::FTP_PUBKEY] = array
        (
            'title' => $l10n->_( 'Public Key' ), 
            'tip' => $l10n->_( 'The full path to your SSH public key' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::FTP_PRIKEY] = array
        (
            'title' => $l10n->_( 'Private Key' ), 
            'tip' => $l10n->_( 'The full path to your SSH private key' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::FTP_USER] = array
        (
            'title' => $l10n->_( 'User' ), 
            'tip' => $l10n->_( 'either user FTP or SSH username. Most likely these are the same, but use the appropriate one for the type of update you wish to do.' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::FTP_PASS] = array
        (
            'title' => $l10n->_( 'Password' ), 
            'tip' => $l10n->_( 'The password for the username entered for FTP_USER. If you are using SSH public key authentication this can be omitted.' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::FTP_HOST] = array
        (
            'title' => $l10n->_( 'FTP Host' ), 
            'tip' => $l10n->_( 'the hostname:port combination for your SSH/FTP server. The default FTP port is 21 and the default SSH port is 22. These do not need to be mentioned.' ),
        );
        self::$fieldsData[ConfigFileFieldsNameMap::FTP_SSL] = array
        (
            'title' => $l10n->_( 'Secure Connection' ), 
            'tip' => $l10n->_( 'TRUE for SSL-connection if supported by the underlying transport (not available on all servers). This is for "Secure FTP" not for SSH SFTP.' ),
        );
    }
    
}
