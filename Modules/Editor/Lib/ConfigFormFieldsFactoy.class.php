<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Lib;

use WPPFW\Forms;
use WCFE\Modules\Editor\ConfigFileFieldsNameMap;


/**
* 
*/
class ConfigFileFormFieldsFactory
extends FieldsFactoryBase
{
    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    private static $instance;
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieAdminPath()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::ADMIN_COOKIE_PATH);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieAuth()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::AUTH_COOKIE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieDomain()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::COOKIE_DOMAIN);
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookieHash()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::COOKIEHASH);
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookieLoggedIn()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::LOGGED_IN_COOKIE);
    }
            
    /**
    * put your comment there...
    * 
    */
    public function createCookiePass()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::PASS_COOKIE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookiePath()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::COOKIEPATH);
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookiePluginsPath()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::PLUGINS_COOKIE_PATH);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieSecureAuth()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::SECURE_AUTH_COOKIE);
    }

    /**
    * put your comment there...
    * 
    */
    public function createCookieSitePath()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::SITECOOKIEPATH);
    }
        
    /**
    * put your comment there...
    * 
    */
    public function createCookieTest()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::TEST_COOKIE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCookieUser()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::USER_COOKIE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCronDisable()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::DISABLE_WP_CRON);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCronAlternate()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::ALTERNATE_WP_CRON);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createCronLockTimeOut()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseAllowRepair()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_ALLOW_REPAIR);
    }

    /**
    * put your comment there...
    * 
    */
    public function createDatabaseCharset()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DB_CHARSET);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseCollate()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DB_COLLATE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseUpgradeGlobalTables()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseName()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::DB_NAME,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseUser()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::DB_USER,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabasePassword()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::DB_PASSWORD,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseHost()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::DB_HOST,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabasePort()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DB_PORT);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDatabaseTablePrefix()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::DB_TABLE_PREFIX,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugConcatenateScripts()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugSaveQueries()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::SAVEQUERIES);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugScriptDebug()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::SCRIPT_DEBUG);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugWPDebug()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_DEBUG);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugDisplay()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createDebugLog()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_DEBUG_LOG);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createLocalizeLang()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WPLANG);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createLocalizeLangDir()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WPLANG_DIR);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMaintenanceMaxMemoryLimit()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT);
    }

    /**
    * put your comment there...
    * 
    */
    public function createMaintenanceMemoryLimit()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_MEMORY_LIMIT);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMaintenanceCache()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_CACHE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisite()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::MULTISITE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteAllow()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteBlogIdCurrentSite()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE);
    }

    /**
    * put your comment there...
    * 
    */
    public function createMultisiteDomainCurrentSite()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisitePathCurrentSite()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::PATH_CURRENT_SITE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisitePrimaryNetworkId()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteSiteIdCurrentSite()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createMultisiteSubDomainInstall()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL);
    }

    /**
    * put your comment there...
    * 
    */
    public function createPostAutoSaveInterval()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createPostEmptyTrashDays()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createPostRevisionsStatus()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createPostRevisions()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_POST_REVISIONS);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyBypassHosts()
    {
        return new Forms\Fields\FormArrayField(
            ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS,
            new Forms\Fields\FormStringField('host')
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyHost()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_PROXY_HOST);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyPassword()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_PROXY_PASSWORD);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyPort()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_PROXY_PORT);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createProxyUserName()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_PROXY_USERNAME);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityAccessibleHosts()
    {
        return new Forms\Fields\FormArrayField(
            ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS,
            new Forms\Fields\FormStringField('host')
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityAllowUnfilteredUploads()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityHTTPBlockExternal()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityDisallowFileEdit()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityDisallowUnfilteredHTML()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityForceSSLAdmin()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::FORCE_SSL_ADMIN);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecurityForceSSLLogin()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::FORCE_SSL_LOGIN);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysAuth()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::AUTH_KEY,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysAuthSalt()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::AUTH_SALT,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysLoggedIn()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::LOGGED_IN_KEY,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysLoggedInSalt()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::LOGGED_IN_SALT,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysNonce()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::NONCE_KEY,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysNonceSalt()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::NONCE_SALT,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysSecureAuth()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::SECURE_AUTH_KEY,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createSecureKeysSecureAuthSalt()
    {
        return new Forms\Fields\FormStringField(
            ConfigFileFieldsNameMap::SECURE_AUTH_SALT,
            array
            (
                new \WPPFW\Forms\Rules\RequiredField()
            )
        );
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeAutoUpdateCore()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeAutmaticUpdater()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeDisallowFileMods()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::DISALLOW_FILE_MODS);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemMethod()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FS_METHOD);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPBasePath()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_BASE);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPContentDirPath()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_CONTENT_DIR);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPHost()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_HOST);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPassword()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_PASS);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPluginDirPath()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_PLUGIN_DIR);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPrivateKeyPath()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_PRIKEY);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPPublicKeyPath()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_PUBKEY);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPSSL()
    {
        return new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::FTP_SSL);
    }
    
    /**
    * put your comment there...
    * 
    */
    public function createUpgradeFileSystemFTPUser()
    {
        return new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_USER);
    }
    
    /**
    * put your comment there...
    * 
    */
    public static function instance()
    {
        
        if (!self::$instance)
        {
            self::$instance = new ConfigFileFormFieldsFactory();
        }
        
        return self::$instance;
    }
}