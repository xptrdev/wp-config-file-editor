<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\Forms;

# Forms framework
use WPPFW\Forms;
use WCFE\Modules\Editor\Model\EditorModel;

/**
* 
*/
class ConfigFileForm extends Forms\SecureForm {
	
	/**
	* 
	*/
	const TASK_PREVIEW = 'Preview';
	
	/**
	* 
	*/
	const TASK_VALIDATE = 'Validate';

	/**
	* put your comment there...
	* 
	* @param mixed $fields
	* @return ConfigFileForm
	*/
	public function __construct( $fields ) 
	{
		
		# Define form parameters
		parent::__construct( 'configFileFields', 'stoken' );
        
        # Define config file fields
        $this->defineFields();
		
        //-----$this->defineExtendedOptions();
        
        # Request fields
        $this->add( new Forms\Fields\FormStringField( 'Task', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
	}
    
    /**
    * put your comment there...
    * 
    */
    protected function defineExtendedOptions()
    {
        
        $optionsField = $this->add( new Forms\Fields\FormListField( '__options_' ) );
        
        # Define options list for all form defined fields
        foreach ( $this->getFields() as $field )
        {
            
            $optionsField->add( new Forms\Fields\FormListField( $field->getName() ) )
            
            ->addChain( new Forms\Fields\FormIntegerField( 'discard' ) );
        }
        
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function defineFields()
    {
        $grps = array
        (
            'Cron',
            'Cookies',
            'Database',
            'Debug',
            'Localization',
            'Maintenance',
            'MultiSites',
            'Post',
            'Proxy',
            'Security',
            'SecureKeys',
            'Upgrade',
        );

        foreach ( $grps as $grp )
        {
            
            $this->{"grp{$grp}"}();
        }
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpCookies()
    {
        $this->add( new Forms\Fields\FormStringField( 'ADMIN_COOKIE_PATH' ) );
        $this->add( new Forms\Fields\FormStringField( 'AUTH_COOKIE' ) );
        $this->add( new Forms\Fields\FormStringField( 'COOKIE_DOMAIN' ) );
        $this->add( new Forms\Fields\FormStringField( 'COOKIEHASH' ) );
        $this->add( new Forms\Fields\FormStringField( 'LOGGED_IN_COOKIE' ) );
        $this->add( new Forms\Fields\FormStringField( 'PASS_COOKIE' ) );
        $this->add( new Forms\Fields\FormStringField( 'COOKIEPATH' ) );
        $this->add( new Forms\Fields\FormStringField( 'PLUGINS_COOKIE_PATH' ) );
        $this->add( new Forms\Fields\FormStringField( 'SECURE_AUTH_COOKIE' ) );
        $this->add( new Forms\Fields\FormStringField( 'SITECOOKIEPATH' ) );
        $this->add( new Forms\Fields\FormStringField( 'TEST_COOKIE' ) );
        $this->add( new Forms\Fields\FormStringField( 'USER_COOKIE' ) ); 
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpCron()
    {
        $this->add( new Forms\Fields\FormIntegerField( 'DISABLE_WP_CRON' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'ALTERNATE_WP_CRON' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'WP_CRON_LOCK_TIMEOUT' ) );
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpDatabase()
    {
        
        $this->add( new Forms\Fields\FormIntegerField( 'WP_ALLOW_REPAIR' ) );
        $this->add( new Forms\Fields\FormStringField( 'DB_CHARSET' ) );
        $this->add( new Forms\Fields\FormStringField( 'DB_COLLATE' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'DO_NOT_UPGRADE_GLOBAL_TABLES' ) );
        $this->add( new Forms\Fields\FormStringField( 'DB_HOST-NAME', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add( new Forms\Fields\FormStringField( 'DB_NAME', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add( new Forms\Fields\FormStringField( 'DB_PASSWORD', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add( new Forms\Fields\FormStringField( 'DB_HOST-PORT', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add( new Forms\Fields\FormStringField( 'table_prefix', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add( new Forms\Fields\FormStringField( 'DB_USER', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
                        
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpDebug()
    {
        $this->add( new Forms\Fields\FormIntegerField( 'CONCATENATE_SCRIPTS' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'SAVEQUERIES' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'SCRIPT_DEBUG' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'WP_DEBUG' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'WP_DEBUG_DISPLAY' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'WP_DEBUG_LOG' ) );
    }

    /**
    * put your comment there...
    * 
    */
    protected function grpLocalization()
    {
        $this->add( new Forms\Fields\FormStringField( 'WPLANG' ) );
        $this->add( new Forms\Fields\FormStringField( 'WPLANG_DIR' ) );
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpMaintenance()
    {
        $this->add( new Forms\Fields\FormStringField( 'WP_MAX_MEMORY_LIMIT' ) );
        $this->add( new Forms\Fields\FormStringField( 'WP_MEMORY_LIMIT' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'WP_CACHE' ) );
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpMultiSites()
    {
        $this->add( new Forms\Fields\FormIntegerField( 'MULTISITE' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'WP_ALLOW_MULTISITE' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'BLOG_ID_CURRENT_SITE' ) );
        $this->add( new Forms\Fields\FormStringField( 'DOMAIN_CURRENT_SITE' ) );
        $this->add( new Forms\Fields\FormStringField( 'PATH_CURRENT_SITE' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'PRIMARY_NETWORK_ID' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'SITE_ID_CURRENT_SITE' ) );
        $this->add( new Forms\Fields\FormStringField( 'SUBDOMAIN_INSTALL' ) );
        //-----$this->add( new Forms\Fields\FormStringField( 'MultiSiteToolPluginLoader!' ) );
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpPost()
    {
        $this->add( new Forms\Fields\FormIntegerField( 'AUTOSAVE_INTERVAL' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'EMPTY_TRASH_DAYS' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'WP_POST_REVISIONS-STATUS' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'WP_POST_REVISIONS-MAXCOUNT' ) );
                        
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpProxy()
    {
        $this->add( new Forms\Fields\FormArrayField( 'WP_PROXY_BYPASS_HOSTS', new Forms\Fields\FormStringField( 'host' ) ) );
        $this->add( new Forms\Fields\FormStringField( 'WP_PROXY_HOST' ) );
        $this->add( new Forms\Fields\FormStringField( 'WP_PROXY_PASSWORD' ) );
        $this->add( new Forms\Fields\FormStringField( 'WP_PROXY_PORT' ) );
        $this->add( new Forms\Fields\FormStringField( 'WP_PROXY_USERNAME' ) );
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpSecurity()
    {
        $this->add( new Forms\Fields\FormArrayField( 'WP_ACCESSIBLE_HOSTS', new Forms\Fields\FormStringField( 'host' ) ) ); 
        $this->add( new Forms\Fields\FormIntegerField( 'ALLOW_UNFILTERED_UPLOADS' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'WP_HTTP_BLOCK_EXTERNAL' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'DISALLOW_FILE_EDIT' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'DISALLOW_UNFILTERED_HTML' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'FORCE_SSL_ADMIN' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'FORCE_SSL_LOGIN' ) );
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpSecureKeys()
    {
        
        $this->add( new Forms\Fields\FormStringField( 'AUTH_KEY', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add( new Forms\Fields\FormStringField( 'AUTH_SALT', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add( new Forms\Fields\FormStringField( 'LOGGED_IN_KEY', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add( new Forms\Fields\FormStringField( 'LOGGED_IN_SALT', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add( new Forms\Fields\FormStringField( 'NONCE_KEY', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add( new Forms\Fields\FormStringField( 'NONCE_SALT', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add( new Forms\Fields\FormStringField( 'SECURE_AUTH_KEY', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add( new Forms\Fields\FormStringField( 'SECURE_AUTH_SALT', array( new \WPPFW\Forms\Rules\RequiredField() ) ) );
                                                        
    }

    /**
    * put your comment there...
    * 
    */
    protected function grpUpgrade()
    {
        $this->add( new Forms\Fields\FormStringField( 'WP_AUTO_UPDATE_CORE' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'AUTOMATIC_UPDATER_DISABLED' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'DISALLOW_FILE_MODS' ) );
        $this->add( new Forms\Fields\FormStringField( 'FS_METHOD' ) );
        $this->add( new Forms\Fields\FormStringField( 'FTP_BASE' ) );
        $this->add( new Forms\Fields\FormStringField( 'FTP_CONTENT_DIR' ) );
        $this->add( new Forms\Fields\FormStringField( 'FTP_HOST' ) );
        $this->add( new Forms\Fields\FormStringField( 'FTP_PASS' ) );
        $this->add( new Forms\Fields\FormStringField( 'FTP_PLUGIN_DIR' ) );
        $this->add( new Forms\Fields\FormStringField( 'FTP_PRIKEY' ) );
        $this->add( new Forms\Fields\FormStringField( 'FTP_PUBKEY' ) );
        $this->add( new Forms\Fields\FormIntegerField( 'FTP_SSL' ) );
        $this->add( new Forms\Fields\FormStringField( 'FTP_USER' ) );
            
    }
}
