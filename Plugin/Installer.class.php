<?php
/**
* 
*/

namespace WCFE\Installer;

use WCFE\Modules\SysFilters\Model\SysFiltersDashboardModel;
use WCFE\Modules\Editor\ConfigFileFieldsNameMap;

/**
* 
*/
final class Installer
extends \WCFE\Libraries\InstallerService
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
    * @var mixed
    */
    protected $_upgraders = array
    (

        '0.5.0',    // This version never returned from $this->getInstalledVersion()
                    // however installer will run this as installer is always start at index 0

        '1.4.0', 


        '1.5.0',


        '1.5.1', 


        '1.5.2',


        '1.6.0',


        '1.6.1',


        '1.6.2',


        '1.6.3',


        '1.6.4',


        '1.6.5',


        '1.6.6',


        '1.6.7',


        /* '2.0.0', */

    );

    /**
    * put your comment there...
    * 
    */
    protected function _getCurrentVersion()
    {
        return end( $this->_upgraders );
    }

    /**
    * put your comment there...
    * 
    */
    public function getInstalledVersion()
    {		
        global $wpdb;

        # Backward comptability for version for version 1.4 

        # Return 1.4.0 if sys filters parameters option var exists

        if ( ! $installedVersion = parent::getInstalledVersion() )
        {

            $hasSysFilters = SysFiltersDashboardModel::getDataArray();

            if ( $hasSysFilters )
            {

                # Sys filter data will be exists if only system parameters
                # page has been visited however it will be empty if never saved!
                # We only need to do upgrade if its saved before so we avoid
                # overriding saved data, otherwise do fresh install

                if ( isset( $hasSysFilters[ 'sysFiltersData' ][ 'http' ] ) )
                {
                    $installedVersion = '1.4.0';
                }

            }
        }

        return $installedVersion;
    }

    /**
    * put your comment there...
    * 
    */
    public static function run()
    {

        $result = null;

        if ( ! self::$instance )
        {
            # Create new installer
            $factory = new Factory( __NAMESPACE__ );

            self::$instance = new Installer( $factory );

            # Install or upgrade
            $state = self::$instance->getState();

            switch ( $state )
            {

                case self::STATE_FRESH_INSTALL:

                    $result = self::$instance->install();					

                    break;

                case self::STATE_UPGRADE:

                    $result = self::$instance->upgrade();

                    break;

                default:

                    // Installed
                    $result = true;

                    break;
            }

        }

        return $result;
    }

    /**
    * Upgrade all version < 1.4.0
    * 
    * Add default Sys Filter Parameters when as it initially added
    * in version 1.4.0
    * 
    */
    public function upgrade_050()
    {

        # Sys filters parameters for all version < 1.4.0
        $sysFilterOpts = SysFiltersDashboardModel::getDataArray();
        $defaultData = SysFiltersDashboardModel::getDefaults();

        # Default Sys filters parameters added in version 1.5.0
        $parameters = array
        (
            'http' => array
            (
                'timeOut',
                'redirectCount',
                'version',
                'userAgent',
                'rejectUnsafeUrls',
                'proxyBlockLocalRequests',
                'localSSLVerify',
                'sslVerify',
                'useSteamTransport',
                'useCurlTransport',
            ),
        );


        foreach ( $parameters as $moduleName => $moduleParams )
        {

            foreach ( $moduleParams as $paramName )
            {
                $sysFilterOpts[ 'sysFiltersData' ][ $moduleName ][ $paramName ] = $defaultData[ $moduleName ][ $paramName ];
            }

        }

        # Save sys filter parameters
        SysFiltersDashboardModel::setDataArray( $sysFilterOpts );

        return true;
    }

    /**
    * Upgrade 1.4.0 to 1.5.0
    * 
    * Add default Sysfilter parameters added in version 1.5.0
    */
    public function upgrade_140()
    {

        $sysFilterOpts = SysFiltersDashboardModel::getDataArray();
        $defaultData = SysFiltersDashboardModel::getDefaults();

        # Default Sys filters Modules
        $modules = array
        (
            'misc',
            'editor',
            'kses',
        );

        foreach ( $modules as $moduleName )
        {
            $sysFilterOpts[ 'sysFiltersData' ][ $moduleName ] = $defaultData[ $moduleName ];
        }

        # Default Sys filters parameters
        $parameters = array
        (
            'http' => array
            (
                'stream',
                'blocking',
                'compress',
                'decompress',
                'responseSizeLimit',
                'allowLocalHost',
            ),
        );


        foreach ( $parameters as $moduleName => $moduleParams )
        {

            foreach ( $moduleParams as $paramName )
            {
                $sysFilterOpts[ 'sysFiltersData' ][ $moduleName ][ $paramName ] = $defaultData[ $moduleName ][ $paramName ];
            }

        }

        # Save sys filter parameters
        SysFiltersDashboardModel::setDataArray( $sysFilterOpts );

        return true;
    }


    /**
    * Upgrade 1.5.1 
    * 
    * Disable all HTTP Request Parameters as it break Wordpress
    * Upgrades!!!!
    * 
    */
    public function upgrade_151()
    {

        $sysFilterOpts = SysFiltersDashboardModel::getDataArray();
        $defaultData = SysFiltersDashboardModel::getDefaults();

        # Disable all parameters
        foreach ( $sysFilterOpts[ 'sysFiltersData' ] as $moduleName => & $moduleParams )
        {

            foreach ( $moduleParams as $paramsName => & $param )
            {

                $param[ 'options' ][ 'disabled' ] = true;
            }
        }

        # Save sys filter parameters
        SysFiltersDashboardModel::setDataArray( $sysFilterOpts );

        return true;
    }

    /**
    * put your comment there...
    * 
    */
    public function upgrade_200()
    {

        // Transfer Profile vars as var names changed
        // in version 2.0.0
        $profilesVarsMap = array
        (
            'WPCache' => ConfigFileFieldsNameMap::WP_CACHE,
            'MemoryLimit' => ConfigFileFieldsNameMap::WP_MEMORY_LIMIT,
            'MaxMemoryLimit'  => ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT,
            
            'SecurityDisablePluggablesEditor' => ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT,
            'SecurityForceSSLAdmin' => ConfigFileFieldsNameMap::FORCE_SSL_ADMIN,
            'SecurityForceSSLLogin' => ConfigFileFieldsNameMap::FORCE_SSL_LOGIN,
            'SecurityDisallowUnfilteredHTML' => ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML,
            'SecurityAllowUnfilteredUploads' => ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS,
            'SecurityBlockExternalUrl' => ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL,
            'SecurityAccessibleHosts' => ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS,
            
            'UpgradeAutoDisable' => ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED,
            'UpgradeAutoCore' => ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE,
            'UpgradeDisablePluggables' => ConfigFileFieldsNameMap::DISALLOW_FILE_MODS,
            'UpgradeFSMethod' => ConfigFileFieldsNameMap::FS_METHOD,
            'UpgradeFTPBase' => ConfigFileFieldsNameMap::FTP_BASE,
            'UpgradeFTPContentDir' => ConfigFileFieldsNameMap::FTP_CONTENT_DIR,
            'UpgradeFTPPluginDir' => ConfigFileFieldsNameMap::FTP_PLUGIN_DIR,
            'UpgradeFTPPubKey' => ConfigFileFieldsNameMap::FTP_PUBKEY,
            'UpgradeFTPPriKey' => ConfigFileFieldsNameMap::FTP_PRIKEY,
            'UpgradeFTPUser' => ConfigFileFieldsNameMap::FTP_USER,
            'UpgradeFTPPassword' => ConfigFileFieldsNameMap::FTP_PASS,
            'UpgradeFTPHost' => ConfigFileFieldsNameMap::FTP_HOST,
            'UpgradeFTPSSL' => ConfigFileFieldsNameMap::FTP_SSL,  
            
            'PostAutoSaveInterval' => ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL,
            'PostEmptyTrashDays' => ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS,
            'PostRevisions' => ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS,
            'PostRevisionsMax' => ConfigFileFieldsNameMap::WP_POST_REVISIONS,
            
            'WPLang' => ConfigFileFieldsNameMap::WPLANG,
            'WPLangDir' => ConfigFileFieldsNameMap::WPLANG_DIR,
            
            'Cron' => ConfigFileFieldsNameMap::DISABLE_WP_CRON,
            'CronAlternate' => ConfigFileFieldsNameMap::ALTERNATE_WP_CRON,
            'CronLockTimeOut' => ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT,
            
            'MultiSiteAllow' => ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE,
            'MultiSite' => ConfigFileFieldsNameMap::MULTISITE,
            'MultiSiteSubDomainInstall' => ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL,
            'MultiSiteDomainCurrentSite' => ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE,
            'MultiSitePathCurrentSite' => ConfigFileFieldsNameMap::PATH_CURRENT_SITE,
            'MultiSiteSiteId' => ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE,
            'MultiSiteBlogId' => ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE,
            'MultiSitePrimaryNetworkId' => ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID,
            
            'DbHost' => ConfigFileFieldsNameMap::DB_HOST,
            'DbPort' => ConfigFileFieldsNameMap::DB_PORT,
            'DbUser' => ConfigFileFieldsNameMap::DB_USER,
            'DbPassword' => ConfigFileFieldsNameMap::DB_PASSWORD,
            'DbName' => ConfigFileFieldsNameMap::DB_NAME,
            'DbCharSet' => ConfigFileFieldsNameMap::DB_CHARSET,
            'DbCollate' => ConfigFileFieldsNameMap::DB_COLLATE,
            'DbTablePrefix' => ConfigFileFieldsNameMap::DB_TABLE_PREFIX,
            'DbAllowRepair' => ConfigFileFieldsNameMap::WP_ALLOW_REPAIR,
            'DbDontUpgradeGlobalTables' => ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES,
            
            'AuthKey' => ConfigFileFieldsNameMap::AUTH_KEY,
            'SecureAuthKey' => ConfigFileFieldsNameMap::SECURE_AUTH_KEY,
            'LoggedInKey' => ConfigFileFieldsNameMap::LOGGED_IN_KEY,
            'NonceKey' => ConfigFileFieldsNameMap::NONCE_KEY,
            'AuthSalt' => ConfigFileFieldsNameMap::AUTH_SALT,
            'SecureAuthSalt' => ConfigFileFieldsNameMap::SECURE_AUTH_SALT,
            'LoggedInSalt' => ConfigFileFieldsNameMap::LOGGED_IN_SALT,
            'NonceSalt' => ConfigFileFieldsNameMap::NONCE_SALT,
            
            'WPDebug' => ConfigFileFieldsNameMap::WP_DEBUG,
            'WPDebugDisplay' => ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY,
            'WPDebugLog' => ConfigFileFieldsNameMap::WP_DEBUG_LOG,
            'ScriptDebug' => ConfigFileFieldsNameMap::SCRIPT_DEBUG,
            'ConcatenateJavaScript' => ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS,
            'SaveQueries' => ConfigFileFieldsNameMap::SAVEQUERIES,
            
            'ProxyHost' => ConfigFileFieldsNameMap::WP_PROXY_HOST,
            'ProxyPort' => ConfigFileFieldsNameMap::WP_PROXY_PORT,
            'ProxyUser' => ConfigFileFieldsNameMap::WP_PROXY_USERNAME,
            'ProxyPassword' => ConfigFileFieldsNameMap::WP_PROXY_PASSWORD,
            'ProxyBypassHosts' => ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS,
            
            'CookieHash' => ConfigFileFieldsNameMap::COOKIEHASH,
            'CookieUser' => ConfigFileFieldsNameMap::PASS_COOKIE,
            'CookiePass' => ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS,
            'CookieAuth' => ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS,
            'CookieSecureAuth' => ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS,
            'CookieLoggedIn' => ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS,
            'CookieTest' => ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS,
            'CookiePath' => ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS,
            'CookieSitePath' => ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS,
            'CookieAdminPath' => ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS,
            'CookiePluginsPath' => ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS,
            'CookieDomain' => ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS,
        );
        
        return true;
    }


}