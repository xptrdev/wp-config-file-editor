<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Lib\ConfigFile;

use WCFE\Modules\Editor\ConfigFileFieldsNameMap;
use WCFE\Modules\Editor\ConfigFileNamesMap;
use WCFE\Modules\Editor\Lib\ConfigFileFactoriesFieldsNameMap;
use WCFE\Modules\Editor\Lib\RWFactoryBase;

/**
* 
*/
class Reader
extends RWFactoryBase
{

    
    /**
    * put your comment there...
    * 
    * @var mixed
    */
    protected $factorySuffix = 'load';
    
    /**
    * put your comment there...
    * 
    */
    public function getValues()
    {
        
        $values = array();
        $loaders = $this->getAllFactories();
        
        /**
        * put your comment there...
        * 
        * @var \ReflectionMethod
        */
        $loader;
        
        foreach ($loaders as $loader)
        {
            
            $loaderMetaName = substr(
                $loader->getName(),
                strlen($this->factorySuffix)
            );
            
            // From Factory Name get Form Field Name
            $fieldKey = ConfigFileFactoriesFieldsNameMap::getFactoryKey($loaderMetaName);
            $fieldName = ConfigFileFieldsNameMap::getFieldName($fieldKey);
            
            $values[$fieldName] = $loader->invoke($this);
            
        }
        
        return $values;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadCookieAdminPath()
    {
        return  defined(ConfigFileNamesMap::ADMIN_COOKIE_PATH) ?
                constant(ConfigFileNamesMap::ADMIN_COOKIE_PATH) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadCookieAuth()
    {
        return  defined(ConfigFileNamesMap::AUTH_COOKIE) ?
                constant(ConfigFileNamesMap::AUTH_COOKIE) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadCookieDomain()
    {
        return  defined(ConfigFileNamesMap::COOKIE_DOMAIN) ?
                constant(ConfigFileNamesMap::COOKIE_DOMAIN) :
                null;
    }

    /**
    * put your comment there...
    * 
    */
    public function loadCookieHash()
    {
        return  defined(ConfigFileNamesMap::COOKIEHASH) ?
                constant(ConfigFileNamesMap::COOKIEHASH) :
                null;
    }

    /**
    * put your comment there...
    * 
    */
    public function loadCookieLoggedIn()
    {
        return  defined(ConfigFileNamesMap::LOGGED_IN_COOKIE) ?
                constant(ConfigFileNamesMap::LOGGED_IN_COOKIE) :
                null;
    }
            
    /**
    * put your comment there...
    * 
    */
    public function loadCookiePass()
    {
        return  defined(ConfigFileNamesMap::PASS_COOKIE) ?
                constant(ConfigFileNamesMap::PASS_COOKIE) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadCookiePath()
    {
        return  defined(ConfigFileNamesMap::COOKIEPATH) ?
                constant(ConfigFileNamesMap::COOKIEPATH) :
                null;
    }

    /**
    * put your comment there...
    * 
    */
    public function loadCookiePluginsPath()
    {
        return  defined(ConfigFileNamesMap::PLUGINS_COOKIE_PATH) ?
                constant(ConfigFileNamesMap::PLUGINS_COOKIE_PATH) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadCookieSecureAuth()
    {
        return  defined(ConfigFileNamesMap::SECURE_AUTH_COOKIE) ?
                constant(ConfigFileNamesMap::SECURE_AUTH_COOKIE) :
                null;
    }

    /**
    * put your comment there...
    * 
    */
    public function loadCookieSitePath()
    {
        return  defined(ConfigFileNamesMap::SITECOOKIEPATH) ?
                constant(ConfigFileNamesMap::SITECOOKIEPATH) :
                null;
    }
        
    /**
    * put your comment there...
    * 
    */
    public function loadCookieTest()
    {
        return  defined(ConfigFileNamesMap::TEST_COOKIE) ?
                constant(ConfigFileNamesMap::TEST_COOKIE) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadCookieUser()
    {
        return  defined(ConfigFileNamesMap::USER_COOKIE) ?
                constant(ConfigFileNamesMap::USER_COOKIE) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadCronDisable()
    {
        return  defined(ConfigFileNamesMap::DISABLE_WP_CRON) ?
                constant(ConfigFileNamesMap::DISABLE_WP_CRON) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadCronAlternate()
    {
        return  defined(ConfigFileNamesMap::ALTERNATE_WP_CRON) ?
                constant(ConfigFileNamesMap::ALTERNATE_WP_CRON) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadCronLockTimeOut()
    {
        return  defined(ConfigFileNamesMap::WP_CRON_LOCK_TIMEOUT) ?
                constant(ConfigFileNamesMap::WP_CRON_LOCK_TIMEOUT) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDatabaseAllowRepair()
    {
        return  defined(ConfigFileNamesMap::WP_ALLOW_REPAIR) ?
                constant(ConfigFileNamesMap::WP_ALLOW_REPAIR) :
                null;
    }

    /**
    * put your comment there...
    * 
    */
    public function loadDatabaseCharset()
    {
        return  defined(ConfigFileNamesMap::DB_CHARSET) ?
                constant(ConfigFileNamesMap::DB_CHARSET) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDatabaseCollate()
    {
        return  defined(ConfigFileNamesMap::DB_COLLATE) ?
                constant(ConfigFileNamesMap::DB_COLLATE) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDatabaseUpgradeGlobalTables()
    {
        return  defined(ConfigFileNamesMap::DO_NOT_UPGRADE_GLOBAL_TABLES) ?
                constant(ConfigFileNamesMap::DO_NOT_UPGRADE_GLOBAL_TABLES) : null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDatabaseName()
    {
        return  defined(ConfigFileNamesMap::DB_NAME) ?
                constant(ConfigFileNamesMap::DB_NAME) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDatabaseUser()
    {
        return  defined(ConfigFileNamesMap::DB_USER) ?
                constant(ConfigFileNamesMap::DB_USER) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDatabasePassword()
    {
        return  defined(ConfigFileNamesMap::DB_PASSWORD) ?
                constant(ConfigFileNamesMap::DB_PASSWORD) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDatabaseHost()
    {
        
        $databaseHost = explode(':', constant(ConfigFileNamesMap::DB_HOST));
        
        return $databaseHost[0];
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDatabasePort()
    {
        
        $databaseHost = explode(':', constant(ConfigFileNamesMap::DB_HOST));
        
        return isset($databaseHost[1]) ? $databaseHost[1] : null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDatabaseTablePrefix()
    {
        return  isset($GLOBALS[ConfigFileNamesMap::DB_TABLE_PREFIX]) ?
                $GLOBALS[ConfigFileNamesMap::DB_TABLE_PREFIX] :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDebugConcatenateScripts()
    {
        return  defined(ConfigFileNamesMap::CONCATENATE_SCRIPTS) ?
                constant(ConfigFileNamesMap::CONCATENATE_SCRIPTS) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDebugSaveQueries()
    {
        return  defined(ConfigFileNamesMap::SAVEQUERIES) ?
                constant(ConfigFileNamesMap::SAVEQUERIES) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDebugScriptDebug()
    {
        return  defined(ConfigFileNamesMap::SCRIPT_DEBUG) ?
                constant(ConfigFileNamesMap::SCRIPT_DEBUG) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDebugWPDebug()
    {
        return  defined(ConfigFileNamesMap::WP_DEBUG) ?
                constant(ConfigFileNamesMap::WP_DEBUG) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDebugDisplay()
    {
        return  defined(ConfigFileNamesMap::WP_DEBUG_DISPLAY) ?
                constant(ConfigFileNamesMap::WP_DEBUG_DISPLAY) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadDebugLog()
    {
        return  defined(ConfigFileNamesMap::WP_DEBUG_LOG) ?
                constant(ConfigFileNamesMap::WP_DEBUG_LOG) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadLocalizeLang()
    {
        return  defined(ConfigFileNamesMap::WPLANG) ?
                constant(ConfigFileNamesMap::WPLANG) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadLocalizeLangDir()
    {
        return  defined(ConfigFileNamesMap::WPLANG_DIR) ?
                constant(ConfigFileNamesMap::WPLANG_DIR) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadMaintenanceMaxMemoryLimit()
    {
        return  defined(ConfigFileNamesMap::WP_MAX_MEMORY_LIMIT) ?
                constant(ConfigFileNamesMap::WP_MAX_MEMORY_LIMIT) :
                null;
    }

    /**
    * put your comment there...
    * 
    */
    public function loadMaintenanceMemoryLimit()
    {
        return  defined(ConfigFileNamesMap::WP_MEMORY_LIMIT) ?
                constant(ConfigFileNamesMap::WP_MEMORY_LIMIT) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadMaintenanceCache()
    {
        return  defined(ConfigFileNamesMap::WP_CACHE) ?
                constant(ConfigFileNamesMap::WP_CACHE) :
                0;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadMultisite()
    {
        return  defined(ConfigFileNamesMap::MULTISITE) ?
                constant(ConfigFileNamesMap::MULTISITE) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadMultisiteAllow()
    {
        return  defined(ConfigFileNamesMap::WP_ALLOW_MULTISITE) ?
                constant(ConfigFileNamesMap::WP_ALLOW_MULTISITE) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadMultisiteBlogIdCurrentSite()
    {
        return  defined(ConfigFileNamesMap::BLOG_ID_CURRENT_SITE) ?
                constant(ConfigFileNamesMap::BLOG_ID_CURRENT_SITE) :
                null;
    }

    /**
    * put your comment there...
    * 
    */
    public function loadMultisiteDomainCurrentSite()
    {
        return  defined(ConfigFileNamesMap::DOMAIN_CURRENT_SITE) ?
                constant(ConfigFileNamesMap::DOMAIN_CURRENT_SITE) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadMultisitePathCurrentSite()
    {
        return  defined(ConfigFileNamesMap::PATH_CURRENT_SITE) ?
                constant(ConfigFileNamesMap::PATH_CURRENT_SITE) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadMultisitePrimaryNetworkId()
    {
        return  defined(ConfigFileNamesMap::PRIMARY_NETWORK_ID) ?
                constant(ConfigFileNamesMap::PRIMARY_NETWORK_ID) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadMultisiteSiteIdCurrentSite()
    {
        return  defined(ConfigFileNamesMap::SITE_ID_CURRENT_SITE) ?
                constant(ConfigFileNamesMap::SITE_ID_CURRENT_SITE) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadMultisiteSubDomainInstall()
    {
        return  defined(ConfigFileNamesMap::SUBDOMAIN_INSTALL) ?
                constant(ConfigFileNamesMap::SUBDOMAIN_INSTALL) :
                null;
    }

    /**
    * put your comment there...
    * 
    */
    public function loadPostAutoSaveInterval()
    {
        return  defined(ConfigFileNamesMap::AUTOSAVE_INTERVAL) ?
                constant(ConfigFileNamesMap::AUTOSAVE_INTERVAL) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadPostEmptyTrashDays()
    {
        return  defined(ConfigFileNamesMap::EMPTY_TRASH_DAYS) ?
                constant(ConfigFileNamesMap::EMPTY_TRASH_DAYS) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadPostRevisionsStatus()
    {
        return  defined(ConfigFileNamesMap::WP_POST_REVISIONS) ?
                (bool) constant(ConfigFileNamesMap::WP_POST_REVISIONS) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadPostRevisions()
    {
        return  defined(ConfigFileNamesMap::WP_POST_REVISIONS) ? 
                (
                    is_bool(constant(ConfigFileNamesMap::WP_POST_REVISIONS)) ?
                    0 : constant(ConfigFileNamesMap::WP_POST_REVISIONS)
                )
                : null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadProxyBypassHosts()
    {
        return  (defined(ConfigFileNamesMap::WP_PROXY_BYPASS_HOSTS) && constant(ConfigFileNamesMap::WP_PROXY_BYPASS_HOSTS)) ?
                explode(',', constant(ConfigFileNamesMap::WP_PROXY_BYPASS_HOSTS)) :
                array();
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadProxyHost()
    {
        return  defined(ConfigFileNamesMap::WP_PROXY_HOST) ?
                constant(ConfigFileNamesMap::WP_PROXY_HOST) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadProxyPassword()
    {
        return  defined(ConfigFileNamesMap::WP_PROXY_PASSWORD) ?
                constant(ConfigFileNamesMap::WP_PROXY_PASSWORD) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadProxyPort()
    {
        return  defined(ConfigFileNamesMap::WP_PROXY_PORT) ?
                constant(ConfigFileNamesMap::WP_PROXY_PORT) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadProxyUserName()
    {
        return  defined(ConfigFileNamesMap::WP_PROXY_USERNAME) ?
                constant(ConfigFileNamesMap::WP_PROXY_USERNAME) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecurityAccessibleHosts()
    {
        return  (defined(ConfigFileNamesMap::WP_ACCESSIBLE_HOSTS) && constant(ConfigFileNamesMap::WP_ACCESSIBLE_HOSTS)) ?
                explode( ',', constant(WP_ACCESSIBLE_HOSTS)) :
                array();
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecurityAllowUnfilteredUploads()
    {
        return  defined(ConfigFileNamesMap::ALLOW_UNFILTERED_UPLOADS) ?
                constant(ConfigFileNamesMap::ALLOW_UNFILTERED_UPLOADS) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecurityHTTPBlockExternal()
    {
        return  defined(ConfigFileNamesMap::WP_HTTP_BLOCK_EXTERNAL) ?
                constant(ConfigFileNamesMap::WP_HTTP_BLOCK_EXTERNAL) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecurityDisallowFileEdit()
    {
        return  defined(ConfigFileNamesMap::DISALLOW_FILE_EDIT) ?
                constant(ConfigFileNamesMap::DISALLOW_FILE_EDIT) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecurityDisallowUnfilteredHTML()
    {
        return  defined(ConfigFileNamesMap::DISALLOW_UNFILTERED_HTML) ?
                constant(ConfigFileNamesMap::DISALLOW_UNFILTERED_HTML) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecurityForceSSLAdmin()
    {
        return  defined(ConfigFileNamesMap::FORCE_SSL_ADMIN) ?
                constant(ConfigFileNamesMap::FORCE_SSL_ADMIN) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecurityForceSSLLogin()
    {
        return  defined(ConfigFileNamesMap::FORCE_SSL_LOGIN) ?
                constant(ConfigFileNamesMap::FORCE_SSL_LOGIN) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecureKeysAuth()
    {
        return  defined(ConfigFileNamesMap::AUTH_KEY) ?
                constant(ConfigFileNamesMap::AUTH_KEY) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecureKeysAuthSalt()
    {
        return  defined(ConfigFileNamesMap::AUTH_SALT) ?
                constant(ConfigFileNamesMap::AUTH_SALT) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecureKeysLoggedIn()
    {
        return  defined(ConfigFileNamesMap::LOGGED_IN_KEY) ?
                constant(ConfigFileNamesMap::LOGGED_IN_KEY) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecureKeysLoggedInSalt()
    {
        return  defined(ConfigFileNamesMap::LOGGED_IN_SALT) ?
                constant(ConfigFileNamesMap::LOGGED_IN_SALT) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecureKeysNonce()
    {
        return  defined(ConfigFileNamesMap::NONCE_KEY) ?
                constant(ConfigFileNamesMap::NONCE_KEY) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecureKeysNonceSalt()
    {
        return  defined(ConfigFileNamesMap::NONCE_SALT) ?
                constant(ConfigFileNamesMap::NONCE_SALT) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecureKeysSecureAuth()
    {
        return  defined(ConfigFileNamesMap::SECURE_AUTH_KEY) ?
                constant(ConfigFileNamesMap::SECURE_AUTH_KEY) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadSecureKeysSecureAuthSalt()
    {
        return  defined(ConfigFileNamesMap::SECURE_AUTH_SALT) ?
                constant(ConfigFileNamesMap::SECURE_AUTH_SALT) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeAutoUpdateCore()
    {
        
        $updateAutoCore = null;

        if (defined(ConfigFileNamesMap::WP_AUTO_UPDATE_CORE))
        {

            # Transform the value to string 
            # (BOOL) TRUE => 'true'
            # (BOOL) FALSE => 'false'
            # (STRING) 'minor' => 'minor' -- no changes
            if (is_bool(constant(ConfigFileNamesMap::WP_AUTO_UPDATE_CORE)))
            {
                $updateAutoCore = constant(ConfigFileNamesMap::WP_AUTO_UPDATE_CORE) ? 'true' : 'false';
            }
            else
            {
                $updateAutoCore = constant(ConfigFileNamesMap::WP_AUTO_UPDATE_CORE);
            }

        }

        return $updateAutoCore;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeAutmaticUpdater()
    {
        return  defined(ConfigFileNamesMap::AUTOMATIC_UPDATER_DISABLED) ?
                constant(AUTOMATIC_UPDATER_DISABLED) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeDisallowFileMods()
    {
        return  defined(ConfigFileNamesMap::DISALLOW_FILE_MODS) ?
                constant(ConfigFileNamesMap::DISALLOW_FILE_MODS) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeFileSystemMethod()
    {
        return  defined(ConfigFileNamesMap::FS_METHOD) ?
                constant(ConfigFileNamesMap::FS_METHOD) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeFileSystemFTPBasePath()
    {
        return  defined(ConfigFileNamesMap::FTP_BASE) ?
                constant(ConfigFileNamesMap::FTP_BASE) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeFileSystemFTPContentDirPath()
    {
        return  defined(ConfigFileNamesMap::FTP_CONTENT_DIR) ?
                constant(ConfigFileNamesMap::FTP_CONTENT_DIR) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeFileSystemFTPHost()
    {
        return  defined(ConfigFileNamesMap::FTP_HOST) ?
                constant(ConfigFileNamesMap::FTP_HOST) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeFileSystemFTPPassword()
    {
        return  defined(ConfigFileNamesMap::FTP_PASS) ?
                constant(ConfigFileNamesMap::FTP_PASS) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeFileSystemFTPPluginDirPath()
    {
        return  defined(ConfigFileNamesMap::FTP_PLUGIN_DIR) ?
                constant(ConfigFileNamesMap::FTP_PLUGIN_DIR) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeFileSystemFTPPrivateKeyPath()
    {
        return  defined(ConfigFileNamesMap::FTP_PRIKEY) ?
                constant(ConfigFileNamesMap::FTP_PRIKEY) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeFileSystemFTPPublicKeyPath()
    {
        return  defined(ConfigFileNamesMap::FTP_PUBKEY) ?
                constant(ConfigFileNamesMap::FTP_PUBKEY) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeFileSystemFTPSSL()
    {
        return  defined(ConfigFileNamesMap::FTP_SSL) ?
                constant(ConfigFileNamesMap::FTP_SSL) :
                null;
    }
    
    /**
    * put your comment there...
    * 
    */
    public function loadUpgradeFileSystemFTPUser()
    {
        return  defined(ConfigFileNamesMap::FTP_USER) ?
                constant(ConfigFileNamesMap::FTP_USER) :
                null;
    }
}