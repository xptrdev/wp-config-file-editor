<?php
/**
* 
*/

namespace WCFE;

/**
* 
*/
class Installer extends \WCFE\Libraries\InstallerService {

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected static $instance;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $_upgraders = array
	(
		'1.4.0',
		'1.5.0',
	);
	
	/**
	* put your comment there...
	* 
	* @param \WPPFW\Obj\Factory $factory
	* @param mixed $currentVersion
	*/
	public static function run( \WPPFW\Obj\Factory & $factory, $currentVersion )
	{
		
		if ( ! self::$instance )
		{
			# Create new installer
			self::$instance = new Installer( $factory, $currentVersion );
			
			# Install or upgrade
			
		}
		
		return self::$instance;
	}
	
	/**
	* Upgrade 1.4.0 to 1.5.0
	* 
	*/
	public function upgrade_140()
	{
		file_put_contents( ABSPATH . 'upgraded.log', 'data' );
	}
	
}