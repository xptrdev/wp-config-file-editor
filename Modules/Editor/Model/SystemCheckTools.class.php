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
class SystemCheckToolsModel extends PluginModel 
{
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $applicationServer;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $configFileState;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $htaccessState;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $backupDir;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $backupState;
	
	/**
	* put your comment there...
	* 
	*/
	public function & checkAll()
	{
		
		# Check if Apache
		$this->applicationServer = $_SERVER[ 'SERVER_SOFTWARE' ];
		
		# Check if config file writable
		$configFilePath = ABSPATH . 'wp-config.php';
		
		$this->configFileState = is_readable( $configFilePath ) && is_writable( $configFilePath );
		
		$htaccessFilePath = ABSPATH . '.htaccess';
		
		$this->htaccessState = is_readable( $htaccessFilePath ) && is_writable( $htaccessFilePath );
		
		# Backup directory and emergency backup
		
		$editorModel =& $this->mvcServiceManager()->getModel( 'Editor' );
		
		$this->backupDir = $editorModel->getContentDir();
		
		$backupDirPath = WP_CONTENT_DIR . DIRECTORY_SEPARATOR . $this->backupDir;
		
		$this->backupState =    file_exists( $backupDirPath . DIRECTORY_SEPARATOR . EmergencyRestore::BACKUP_DATA_FILE_NAME ) ||
		                        file_exists( $backupDirPath . DIRECTORY_SEPARATOR . EmergencyRestore::BACKUP_FILE_NAME );
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getApplicationServer()
	{
		return $this->applicationServer;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getBackupDir()
	{
		return $this->backupDir;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getBackupState()
	{
		return $this->backupState;
	}
		
	/**
	* put your comment there...
	* 
	*/
	public function getConfigFileState()
	{
		return $this->configFileState;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getHTAccessFileState()
	{
		return $this->htaccessState;
	}
	
	/**
	* put your comment there...
	* 
	* @param mixed $state
	*/
	public function turnConfig( $state )
	{
		return chmod( ABSPATH . 'wp-config.php',  0444 | ( abs( ( int ) $state ) * 0220 ) );
	}

	/**
	* put your comment there...
	* 
	* @param mixed $state
	*/
	public function turnHTAccess( $state )
	{
		
		$htaccessFile = ABSPATH . '.htaccess';
		
		if ( ! file_exists( $htaccessFile ) )
		{
			
		  $this->addError( $this->__( 'HTAccess file doesnt exists' ) );
			
			return false;
		}
		
		return chmod( $htaccessFile,  0444 | ( abs( ( int ) $state ) * 0220 ) );
	}
	
}