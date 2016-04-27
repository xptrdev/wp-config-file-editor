<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Model;

# Models Framework
use WPPFW\MVC\Model\PluginModel;

/**
* 
*/
class EditorModel extends PluginModel {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $activeProfile;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $allFields = array();
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $configFileContent;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $contentDirName;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $form;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $isBackForChange = false;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $savedVars = array();
	
	/**
	* put your comment there...
	* 
	*/
	public function & clearState() {
		# Clear state
		$this->configFileContent = null;
		$this->savedVars = array();
		$this->isBackForChange = false;
		# Chain
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $restoreUrl
	*/
	public function createBackup( & $restoreUrl )
	{
		
		# Create content dir if not already created or it was previously created
		# by deleted for some reason!!
		if ( ! $this->contentDirName || ! file_exists( WP_CONTENT_DIR . DIRECTORY_SEPARATOR . $this->contentDirName ) )
		{
			
			# Generate unique dir name, thiss is more secure to never accessed from outside
			$contentDirName = 'wcfe-' . md5( uniqid() );
			
			$contentDir = WP_CONTENT_DIR . DIRECTORY_SEPARATOR . $contentDirName;
			
			if ( ! is_writable( WP_CONTENT_DIR ) || ! mkdir( $contentDir, 0755 ) )
			{
				$this->addError( $this->_( 'Couldn\'t create Content dir:: %s. Content directory is not writable!!', $contentDir ) );
				
				return false;
			}
			
			# Create HTAccess file
			if ( ! copy( __DIR__ . DIRECTORY_SEPARATOR . 'Editor' . DIRECTORY_SEPARATOR . 'htaccess.Template', 
									$contentDir . DIRECTORY_SEPARATOR . '.htaccess' ) ) 
			{
				
				$this->addError( $this->_( 'Could\'t create htaccess file to protect wcfe content dir from being access by public' ) );
				
				return false;
			}
			
			# Store content dir name
			$this->contentDirName = $contentDirName;
			
		}
		
	
		# Initialize backup vars
		$contentDir = WP_CONTENT_DIR . DIRECTORY_SEPARATOR . $this->contentDirName;
		$dataFileName = EmergencyRestore::BACKUP_DATA_FILE_NAME;
		$dataFilePath = $contentDir . DIRECTORY_SEPARATOR . $dataFileName;
		$configFileContent = base64_encode( file_get_contents( ABSPATH . DIRECTORY_SEPARATOR . 'wp-config.php' ) );
		$secureKey = md5( uniqid( ) );
		$backupFilePath = $contentDir . DIRECTORY_SEPARATOR . EmergencyRestore::BACKUP_FILE_NAME;
		$cleanAbsPath = substr( ABSPATH, 0, strlen( ABSPATH ) - 1 );
				
		# Create backup file
		ob_start();
		require 'Editor' . DIRECTORY_SEPARATOR . 'BackupFile.Template.php';
		
		if ( ! file_put_contents( $backupFilePath, ob_get_clean() ) )
		{
			$this->addError( $this->_( 'Could not create backup file: %s', $backupFilePath ) );
			
			return false;
		}		
		
		$backupFileHash = md5( file_get_contents( $backupFilePath ) );
		
		# Create backup data file
		ob_start();
		require 'Editor' . DIRECTORY_SEPARATOR . 'BackupDBFile.Template.php';
		
		if ( ! file_put_contents( $dataFilePath, ob_get_clean() ) )
		{
			$this->addError( $this->_( 'Could not create backup Data file: %s', $dataFilePath ) );
			
			return false;
		}
	
		# Returns Restore Url
		$restoreUrlParams = array
		(
			'absPath' => $cleanAbsPath, /* Remove extra slash at the end! */
			'contentDir' => $contentDir,
			'secureKey' => $secureKey,
			'dataFileSecure' => md5( file_get_contents( $dataFilePath ) )
		);
		$restoreUrl = WP_PLUGIN_URL . '/wp-config-file-editor/Public/Restore.php?' . http_build_query( $restoreUrlParams );
		
		# Successed!
		return true;
	}

	/**
	* put your comment there...
	* 
	*/
	public function deleteEmergencyBackup()
	{
		
		$contentDir = WP_CONTENT_DIR . DIRECTORY_SEPARATOR . $this->contentDirName;
		
		if ( ! file_exists( $contentDir ) )
		{
			
			$this->addError( $this->_( 'Content directory doesn\'t exists' ) );
			
			return false;
		}
		
		# Delete backup files
		$filesToDelete = array
		(
			EmergencyRestore::BACKUP_DATA_FILE_NAME,
			EmergencyRestore::BACKUP_FILE_NAME,
		);
		
		foreach ( $filesToDelete as $fileName )
		{
			
			$filePath = $contentDir . DIRECTORY_SEPARATOR . $fileName;
			
			if ( file_exists( $filePath ) )
			{
				unlink( $filePath );
			}
			
		}
		
		return true;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $generator
	* @return EditorModel
	*/
	public function & generateConfigFile( & $generator = null )
	{
		
		# Get generator instance
		$configFile = new ConfigFile\Templates\Master\Master( $this->getForm() );
		
		# Return generator reference
		$generator = $configFile;
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getActiveProfileId()
	{
		return $this->activeProfile;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getContentDir()
	{
		return $this->contentDirName;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getConfigFileContent() {
		return $this->configFileContent;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getInfo()
	{
		$info = array();
		
		# Discover paths
		$info[ 'paths' ] = array
		(
			'absPath' => ABSPATH,
			'pluginsDir' => WP_PLUGIN_DIR,
			'pluginsDirUrl' => WP_PLUGIN_URL,
			'contentDir' => WP_CONTENT_DIR,
			'contentDirUrl' => WP_CONTENT_URL,
			'adminUrl' => admin_url(),
			'siteUrl' => home_url(),
		);
		
		if ( is_multisite() )
		{
			$info[ 'paths' ][ 'networkAdminUrl' ] = network_admin_url();
			$info[ 'paths' ][ 'networkSiteUrl' ] = network_site_url();
		}
		
		return $info;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & getForm() {
		return $this->form;
	}

	/**
	* put your comment there...
	* 
	*/
	public function hasActiveProfile()
	{
		return $this->getActiveProfileId() ? true : false;
	}

	/**
	* put your comment there...
	* 
	*/
	public function isBackForChange() {
		return $this->isBackForChange;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize()
	{
		
		$this->form = new Forms\ConfigFileForm( $fieldsList );
		
	}

	/**
	* put your comment there...
	* 
	* @param mixed $values
	*/
	public function & loadForm( $values )
	{
		$form =& $this->getForm();
		
		$form->setValue( array( $form->getName() => $values ) );
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & loadFromConfigFile() 
	{
        
		$values = array();
        
        # Auth keys
        $values[ 'AUTH_KEY' ] =                             defined( 'AUTH_KEY' ) ? AUTH_KEY : null;
        $values[ 'AUTH_SALT' ] =                            defined( 'AUTH_SALT' ) ? AUTH_SALT : null;
        $values[ 'LOGGED_IN_KEY' ] =                        defined( 'LOGGED_IN_KEY' ) ? LOGGED_IN_KEY : null;
        $values[ 'LOGGED_IN_SALT' ] =                       defined( 'LOGGED_IN_SALT' ) ? LOGGED_IN_SALT : null;
        $values[ 'NONCE_KEY' ] =                            defined( 'NONCE_KEY' ) ? NONCE_KEY : null;
        $values[ 'NONCE_SALT' ] =                           defined( 'NONCE_SALT' ) ? NONCE_SALT : null;
        $values[ 'SECURE_AUTH_KEY' ] =                      defined( 'SECURE_AUTH_KEY' ) ? SECURE_AUTH_KEY : null;
        $values[ 'SECURE_AUTH_SALT' ] =                     defined( 'SECURE_AUTH_SALT' ) ? SECURE_AUTH_SALT : null;
        
        # Cookies
        $values[ 'ADMIN_COOKIE_PATH' ] =                    defined( 'ADMIN_COOKIE_PATH' ) ? ADMIN_COOKIE_PATH : null;
        $values[ 'AUTH_COOKIE' ] =                          defined( 'AUTH_COOKIE' ) ? AUTH_COOKIE : null;
        $values[ 'COOKIE_DOMAIN' ] =                        defined( 'COOKIE_DOMAIN' ) ? COOKIE_DOMAIN : null;
        $values[ 'COOKIEHASH' ] =                           defined( 'COOKIEHASH' ) ? COOKIEHASH : null;
        $values[ 'LOGGED_IN_COOKIE' ] =                     defined( 'LOGGED_IN_COOKIE' ) ? LOGGED_IN_COOKIE : null;
        $values[ 'PASS_COOKIE' ] =                          defined( 'PASS_COOKIE' ) ? PASS_COOKIE : null;
        $values[ 'COOKIEPATH' ] =                           defined( 'COOKIEPATH' ) ? COOKIEPATH : null;
        $values[ 'PLUGINS_COOKIE_PATH' ] =                  defined( 'PLUGINS_COOKIE_PATH' ) ? PLUGINS_COOKIE_PATH : null;
        $values[ 'SECURE_AUTH_COOKIE' ] =                   defined( 'SECURE_AUTH_COOKIE' ) ? SECURE_AUTH_COOKIE : null;
        $values[ 'SITECOOKIEPATH' ] =                       defined( 'SITECOOKIEPATH' ) ? SITECOOKIEPATH : null;
        $values[ 'TEST_COOKIE' ] =                          defined( 'TEST_COOKIE' ) ? TEST_COOKIE : null;
        $values[ 'USER_COOKIE' ] =                          defined( 'USER_COOKIE' ) ? USER_COOKIE : null;
        
        # Cron
        $values[ 'DISABLE_WP_CRON' ] =                      defined( 'DISABLE_WP_CRON' ) ? DISABLE_WP_CRON : null;
        $values[ 'ALTERNATE_WP_CRON' ] =                    defined( 'ALTERNATE_WP_CRON' ) ? ALTERNATE_WP_CRON : null;
        $values[ 'WP_CRON_LOCK_TIMEOUT' ] =                 defined( 'WP_CRON_LOCK_TIMEOUT' ) ? WP_CRON_LOCK_TIMEOUT : null;
    
        # Database
        $databaseHost = explode( ':', DB_HOST );

        $values[ 'WP_ALLOW_REPAIR' ] =                      defined( 'WP_ALLOW_REPAIR' ) ? WP_ALLOW_REPAIR : null;
        $values[ 'DB_CHARSET' ] =                           defined( 'DB_CHARSET' ) ? DB_CHARSET : null;
        $values[ 'DB_COLLATE' ] =                           defined( 'DB_COLLATE' ) ? DB_COLLATE : null;
        $values[ 'DO_NOT_UPGRADE_GLOBAL_TABLES' ] =         defined( 'DO_NOT_UPGRADE_GLOBAL_TABLES' ) ? DO_NOT_UPGRADE_GLOBAL_TABLES : null;
        $values[ 'DB_HOST-NAME' ] =                         $databaseHost[ 0 ];
        $values[ 'DB_HOST-PORT' ] =                         isset( $databaseHost[ 1 ] ) ? $databaseHost[ 1 ] : null;
        $values[ 'DB_NAME' ] =                              defined( 'DB_NAME' ) ? DB_NAME : null;
        $values[ 'DB_PASSWORD' ] =                          defined( 'DB_PASSWORD' ) ? DB_PASSWORD : null;
        $values[ 'table_prefix' ] =                         isset( $GLOBALS[ 'table_prefix' ] ) ? $GLOBALS[ 'table_prefix' ] : null;
        $values[ 'DB_USER' ] =                              defined( 'DB_USER' ) ? DB_USER : null;
        
        # Debug
        $values[ 'CONCATENATE_SCRIPTS' ] =                  defined( 'CONCATENATE_SCRIPTS' ) ? CONCATENATE_SCRIPTS : null;
        $values[ 'SAVEQUERIES' ] =                          defined( 'SAVEQUERIES' ) ? SAVEQUERIES : null;
        $values[ 'SCRIPT_DEBUG' ] =                         defined( 'SCRIPT_DEBUG' ) ? SCRIPT_DEBUG : null;
        $values[ 'WP_DEBUG' ] =                             defined( 'WP_DEBUG' ) ? WP_DEBUG : null;
        $values[ 'WP_DEBUG_DISPLAY' ] =                     defined( 'WP_DEBUG_DISPLAY' ) ? WP_DEBUG_DISPLAY : null;
        $values[ 'WP_DEBUG_LOG' ] =                         defined( 'WP_DEBUG_LOG' ) ? WP_DEBUG_LOG : null;
        
        # Loclization
        $values[ 'WPLANG' ] =                               defined( 'WPLANG' ) ? WPLANG : null;
        $values[ 'WPLANG_DIR' ] =                           defined( 'WPLANG_DIR' ) ? WPLANG_DIR : null;
        
        # Maintenance
        $values[ 'WP_MAX_MEMORY_LIMIT' ] =                  defined( 'WP_MAX_MEMORY_LIMIT' ) ? WP_MAX_MEMORY_LIMIT : null;
        $values[ 'WP_MEMORY_LIMIT' ] =                      defined( 'WP_MEMORY_LIMIT' ) ? WP_MEMORY_LIMIT : null;
        $values[ 'WP_CACHE' ] =                             defined( 'WP_CACHE' ) ? WP_CACHE : 0;
        
        # Multisites
        $values[ 'MULTISITE' ] =                            defined( 'MULTISITE' ) ? MULTISITE : null;
        $values[ 'WP_ALLOW_MULTISITE' ] =                   defined( 'WP_ALLOW_MULTISITE' ) ? WP_ALLOW_MULTISITE : null;
        $values[ 'BLOG_ID_CURRENT_SITE' ] =                 defined( 'BLOG_ID_CURRENT_SITE' ) ? BLOG_ID_CURRENT_SITE : null;
        $values[ 'DOMAIN_CURRENT_SITE' ] =                  defined( 'DOMAIN_CURRENT_SITE' ) ? DOMAIN_CURRENT_SITE : null;
        $values[ 'PATH_CURRENT_SITE' ] =                    defined( 'PATH_CURRENT_SITE' ) ? PATH_CURRENT_SITE : null;
        $values[ 'PRIMARY_NETWORK_ID' ] =                   defined( 'PRIMARY_NETWORK_ID' ) ? PRIMARY_NETWORK_ID : null;
        $values[ 'SITE_ID_CURRENT_SITE' ] =                 defined( 'SITE_ID_CURRENT_SITE' ) ? SITE_ID_CURRENT_SITE : null;
        $values[ 'SUBDOMAIN_INSTALL' ] =                    defined( 'SUBDOMAIN_INSTALL' ) ? SUBDOMAIN_INSTALL : null;
        
        # Post
        $values[ 'AUTOSAVE_INTERVAL' ] =                    defined( 'AUTOSAVE_INTERVAL' ) ? AUTOSAVE_INTERVAL : null;
        $values[ 'EMPTY_TRASH_DAYS' ] =                     defined( 'EMPTY_TRASH_DAYS' ) ? EMPTY_TRASH_DAYS : null;
        
        # This must presented as either 0 or 1 so that it will be checked if its presented as number (e.g 10, 30, etc...)
        $values[ 'WP_POST_REVISIONS-STATUS' ] =             defined( 'WP_POST_REVISIONS' ) ? ( bool ) WP_POST_REVISIONS : null;
        $values[ 'WP_POST_REVISIONS-MAXCOUNT' ] =           defined( 'WP_POST_REVISIONS' ) ? ( is_bool( WP_POST_REVISIONS ) ? 0 : WP_POST_REVISIONS ) : null;
        
        # Proxy
        $values[ 'WP_PROXY_BYPASS_HOSTS' ] =                ( defined( 'WP_PROXY_BYPASS_HOSTS' ) && WP_PROXY_BYPASS_HOSTS )  ? explode( ',',  WP_PROXY_BYPASS_HOSTS ) : array();
        $values[ 'WP_PROXY_HOST' ] =                        defined( 'WP_PROXY_HOST' ) ? WP_PROXY_HOST : null;
        $values[ 'WP_PROXY_PASSWORD' ] =                    defined( 'WP_PROXY_PASSWORD' ) ? WP_PROXY_PASSWORD : null;
        $values[ 'WP_PROXY_PORT' ] =                        defined( 'WP_PROXY_PORT' ) ? WP_PROXY_PORT : null;
        $values[ 'WP_PROXY_USERNAME' ] =                    defined( 'WP_PROXY_USERNAME' ) ? WP_PROXY_USERNAME : null;
        
        # Security
        $values[ 'WP_ACCESSIBLE_HOSTS' ] =                  ( defined( 'WP_ACCESSIBLE_HOSTS' ) && WP_ACCESSIBLE_HOSTS )  ? explode( ',',  WP_ACCESSIBLE_HOSTS ) : array();
        $values[ 'ALLOW_UNFILTERED_UPLOADS' ] =             defined( 'ALLOW_UNFILTERED_UPLOADS' ) ? ALLOW_UNFILTERED_UPLOADS : null;
        $values[ 'WP_HTTP_BLOCK_EXTERNAL' ] =               defined( 'WP_HTTP_BLOCK_EXTERNAL' ) ? WP_HTTP_BLOCK_EXTERNAL : null;
        $values[ 'DISALLOW_FILE_EDIT' ] =                   defined( 'DISALLOW_FILE_EDIT' ) ? DISALLOW_FILE_EDIT : null;
        $values[ 'DISALLOW_UNFILTERED_HTML' ] =             defined( 'DISALLOW_UNFILTERED_HTML' ) ? DISALLOW_UNFILTERED_HTML : null;
        $values[ 'FORCE_SSL_ADMIN' ] =                      defined( 'FORCE_SSL_ADMIN' ) ? FORCE_SSL_ADMIN : null;
        $values[ 'FORCE_SSL_LOGIN' ] =                      defined( 'FORCE_SSL_LOGIN' ) ? FORCE_SSL_LOGIN : null;
        
        # Upgrade
        # auto core
        $updateAutoCore = null;
        
        if ( defined( 'WP_AUTO_UPDATE_CORE' ) )
        {
            
            # Transform the value to string 
            # (BOOL) TRUE => 'true'
            # (BOOL) FALSE => 'false'
            # (STRING) 'minor' => 'minor' -- no changes
            if ( is_bool( WP_AUTO_UPDATE_CORE ) )
            {
                $updateAutoCore = WP_AUTO_UPDATE_CORE ? 'true' : 'false';
            }
            else
            {
                $updateAutoCore = WP_AUTO_UPDATE_CORE;
            }
            
        }
        
        $values[ 'WP_AUTO_UPDATE_CORE' ] =                      $updateAutoCore;
        $values[ 'AUTOMATIC_UPDATER_DISABLED' ] =               defined( 'AUTOMATIC_UPDATER_DISABLED' ) ? AUTOMATIC_UPDATER_DISABLED : null;
        $values[ 'DISALLOW_FILE_MODS' ] =                       defined( 'DISALLOW_FILE_MODS' ) ? DISALLOW_FILE_MODS : null;
        $values[ 'FS_METHOD' ] =                                defined( 'FS_METHOD' ) ? FS_METHOD : null;
        $values[ 'FTP_BASE' ] =                                 defined( 'FTP_BASE' ) ? FTP_BASE : null;
        $values[ 'FTP_CONTENT_DIR' ] =                          defined( 'FTP_CONTENT_DIR' ) ? FTP_CONTENT_DIR : null;
        $values[ 'FTP_HOST' ] =                                 defined( 'FTP_HOST' ) ? FTP_HOST : null;
        $values[ 'FTP_PASS' ] =                                 defined( 'FTP_PASS' ) ? FTP_PASS : null;
        $values[ 'FTP_PLUGIN_DIR' ] =                           defined( 'FTP_PLUGIN_DIR' ) ? FTP_PLUGIN_DIR : null;
        $values[ 'FTP_PRIKEY' ] =                               defined( 'FTP_PRIKEY' ) ? FTP_PRIKEY : null;
        $values[ 'FTP_PUBKEY' ] =                               defined( 'FTP_PUBKEY' ) ? FTP_PUBKEY : null;
        $values[ 'FTP_SSL' ] =                                  defined( 'FTP_SSL' ) ? FTP_SSL : null;
        $values[ 'FTP_USER' ] =                                 defined( 'FTP_USER' ) ? FTP_USER : null;

        $this->form->setValue( array( $this->form->getName() => $values ) );
        # Fill form
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & loadFromSaveState() 
    {
        
		# Load model form from saved vars
		$this->getForm()->setValue( $this->savedVars );
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $fieldList
	*/
	public static function makeClassesList($list)
	{
		
		$classesList = array();
		
		foreach ( $list as $ns => $nsClasses )
		{
			foreach ( $nsClasses as $name )
			{
				
				# Append name to namespace to get full class name
				$class = "{$ns}\\{$name}";
				
				$classesList[ $class ] = $name;
				
			}
		}
		
		return $classesList;
	}

	/**
	* put your comment there...
	* 
	*/
	public function readWPConfigFileContent()
	{
		
		$configFilePath = ABSPATH . 'wp-config.php';
		
		if ( ! is_readable( $configFilePath ) )
		{
			
			$this->addError( $this->_( 'Couldn\'t read wp-config.php file' ) );
			
			return false;
		}
		
		$configContent = file_get_contents( $configFilePath );
		
		return $configContent;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $profileId
	*/
	public function & setActiveProfile( $profileId )
	{
		
		$this->activeProfile = $profileId;
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $content
	*/
	public function & setConfigFileContent($content) 
	{
		# Set
		$this->configFileContent =& $content;
		# Chain
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
  public function saveConfigFile() 
  {
  	
		# Config File path
		$configFilePath = ABSPATH . 'wp-config.php';
		
		# Check config file permissions
		if ( ! is_readable( $configFilePath ) || ! is_writable( $configFilePath ) )
		{
			$this->addError( $this->_( 'Config file is not writable: %s', $configFilePath ) );
			
			return false;
		}
		
		# Save config file
		if ( ! file_put_contents( $configFilePath, $this->getConfigFileContent() ) )
		{
            
			$this->addError( $this->_( 'Could not write config file: %s', $configFilePath ) );
			
			return false;
		}
		
		return true;
  }

	/**
	* put your comment there...
	* 
	*/
	public function & saveSubmittedVars() 
	{

		$form =& $this->getForm();

		# Set back for changes flag to true
		$this->isBackForChange = true;
		
		# Save form fields to be used later by 
		# Don't save all fields, just related to config file
		$vars = array_intersect_key( $form->getValue(), array_flip( $this->allFields ) );
		
		# Cache into model state to be used when getting back later
		$this->savedVars = array( $form->getName() => $vars );

		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & unsetActiveProfile()
	{
		
		$this->activeProfile = null;
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function validate() 
    {
		
		$form =& $this->getForm();
		$valid = false;
        
		# Validate the form
		# If its a valid form try to open databse connection using 
		# form database parameters
		
		if ( $form->validate() ) 
		{
			
			# Get database connection parameters.
			$user       = $form->get( 'DB_USER' )->getValue();
			$password   = $form->get( 'DB_PASSWORD' )->getValue();
			$name       = $form->get( 'DB_NAME' )->getValue();
			$host       = $form->get( 'DB_HOST-NAME' )->getValue();
			$port       = $form->get( 'DB_HOST-PORT' )->getValue();
			
			# Test database parameters
			# using mysql extension or mysqli is mysql not available
			if ( function_exists( 'mysqli_init' ) ) 
			{ # Use Mysqli
            
				# Connection successed
				if ( $clink = @ mysqli_connect( $host, $user, $password, null, $port ) ) 
				{
					# Db Selection successed
					if ( @ mysqli_select_db( $clink, $name ) ) 
					{
						# Return valid
						$valid = true;
					}
					else 
					{
						# Could not select database
						$this->addError( $this->_( 'Database doesn\' exists!' ) );
					}
					# Close connection
					mysqli_close( $clink );
				}
				else 
				{
					# Could not connect
					$this->addError( $this->_( 'Couldn\'t connect to database server!' ) );
				}
			}
			else if ( function_exists( 'mysql_connect' ) ) 
			{
				# Connection successed
				if ( $clink = @ mysql_connect( $host, $user, $password ) )
				{
					# Db Selection successed
					if ( @ mysql_select_db( $name, $clink ) )
					{
						# Return valid
						$valid = true;
					}
					else 
					{
						# Could not select database
						$this->addError( $this->_( 'Database doesn\' exists!' ) );
					}
					# Close connection
					mysql_close( $clink );
				}
				else 
				{
					# Could not connect
					$this->addError( $this->_( 'Couldn\'t connect to database server!' ) );
				}
			}
			else 
			{
				# Doesn't supported
				$this->addError( $this->_( 'Could not use mysql or mysqli extension for testing database connection! DB provider doesn\' supported!!' ) );
			}
		}
		# Return status
		return $valid;
	}

}
