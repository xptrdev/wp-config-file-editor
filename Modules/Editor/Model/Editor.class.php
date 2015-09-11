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
	private $fieldsMap = array(
		'DbName',
		'DbUser',
		'DbPassword',
		'DbHost',
		'DbCharSet',
		'DbCollate',
		
		'DbTablePrefix',
		
		'AuthKey',
		'SecureAuthKey',
		'LoggedInKey',
		'NonceKey',
		'AuthSalt',
		'SecureAuthSalt',
		'LoggedInSalt',
		'NonceSalt',
		
		'WPDebug',
		'WPDebugLog',
		'WPDebugDisplay',
		'ScriptDebug',
		'SaveQueries',
		'ConcatenateJavaScript',
		
		'WPLang',
		'WPLangDir',
		
		'MultiSiteAllow',
		'MultiSite',
		'MultiSiteSubDomainInstall',
		'MultiSiteDomainCurrentSite',
		'MultiSitePathCurrentSite', 
		'MultiSiteSiteId',
		'MultiSiteBlogId',
		
		'WPCache',
		'MemoryLimit',
		'MaxMemoryLimit',
		
		'PostAutoSaveInterval',
		'PostRevisions',
		'PostRevisionsMax',
		
		'Cron',
		'CronAlternate',
		'CronLockTimeOut',
	);
	
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
	private $pluggedFields = array();
	
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
				$this->addError( "Couldn\'t create Content dir:: {$contentDir}. Content directory is not writable!!" );
				
				return false;
			}
			
			# Create HTAccess file
			if ( ! copy( __DIR__ . DIRECTORY_SEPARATOR . 'Editor' . DIRECTORY_SEPARATOR . 'htaccess.Template', 
									$contentDir . DIRECTORY_SEPARATOR . '.htaccess' ) ) 
			{
				
				$this->addError( 'Could\'t create htaccess file to protect wcfe content dir from being access by public' );
				
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
			$this->addError( "Could not create backup file: {$backupFilePath}" );
			
			return false;
		}		
		
		$backupFileHash = md5( file_get_contents( $backupFilePath ) );
		
		# Create backup data file
		ob_start();
		require 'Editor' . DIRECTORY_SEPARATOR . 'BackupDBFile.Template.php';
		
		if ( ! file_put_contents( $dataFilePath, ob_get_clean() ) )
		{
			$this->addError( "Could not create backup Data file: {$dataFilePath}" );
			
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
			
			$this->addError( 'Content directory doesn\'t exists' );
			
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
	*/
	public function generateConfigFile()
	{
		
		# Prepare generator fields list
		$fieldsList = self::makeClassesList( array( 'WCFE\Modules\Editor\Model\ConfigFile\Fields' => $this->fieldsMap ) );
		
		//////////// PLUGGABLE FIELDS LIST ///////////////#$
		
		$fieldsList = apply_filters( \WCFE\Hooks::FILTER_MODEL_EDITOR_GENERATOR_FIELDS, $fieldsList );
		
		//////////////////////////////////////////////////#$
		
		# Get generator instance
		$configFile = new ConfigFile\Templates\Master\Master( $this->getForm(), $fieldsList );
		
		# Save generated config file to model
		$this->setConfigFileContent( (string) $configFile );
		
		
		return $this;
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
	public function & getForm() {
		return $this->form;
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
		
		/////////////// Allow pluggable fields //////////////////////#$
		
		$this->pluggedFields = apply_filters( \WCFE\Hooks::FILTER_MODEL_EDITOR_REGISTER_FIELDS, $this->pluggedFields );
		
		/////////////////////////////////////////////////////////////#$
		
		# Make all fields list from built in list and plugged list
		$this->allFields = array_merge( $this->fieldsMap, $this->pluggedFields );
		
		# Make form core fields list
		$fieldsList = self::makeClassesList( array( 'WCFE\Modules\Editor\Model\Forms\Fields' => $this->fieldsMap ) );
		
		
		////////////// PLUGGABLE FIELDS LIST ////////////////#$
		
		$fieldsList = apply_filters( \WCFE\Hooks::FILTER_MODEL_EDITOR_FORM_FIELDS, $fieldsList );
		
		////////////////////////////////////////////////////#$
		
		$this->form = new Forms\ConfigFileForm( $fieldsList );
		
	}

	/**
	* put your comment there...
	* 
	*/
	public function & loadFromConfigFile() 
	{
		
		$form =& $this->getForm();
		
		foreach ( $this->allFields as $fieldName ) 
		{
			
			# Load form values from defined constants
			$form->get( $fieldName )->read();
			
		}
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & loadFromSaveState() {
		# Load model form from saved vars
		$this->getForm()->setValue($this->savedVars);
		# Chain
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
	* @param mixed $content
	*/
	public function & setConfigFileContent($content) {
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
			$this->addError( "Config file is not writable: {$configFilePath}" );
			
			return false;
		}
		
		# Save config file
		if ( ! file_put_contents( $configFilePath, $this->getConfigFileContent() ) )
		{
			$this->addError( "Could not write config file: {$configFilePath}" );
			
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
	public function validate() {
		# Initialize
		$form =& $this->getForm();
		$valid = false;
		# Validate the form
		# If its a valid form try to open databse connection using 
		# form database parameters
		
		if ( $form->validate() ) 
		{
			
			# Get database connection parameters.
			$user = $form->get( 'DbUser' )->getValue();
			$password = $form->get( 'DbPassword' )->getValue();
			$name = $form->get( 'DbName' )->getValue();
			$host = $form->get( 'DbHost' )->getValue();
			
			# Test database parameters
			# using mysql extension or mysqli is mysql not available
			if ( function_exists( 'mysqli_init' ) ) 
			{ # Use Mysqli
				# Connection successed
				if ( $clink = @ mysqli_connect( $host, $user, $password ) ) 
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
						$this->addError( 'Database doesn\' exists!' );
					}
					# Close connection
					mysqli_close( $clink );
				}
				else 
				{
					# Could not connect
					$this->addError( 'Couldn\'t connect to database server!' );
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
						$this->addError( 'Database doesn\' exists!' );
					}
					# Close connection
					mysql_close( $clink );
				}
				else 
				{
					# Could not connect
					$this->addError( 'Couldn\'t connect to database server!' );
				}
			}
			else 
			{
				# Doesn't supported
				$this->addError( 'Could not use mysql or mysqli extension for testing database connection! DB provider doesn\' supported!!' );
			}
		}
		# Return status
		return $valid;
	}

}
