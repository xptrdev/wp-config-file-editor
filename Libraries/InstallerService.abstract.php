<?php
/**
* 
*/

namespace WCFE\Libraries;

/**
* 
*/
abstract class InstallerService extends \WCFE\Libraries\PersistObject {
	
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
	public function __construct( \WPPFW\Obj\IFactory & $factory, $currentVersion )
	{
		parent::__construct( new \WPPFW\MVC\Model\State\GlobalWPOptionsModelState( $factory, get_class( $this ) ) );
		
		$this->currentVersion = $currentVersion;
	}
	
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
	public function isNotInstalled()
	{
		return $this->installedVersion ? false : true;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function isUpgrade()
	{
		return ( version_compare( $this->installedVersion, $this->currentVersion ) == -1 );
	}

	/**
	* put your comment there...
	* 
	*/
	public final function install()
	{
		return $this->chainUpgraders( 0 );
	}

	/**
	* put your comment there...
	* 
	* @param mixed $startIndex
	*/
	protected function & processUpgraders( $startIndex )
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
					return;
				}
				
			}
			
		}
		
		# Set version number
		$this->installedVersion = $this->currentVersion;
		
		# Save state
		$this->writeState();
		
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function unInstall() { }

	/**
	* put your comment there...
	* 
	*/
	public final function upgrade()
	{
		
		$installedVersionUIdx = array_search( $this->installedVersion, $this->_upgraders );
		
		if ( $installedVersionUIdx !== FALSE )
		{
			$this->chainUpgraders( $installedVersionUIdx );
		}
		
		return $this;
	}
}