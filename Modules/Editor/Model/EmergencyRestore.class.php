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
	private $confirmed;
	
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
	protected $backupDataFile;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $backupFilePath;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $dataFilePath;

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
	private $expiresInterval = 259200; /* Backup Alive for 3 Days */
	
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
    * Just interface but not real action!
    * 
    * @param mixed $text
    */
    public function __($text)
    {
        return $text;
    }
    
	/**
	* put your comment there...
	* 
	*/
	public function & confirm()
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
				'',
				self::BACKUP_DATA_FILE_NAME,
				self::BACKUP_FILE_NAME
			)
			
		);
		
		foreach ( $filesToCheck as $baseDir => $files )
		{
			
			foreach ( $files as $file )
			{
				if ( ! file_exists( $baseDir . DIRECTORY_SEPARATOR . $file ) ) 
				{
					throw new \Exception( $this->__( 'Invalid file/path specified %s', $file ) );
				}				
			}
			
		}
		
		# Check Data file secure, generatng hash from data file content
		# must be equal to the passed one
		$this->dataFilePath = $this->contentDir . DIRECTORY_SEPARATOR . self::BACKUP_DATA_FILE_NAME;
		$dataFileContent = file_get_contents( $this->dataFilePath );
		
		if ( ( md5( $dataFileContent ) != $this->dataFileSecure ) ||
				 ( strpos( $dataFileContent, 'WCFE\Modules\Editor\Model\EmergencyRestore' ) === false ) )
		{
			
			throw new \Exception( $this->__( 'Access Denied!! Invalid Data file!!!!!!!!!!!!' ) );
			
		}
		
		# Load data file
		$this->backupDataFile = require $this->dataFilePath;
		
		if ( ! $this->backupDataFile || ! is_array( $this->backupDataFile ) || empty( $this->backupDataFile ) ) 
		{
			throw new \Exception( $this->__( 'Backup data cannot be read!!' ) );
		}
		
		# Confirm passed parameters
		if ( 	( $this->backupDataFile[ 'secureKey' ] 	!= $this->secureKey ) || 
		        ( $this->backupDataFile[ 'absPath' ] 		!= $this->absPath )  	||
			 	( $this->backupDataFile[ 'contentDir' ] != $this->contentDir ) )
		{
			
			throw new \Exception( $this->__( 'Access Denied!! Invalid parameters specified!!!!!!!!' ) );
		}
		
		# Validate backup file secure
		$this->backupFilePath =  $this->backupDataFile[ 'contentDir' ] . DIRECTORY_SEPARATOR . self::BACKUP_FILE_NAME;
		
		if ( 	! file_exists( $this->backupFilePath ) || 
		        ( md5( file_get_contents( $this->backupFilePath ) ) != $this->backupDataFile[ 'backupFileHash' ] ) ) 
		{
			throw new \Exception( $this->__( 'Access Denied!!! Invalid Backup specified!!!!!' ) );
		}
		
		$this->confirmed = true;
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & delete()
	{
		# Delete backup and data file
		unlink( $this->dataFilePath );
		unlink( $this->backupFilePath );
		
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function isConfirmed()
	{
		return $this->confirmed;
	}
	
	/**      
	* put your comment there...
	* 
	*/
	public function & restore() 
	{
		
		# Restore backup
		$backupFile = require $this->backupFilePath;
		$configFilePath = $this->absPath . DIRECTORY_SEPARATOR . 'wp-config.php';
		
		if ( ! file_put_contents( $configFilePath, base64_decode( $backupFile[ 'content' ] ) ) ) 
		{
			throw new \Exception( $this->__( 'Could not write to config file!!!' ) );
		}
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & validate()
	{
		
		# Check if backup is not yet expired
		if ( ( $this->backupDataFile[ 'timeCreated' ] + $this->expiresInterval ) <= time() )
		{
			
			# MAY BE: Delete backup here!!
			
			throw new \Exception( $this->__( 'Backup Expired!!!!!' ) );
		}
		
		return $this;
	}
	
}