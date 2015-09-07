<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Model;

/**
* 
*/
class EmergencyRestore
{
	
	/**
	* 
	*/
	const BACKUP_DATA_FILE_NAME = 'backup-data.php';
	
	/**
	* 
	*/
	const BACKUP_FILE_NAME = 'wp-config-backup.php';
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $absPath;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $contentDir;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $backupDataFile;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $dataFileSecure;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $expiresInterval = 86400;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $secureKey;

	/**
	* put your comment there...
	* 
	* @param mixed $secureKey
	* @param mixed $dataFileSecure
	* @param mixed $absPath
	* @param mixed $contentDir
	* @return EmergencyRestore
	*/
	public function __construct( $secureKey, $dataFileSecure, $absPath, $contentDir ) 
	{
		# Initialize
		$this->secureKey =& $secureKey;
		$this->dataFileSecure =& $dataFileSecure;
		$this->absPath =& $absPath;
		$this->contentDir =& $contentDir;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & restore() 
	{
		# load backup data 
		
		$dataFileName = self::BACKUP_DATA_FILE_NAME;
		$dataFilePath = $this->absPath . DIRECTORY_SEPARATOR . $dataFileName;
		
		# Make sure that abspath is pointing to Wordpress installation
		# by checking existance of the psubmitted abs path and some other
		# wordpress core files
		$filesToCheck = array
		(
		
			$this->absPath => array
			(
				'wp-config.php',
				'wp-settings.php',
			),
			
			$this->contentDir => array
			(
				self::BACKUP_DATA_FILE_NAME,
				self::BACKUP_FILE_NAME
			)
			
		);
		
		foreach ( $filesToCheck as $baseDir => $files )
		{
			
			foreach ( $files as $file )
			{
				if ( ! file_exists( $file ) ) 
				{
					throw new \Exception( 'Invalid file/path specified' );
				}				
			}
			
		}
		
		# Check Data file secure, generatng hash from data file content
		# must be equal to the passed one
		$dataFilePath = $this->contentDir . DIRECTORY_SEPARATOR . self::BACKUP_DATA_FILE_NAME;
		
		if ( md5( file_get_contents( $dataFilePath ) ) != $this->dataFileSecure )
		{
			throw new \Exception( 'Access Denied!! Invalid Data file!!!!!!!!!!!!' );
		}
		
		
		# Load data file
		$this->backupDataFile = require $dataFilePath;
		
		if ( ! $this->backupDataFile || ! is_array( $this->backupDataFile ) || empty( $this->backupDataFile ) ) 
		{
			throw new \Exception( 'No backup available to be restored' );
		}
		
		# Validate passed parameters
		if ( 	( $this->dataFileSecure[ 'secureKey' ] 	!= $this->secureKey ) || 
			 		( $this->dataFileSecure[ 'absPath' ] 		!= $this->absPath )  	||
			 		( $this->dataFileSecure[ 'contentDir' ] != $this->contentDir ) )
		{
			
			throw neww \Exception( 'Access Denied!! Invalid parameters specified!!!!!!!!' );
		}
		
		# Validate backup file secure
		$backupFilePath = $this->contentDir . DIRECTORY_SEPARATOR . self::BACKUP_FILE_NAME;
		
		if ( 	! file_exists( $backupFilePath ) || 
					md5( file_get_contents( $backupFilePath ) != $this->dataFileSecure[ 'backupFileHash' ] ) )
		{
			throw new \Exception( 'Access Denied!!! Invalid Backup specified!!!!!' );
		}
		
		# Check if backup is not yet expired
		if ( ( $this->dataFileSecure[ 'timeCreated' ] + $this->expiresInterval ) >= time() )
		{
			throw new \Exception( 'Backup Expired!!!!!' );
		}
		
		
		# Restore backup
		$backupFile = require $backupFilePath;
		$configFilePath = $this->absPath . DIRECTORY_SEPARATOR . 'wp-config.php';
		
		if ( ! file_put_contents( $configFilePath, base64_decode( $backupFile[ 'content' ] ) ) ) 
		{
			throw new \Exception( 'Could not write to config file!!!' );
		}
		
		# Delete backup and data file
		unlink( $dataFilePath );
		unlink( $backupFilePath );
		
		return; # We're done!!!!!
	}
	
}