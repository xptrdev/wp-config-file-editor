<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Lib\ConfigFile;

use WPPFW\Forms\Form;
use WCFE\Modules\Editor\Model\ConfigFile\Fields;
use WCFE\Modules\Editor\Model\ConfigFile\Fields\Types;

use WCFE\Modules\Editor\ConfigFileNamesMap;
use WCFE\Modules\Editor\ConfigFileFieldsNameMap;

use WCFE\Modules\Editor\Lib\FieldsFactoryBase;


/**
* 
*/
class WriterFieldsFactory
extends FieldsFactoryBase 
{
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $fields = array();
    
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
    protected $initialized = false;
    
    /**
    * put your comment there...
    * 
    * @param Forms\Form $form
    * @return {WriterFieldsFactory|Forms\Form}
    */
    public function __construct(Form & $form)
    {
        $this->form =& $form;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieAdminPath()
    {
        
        $this->fields[ConfigFileFieldsNameMap::ADMIN_COOKIE_PATH] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::ADMIN_COOKIE_PATH,
            new Fields\Types\StringType(),
            array
            (
                'Admin cookies path'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => (SITECOOKIEPATH . 'wp-admin')
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieAuth()
    {
        $this->fields[ConfigFileFieldsNameMap::AUTH_COOKIE] = new Fields\Constant(  
            $this,
            ConfigFileNamesMap::AUTH_COOKIE,
            new Fields\Types\StringType(),
            array
            (
                'Admin cookies path'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => Fields\CookieNamedBase::getSuppressionValue('wordpress_')
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieDomain()
    {
        $this->fields[ConfigFileFieldsNameMap::COOKIE_DOMAIN] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::COOKIE_DOMAIN,
            new Fields\Types\StringType(),
            array
            (
                'Cookies Hash'
            ),
            array
            (
                'suppressOutput' => true,
            )
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookieHash()
    {
        $this->fields[ConfigFileFieldsNameMap::COOKIEHASH] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::COOKIEHASH,
            new Fields\Types\StringType(),
            array
            (
                'Cookies Hash'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => Fields\CookieNamedBase::getSuppressionValue()
            )
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookieLoggedIn()
    {
        $this->fields[ConfigFileFieldsNameMap::LOGGED_IN_COOKIE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::LOGGED_IN_COOKIE,
            new Fields\Types\StringType(),
            array
            (
                'Logged In Cookie'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => Fields\CookieNamedBase::getSuppressionValue('wordpress_logged_in_')
            )
        );
    }
            
    /**
    * put your comment there...
    * 
    */
    public function createCookiePass()
    {
        $this->fields[ConfigFileFieldsNameMap::PASS_COOKIE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::PASS_COOKIE,
            new Fields\Types\StringType(),
            array
            (
                'Pass Cookie'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => Fields\CookieNamedBase::getSuppressionValue('wordpresspass_')
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookiePath()
    {
        $this->fields[ConfigFileFieldsNameMap::COOKIEPATH] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::COOKIEPATH,
            new Fields\Types\StringType(),
            array
            (
                'Path cookie'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => preg_replace('|https?://[^/]+|i', '', get_option('home') . '/')
            )
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookiePluginsPath()
    {
        $this->fields[ConfigFileFieldsNameMap::PLUGINS_COOKIE_PATH] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::PLUGINS_COOKIE_PATH,
            new Fields\Types\StringType(),
            array
            (
                'Plugins path cookie'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => preg_replace('|https?://[^/]+|i', '', WP_PLUGIN_URL)
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieSecureAuth()
    {
        $this->fields[ConfigFileFieldsNameMap::SECURE_AUTH_COOKIE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::SECURE_AUTH_COOKIE,
            new Fields\Types\StringType(),
            array
            (
                'Where to load language\'s file'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => Fields\CookieNamedBase::getSuppressionValue('wordpress_sec_')
            )
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookieSitePath()
    {
        $this->fields[ConfigFileFieldsNameMap::SITECOOKIEPATH] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::SITECOOKIEPATH,
            new Fields\Types\StringType(),
            array
            (
                'Site path cookie'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => preg_replace('|https?://[^/]+|i', '', get_option('siteurl') . '/')
            )
        );
    }
        
    /**
    * put your comment there...
    * 
    */
    public function createCookieTest()
    {
        $this->fields[ConfigFileFieldsNameMap::TEST_COOKIE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::TEST_COOKIE,
            new Fields\Types\StringType(),
            array
            (
                'Test Cookie'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => 'wordpress_test_cookie'
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieUser()
    {
        $this->fields[ConfigFileFieldsNameMap::USER_COOKIE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::USER_COOKIE,
            new Fields\Types\StringType(),
            array
            (
                'User cookie'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => Fields\CookieNamedBase::getSuppressionValue('wordpressuser_')
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCronDisable()
    {
        $this->fields[ConfigFileFieldsNameMap::DISABLE_WP_CRON] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::DISABLE_WP_CRON,
            new Fields\Types\BooleanType(),
            array
            (
                'Disable the cron entirely by setting DISABLE_WP_CRON to true.'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCronAlternate()
    {
        $this->fields[ConfigFileFieldsNameMap::ALTERNATE_WP_CRON] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::ALTERNATE_WP_CRON,
            new Fields\Types\BooleanType(),
            array
            (
                'Use this, for example, if scheduled posts are not getting published. 

                According to Otto\'s forum explanation, "this alternate method uses a redirection approach, 
                which makes the users browser get a redirect when the cron needs to run, 
                so that they come back to the site immediately while cron continues to run in the connection they just dropped. 
                This method is a bit iffy sometimes, which is why it\'s not the default."'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCronLockTimeOut()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_CRON_LOCK_TIMEOUT,
            new Fields\Types\NumericType(),
            array
            (
                'Make sure a cron process cannot run more than once every WP_CRON_LOCK_TIMEOUT seconds'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => 60,
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseAllowRepair()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_ALLOW_REPAIR] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_ALLOW_REPAIR,
            new Fields\Types\BooleanType(),
            array
            (
                'automatic database optimization support.'
            ),
            array
            (
                'suppressOutput' => true,
            )
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createDatabaseCharset()
    {
        $this->fields[ConfigFileFieldsNameMap::DB_CHARSET] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::DB_CHARSET,
            new Fields\Types\StringType(),
            array
            (
                'Database Charset to use in creating database tables.'
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseCollate()
    {
        $this->fields[ConfigFileFieldsNameMap::DB_COLLATE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::DB_COLLATE,
            new Fields\Types\StringType(),
            array
            (
                'The Database Collate type. Don\'t change this if in doubt.'
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseUpgradeGlobalTables()
    {
        $this->fields[ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::DO_NOT_UPGRADE_GLOBAL_TABLES,
            new Fields\Types\BooleanType(),
            array
            (
                'A DO_NOT_UPGRADE_GLOBAL_TABLES define prevents dbDelta() and the upgrade functions from doing expensive queries against global tables'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseName()
    {
        $this->fields[ConfigFileFieldsNameMap::DB_NAME] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::DB_NAME,
            new Fields\Types\StringType(),
            array
            (
                'The name of the database for WordPress'
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseUser()
    {
        $this->fields[ConfigFileFieldsNameMap::DB_USER] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::DB_USER,
            new Fields\Types\StringType(),
            array
            (
                'MySQL database username'
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabasePassword()
    {
        $this->fields[ConfigFileFieldsNameMap::DB_PASSWORD] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::DB_PASSWORD,
            new Fields\Types\StringType(),
            array
            (
                'MySQL database password'
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseHost()
    {
        $this->fields[ConfigFileFieldsNameMap::DB_HOST] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::DB_HOST,
            new Fields\Types\StringType(),
            array
            (
                'MySQL hostname'
            ),
            null,
            function(Fields\Field $field)
            {

                $value = $field->_cbDefaultGetValue();

                if ($port = $field->getForm()->get(ConfigFileFieldsNameMap::DB_PORT)->getValue())
                {
                    $value .= ":{$port}";
                }

                return $value;
            }
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseTablePrefix()
    {
        $this->fields[ConfigFileFieldsNameMap::DB_TABLE_PREFIX] = new Fields\Variable(
            $this,
            ConfigFileNamesMap::DB_TABLE_PREFIX,
            new Fields\Types\StringType(),
            array
            (
                'WordPress Database Table prefix.

                You can have multiple installations in one database if you give each a unique
                prefix. Only numbers, letters, and underscores please!'
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugConcatenateScripts()
    {
        $this->fields[ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::CONCATENATE_SCRIPTS,
            new Fields\Types\BooleanType(),
            array
            (
                'For developers: WordPress Script Debugging

                Force Wordpress to use unminified JavaScript files'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugSaveQueries()
    {
        $this->fields[ConfigFileFieldsNameMap::SAVEQUERIES] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::SAVEQUERIES,
            new Fields\Types\BooleanType(),
            array
            (
                'The SAVEQUERIES definition saves the database queries to an array and that array can 
                be displayed to help analyze those queries. 
                The constant defined as true causes each query to be saved, 
                how long that query took to execute, and what function called it.'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugScriptDebug()
    {
        $this->fields[ConfigFileFieldsNameMap::SCRIPT_DEBUG] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::SCRIPT_DEBUG,
            new Fields\Types\BooleanType(),
            array
            (
                'For developers: WordPress Script Debugging

                Force Wordpress to use unminified JavaScript files'
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugWPDebug()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_DEBUG] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_DEBUG,
            new Fields\Types\BooleanType(),
            array
            (
                'For developers: WordPress debugging mode.

                Change this to true to enable the display of notices during development.
                It is strongly recommended that plugin and theme developers use WP_DEBUG
                in their development environments.'
            ),
            array
            (
                'suppressOutput' => true,
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugDisplay()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_DEBUG_DISPLAY,
            new Fields\Types\BooleanType(),
            null,
            array
            (
                'suppressOutput' => true,
                'supressionValue' => true,
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugLog()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_DEBUG_LOG] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_DEBUG_LOG,
            new Fields\Types\BooleanType(),
            null,
            array
            (
                'suppressOutput' => true,
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createLocalizeLang()
    {
        $this->fields[ConfigFileFieldsNameMap::WPLANG] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WPLANG,
            new Fields\Types\StringType(),
            array
            (
                'WordPress Localized Language, defaults to English.

                Change this to localize WordPress. A corresponding MO file for the chosen
                language must be installed to wp-content/languages. For example, install
                de_DE.mo to wp-content/languages and set WPLANG to \'de_DE\' to enable German
                language support.'
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createLocalizeLangDir()
    {
        $this->fields[ConfigFileFieldsNameMap::WPLANG_DIR] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WPLANG_DIR,
            new Fields\Types\StringType(),
            array
            (
                'Where to load language\'s file'
            ),
            array
            (
                'suppressOutput' => true,
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMaintenanceMaxMemoryLimit()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_MAX_MEMORY_LIMIT,
            new Fields\Types\StringType(),
            array
            (
                'Max Memory Limit'
            ),
            array
            (
                'suppressOutput' => true,
            )
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createMaintenanceMemoryLimit()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_MEMORY_LIMIT] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_MEMORY_LIMIT,
            new Fields\Types\StringType(),
            array
            (
                'Memory Limit'
            ),
            array
            (
                'suppressOutput' => true,
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMaintenanceCache()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_CACHE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_CACHE,
            new Fields\Types\BooleanType(),
            array
            (
                'Wordpress Cache!!'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisite()
    {
        $this->fields[ConfigFileFieldsNameMap::MULTISITE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::MULTISITE,
            new Fields\Types\BooleanType(),
            array
            (
                'Enable Multisite for current Wordpress installation'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressOutputDeps' => array
                (
                    ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL,
                    ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE,
                    ConfigFileFieldsNameMap::PATH_CURRENT_SITE, 
                    ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE,
                    ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE,
                    ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID,
                )
            ),
            null,
            function(Fields\Field $field)
            {        
                # Stop WP_ALLOW_MULTISITE if I'm true
                $this->getField(
                
                    ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE
                    
                    )->setSuppressOutputForce($field->getValue());
            }
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteAllow()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_ALLOW_MULTISITE,
            new Fields\Types\BooleanType(),
            array
            (
                'Setup Multi site'
            ),
            array
            (
                'suppressOutput' => true,
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteBlogIdCurrentSite()
    {
        $this->fields[ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::BLOG_ID_CURRENT_SITE,
            new Fields\Types\NumericType(),
            array
            (
                'Multi Site current Blog Id'
            ),
            array
            (
                'suppressOutput' => true,
            )
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createMultisiteDomainCurrentSite()
    {
        $this->fields[ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::DOMAIN_CURRENT_SITE,
            new Fields\Types\StringType(),
            array
            (
                'Multi Site Domain'
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisitePathCurrentSite()
    {
        $this->fields[ConfigFileFieldsNameMap::PATH_CURRENT_SITE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::PATH_CURRENT_SITE,
            new Fields\Types\StringType(),
            array
            (
                'Multi Site Current Root path'
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisitePrimaryNetworkId()
    {
        $this->fields[ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::PRIMARY_NETWORK_ID,
            new Fields\Types\NumericType(),
            array
            (
                'Primary network site id'
            ),
            array
            (
                'suppressOutput' => true,
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteSiteIdCurrentSite()
    {
        $this->fields[ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::SITE_ID_CURRENT_SITE,
            new Fields\Types\NumericType(),
            array
            (
                'Multi Site Current site Id'
            ),
            array
            (
                'suppressOutput' => true,
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteSubDomainInstall()
    {
        $this->fields[ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::SUBDOMAIN_INSTALL,
            new Fields\Types\BooleanType(),
            array
            (
                'Use sub domains for network sites'
            )
        );
    }

    /**
    * put your comment there...
    * 
    */
    public function createPostAutoSaveInterval()
    {
        $this->fields[ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::AUTOSAVE_INTERVAL,
            new Fields\Types\NumericType(),
            array
            (
                'Post Autosave Interval'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => 60,
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createPostEmptyTrashDays()
    {
        $this->fields[ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::EMPTY_TRASH_DAYS,
            new Fields\Types\NumericType(),
            array
            (
                'this constant controls the number of days before WordPress permanently deletes 
                posts, pages, attachments, and comments, from the trash bin'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => 30,
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createPostRevisions()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_POST_REVISIONS] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_POST_REVISIONS,
            null,
            array
            (
                'this constant controls the number of days before WordPress permanently deletes 
                posts, pages, attachments, and comments, from the trash bin'
            ),
            null,
            null,
            function(Fields\Field & $gField)
            {
                $enablePostRevisions = $gField->getForm()->get(ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS)->getValue();
                $postRevisions = $gField->getField()->getValue();

                # Set WP_POST_REVISIONS = FALSE if either disabled or value set to 0/null
                if (!$enablePostRevisions || !$postRevisions)
                {
                    
                    $gField->setCBValue(
                        function() use ($enablePostRevisions)
                        {
                            return (bool) $enablePostRevisions;
                        }
                    );
                    
                    $gField->setType(new Fields\Types\BooleanType());
                }
                else
                {
                    $gField->setType(new Fields\Types\NumericType());
                }
            }
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyBypassHosts()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_PROXY_BYPASS_HOSTS,
            new Fields\Types\StringType(),
            array
            (
                'Will prevent the hosts in this list from going through the proxy'
            ),
            array
            (
                'suppressOutput' => true
            ),
            function(Fields\Field & $gField)
            {
                return implode(',', $gField->getField()->getValue());
            }
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyHost()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_PROXY_HOST] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_PROXY_HOST,
            new Fields\Types\StringType(),
            array
            (
                'Enable proxy support and host for connecting'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyPassword()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_PROXY_PASSWORD] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_PROXY_PASSWORD,
            new Fields\Types\StringType(),
            array
            (
                'Proxy password, if it requires authentication'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyPort()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_PROXY_PORT] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_PROXY_PORT,
            new Fields\Types\StringType(),
            array
            (
                'Proxy port for connection. No default, must be defined'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyUserName()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_PROXY_USERNAME] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_PROXY_USERNAME,
            new Fields\Types\StringType(),
            array
            (
                'Proxy username, if it requires authentication'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityAccessibleHosts()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_ACCESSIBLE_HOSTS,
            new Fields\Types\StringType(),
            array
            (
                'The constant WP_ACCESSIBLE_HOSTS will allow additional hosts to go through for requests'
            ),
            array
            (
                'suppressOutput' => true
            ),
            function(Fields\Field & $gField)
            {
                return implode(',', $gField->getField()->getValue());
            }
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityAllowUnfilteredUploads()
    {
        $this->fields[ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::ALLOW_UNFILTERED_UPLOADS,
            new Fields\Types\BooleanType(),
            array
            (
                ''
            ),
            array
            (
                'suppressOutput' => true,
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityHTTPBlockExternal()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_HTTP_BLOCK_EXTERNAL,
            new Fields\Types\BooleanType(),
            array
            (
                'Block external URL requests by defining WP_HTTP_BLOCK_EXTERNAL as true and this will only allow localhost and your blog to make requests'
            ),
            array
            (
                'suppressOutput' => true
            ),
            null,
            function(Fields\Field & $gField)
            {
                # Suppress Accessible hosts if FALSE
                $accessibleHosts = $this->getField(ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS);
                $accessibleHosts->setSuppressOutputForce(!$gField->getValue());
            }
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityDisallowFileEdit()
    {
        $this->fields[ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::DISALLOW_FILE_EDIT,
            new Fields\Types\BooleanType(),
            array
            (
                'Disable Plugins and Themes file editor.'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityDisallowUnfilteredHTML()
    {
        $this->fields[ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::DISALLOW_UNFILTERED_HTML,
            new Fields\Types\BooleanType(),
            array
            (
                'disallow unfiltered HTML for everyone, including administrators and super administrators. To disallow unfiltered HTML for all users, you can add this to wp-config.php:'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityForceSSLAdmin()
    {
        $this->fields[ConfigFileFieldsNameMap::FORCE_SSL_ADMIN] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::FORCE_SSL_ADMIN,
            new Fields\Types\BooleanType(),
            array
            (
                'when you want to secure logins and the admin area so that both passwords and cookies are never sent in the clear. This is the most secure option'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityForceSSLLogin()
    {
        $this->fields[ConfigFileFieldsNameMap::FORCE_SSL_LOGIN] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::FORCE_SSL_LOGIN,
            new Fields\Types\BooleanType(),
            array
            (
                'when you want to secure logins so that passwords are not sent in the clear, but you still want to allow non-SSL admin sessions (since SSL can be slow).'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysAuth()
    {
        $this->fields[ConfigFileFieldsNameMap::AUTH_KEY] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::AUTH_KEY,
            new Fields\Types\StringType(),
            array
            (
                'Authentication Unique Keys and Salts.

                Change these to different unique phrases!
                You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
                You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

                @since 2.6.0'
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysAuthSalt()
    {
        $this->fields[ConfigFileFieldsNameMap::AUTH_SALT] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::AUTH_SALT,
            new Fields\Types\StringType()
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysLoggedIn()
    {
        $this->fields[ConfigFileFieldsNameMap::LOGGED_IN_KEY] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::LOGGED_IN_KEY,
            new Fields\Types\StringType()
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysLoggedInSalt()
    {
       $this->fields[ConfigFileFieldsNameMap::LOGGED_IN_SALT] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::LOGGED_IN_SALT,
            new Fields\Types\StringType()
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysNonce()
    {
        $this->fields[ConfigFileFieldsNameMap::NONCE_KEY] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::NONCE_KEY,
            new Fields\Types\StringType()
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysNonceSalt()
    {
        $this->fields[ConfigFileFieldsNameMap::NONCE_SALT] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::NONCE_SALT,
            new Fields\Types\StringType()
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysSecureAuth()
    {
        $this->fields[ConfigFileFieldsNameMap::SECURE_AUTH_KEY] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::SECURE_AUTH_KEY,
            new Fields\Types\StringType()
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysSecureAuthSalt()
    {
        $this->fields[ConfigFileFieldsNameMap::SECURE_AUTH_SALT] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::SECURE_AUTH_SALT,
            new Fields\Types\StringType()
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeAutoUpdateCore()
    {
        $this->fields[ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::WP_AUTO_UPDATE_CORE,
            null,
            array
            (
                'The easiest way to manipulate core updates is with the WP_AUTO_UPDATE_CORE constant'
            ),
            array
            (
                'suppressOutput' => true,
                'suppressionValue' => 'minor'
            ),
            null,
            function(Fields\Field & $gField)
            {
                
                $gField->setCBValue(
                
                    function(Fields\Field & $gField)
                    {
                        return $gField->getParam('value');
                    }
                );
                
                # Based on the value create either BOOLEAN or STRING type 
                # and set the value
                $stringValue = $gField->getField()->getValue();

                if ($stringValue != 'minor')  // It means either true/false
                {
                    $gField->setType(new Types\BooleanType());
                    $gField->setParam('value', $stringValue == 'true' ? true : false);
                }
                else 
                {
                    $gField->setType(new Types\StringType());
                    $gField->setParam('value', $stringValue);
                }
            }
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeAutmaticUpdater()
    {
        $this->fields[ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::AUTOMATIC_UPDATER_DISABLED,
            new Fields\Types\BooleanType(),
            array
            (
                'Disable all automatic updates'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeDisallowFileMods()
    {
        $this->fields[ConfigFileFieldsNameMap::DISALLOW_FILE_MODS] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::DISALLOW_FILE_MODS,
            new Fields\Types\BooleanType(),
            array
            (
                'This will block users being able to use the plugin and theme installation/update functionality from the WordPress admin area. Setting this constant also disables the Plugin and Theme editor (i.e. you don\'t need to set DISALLOW_FILE_MODS and DISALLOW_FILE_EDIT, as on its own DISALLOW_FILE_MODS will have the same effect).'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemMethod()
    {
        $this->fields[ConfigFileFieldsNameMap::FS_METHOD] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::FS_METHOD,
            new Fields\Types\StringType(),
            array
            (
                'Forces the filesystem method'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPBasePath()
    {
        $this->fields[ConfigFileFieldsNameMap::FTP_BASE] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::FTP_BASE,
            new Fields\Types\StringType(),
            array
            (
                'Full path to the "base"(ABSPATH) folder of the WordPress installation.'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPContentDirPath()
    {
        $this->fields[ConfigFileFieldsNameMap::FTP_CONTENT_DIR] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::FTP_CONTENT_DIR,
            new Fields\Types\StringType(),
            array
            (
                'full path to the wp-content folder of the WordPress installation'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPHost()
    {
        $this->fields[ConfigFileFieldsNameMap::FTP_HOST] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::FTP_HOST,
            new Fields\Types\StringType(),
            array
            (
                'The hostname:port combination for your SSH/FTP server. The default FTP port is 21 and the default SSH port is 22. These do not need to be mentioned.'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPassword()
    {
        $this->fields[ConfigFileFieldsNameMap::FTP_PASS] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::FTP_PASS,
            new Fields\Types\StringType(),
            array
            (
                'The password for the username entered for FTP_USER. If you are using SSH public key authentication this can be omitted'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPluginDirPath()
    {
        $this->fields[ConfigFileFieldsNameMap::FTP_PLUGIN_DIR] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::FTP_PLUGIN_DIR,
            new Fields\Types\StringType(),
            array
            (
                'Full path to the plugins folder of the WordPress installation'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPrivateKeyPath()
    {
        $this->fields[ConfigFileFieldsNameMap::FTP_PRIKEY] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::FTP_PRIKEY,
            new Fields\Types\StringType(),
            array
            (
                'Full path to your SSH private key'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPublicKeyPath()
    {
        $this->fields[ConfigFileFieldsNameMap::FTP_PUBKEY] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::FTP_PUBKEY,
            new Fields\Types\StringType(),
            array
            (
                'Full path to your SSH public key'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPSSL()
    {
        $this->fields[ConfigFileFieldsNameMap::FTP_SSL] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::FTP_SSL,
            new Fields\Types\BooleanType(),
            array
            (
                'TRUE for SSL-connection if supported by the underlying transport (not available on all servers). This is for "Secure FTP" not for SSH SFTP'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPUser()
    {
        $this->fields[ConfigFileFieldsNameMap::FTP_USER] = new Fields\Constant(
            $this,
            ConfigFileNamesMap::FTP_USER,
            new Fields\Types\StringType(),
            array
            (
                'Either user FTP or SSH username. Most likely these are the same, but use the appropriate one for the type of update you wish to do.'
            ),
            array
            (
                'suppressOutput' => true
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function & fullLoad()
    {
        
        $factories = $this->getAllFactories();
        
        foreach ($factories as $factory)
        {
            $factory->invoke($this);
        }
        
        $this->initializeFields();
        
        return $this;
    }
    
    /**
    * put your comment there...
    * 
    * @param mixed $name
    */
    public function & getField($name)
    {
        
        if (!isset($this->fields[$name]))
        {
            throw new \Exception("Field {$name} does not exists!");
        }
        
        return $this->fields[$name];
    }
    
    /**
    * put your comment there...
    * 
    */
    public function getFields()
    {
        return $this->fields;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function & getForm()
    {
        return $this->form;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function initializeFields()
    {
        
        if ($this->initialized)
        {
            throw new \Exception('Fields already initialized!');
        }
        
        $this->initialized = true;
        
        # Allow fields to interact and to Controler each others 
        # by making second iteration after constructions!!
        foreach ($this->fields as $field)
        {
            $field->initSuppression();
        }
    }
}