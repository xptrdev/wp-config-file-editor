<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Lib;


abstract class ConfigFileWriterFactoriesFieldsNameMap
{
    
    const AUTH_KEY = 'SecureKeysAuth';
    const AUTH_SALT = 'SecureKeysAuthSalt';
    const LOGGED_IN_KEY = 'SecureKeysLoggedIn';
    const LOGGED_IN_SALT = 'SecureKeysLoggedInSalt';
    const NONCE_KEY = 'SecureKeysNonce';
    const NONCE_SALT = 'SecureKeysNonceSalt';
    const SECURE_AUTH_KEY = 'SecureKeysSecureAuth';
    const SECURE_AUTH_SALT = 'SecureKeysSecureAuthSalt';
    
    const ADMIN_COOKIE_PATH = 'CookieAdminPath';
    const AUTH_COOKIE = 'CookieAuth';
    const COOKIE_DOMAIN = 'CookieDomain';
    const COOKIEHASH = 'CookieHash';
    const LOGGED_IN_COOKIE = 'CookieLoggedIn';
    const PASS_COOKIE = 'CookiePass';
    const COOKIEPATH = 'CookiePath';
    const PLUGINS_COOKIE_PATH = 'CookiePluginsPath';
    const SECURE_AUTH_COOKIE = 'CookieSecureAuth';    
    const SITECOOKIEPATH = 'CookieSitePath';
    const TEST_COOKIE = 'CookieTest';
    const USER_COOKIE = 'CookieUser';
    
    const DISABLE_WP_CRON = 'CronDisable';
    const ALTERNATE_WP_CRON = 'CronAlternate';
    const WP_CRON_LOCK_TIMEOUT = 'CronLockTimeOut';
    
    const WP_ALLOW_REPAIR = 'DatabaseAllowRepair';
    const DB_CHARSET = 'DatabaseCharset';
    const DB_COLLATE = 'DatabaseCollate';
    const DO_NOT_UPGRADE_GLOBAL_TABLES = 'DatabaseUpgradeGlobalTables';
    const DB_NAME = 'DatabaseName';
    const DB_HOST = 'DatabaseHost';
    const DB_USER = 'DatabaseUser';
    const DB_PASSWORD = 'DatabasePassword';
    const DB_TABLE_PREFIX = 'DatabaseTablePrefix';
    
    
    const CONCATENATE_SCRIPTS = 'DebugConcatenateScripts';
    const SAVEQUERIES = 'DebugSaveQueries';
    const SCRIPT_DEBUG = 'DebugScriptDebug';
    const WP_DEBUG = 'DebugWPDebug';
    const WP_DEBUG_DISPLAY = 'DebugDisplay';
    const WP_DEBUG_LOG = 'DebugLog';
    
    const WPLANG = 'LocalizeLang';
    const WPLANG_DIR = 'LocalizeLangDir';
    
    const WP_MAX_MEMORY_LIMIT = 'MaintenanceMaxMemoryLimit';
    const WP_MEMORY_LIMIT = 'MaintenanceMemoryLimit';
    const WP_CACHE = 'MaintenanceCache';
    
    const MULTISITE = 'Multisite';
    const WP_ALLOW_MULTISITE = 'MultisiteAllow';
    const BLOG_ID_CURRENT_SITE = 'MultisiteBlogIdCurrentSite';
    const DOMAIN_CURRENT_SITE = 'MultisiteDomainCurrentSite';
    const PATH_CURRENT_SITE = 'MultisitePathCurrentSite';
    const PRIMARY_NETWORK_ID = 'MultisitePrimaryNetworkId';
    const SITE_ID_CURRENT_SITE = 'MultisiteSiteIdCurrentSite';
    const SUBDOMAIN_INSTALL = 'MultisiteSubDomainInstall';
    
    const AUTOSAVE_INTERVAL = 'PostAutoSaveInterval';
    const EMPTY_TRASH_DAYS = 'PostEmptyTrashDays';
    const WP_POST_REVISIONS = 'PostRevisions';
    
    const WP_PROXY_BYPASS_HOSTS = 'ProxyBypassHosts';
    const WP_PROXY_HOST = 'ProxyHost';
    const WP_PROXY_PASSWORD = 'ProxyPassword';
    const WP_PROXY_PORT = 'ProxyPort';
    const WP_PROXY_USERNAME = 'ProxyUserName';
    
    const WP_ACCESSIBLE_HOSTS = 'SecurityAccessibleHosts';
    const ALLOW_UNFILTERED_UPLOADS = 'SecurityAllowUnfilteredUploads';
    const WP_HTTP_BLOCK_EXTERNAL = 'SecurityHTTPBlockExternal';
    const DISALLOW_FILE_EDIT = 'SecurityDisallowFileEdit';
    const DISALLOW_UNFILTERED_HTML = 'SecurityDisallowUnfilteredHTML';
    const FORCE_SSL_ADMIN = 'SecurityForceSSLAdmin';
    const FORCE_SSL_LOGIN = 'SecurityForceSSLLogin';
    
    const WP_AUTO_UPDATE_CORE = 'UpgradeAutoUpdateCore';
    const AUTOMATIC_UPDATER_DISABLED = 'UpgradeAutmaticUpdater';
    const DISALLOW_FILE_MODS = 'UpgradeDisallowFileMods';
    const FS_METHOD = 'UpgradeFileSystemMethod';
    const FTP_BASE = 'UpgradeFileSystemFTPBasePath';
    const FTP_CONTENT_DIR = 'UpgradeFileSystemFTPContentDirPath';
    const FTP_HOST = 'UpgradeFileSystemFTPHost';
    const FTP_PASS = 'UpgradeFileSystemFTPPassword';
    const FTP_PLUGIN_DIR = 'UpgradeFileSystemFTPPluginDirPath';
    const FTP_PRIKEY = 'UpgradeFileSystemFTPPrivateKeyPath';
    const FTP_PUBKEY = 'UpgradeFileSystemFTPPublicKeyPath';
    const FTP_SSL = 'UpgradeFileSystemFTPSSL';
    const FTP_USER = 'UpgradeFileSystemFTPUser';
    
    /**
    * put your comment there...
    * 
    */
    protected static function & getConstantsArray()
    {
        
        static $constants = array();
        
        if (!$constants)
        {
            
            $calledClass = get_called_class();
            
            $class = new \ReflectionClass($calledClass);
            $constants = $class->getConstants();
        }
        
        return $constants;
    }
    
    /**
    * put your comment there...
    * 
    * @param mixed $name
    */
    public static function getFactoryKey($name)
    {
        
        $constants =& self::getConstantsArray();
        
        return array_search($name, $constants);
    }
    
    /**
    * put your comment there...
    * 
    * @param mixed $key
    */
    public static function getFieldFactoryName($key)
    {
        
        $constants =& self::getConstantsArray();
        
        $factoryName = $constants[$key];
        
        return $factoryName;
    }
    
    /**
    * put your comment there...
    * 
    * @param mixed $key
    */
    public static function isKeyExists($key)
    {
        
        $callerClass = get_called_class();
        
        $class = new \ReflectionClass($callerClass);            
        $constants = $class->getConstants();
        
        return isset($constants[$key]);
    }
    
}