<?php
/**
* 
*/

namespace WCFE\Libraries;

/**
* 
*/
abstract class InstallerService extends \WCFE\Libraries\PersistObject {
	
	const STATE_FRESH_INSTALL = 2;
	const STATE_INSTALLED = 0;
	const STATE_UPGRADE = -1;
	const STATE_DOWNGRADE = 1;
	
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $currentVersion;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $installedVersion;

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $_upgraders = array();
	
	/**
	* put your comment there...
	* 
	* @param \WPPFW\Obj\IFactory $factory
	* @param mixed $currentVersion
	* @return InstallerService
	*/
	public function __construct( \WPPFW\Obj\IFactory & $factory )
	{
        
        $stateAdapter = new \WPPFW\MVC\Model\State\GlobalWPOptionsModelState( $factory, get_class( $this ) );
        
		parent::__construct( $stateAdapter );
		
		$this->currentVersion = $this->_getCurrentVersion();
	}
	
    /**
    * put your comment there...
    * 
    */
    protected abstract function _getCurrentVersion();
    
	/**
	* put your comment there...
	* 
	*/
	public function getInstalledVersion()
	{
		return $this->installedVersion;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getState()
	{
		
		$installedVersion = $this->getInstalledVersion();
		
		return ( 	! $installedVersion ) ?
								self::STATE_FRESH_INSTALL :
								version_compare( $installedVersion, $this->currentVersion );
	}

	/**
	* put your comment there...
	* 
	*/
	public final function install()
	{
		return $this->processUpgraders( 0 );
	}

	/**
	* put your comment there...
	* 
	* @param mixed $startIndex
	*/
	protected function processUpgraders( $startIndex )
	{
		
		# Run all upgraders, stop on error
		for ( $currentIndex = $startIndex; $currentIndex < count( $this->_upgraders ) ; $currentIndex++ )
		{
			
			$upgraderName = str_replace( array( '.', '-' ), array( '', '_' ), $this->_upgraders[ $currentIndex ] );
			
			$upgraderMethodName = "upgrade_{$upgraderName}";
			
			if ( method_exists( $this, $upgraderMethodName ) )
			{
				
				if ( ! $this->$upgraderMethodName() )
				{
					return false;
				}
				
			}
			
		}
		
		# Set version number
		$this->installedVersion = $this->currentVersion;
		
		# Save state
		$this->writeState();
		
		return true;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function uninstall() { }

	/**
	* put your comment there...
	* 
	*/
	public final function upgrade()
	{
		
		$result = false;
		
		$installedVersion = $this->getInstalledVersion();
		
		$installedVersionUIdx = array_search( $installedVersion, $this->_upgraders );
		
		if ( $installedVersionUIdx !== FALSE )
		{
			$result = $this->processUpgraders( $installedVersionUIdx );
		}
		
		return $result;
	}
}