<?php
/**
* 
*/

namespace WCFE\Modules\Editor;


/**
* 
*/
abstract class ConfigFileFieldsNameMap
{
    
    const AUTH_KEY = 'AUTH_KEY';
    const AUTH_SALT = 'AUTH_SALT';
    const LOGGED_IN_KEY = 'LOGGED_IN_KEY';
    const LOGGED_IN_SALT = 'LOGGED_IN_SALT';
    const NONCE_KEY = 'NONCE_KEY';
    const NONCE_SALT = 'NONCE_SALT';
    const SECURE_AUTH_KEY = 'SECURE_AUTH_KEY';
    const SECURE_AUTH_SALT = 'SECURE_AUTH_SALT';
    
    const ADMIN_COOKIE_PATH = 'ADMIN_COOKIE_PATH';
    const AUTH_COOKIE = 'AUTH_COOKIE';
    const COOKIE_DOMAIN = 'COOKIE_DOMAIN';
    const COOKIEHASH = 'COOKIEHASH';
    const LOGGED_IN_COOKIE = 'LOGGED_IN_COOKIE';
    const PASS_COOKIE = 'PASS_COOKIE';
    const COOKIEPATH = 'COOKIEPATH';
    const PLUGINS_COOKIE_PATH = 'PLUGINS_COOKIE_PATH';
    const SECURE_AUTH_COOKIE = 'SECURE_AUTH_COOKIE';    
    const SITECOOKIEPATH = 'SITECOOKIEPATH';
    const TEST_COOKIE = 'TEST_COOKIE';
    const USER_COOKIE = 'USER_COOKIE';
    
    const DISABLE_WP_CRON = 'DISABLE_WP_CRON';
    const ALTERNATE_WP_CRON = 'ALTERNATE_WP_CRON';
    const WP_CRON_LOCK_TIMEOUT = 'WP_CRON_LOCK_TIMEOUT';
    
    const WP_ALLOW_REPAIR = 'WP_ALLOW_REPAIR';
    const DB_CHARSET = 'DB_CHARSET';
    const DB_COLLATE = 'DB_COLLATE';
    const DO_NOT_UPGRADE_GLOBAL_TABLES = 'DO_NOT_UPGRADE_GLOBAL_TABLES';
    const DB_HOST = 'DB_HOST';
    const DB_PORT = 'DB_HOST:PORT';
    const DB_NAME = 'DB_NAME';
    const DB_PASSWORD = 'DB_PASSWORD';
    const DB_TABLE_PREFIX = 'table_prefix';
    const DB_USER = 'DB_USER';
    
    const CONCATENATE_SCRIPTS = 'CONCATENATE_SCRIPTS';
    const SAVEQUERIES = 'SAVEQUERIES';
    const SCRIPT_DEBUG = 'SCRIPT_DEBUG';
    const WP_DEBUG = 'WP_DEBUG';
    const WP_DEBUG_DISPLAY = 'WP_DEBUG_DISPLAY';
    const WP_DEBUG_LOG = 'WP_DEBUG_LOG';
    
    const WPLANG = 'WPLANG';
    const WPLANG_DIR = 'WPLANG_DIR';
    
    const WP_MAX_MEMORY_LIMIT = 'WP_MAX_MEMORY_LIMIT';
    const WP_MEMORY_LIMIT = 'WP_MEMORY_LIMIT';
    const WP_CACHE = 'WP_CACHE';
    
    const MULTISITE = 'MULTISITE';
    const WP_ALLOW_MULTISITE = 'WP_ALLOW_MULTISITE';
    const BLOG_ID_CURRENT_SITE = 'BLOG_ID_CURRENT_SITE';
    const DOMAIN_CURRENT_SITE = 'DOMAIN_CURRENT_SITE';
    const PATH_CURRENT_SITE = 'PATH_CURRENT_SITE';
    const PRIMARY_NETWORK_ID = 'PRIMARY_NETWORK_ID';
    const SITE_ID_CURRENT_SITE = 'SITE_ID_CURRENT_SITE';
    const SUBDOMAIN_INSTALL = 'SUBDOMAIN_INSTALL';
    
    const AUTOSAVE_INTERVAL = 'AUTOSAVE_INTERVAL';
    const EMPTY_TRASH_DAYS = 'EMPTY_TRASH_DAYS';
    const WP_POST_REVISIONS = 'WP_POST_REVISIONS';
    const WP_POST_REVISIONS_STATUS = 'WP_POST_REVISIONS:STATUS';
    
    const WP_PROXY_BYPASS_HOSTS = 'WP_PROXY_BYPASS_HOSTS';
    const WP_PROXY_HOST = 'WP_PROXY_HOST';
    const WP_PROXY_PASSWORD = 'WP_PROXY_PASSWORD';
    const WP_PROXY_PORT = 'WP_PROXY_PORT';
    const WP_PROXY_USERNAME = 'WP_PROXY_USERNAME';
    
    const WP_ACCESSIBLE_HOSTS = 'WP_ACCESSIBLE_HOSTS';
    const ALLOW_UNFILTERED_UPLOADS = 'ALLOW_UNFILTERED_UPLOADS';
    const WP_HTTP_BLOCK_EXTERNAL = 'WP_HTTP_BLOCK_EXTERNAL';
    const DISALLOW_FILE_EDIT = 'DISALLOW_FILE_EDIT';
    const DISALLOW_UNFILTERED_HTML = 'DISALLOW_UNFILTERED_HTML';
    const FORCE_SSL_ADMIN = 'FORCE_SSL_ADMIN';
    const FORCE_SSL_LOGIN = 'FORCE_SSL_LOGIN';
    
    const WP_AUTO_UPDATE_CORE = 'WP_AUTO_UPDATE_CORE';
    const AUTOMATIC_UPDATER_DISABLED = 'AUTOMATIC_UPDATER_DISABLED';
    const DISALLOW_FILE_MODS = 'DISALLOW_FILE_MODS';
    const FS_METHOD = 'FS_METHOD';
    const FTP_BASE = 'FTP_BASE';
    const FTP_CONTENT_DIR = 'FTP_CONTENT_DIR';
    const FTP_HOST = 'FTP_HOST';
    const FTP_PASS = 'FTP_PASS';
    const FTP_PLUGIN_DIR = 'FTP_PLUGIN_DIR';
    const FTP_PRIKEY = 'FTP_PRIKEY';
    const FTP_PUBKEY = 'FTP_PUBKEY';
    const FTP_SSL = 'FTP_SSL';
    const FTP_USER = 'FTP_USER';

    /**
    * put your comment there...
    * 
    */
    public static function getAllNames()
    {
        
        $constants = self::getConstantsArray();
        $names = array_values($constants);
        
        return $names;
    }
    
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
    * @param mixed $key
    */
    public static function getFieldName($key)
    {
        
        $constants =& self::getConstantsArray();
        
        return $constants[$key];
    }
    
}