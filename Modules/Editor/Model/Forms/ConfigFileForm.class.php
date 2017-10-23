<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\Forms;

# Forms framework
use WPPFW\Forms;
use WCFE\Modules\Editor\Model\EditorModel;
use WCFE\Modules\Editor\Model\ConfigFileFieldsNameMap;

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
    */
	public function __construct() 
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
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::ADMIN_COOKIE_PATH));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::AUTH_COOKIE) );
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::COOKIE_DOMAIN));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::COOKIEHASH));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::LOGGED_IN_COOKIE));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::PASS_COOKIE));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::COOKIEPATH));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::PLUGINS_COOKIE_PATH));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::SECURE_AUTH_COOKIE));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::SITECOOKIEPATH));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::TEST_COOKIE));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::USER_COOKIE)); 
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpCron()
    {
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::DISABLE_WP_CRON));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::ALTERNATE_WP_CRON));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_CRON_LOCK_TIMEOUT));
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpDatabase()
    {        
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_ALLOW_REPAIR));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DB_CHARSET));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DB_COLLATE));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::DO_NOT_UPGRADE_GLOBAL_TABLES));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DB_NAME, array(new \WPPFW\Forms\Rules\RequiredField())));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DB_USER, array(new \WPPFW\Forms\Rules\RequiredField() ) ) );
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DB_PASSWORD, array(new \WPPFW\Forms\Rules\RequiredField())));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DB_HOST, array(new \WPPFW\Forms\Rules\RequiredField())));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DB_PORT));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DB_TABLE_PREFIX, array(new \WPPFW\Forms\Rules\RequiredField() ) ) );
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpDebug()
    {
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::CONCATENATE_SCRIPTS));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::SAVEQUERIES));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::SCRIPT_DEBUG));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_DEBUG));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_DEBUG_DISPLAY));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_DEBUG_LOG));
    }

    /**
    * put your comment there...
    * 
    */
    protected function grpLocalization()
    {
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WPLANG));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WPLANG_DIR));
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpMaintenance()
    {
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_MAX_MEMORY_LIMIT));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_MEMORY_LIMIT));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_CACHE));
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpMultiSites()
    {
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::MULTISITE));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_ALLOW_MULTISITE));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::BLOG_ID_CURRENT_SITE));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::DOMAIN_CURRENT_SITE));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::PATH_CURRENT_SITE));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::PRIMARY_NETWORK_ID));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::SITE_ID_CURRENT_SITE));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::SUBDOMAIN_INSTALL));
        //-----$this->add( new Forms\Fields\Form StringField( 'MultiSiteToolPluginLoader!' ) );
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpPost()
    {
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::AUTOSAVE_INTERVAL));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::EMPTY_TRASH_DAYS));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_POST_REVISIONS_STATUS));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_POST_REVISIONS));
                        
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpProxy()
    {
        $this->add(new Forms\Fields\FormArrayField(ConfigFileFieldsNameMap::WP_PROXY_BYPASS_HOSTS, new Forms\Fields\FormStringField('host')));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_PROXY_HOST));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_PROXY_PASSWORD));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_PROXY_PORT));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_PROXY_USERNAME));
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpSecurity()
    {
        $this->add(new Forms\Fields\FormArrayField(ConfigFileFieldsNameMap::WP_ACCESSIBLE_HOSTS, new Forms\Fields\FormStringField('host'))); 
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::ALLOW_UNFILTERED_UPLOADS));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::WP_HTTP_BLOCK_EXTERNAL));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::DISALLOW_FILE_EDIT));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::DISALLOW_UNFILTERED_HTML));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::FORCE_SSL_ADMIN));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::FORCE_SSL_LOGIN));
    }
    
    /**
    * put your comment there...
    * 
    */
    protected function grpSecureKeys()
    {
        
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::AUTH_KEY, array(new \WPPFW\Forms\Rules\RequiredField())));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::AUTH_SALT, array(new \WPPFW\Forms\Rules\RequiredField())));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::LOGGED_IN_KEY, array(new \WPPFW\Forms\Rules\RequiredField())));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::LOGGED_IN_SALT, array(new \WPPFW\Forms\Rules\RequiredField())));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::NONCE_KEY, array(new \WPPFW\Forms\Rules\RequiredField())));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::NONCE_SALT, array(new \WPPFW\Forms\Rules\RequiredField())));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::SECURE_AUTH_KEY, array(new \WPPFW\Forms\Rules\RequiredField())));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::SECURE_AUTH_SALT, array(new \WPPFW\Forms\Rules\RequiredField())));
                                                        
    }

    /**
    * put your comment there...
    * 
    */
    protected function grpUpgrade()
    {
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::WP_AUTO_UPDATE_CORE));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::AUTOMATIC_UPDATER_DISABLED));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::DISALLOW_FILE_MODS));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FS_METHOD));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_BASE));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_CONTENT_DIR));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_HOST));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_PASS));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_PLUGIN_DIR));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_PRIKEY));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_PUBKEY));
        $this->add(new Forms\Fields\FormIntegerField(ConfigFileFieldsNameMap::FTP_SSL));
        $this->add(new Forms\Fields\FormStringField(ConfigFileFieldsNameMap::FTP_USER));
            
    }
}
