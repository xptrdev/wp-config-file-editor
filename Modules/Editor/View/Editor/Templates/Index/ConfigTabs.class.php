<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Tabs;

use WCFE\Modules\Editor\View\Editor\RendererFieldsFactory;
use WCFE\Modules\Editor\ConfigFileFieldsNameMap;
use WCFE\Modules\Editor\Lib\FormFieldsDataAccess;


/**
* 
*/
class ConfigTabs extends Tabs {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $id = 'wcfe-options-tab';
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $tabsFilterName = \WCFE\Hooks::FILTER_VIEW_TABS_REGISTER_TABS;

    /**
    * put your comment there...
    * 
    */
    protected function getTabsList()
    {
        
        
        $tabs = array();
        
        $tabsData = array();
        
        // Cookies
        $tabsData['Cookies'] = array();
        $tabsData['Cookies']['title'] = $this->__( 'Cookies' );
        $tabsData['Cookies']['hook'] = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_COOKIES_FIELDS;
        $tabsData['Cookies']['class'] = 'FieldsTab';
        
        $tabsData['Cookies']['fields'][ConfigFileFieldsNameMap::COOKIEHASH] = array();
        $tabsData['Cookies']['fields'][ConfigFileFieldsNameMap::PASS_COOKIE] = array();
        $tabsData['Cookies']['fields'][ConfigFileFieldsNameMap::AUTH_COOKIE] = array();
        $tabsData['Cookies']['fields'][ConfigFileFieldsNameMap::SECURE_AUTH_COOKIE] = array();
        $tabsData['Cookies']['fields'][ConfigFileFieldsNameMap::LOGGED_IN_COOKIE] = array();
        $tabsData['Cookies']['fields'][ConfigFileFieldsNameMap::COOKIEPATH] = array();
        $tabsData['Cookies']['fields'][ConfigFileFieldsNameMap::SITECOOKIEPATH] = array();
        $tabsData['Cookies']['fields'][ConfigFileFieldsNameMap::ADMIN_COOKIE_PATH] = array();
        $tabsData['Cookies']['fields'][ConfigFileFieldsNameMap::PLUGINS_COOKIE_PATH] = array();
        $tabsData['Cookies']['fields'][ConfigFileFieldsNameMap::COOKIE_DOMAIN] = array();
        
        // Maintenance
        $tabsData['Maintenance'] = array();
        $tabsData['Maintenance']['title'] = $this->__('Maintance');
        $tabsData['Maintenance']['hook'] = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_MAINTENANCE_FIELDS;
        $tabsData['Maintenance']['class'] = 'FieldsTab';
        
        $tabsData['Maintenance']['fields'][ConfigFileFieldsNameMap::WP_CACHE] = array();
        $tabsData['Maintenance']['fields'][ConfigFileFieldsNameMap::WP_MEMORY_LIMIT] = array();
        $tabsData['Maintenance']['fields'][ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT] = array();
        
        // Security
        $tabsData['Security'] = array();
        $tabsData['Security']['title'] = $this->__('Security');
        $tabsData['Security']['hook'] = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SECURITY_FIELDS;
        $tabsData['Security']['class'] = 'SimpleSubContainerTab';
        $tabsData['Security']['groups'] = array('Generic', 'Block External');
        
        $tabsData['Security']['fields'][ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT]['group'] = 'Generic';
        $tabsData['Security']['fields'][ConfigFileFieldsNameMap::FORCE_SSL_ADMIN]['group'] = 'Generic';
        $tabsData['Security']['fields'][ConfigFileFieldsNameMap::FORCE_SSL_LOGIN]['group'] = 'Generic';
        $tabsData['Security']['fields'][ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML]['group'] = 'Generic';
        $tabsData['Security']['fields'][ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS]['group'] = 'Generic';
        $tabsData['Security']['fields'][ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL]['group'] = 'Block External';
        $tabsData['Security']['fields'][ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS]['group'] = 'Block External';
        
        // Upgrade
        $tabsData['Upgrade'] = array();
        $tabsData['Upgrade']['title'] = $this->__('Upgrade');
        $tabsData['Upgrade']['hook'] = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_UPGRADE_FIELDS;
        $tabsData['Upgrade']['class'] = 'SimpleSubContainerTab';
        $tabsData['Upgrade']['groups'] = array('Generic', 'FTP');
        
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED]['group'] = 'Generic';
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE]['group'] = 'Generic';
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::DISALLOW_FILE_MODS]['group'] = 'Generic';
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::FS_METHOD]['group'] = 'FTP';
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::FTP_BASE]['group'] = 'FTP';
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::FTP_CONTENT_DIR]['group'] = 'FTP';
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::FTP_PLUGIN_DIR]['group'] = 'FTP';
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::FTP_PUBKEY]['group'] = 'FTP';
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::FTP_PRIKEY]['group'] = 'FTP';
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::FTP_USER]['group'] = 'FTP';
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::FTP_PASS]['group'] = 'FTP';
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::FTP_HOST]['group'] = 'FTP';
        $tabsData['Upgrade']['fields'][ConfigFileFieldsNameMap::FTP_SSL]['group'] = 'FTP';
        
        // Post
        $tabsData['Post'] = array();
        $tabsData['Post']['title'] = $this->__('Post');
        $tabsData['Post']['hook'] = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_POST_FIELDS;
        $tabsData['Post']['class'] = 'SimpleSubContainerTab';
        $tabsData['Post']['groups'] = array('Generic', 'PostRevisions');
        
        $tabsData['Post']['fields'][ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL]['group'] = 'Generic';
        $tabsData['Post']['fields'][ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS]['group'] = 'Generic';
        $tabsData['Post']['fields'][ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS]['group'] = 'PostRevisions';
        $tabsData['Post']['fields'][ConfigFileFieldsNameMap::WP_POST_REVISIONS]['group'] = 'PostRevisions';
        
        // Localization
        $tabsData['Localization'] = array();
        $tabsData['Localization']['title'] = $this->__('Localization');
        $tabsData['Localization']['hook'] = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_LOCALIZATION_FIELDS;
        $tabsData['Localization']['class'] = 'FieldsTab';
        
        $tabsData['Localization']['fields'][ConfigFileFieldsNameMap::WPLANG] = array();
        $tabsData['Localization']['fields'][ConfigFileFieldsNameMap::WPLANG_DIR] = array();
        
        // Cron
        $tabsData['Cron'] = array();
        $tabsData['Cron']['title'] = $this->__('Cron');
        $tabsData['Cron']['hook'] = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_CRON_FIELDS;
        $tabsData['Cron']['class'] = 'FieldsTab';
        
        $tabsData['Cron']['fields'][ConfigFileFieldsNameMap::DISABLE_WP_CRON] = array();
        $tabsData['Cron']['fields'][ConfigFileFieldsNameMap::ALTERNATE_WP_CRON] = array();
        $tabsData['Cron']['fields'][ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT] = array();

        // Multisites
        $tabsData['MultiSites'] = array();
        $tabsData['MultiSites']['title'] = $this->__('Multi Sites');
        $tabsData['MultiSites']['hook'] = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_MULTISITE_FIELDS;
        $tabsData['MultiSites']['class'] = 'FieldsTab';
        
        $tabsData['MultiSites']['fields'][ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE] = array();
        $tabsData['MultiSites']['fields'][ConfigFileFieldsNameMap::MULTISITE] = array();
        $tabsData['MultiSites']['fields'][ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL] = array();
        $tabsData['MultiSites']['fields'][ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE] = array();
        $tabsData['MultiSites']['fields'][ConfigFileFieldsNameMap::PATH_CURRENT_SITE] = array();
        $tabsData['MultiSites']['fields'][ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE] = array();
        $tabsData['MultiSites']['fields'][ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE] = array();
        $tabsData['MultiSites']['fields'][ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID] = array();
        
        // Database
        $tabsData['Database'] = array();
        $tabsData['Database']['title'] = $this->__('Database');
        $tabsData['Database']['hook'] = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_DATABASE_FIELDS;
        $tabsData['Database']['class'] = 'FieldsTab';

        $tabsData['Database']['fields'][ConfigFileFieldsNameMap::DB_HOST] = array();
        $tabsData['Database']['fields'][ConfigFileFieldsNameMap::DB_PORT] = array();
        $tabsData['Database']['fields'][ConfigFileFieldsNameMap::DB_USER] = array();
        $tabsData['Database']['fields'][ConfigFileFieldsNameMap::DB_PASSWORD] = array();
        $tabsData['Database']['fields'][ConfigFileFieldsNameMap::DB_NAME] = array();
        $tabsData['Database']['fields'][ConfigFileFieldsNameMap::DB_CHARSET] = array();
        $tabsData['Database']['fields'][ConfigFileFieldsNameMap::DB_COLLATE] = array();
        $tabsData['Database']['fields'][ConfigFileFieldsNameMap::DB_TABLE_PREFIX] = array();
        $tabsData['Database']['fields'][ConfigFileFieldsNameMap::WP_ALLOW_REPAIR] = array();
        $tabsData['Database']['fields'][ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES] = array();
        
        // Secure Keys
        $tabsData['SecureKeys'] = array();
        $tabsData['SecureKeys']['title'] = $this->__('Secure Keys');
        $tabsData['SecureKeys']['hook'] = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_SECUREKEYS_FIELDS;
        $tabsData['SecureKeys']['class'] = 'FieldsTab';

        $tabsData['SecureKeys']['fields'][ConfigFileFieldsNameMap::AUTH_KEY] = array();
        $tabsData['SecureKeys']['fields'][ConfigFileFieldsNameMap::SECURE_AUTH_KEY] = array();
        $tabsData['SecureKeys']['fields'][ConfigFileFieldsNameMap::LOGGED_IN_KEY] = array();
        $tabsData['SecureKeys']['fields'][ConfigFileFieldsNameMap::NONCE_SALT] = array();
        $tabsData['SecureKeys']['fields'][ConfigFileFieldsNameMap::SECURE_AUTH_SALT] = array();
        $tabsData['SecureKeys']['fields'][ConfigFileFieldsNameMap::LOGGED_IN_SALT] = array();
        $tabsData['SecureKeys']['fields'][ConfigFileFieldsNameMap::NONCE_KEY] = array();
        
        // Debugging
        $tabsData['Debug'] = array();
        $tabsData['Debug']['title'] = $this->__('Developer');
        $tabsData['Debug']['hook'] = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_DEVELOPER_FIELDS;
        $tabsData['Debug']['class'] = 'FieldsTab';

        $tabsData['Debug']['fields'][ConfigFileFieldsNameMap::WP_DEBUG] = array();
        $tabsData['Debug']['fields'][ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY] = array();
        $tabsData['Debug']['fields'][ConfigFileFieldsNameMap::WP_DEBUG_LOG] = array();
        $tabsData['Debug']['fields'][ConfigFileFieldsNameMap::SCRIPT_DEBUG] = array();
        $tabsData['Debug']['fields'][ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS] = array();
        $tabsData['Debug']['fields'][ConfigFileFieldsNameMap::SAVEQUERIES] = array();

        // Proxy
        $tabsData['Proxy'] = array();
        $tabsData['Proxy']['title'] = $this->__('Proxy');
        $tabsData['Proxy']['hook'] = \WCFE\Hooks::FILTER_VIEW_TABS_TAB_PROXY_FIELDS;
        $tabsData['Proxy']['class'] = 'FieldsTab';

        $tabsData['Proxy']['fields'][ConfigFileFieldsNameMap::WP_PROXY_HOST] = array();
        $tabsData['Proxy']['fields'][ConfigFileFieldsNameMap::WP_PROXY_PORT] = array();
        $tabsData['Proxy']['fields'][ConfigFileFieldsNameMap::WP_PROXY_USERNAME] = array();
        $tabsData['Proxy']['fields'][ConfigFileFieldsNameMap::WP_PROXY_PASSWORD] = array();
        $tabsData['Proxy']['fields'][ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS] = array();
        
        $fieldsFactory = new RendererFieldsFactory($this->form);
        $formFieldsDataAccess =& FormFieldsDataAccess::instance();
        
        foreach ($tabsData as $tabName => $tabData)
        {
            
            // Creating Tab
            $tabClass = "WCFE\\Modules\\Editor\\View\\Editor\\Templates\\Tabs\\{$tabData['class']}";
            $tab = new $tabClass(
                $this,
                $tabData['title'],
                $tabData['hook']
            );
            
            // Initialize new fields array
            $fields = array();
            
            // Creating Groups
            if (isset($tabData['groups']))
            {
                foreach ($tabData['groups'] as $groupName)
                {
                    $fields[$groupName] = array();
                }
            }
            
            // Field Group Ref
            foreach ($tabData['fields'] as $fieldName => $field)
            {
                
                // Add field to fields group or directly into fields array
                if (isset($field['group']))
                {
                    $fieldsArr =& $fields[$field['group']];
                }
                else
                {
                    $fieldsArr =& $fields;
                }
                
                $fieldsArr[] = $fieldsFactory->create(
                    ConfigFileFieldsNameMap::getFieldKey($fieldName),
                    $formFieldsDataAccess->getFieldData($fieldName)
                );
            }
            
            $tab->setFields($fields);
            $tab->setId("{$tabName}OptionsTab");
            
            $tabs[] = $tab;
        }
        
        return $tabs;  
    }
    
}
