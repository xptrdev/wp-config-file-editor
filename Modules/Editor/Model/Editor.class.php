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
	protected $configFileContent;
	
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
		'ScriptDebug',
		
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
	*/
	public function createBackup()
	{
		
		# Check ABSPATH permission
		if ( ! is_writable( ABSPATH ) )
		{
			$this->addError( 'Wordpress Root folder is not writable!!! WCFE Plugin need Root directory to be writable for creating wp-config backup' );
			
			return false;
		}

		# Initialize vars
		$dataFileName = EmergencyRestore::BACKUP_DATA_FILE_NAME;
		$dataFilePath = ABSPATH . DIRECTORY_SEPARATOR . $dataFileName;
		$configFileContent = base64_encode( file_get_contents( ABSPATH . DIRECTORY_SEPARATOR . 'wp-config.php' ) );
		$secureKey = md5( uniqid( ) );
		$backupFileName = 'wcfe-config-backup-' . md5( uniqid( ) ) . '.php';
		$backupFilePath = ABSPATH . DIRECTORY_SEPARATOR . $backupFileName;
		$backupFileHash = md5( $configFileContent );
		
		# Create backup data file
		ob_start();
		require 'Editor' . DIRECTORY_SEPARATOR . 'BackupDBFile.Template.php';
		
		if ( ! file_put_contents( $dataFilePath, ob_get_clean() ) )
		{
			$this->addError( "Could not create backup Data file: {$dataFilePath}" );
			
			return false;
		}
				
		# Create backup file
		ob_start();
		require 'Editor' . DIRECTORY_SEPARATOR . 'BackupFile.Template.php';
		
		if ( ! file_put_contents( $backupFilePath, ob_get_clean() ) )
		{
			$this->addError( "Could not create backup file: {$backupFilePath}" );
			
			return false;
		}		
		
		return true;
	}

	/**
	* put your comment there...
	* 
	*/
	public function generateConfigFile() {
		# Generate config file 
		$configFile = new ConfigFile\Templates\Master\Master( $this->getForm(), $this->fieldsMap );
		# Set config file content.
		$this->setConfigFileContent( (string) $configFile );
		# Chain
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
		# Creating config form
		$this->form = new Forms\ConfigFileForm( $this->fieldsMap );
		
		# Filter fields map
		
	}

	/**
	* put your comment there...
	* 
	*/
	public function & loadFromConfigFile() {
		# Read fields value from Wordpress config file
		$form =& $this->getForm();
		foreach ( $this->fieldsMap as $fieldName ) {
			# Force field to read data from config file
			$form->get( $fieldName )->read();
		}
		# Chain
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
  public function & saveConfigFile() {
		# Config File path
		$configFilePath = ABSPATH . 'wp-config.php';
		$successed = false;
		# Check permissions
		if (!is_readable($configFilePath) || !is_writable($configFilePath)) {
			$this->addError("Config file is not writable: {$configFilePath}");
		}
		else {
			# Save config file
			if (!file_put_contents($configFilePath, $this->getConfigFileContent())) {
				$this->addError("Could not write config file: {$configFilePath}");
			}
			else {
				# Return successed
				$successed = true;
			}
		}
		return $successed;
  }

	/**
	* put your comment there...
	* 
	*/
	public function & saveSubmittedVars() {
		# Initiaize
		$form =& $this->getForm();
		# Set back for changes flag to true
		$this->isBackForChange = true;
		# Save form fields to be used later by 
		# Don't save all fields, just related to config file
		$vars = array_intersect_key( $form->getValue(), array_flip( $this->fieldsMap ) );
		# Save them
		$this->savedVars = array( $form->getName() => $vars );
		# Chain
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
		if ($form->validate()) {
			# Get database connection parameters.
			$user = $form->get('DbUser')->getValue();
			$password = $form->get('DbPassword')->getValue();
			$name = $form->get('DbName')->getValue();
			$host = $form->get('DbHost')->getValue();
			# Test database parameters
			# using mysql extension or mysqli is mysql not available
			if (function_exists('mysqli_init')) { # Use Mysqli
				# Connection successed
				if ($clink = @mysqli_connect($host, $user, $password)) {
					# Db Selection successed
					if (@mysqli_select_db($clink, $name)) {
						# Return valid
						$valid = true;
					}
					else {
						# Could not select database
						$this->addError('Database doesn\' exists!');
					}
					# Close connection
					mysqli_close($clink);
				}
				else {
					# Could not connect
					$this->addError('Couldn\'t connect to database server!');
				}
			}
			else if (function_exists('mysql_connect')) {
				# Connection successed
				if ($clink = @mysql_connect($host, $user, $password)) {
					# Db Selection successed
					if (@mysql_select_db($name, $clink)) {
						# Return valid
						$valid = true;
					}
					else {
						# Could not select database
						$this->addError('Database doesn\' exists!');
					}
					# Close connection
					mysql_close($clink);
				}
				else {
					# Could not connect
					$this->addError('Couldn\'t connect to database server!');
				}
			}
			else {
				# Doesn't supported
				$this->addError('Could not use mysql or mysqli extension for testing database connection! DB provider doesn\' supported!!');
			}
		}
		# Return status
		return $valid;
	}

}
